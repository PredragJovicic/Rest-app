# Rest app

Rest aplikacija radjena u laravelu

## Start

Klonirati aplikaciju

```
$ git clone https://github.com/PredragJovicic/Rest-app.git
$ cd Rest-app
composer install
php artisan key:generate
```

Ako nije kreiran ,env file kreirati ga i kopirati u njega

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
```

## Priprene

Kreirati mysql bazu pod imenom "restapp".
Ako koristite drugo ime za bazu promeniti u .env fajlu

```
DB_DATABASE=restapp
DB_USERNAME=root
DB_PASSWORD=root
```

## Instalacija i pokretanje

Ako koristite Vagrant ako koristite web server ovo preskocite

```
$ vagrant up
$ vagrant ssh

$ cd /var/www/public/Rest-app
```

Generisanje tabela u bazi

```
$ php artisan migrate
```

Ubacivanje test podataka ako hocete da tabele budu prazne ovo preskocite

```
$ php artisan db:seed
```

## Rute i kljucevi

Za pristup aplikaciji neophodan je api kljic

```
api_key = EgsIQjGV6oodeYMjJ0KD94Zmb8FsckXn5WHVb7OVwWp6bBnCeF2Vhj2aYmY7
```

Rute i http metodi 

```
/api/login - logovanje korisnika Administrator ili user
 method: POST [email,password] 
/api/logout - Odjava korisnika  Administrator ili user 
 method: POST [api_token] 
/api/newuser - dodavanje novog usera, zahteva administratorski nivo pristupa 
 method: POST [name,email,password,password_confirmation,agency,professions,phone,avatar,api_token] 
  
/api/agencies - dohvata sve agencije, zahteva administratorski nivo pristupa
 method: GET [api_token] 
/api/agencies/agency - agency = id - dohvata agenciju po id-u i sve usere koji joj pripadaju, zahteva administratorski nivo pristupa 
 method: GET [api_token] 
/api/agencies - kreira novu agenciju, zahteva administratorski nivo pristupa 
 method: POST [name,address,countri,city,phone,email,web,api_token] 
/api/agencies/agency - agency = id - update - uje agenciju po id-u, zahteva administratorski nivo pristupa 
 method: PUT [name,address,countri,city,phone,email,web,api_token] 
/api/agencies/agency - agency = id - brise agenciju po id-u, zahteva administratorski nivo pristupa 
 method: DELETE [api_token] 
  
/api/users - dohvata sve usere i administratora, zahteva administratorski nivo pristupa 
 method: GET [api_token] 
/api/users/user - user = id - dohvata usera i administratora po id-u, dozvoljava pristup sopstvenim podacima 
 method: GET [api_token] 
/api/users/user - user = id - update-uje usera po id-u, dozvoljava da logovani user menja svoje podatke 
 method: PUT [name,email,password,password_confirmation,agency,professions,phone,avatar,api_token] 
/api/users/user - user = id - brise usera po id-u, zahteva administratorski nivo pristupa 
 method: DELETE [api_token] 
  
/api/professions - dohvata sve profesije 
 method: GET [api_token] 
/api/countriescities - dohvata sve drzave i gradove 
 method: GET [api_token] 
 
/api/searchagencies - pretrazuje agencije i vraca rezultat u odredjenom limitu(paginacija), zahteva administratorski nivo pristupa 
 method: POST [search,offset,limit,api_token] 
/api/searchusers - pretrazuje usere i vraca rezultat u odredjenom limitu(paginacija), zahteva administratorski nivo pristupa 
 method: POST [search,offset,limit,api_token] 
```  
  
U uglastim zagradama su dati kljucevi za slanje podataka. Primer login u javascriptu:

method: POST [email,password] 

```
var loginroute = "http://192.168.33.10/Rest-app/public/api/login";
var /api/login = "EgsIQjGV6oodeYMjJ0KD94Zmb8FsckXn5WHVb7OVwWp6bBnCeF2Vhj2aYmY7";

var obj = {'email': document.getElementById('email').value,
		   'password': document.getElementById('password').value
		  };

$.ajax({
    url: loginroute,
    type: 'POST',
	data: JSON.stringify(obj),
	contentType: 'application/json',
	headers: {"apikey": /api/login},
	
    success: function(result) {
			
		// Uradi nesto
    }
});
```
  
Ako ste ubacili test podatke u bazu ovo su parametri za logovanje:

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

Fajlovi se uploduju na lokaciju

```
http://192.168.33.10/Rest-app/public/avatar/
```
 
## Opis kako aplikacija radi

Da bi front aplikacija uopste pristupila rest aplikaciji potreban joj je api_key koji sam naveo gore.
Aplikacija u startu zahteva logovanje i tu se proverava dali je administrator ili user.  
Zatim kada se user uloguje generise se api_token koji mu omogucava pristum agencijama i userima kao i da manipulise podacima 
istih, U zavisnosti dali je administrator ili user dobija odredjeni nivo pristupa sto se proverava u middleware - u, tako da se 
dve provere vrse na serveru. Profesije ( profesija1, profesija2, profesija3 ... ) se unose u isto polje u tabelu users.
U tabeli users je i adminstrator polje 'admin = 1' i user polje 'admin = 0'.

