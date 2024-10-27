default:
    @echo "Available commands:"
    @echo "  artisan *args:  Run Laravel Artisan commands inside the api service container"
    @echo "  setup:          Set up environment files and start Docker containers"
    @echo "  shell service:  docker compose exec service sh"
    @echo "  up:             docker compose up -d"

artisan *args:
    docker compose exec api php artisan {{args}} 

setup:
    @echo "Setting up environment files..."
    if [ ! -f client/.env ]; then cp client/.env.example client/.env; fi
    if [ ! -f api/.env ]; then cp api/.env.example api/.env; fi
    @echo "Environment files have been set up."
    just up

shell service:
    docker compose exec {{service}} sh

up:
    docker compose up -d