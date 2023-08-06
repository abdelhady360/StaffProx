<p  align="center"><a href="https://laravel.com" target="_blank"><img   src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p><BR>

## Project StaffProx   

_StaffProx_ An application that makes it easier for you to manage companies and employees in terms of following up on the expiry of residencies, work permits, and the expiry date of employee passports using Laravel 8.x ! 



## Features

### Companies Management
    1. Alert when the company's commercial license expires
    2. Alert when the Federal Authority for Identity and Citizenship account has expired
    3. Alerting the expiration date of the company's health insurance
       
### Staff Management
    1. Alert when the employee's residence permit expires
    2. Alert when the employee's work offer permit expires
    3. Alert when the employee's passport expires
    3. Also, all this is the same for the employee who only has his visa
 
  ### Services Section (Typing Offices Transactions Section)
     - Add services :
        1. Government fees
        2. office fees
        3. Service description
        4. Service implementation steps
        5. Add notes
        6. Required Documents
    
### Inquiries Section (Printing Office Transactions Section)
          - Add query:
              1. Service description
              2. Steps to implement the service
              3. Add notes
              4. The required documents

### Frequently Asked Questions Section (Printing Office Transactions Section)
           1. Add a question
           2. Add an answer
       

##  Requirements




<pre><code>PHP >= 8.0.0
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
Or
XAMPP 8.X </code></pre>



## Install

Clone repo <br>

<pre><code>git clone https://github.com/abdelhady360/StaffProx.git</code></pre>

Install Composer  <br><br>
<a href="https://getcomposer.org/download/" target="_blank">Download Composer</a> <br>

Composer update/install

<pre><code>composer install</code></pre>

Install Nodejs <br>

<a href="https://nodejs.org/en/download/" target="_blank">Download Node.js</a> <br>

NPM Install

<pre><code>npm install</code></pre>

## How to setting

- Go into `.env` file and change Database and Email credentials.
- Go to a file `database\seeds\UserSeeder.php` and set your own owner account
<pre><code>php artisan migrate:refresh</code></pre>
<pre><code>php artisan db:seed</code></pre>



## Communication
<BR>

<p align="center"><a href="https://twitter.com/abdelhady360/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/ar/thumb/9/9f/Twitter_bird_logo_2012.svg/280px-Twitter_bird_logo_2012.svg.png" width="40"></a></p>


