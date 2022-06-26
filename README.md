<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project install
- download repository
- run command on current dir project `` composer install ``
- if dont generate file ``.env`` you can copy and rename ``.env.example`` and run command ``php artisan key:generate``
- on file ``.evn`` found keys ``DB_DATABASE, DB_USERNAME, DB_PASSWORD`` and set database name (data base mast be created), your user and password
- run migration ... command ``php artisan migrate``
- run seeders ... command ``php artisan db:seed``
## Task
### User Part
- page registration
- page login
- create logic only authorized user
- user type gust can see page login\registration

### Contact
- create random contact ~10-15 items
- show on home page public contact, only authorized user 
- can add to user contact from the general contact list

# Description
 - Registration: 
 <p>
I don't doing logic validate email about send email. Because  I don't trust free email servers... if for some reason this server fails, the work of the whole project will stop there
it is can change to file but this use would be inconvenient and possibly bring unwanted errors from the user
 </p>
- Public contact:
 <p>It is simple page wen sho public contact and can add how on contact like multi select</p>
 <p>this list contact have common to all users</p>
 <p>if user add contact for self then contact remove on public list</p>
- User contact:
<p>
functionality similar to the functionality of the public contacts page, but:
 - this save contact user
 - user can remove contact for self list contact and this contact set public
</p>
 


