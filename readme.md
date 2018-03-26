# Rest app

Rest application - laravel 

## Start

clone application

```
$ git clone https://github.com/PredragJovicic/Rest-app.git
$ cd Rest-app
$ composer install
$ php artisan key:generate
```

If .env file not exist create it and copy code

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:ZZIs6wcTTBZoj8xUv9Btj5OcGIPsEPhA8W60kMblAyo=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=restapp
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

API_KEY=EgsIQjGV6oodeYMjJ0KD94Zmb8FsckXn5WHVb7OVwWp6bBnCeF2Vhj2aYmY7
```

## Set database

Create mysql database and name it "restapp".
If you use another name for database rename it in .env file

```
DB_DATABASE=restapp
DB_USERNAME=root
DB_PASSWORD=root
```

## Instalation

If you use Vagrant

```
$ vagrant up
$ vagrant ssh

$ cd /var/www/public/Rest-app
```

Creating tables

```
$ php artisan migrate
```

Creating test data.
If you wont empty tables scip this.

```
$ php artisan db:seed
```

## Routes and keys

To access application you need api key

```
api_key = EgsIQjGV6oodeYMjJ0KD94Zmb8FsckXn5WHVb7OVwWp6bBnCeF2Vhj2aYmY7
```

Routes and http methodes

```
/api/login - login admin or user
 method: POST [email,password] 
/api/logout - logout admin or user 
 method: POST [api_token] 
/api/newuser - add new user, access: admin only 
 method: POST [name,email,password,password_confirmation,agency,professions,phone,avatar,api_token] 
  
/api/agencies - get all agencies, access: admin only
 method: GET [api_token] 
/api/agencies/agency - agency = id - get one agency by id, access: admin only
 method: GET [api_token] 
/api/agencies - add new agency, access: admin only
 method: POST [name,address,countri,city,phone,email,web,api_token] 
/api/agencies/agency - agency = id - update agency by id, access: admin only
 method: PUT [name,address,countri,city,phone,email,web,api_token] 
/api/agencies/agency - agency = id - delete agency by id,access: admin only
 method: DELETE [api_token] 
  
/api/users - get all users and admins, access: admin only
 method: GET [api_token] 
/api/users/user - user = id - get admin and user by id, access: admin and user
 method: GET [api_token] 
/api/users/user - user = id - update user by id, access: admin and user
 method: PUT [name,email,password,password_confirmation,agency,professions,phone,avatar,api_token] 
/api/users/user - user = id - delete user by id, access: admin only
 method: DELETE [api_token] 
  
/api/professions - get all professions
 method: GET [api_token] 
/api/countriescities - get all counties and cities
 method: GET [api_token] 
 
/api/searchagencies - search agencies, access: admin only  
 method: POST [search,offset,limit,api_token] 
/api/searchusers - search users, access: admin only
 method: POST [search,offset,limit,api_token] 
```  

The keys for sending data ara given in ["key1":"value1","key2":"value2"]. Login example:  

method: POST [email,password] 

```
var loginroute = "http://192.168.33.10/Rest-app/public/api/login";
var apikey = "EgsIQjGV6oodeYMjJ0KD94Zmb8FsckXn5WHVb7OVwWp6bBnCeF2Vhj2aYmY7";

var obj = {'email': 'admin@admin.admin','password': 'password'};

$.ajax({
    url: loginroute,
    type: 'POST',
	data: JSON.stringify(obj),
	contentType: 'application/json',
	headers: {"apikey": apikey},
	
    success: function(result) {
			
		// Uradi nesto
    }
});
```

If you enter test data to database this are parametars for login:

Administrator  

```
username : admin@admin.admin
password : password
```

User

```
username : brown.sven@gmail.com
password : password
```

File upload location

```
http://192.168.33.10/Rest-app/public/avatar/
```
 
## Description

In order for the front application to access the rest application at all, it needs an api_key that is sent in the header.
The application at the start requires logging and it checks here whether it's an administrator or a user. The administrator has all access levels
, can manipulate agencies and users, while a user can see and change only his data.
Then, the application generates an api_token that allows it to access agencies and users, access levels are checked
in middleware, so all checks are done on the server.
Professions (profession1, profession2, profession3 ...) are entered in the same field in the users table.
In the table, users are also the adminstrator field 'admin = 1' and the user field 'admin = 0'.
