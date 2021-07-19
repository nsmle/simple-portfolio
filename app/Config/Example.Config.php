<?php
// Base Url
const BASEURL = 'YOUR BASE URL';

// Configuration Database
const DB_HOST      = 'YOUR DATABASE HOST';    // Replace with your database host
const DB_USER      = 'YOUR DATABASE USER';    // Replace with your databse user
const DB_PASS      = 'YOUR DATABASE PASSWORD';// Replace with your databse password
const DB_NAME      = 'YOUR DATABASE NAME';    // Replace with your databse name
const DB_ERROR_LOG = true; // You can enable database error logging by setting it to true, and false to turn it off.

// Mail Configuration
// You can read the the full documentation PHPMailer configuration on https://github.com/PHPMailer/PHPMailer
const MAIL_HOST       = 'HOST YOUR MAIL';      // Replace with your mail host | if you use gmail then replace with smpt.gmail.com
const MAIL_USERNAME   = 'EMAIL YOUR MAIL';     // Replace with your email
const MAIL_PASSWORD   = 'PASSWORD YOUR MAIL';  // Replace with your password email
const MAIL_FROMNAME   = 'YOUR SEENDER NAME';   // Replaace with your sender name
const MAIL_FROMEMAIL  = 'YOUR SEENDER EMAIL';  // Replace with your sennder email
const MAIL_DEBUG      = false;                 // For debug mail, the is boolean value. true or false

// Featured Register
const REGISTRATION_FEATURE = true;    // You can activate the registration feature by setting it to true and false to turn it off
const DEFAULT_ROLE_USER    = 'Admin'; // This is useful if you want to create and allow multiple users to manage your site. you can fill it with Admin or User // Or setting yourself with the configuration of your table users structure in the role column