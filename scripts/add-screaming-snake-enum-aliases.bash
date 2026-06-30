#!/bin/bash
set -euo pipefail

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
MODEL_DIR="$( cd "${SCRIPT_DIR}/../src/Aspose/BarCode/Model" &> /dev/null && pwd )"

find "${MODEL_DIR}" -name "*.php" -exec python "${SCRIPT_DIR}/add-screaming-snake-enum-aliases.py" "{}" \;
