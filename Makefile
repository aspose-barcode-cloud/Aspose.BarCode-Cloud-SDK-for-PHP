.PHONY: all
all: format test lint

.PHONY: format
format:
	composer format

.PHONY: lint
lint:
	composer lint

.PHONY: test
test:
	composer test
	./scripts/run_snippets.sh

# Line coverage of src/ (see <source> in phpunit.xml); the gate (COVERAGE_THRESHOLD,
# default 80) is the shared scripts/coverage.py, which also writes
# coverage/coverage-{badge,summary}.json.
.PHONY: cover
cover:
	XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-clover coverage/clover.xml
	python3 scripts/coverage.py clover coverage/clover.xml

.PHONY: init
init:
	composer install

.PHONY: update
update:
	composer update
	composer validate

.PHONY: insert-example
insert-example:
	./scripts/insert-example.bash

.PHONY: format-doc
format-doc:
	# Trim trailing empty line
	sed -i -e '$${/^$$/d;}' README.md

.PHONY: after-gen
after-gen: format insert-example format-doc
	./scripts/add-deprecation-warnings.bash
	./scripts/add-screaming-snake-enum-aliases.bash
