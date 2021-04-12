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

test-all: phpstan phpcsfixer test

sh:
	"$(EXEC)" bash
