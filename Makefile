.DEFAULT_GOAL := run
API_PATH := ${PORT}/api/v1

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

api-all:
	http get :${API_PATH}/referees
    http get :${API_PATH}/teams

api-single:
	http get :${API_PATH}/referees/4
    http get :${API_PATH}/teams/4

api-new:
	http post :${API_PATH}/referees name='Paulo Cesar' state='DF'
    http post :${API_PATH}/teams name='Corinthians' state='Sao Paulo'

api-update:
	http patch :${API_PATH}/referees/5 state='Distrito Federal'
    http patch :${API_PATH}/teams/5 state='Sao Paulo'

api-delete:
	http delete :${API_PATH}/referees/2
    http delete :${API_PATH}/teams/2

.PHONY := run cache deps repl test lint db-start db-clean system fmt boot api-new api-delete api-all api-single api-update
