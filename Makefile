EXEC="docker-compose exec workspace"

up:
	docker-compose up -d

start: up

down:
	docker-compose down

stop: down

dcbuild:
	docker-compose build

phpcsfixer:
	"$(EXEC)" composer phpcsfixer

phpstan:
	"$(EXEC)" composer phpstan

test:
	"$(EXEC)" composer test

test-coverage:
	"$(EXEC)" composer test-coverage

check-coverage:
	"$(EXEC)" composer check-coverage

test-all: phpstan phpcsfixer test-coverage check-coverage

sh:
	"$(EXEC)" bash

composer:
	"$(EXEC)" composer $(cmd)
