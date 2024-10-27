default:
    @echo "Available commands:"
    @echo "  artisan *args:  Run Laravel Artisan commands inside the api service container"
    @echo "  setup:          Set up environment files and start Docker containers"
    @echo "  shell service:  docker compose exec service sh"
    @echo "  up:             docker compose up -d"
    @echo "  down:           docker compose down"

artisan *args:
    docker compose exec api php artisan {{args}} 

setup:
    #!/usr/bin/env sh
    echo "Setting up environment files..."
    if [ ! -f client/.env ]; then cp client/.env.example client/.env; fi
    if [ ! -f api/.env ]; then cp api/.env.example api/.env; fi
    echo "Environment files have been set up."
    echo "Starting Docker containers..."
    just up
    echo "Docker containers have been started."
    echo "Setting up APP_KEY..."
    if ! grep -q '^APP_KEY=' api/.env || [ -z "$(grep '^APP_KEY=' api/.env | cut -d '=' -f 2)" ]; then
        just artisan key:generate
    fi
    echo "APP_KEY has been set up."
    echo "Waiting for MySQL container to be ready..."
    until docker compose exec mysql mysqladmin ping -h"127.0.0.1" --silent; do
        echo "Waiting for MySQL..."
        sleep 2
    done
    echo "MySQL is up and running."
    echo "Running migrations..."
    just artisan migrate
    echo "Migrations have been run."

shell service:
    docker compose exec {{service}} sh

up:
    docker compose up -d

down:
    docker compose down