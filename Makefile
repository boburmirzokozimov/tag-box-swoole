init: init-ci
init-ci: docker-down \
	docker-pull docker-build docker-up \
	composer-install composer-install-swoole migrations\
	start

up: docker-up
down: docker-down
restart: down up
artisan: php-artisan
fix: cs-fix test analyze
build: docker-build

docker-up:
	docker compose up -d

docker-down:
	docker compose down --remove-orphans

docker-down-clear:
	docker compose down -v --remove-orphans

docker-pull:
	docker compose pull

docker-build:
	docker compose build --pull

composer:
	docker compose run --rm tag-box-swoole composer $(name)

php-artisan:
	docker compose run --rm tag-box-swoole php artisan $(name)

composer-install:
	docker compose run --rm tag-box-swoole composer install

composer-install-swoole:
	docker compose run --rm tag-box-swoole composer require laravel/octane

start:
	docker compose run --rm -d tag-box-swoole php artisan octane:start --watch --server=swoole --host=0.0.0.0 --port=8000

stop:
	docker compose run --rm  tag-box-swoole php artisan octane:stop

reload:
	docker compose run --rm  tag-box-swoole php artisan octane:reload

watch:
	docker compose run --rm  tag-box-swoole chokidar "app/**" -c "php artisan octane:reload"

migrations:
	docker compose run --rm tag-box-swoole php artisan migrate

cs-fix:
	docker compose run --rm tag-box-swoole composer php-cs-fixer fix

analyze:
	docker compose run --rm tag-box-swoole composer analyze

test:
	docker compose run --rm tag-box-swoole ./vendor/bin/phpunit --configuration phpunit.xml
