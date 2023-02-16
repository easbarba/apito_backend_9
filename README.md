# Apito | Back-end

## Environment Variables

`apito-backend` needs that the listed environment variables in `.env.example` to be available to correctly run.

## Misc

-   Default port is at `:5000`
-   Prefix: `/api/v1`

## Endpoints

More information on endpoints is at `endpoints.md`.

## Installation

Get all dependencies and install with:

    $ make deps && make run

## Ops

### OpenAPI

The current description of the API can be found at `ops/openapi_*.json`.

### Insomnia

Insomnia tasks are available at the `ops` folder.

### Container images

[Docker Hub](https://hub.docker.com/r/easbarbosa/apito)

## Database

All SQL related tasks files are in `ops/sql`, there are some goal in the `Makefile` to automate the process.

A database named in the `$DATABASE_URL` environment variable should be available.

PS: PostgreSQL expects its password as: `PGPASSWORD=meh123`.

## License

[GPL-v3](https://www.gnu.org/licenses/gpl-3.0.en.html)
