# Book Club Crew


## Running Locally

* Create `.env` file from example:

```
cp .env.example
```

* Fill in the `DISCORD_TOKEN` environment variable in the `.env` file

* Install dependencies:

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

* Start up the containers 

```
./vendor/bin/sail up -d 
```

* Generate `APP_KEY`

```
./vendor/bin/sail artisan key:generate
```

* Run the migrations

```
./vendor/bin/sail artisan migrate
```
