EXEC="docker-compose exec workspace"

up:
	docker-compose up -d

down:
	docker-compose down

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
