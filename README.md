# Post Article

This project is for PT. Sharing Vision Indonesia (Test)

## Installation

Cloning this repository

```bash
  git clone https://github.com/theozebua/post-article.git
  cd post-article
  composer install
```

Copy `.env.example` to `.env`

Open `.env` file and change the database name to `post_article` or whatever database name.

## Run Locally

```bash
  php artisan key:generate
  php artisan migrate:fresh --seed
  php artisan serve
```

## Demo

[Click here](http://posts-articles.theozebua.com)
