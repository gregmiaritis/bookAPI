# BookAPI

## Instalation

Clone the repository

```
git clone https://github.com/gregmiaritis/bookAPI.git
```

Switch to the repo folder

```
cd bookAPI
```

Install all the dependencies using composer

```
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Run migrations
```
php artisan migrate
```

Passport Install
```
php artisan passport:install
```

Database Seeding
```
composer dump-autoload
php artisan db:seed --class=CategoriesTableSeed
php artisan db:seed --class=BooksTableSeed
```

## Request headers

|**Required** | **Key**           | **Value**         |
|-------------|------------------	|------------------	|
| Yes      	  | Content-Type     	| application/json 	|
| Yes      	  | Accept           	| application/json  |
| Yes      	  | Authorization    	| Bearer {Token}   	|

## Create user and copy the token:

`POST /api/register`

```JSON
{
  "name": "Greg Miaritis",
  "email": "greg@greg.com",
  "password": "123456",
  "c_password": "123456"
}
```
Required fields: `name`, `email`, `password`, `c_password`

## Login:

`POST /api/login`

Example request body:
```JSON
{
  "email": "greg@greg.com",
  "password": "123456"
}
```
Required fields: `email`, `password`

## Create Book:

`POST /api/books`

```JSON
{
  "isbn": "978-1491905012",
  "title": "Modern PHP: New Features and Good Practices",
  "author": "Josh Lockhart",
  "category": [
    "PHP"
  ],
  "price": 18.99
}
```
Required fields: `isbn`, `title`, `author`, `price`
Optional fields: `category`

### Get Books

`GET /api/books`

Authentication required

### Create Books

`Post /api/books`

Authentication required

### Get Categories

`GET /api/categories`

Authentication required


## Query Parameters:

### Filter by author:

```
api/books?filter[author]=Robin Nixon
```

### Filter by Categories:

```
api/books?filter[categories]=linux
```
### Sort by author:

```
api/books?sort=author
```
### Sort by price:

```
api/books?sort=price
```
### Sort by title:

```
api/books?sort=title
```

### Sort by author and category:

```
api/books?filter[author]=Robin Nixon&filter[categories]=linux
```
### Extra Packages:
[Laravel Passport](https://laravel.com/docs/5.7/passport)

[Laravel Query Builder](https://github.com/spatie/laravel-query-builder)

Custom filter has been applied on Laravel Query Builder
