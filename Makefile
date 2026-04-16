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
