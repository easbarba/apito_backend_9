dbstart:
	psql -U ${DB_USERNAME} -d postgres -a -f ops/sql/start.sql

dbclean:
	psql -U ${DB_USERNAME} -d postgres -a -f ops/sql/clean.sql

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
