.DEFAULT_GOAL := run
API_PATH := ${PORT}/api/v1/referees

run:
	php artisan serve --port=${PORT}

boot:
	php artisan migrate:refresh
	php artisan db:seed

cache:
	php artisan route:cache

repl:
	php artisan tinker

lint:
	./vendor/bin/phpinsights

fmt:
	./vendor/bin/pint

test:
	php artisan test

deps:
	composer install

db-start:
	psql -U ${DB_USERNAME} -d postgres -a -f ops/sql/start.sql

db-clean:
	psql -U ${DB_USERNAME} -d postgres -a -f ops/sql/clean.sql

system:
	guix shell --pure --container

api-new:
	http post :${API_PATH} name='Paulo Cesar' state='DF'

api-all:
	http get :${API_PATH}

api-one:
	http get :${API_PATH}/4

api-delete:
	http delete :${API_PATH}/2

.PHONY := run cache deps repl test lint db-start db-clean system fmt boot api-new api-delete api-all api-one
