"""Add SCREAMING_SNAKE_CASE constant aliases to PHP enum classes.

openapi-generator's PHP modelEnum template emits constants named exactly after
the spec values (e.g. ``public const Png = "Png"``), but the default-value
reference in non-enum models is rendered as ``BarcodeImageFormat::PNG`` (the
screaming-snake of the value). The two disagree, so phpstan flags
``Aspose\\BarCode\\Model\\BarcodeImageFormat::PNG`` as undefined.

This script adds an alias constant pointing to the *original* wire string,
e.g. ``public const PNG = "Png"``. Wire values are unchanged, the backend
needs no update, and other-language SDKs are untouched.

Idempotent. Only enum-shaped class members are touched; regular models pass
through unchanged because their constants don't have const-name == value.
"""

from __future__ import annotations

import argparse
import re
from pathlib import Path

_CONST_RE = re.compile(r'^(?P<indent>\s*)public const (?P<name>\w+) =\s+"(?P<value>\w+)";\s*$')
_LOWER_TO_UPPER = re.compile(r"([a-z0-9])([A-Z])")
_UPPER_TO_PASCAL = re.compile(r"([A-Z])([A-Z][a-z])")


def screaming_snake(name: str) -> str:
    """Convert PascalCase / camelCase to SCREAMING_SNAKE_CASE."""
    name = _LOWER_TO_UPPER.sub(r"\1_\2", name)
    name = _UPPER_TO_PASCAL.sub(r"\1_\2", name)
    return name.upper()


def process(path: Path) -> bool:
    """Add aliases in-place. Return True iff the file changed."""
    original = path.read_text(encoding="utf-8")
    lines = original.splitlines(keepends=True)

    # Collect every existing const name so we never produce a duplicate.
    existing: set[str] = set()
    for line in lines:
        match = _CONST_RE.match(line)
        if match:
            existing.add(match.group("name"))

    out: list[str] = []
    for line in lines:
        out.append(line)
        match = _CONST_RE.match(line)
        if match is None:
            continue
        name, value, indent = match.group("name"), match.group("value"), match.group("indent")
        # Only touch enum constants — the openapi-generator template emits the
        # constant name identical to the wire value for these.
        if name != value:
            continue
        alias = screaming_snake(value)
        if alias == name or alias in existing:
            continue
        existing.add(alias)
        out.append(f'{indent}public const {alias} = "{value}";\n')

    updated = "".join(out)
    if updated == original:
        return False
    path.write_text(updated, encoding="utf-8")
    return True


def main() -> None:
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("input_file", type=Path)
    args = parser.parse_args()
    process(args.input_file)


if __name__ == "__main__":
    main()
