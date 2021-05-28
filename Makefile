.DEFAULT_GOAL := help
SHELL := /bin/bash

.PHONY: *

## Run php cs-fixer
cs:
	vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --diff --verbose


## DOCKER ================================================================
IMAGE_NAME?=portfolio
IMAGE_TAG?=latest

## Run Docker images
docker-run:
	docker-compose up -d

## Stop Docker images
docker-stop:
	docker-compose down --remove-orphans

## Attach to main Docker image
docker-php:
	docker exec -it portfolio_php-fpm_1 bash

## Remove all Docker containers
docker-remove-all-containers:
	docker rm $(docker ps -a -q)

## Remove all Docker images
docker-remove-all-images:
	docker rmi $(docker images -q) -f

## ------

# APPLICATION
# APPLICATION := $(shell (cat package.json 2>/dev/null || cat composer.json) | grep "\"name\"" | head -1 | cut -d\" -f 4 )
APPLICATION := Portfolio

# COLORS
GREEN  := $(shell tput -Txterm setaf 2)
YELLOW := $(shell tput -Txterm setaf 3)
WHITE  := $(shell tput -Txterm setaf 7)
RESET  := $(shell tput -Txterm sgr0)

TARGET_MAX_CHAR_NUM=20
## Show this help
help:
	@echo '# ${YELLOW}${APPLICATION}${RESET}'
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
