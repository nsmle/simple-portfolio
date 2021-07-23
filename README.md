# Simple-Portfolio for full stack web developer

This simple portfolio automatically sends an email when a contact arrives from this portfolio page. and can also directly reply to incoming contacts

This simple portfolio uses the simple concept of mvc in php[(Development of mvc concept learning in php from Mr. Sandhika Galih)](https://github.com/sandhikagalih/phpmvc).
Instead of using PHP's built-in mail() function. This simple portfolio uses the [PHPmailer](https://github.com/PHPMailer/PHPMailer) library to send email via the SMTP Protocol to a local or remote SMTP server.

## Features
- Authentication login and register with code verification using email
- Contact the creator of the page via the email mechanism
- Login multi user

## Requirement
You need the [PHPMailer](https://github.com/PHPMailer/PHPMailer) library for this simple application. Otherwise, some errors will occur because the [init.php](https://github.com/nsmle/simple-portfolio/blob/e4d6a80ec0d950d4128c1b7c89a7d4bba5bfca23/app/init.php#L9) and [Mails\BaseMail](https://github.com/nsmle/simple-portfolio/blob/master/app/Mails/BaseMail.php#L7) file requires the PHPMailer library.

## Installation

You can download [Simple-Portfolio as a zip file](https://github.com/nsmle/simple-portfolio/archive/master.zip).
or clone this repo
```bash
git clone https://github.com/nsmle/simple-portfolio
```
To be able to use the **PHPMailer library**, you must install it. [Read the PHPMailer Installation documentation](https://github.com/PHPMailer/PHPMailer/blob/master/README.md#installation--loading)

or add this line to your [composer.json](https://github.com/nsmle/simple-portfolio/blob/ebd4dc4f02b998c8148a18a4978d00c71a3f54c7/composer.json#L3) file:
```bash
"phpmailer/phpmailer": "^6.5"
```
or run
```bash
composer require phpmailer/phpmailer
```

## Configuration

#### Database & Table
You can import the [simple_portfolio.sql](https://github.com/nsmle/simple-portfolio/blob/master/simple_portfolio.sql) database into your database.

#### Config File
- Rename the `Example.Config.php` file in [app/Config/](https://github.com/nsmle/simple-portfolio/blob/master/app/Config) to `Config.php`
- Replace with your base url.
  ```php
  // Base Url
  const BASEURL = 'YOUR BASE URL';
  ```
- Replace with your database configuration.
  ```php
  // Configuration Database
  const DB_HOST = 'YOUR DATABASE HOST';
  const DB_USER = 'YOUR DATABASE USER';
  const DB_PASS = 'YOUR DATABASE PASSWORD';
  const DB_NAME = 'YOUR DATABASE NAME';
  ```
- For database error logs. Fill `true` if you want to enable [error logging](https://github.com/nsmle/simple-portfolio/blob/e4d6a80ec0d950d4128c1b7c89a7d4bba5bfca23/app/Core/Database.php#L26) in the database and `false` to disable it.
  ```php
  const DB_ERROR_LOG = true;
  ```
  This is related to the [logs()](https://github.com/nsmle/simple-portfolio/blob/e4d6a80ec0d950d4128c1b7c89a7d4bba5bfca23/app/Config/Constant.php#L19) function in `app/Config/Constant.php`

- Email Configuration, This is related to [Mail\BaseMail](https://github.com/nsmle/simple-portfolio/blob/e4d6a80ec0d950d4128c1b7c89a7d4bba5bfca23/app/Mails/BaseMail.php#L15). You can see an example from [PHPMailer here](https://github.com/PHPMailer/PHPMailer#a-simple-example) or more examples [here](https://github.com/PHPMailer/PHPMailer/tree/master/examples)
  
  - Replace with your smtp host. If you use gmail then fill it with `smtp.gmail.com`
  ```php
  const MAIL_HOST = 'HOST YOUR MAIL';
  ```
  
  - Replace with your email and email password
  ```php
  const MAIL_USERNAME = 'EMAIL YOUR MAIL';
  const MAIL_PASSWORD = 'PASSWORD YOUR MAIL';
  ```
  
  - Replace with your sender name and sender email
  ```php
  const MAIL_FROMNAME  = 'YOUR SEENDER NAME';
  const MAIL_FROMEMAIL = 'YOUR SEENDER EMAIL';
  ```
  
  - Replace with `true` to enable [smtp debugging](https://github.com/nsmle/simple-portfolio/blob/e4d6a80ec0d950d4128c1b7c89a7d4bba5bfca23/app/Mails/BaseMail.php#L36), and `false` to disable
  ```php
  const MAIL_DEBUG = false;
  ```

  As a side note, if you are using **gmail** then you have to go to [myaccount.google.com](https://myaccount.google.com) -> **Log in & security** -> **Apps with account access**, and change **Allow less secure apps** to **ON** (near the bottom page).
  Alternatively you can follow this [direct link to these settings](https://myaccount.google.com/lesssecureapps)

- Registration features
  
  If you allow other people to manage your site(`http://yourbaseurl/admin`) then give it a value of `true` and if you don't allow it then give it a value of `false`. Note, that before you set the value to `false`, make sure that you are registered and able to log in.
  ```php
  const REGISTRATION_FEATURE = true;
  ```
  
  For the default user role. You can customize it with your users table in the [role column](https://github.com/nsmle/simple-portfolio/blob/e4d6a80ec0d950d4128c1b7c89a7d4bba5bfca23/simple_portfolio.sql#L77)
  ```php
  const DEFAULT_ROLE_USER    = 'Admin';
  ```
  
#### Ajax Configuration

You have to change the [ajax url](https://github.com/nsmle/simple-portfolio/blob/e4d6a80ec0d950d4128c1b7c89a7d4bba5bfca23/assets/js/main.js#L104) in [app/assets/js/main.js](https://github.com/nsmle/simple-portfolio/blob/master/assets/js/main.js#L104) manually.
in line
```javascript
url: '[YOUR_BASE_URL]/home/contact',
```
Replace `[YOUR_BASE_URL]` with your base url, as an example :
```javascript
// AJAX FOR SEND DATA
$.ajax({
  url: 'http://localhost:8000/home/contact',
  data: {name : name, email : email, phone : phone, message : message},
  method: 'post',
  success: function(data){
      document.getElementById('form-contact').innerHTML = data;
      console.log(data);
  },
  error: function(msg) {
      console.log(msg);
  }
});
```
