clean:
	psql -U ${DB_USERNAME} -d ${DB_DATABASE} -a -f ops/sql/clean.sql

shell:
	guix shell --pure --container

# .DEFAULT_GOAL := run
# deps:
# test:
# build:
# lint:
# vet:
# run:
# imports:
# watch:
