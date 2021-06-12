# Laravel blog

a simply blog with laravel framework and crucd operations


## Recover the project

```bash
git clone git@github.com:StevenLignereux/monblog.git
```

### Install depencies

```bash
composer install
```

### Create database

create .env file then copy .env.exemple content and past into .env. 

fill up the .env fil with your informations


### Do migrations
```bash
php artisan migrate
```

### Populate the database
```bash
php artisan db:seed
```

### Publish assets and make symbolic link
```bash
php artisan vendor:publish --tag=lfm_config
php artisan vendor:publish --tag=lfm_public
php artisan storage:link
```
then you can add images in the storage/app/public/photo directory

### Run and enjoy :)
```bash
php artisan serve
```
