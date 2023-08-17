setup:
	@make build
	@make up 
	@make composer-update
build:
	docker-compose build --no-cache --force-rm
stop:
	docker-compose stop
up:
	docker-compose up -d
composer-update:
	docker exec poll-participa bash -c "composer update"
data:
	docker exec poll-participa bash -c "php artisan migrate"
	docker exec poll-participa bash -c "php artisan db:seed"
fresh:
	docker exec poll-participa bash -c "php artisan migrate:fresh"
	docker exec poll-participa bash -c "php artisan db:seed"
clear:
	docker exec poll-participa bash -c "php artisan optimize:clear"


