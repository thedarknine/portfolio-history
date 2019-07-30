.DEFAULT_GOAL := help
SHELL := /bin/bash

WEBPACK := yarn run webpack

.PHONY: assets build build-js build-php cc cs help hot install it me-cry reset reset-js reset-php run test test-ci test-functional test-unit


## ------

## Initialize application
install: build

## Build project to install dependencies and compile assets
build: build-php build-js cc

## Build composer dependencies
build-php:
	composer validate
	composer install

## Build webpack
build-js:
	yarn install

## Run build, cs-fixer & tests
it: build cs test

## Alias for it ;)
me-cry: it

## Clear cache
cc:
	(php bin/console ca:cl) || exit 0;

## Run php cs-fixer
cs:
	vendor/bin/php-cs-fixer fix --config=.php_cs --diff --verbose

## Run application tests
test:
	vendor/bin/phpunit

## Run Continuous Integration tests
test-ci: test-unit

## Run Unit tests
test-unit:
	vendor/bin/phpunit --testsuite unit

## Run Functional tests
test-functional:
	vendor/bin/phpunit --testsuite functional

## Compile assets
assets:
	node_modules/.bin/encore dev

## Reset
reset: reset-js reset-php

reset-php:
	rm -f var/bootstrap.php.cache
	rm -rf vendor var/cache/*

reset-js:
	rm -rf node_modules
	yarn cache clean
	yarn install --force

## Run server
run:
	bin/console server:run

hot:
	./node_modules/.bin/encore dev-server --hot

## ------

# APPLICATION
APPLICATION := $(shell (cat package.json 2>/dev/null || cat composer.json) | grep "\"name\"" | head -1 | cut -d\" -f 4 )

# COLORS
GREEN  := $(shell tput -Txterm setaf 2)
YELLOW := $(shell tput -Txterm setaf 3)
WHITE  := $(shell tput -Txterm setaf 7)
RESET  := $(shell tput -Txterm sgr0)

TARGET_MAX_CHAR_NUM=20
## Show this help
help:
	@echo '# ${YELLOW}${APPLICATION}${RESET} / ${GREEN}${ENV}${RESET}'
	@echo ''
	@echo 'Usage:'
	@echo '  ${YELLOW}make${RESET} ${GREEN}<target>${RESET}'
	@echo ''
	@echo 'Targets:'
	@awk '/^[a-zA-Z\-\_0-9]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			gsub(":", " ", helpCommand); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "  ${YELLOW}%-$(TARGET_MAX_CHAR_NUM)s${RESET} ${GREEN}%s${RESET}\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST) | sort

