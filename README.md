# Simple-Portfolio for full stack web developer

This simple portfolio automatically sends an email when a contact arrives from this portfolio page. and can also directly reply to incoming contacts

This simple portfolio uses the simple concept of mvc in php[(Development of mvc concept learning in php from Mr. Sandhika Galih)](https://github.com/sandhikagalih/phpmvc).
Instead of using PHP's built-in mail() function. This simple portfolio uses the [PHPmailer](https://github.com/PHPMailer/PHPMailer) library to send email via the SMTP Protocol to a local or remote SMTP server.

## Features
- Authentication login and register with code verification using email
- Contact the creator of the page via the email mechanism
- Login multi user

## Requirement
You need the [PHPMailer](https://github.com/PHPMailer/PHPMailer) library for this simple application. If not, then some errors will occur

## Installation

You can download [Simple-Portfolio as a zip file](https://github.com/nsmle/simple-portfolio/archive/master.zip).
or clone this repo
```bash
git clone https://github.com/nsmle/simple-portfolio
```
To be able to use the `PHPMailer` library, you must install it. [Read the PHPMailer Installation documentation](https://github.com/PHPMailer/PHPMailer/blob/master/README.md#installation--loading)

or add this line to your [composer.json](https://github.com/nsmle/simple-portfolio/blob/ebd4dc4f02b998c8148a18a4978d00c71a3f54c7/composer.json#L3) file:
```bash
"phpmailer/phpmailer": "^6.5"
```
or run
```bash
composer require phpmailer/phpmailer
```

## Configuration