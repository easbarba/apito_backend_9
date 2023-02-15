.DEFAULT_GOAL := run
.PHONY := run cache deps repl test lint dbstart dbclean shell fmt boot

run:
	php artisan serve --port=${PORT}

boot:
	php artisan migrate:refresh
	php artisan db:seed

cache:
	php artisan route:cache

repl:
	php artisan tinker

fmt:
	./vendor/bin/pint

test:
	php artisan test

deps:
	composer install

dbstart:
	psql -U ${DB_USERNAME} -d postgres -a -f ops/sql/start.sql

dbclean:
	psql -U ${DB_USERNAME} -d postgres -a -f ops/sql/clean.sql

shell:
	guix shell --pure --container
