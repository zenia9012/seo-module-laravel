# Seo module for Laravel website

## This package renders the meta tags and Open Graph tags

#### The package creates a database, you can easily add SEO data to the database.

Fields example:
``` bash
<meta name="title" content="example">
<meta name="description" content="example">
<meta name="keywords" content="example">

<meta property="og:title" content="example">
<meta property="og:image" content="example">
<meta property="og:description" content="example">
<meta property="og:type" content="example">

<title>example</title>
```

Features:
- seo-manager (coming soon)
- sharing meta tags in your website

## Install

1) In your terminal:
``` bash
composer require yevhenii/seo
```
2) Add to config/app.php  provider 

``` bash
Yevhenii\Seo\SeoServiceProvider::class,
```

3) Publish migration, config, views

```bash
php artisan vendor:publish --provider="Yevhenii\Seo\SeoServiceProvider::class"
php artisan migrate
```

## Usage example

Add this function to your blade wherever you need

```bash
{!! \Yevhenii\Seo\Seo::seoBlock() !!}
```
