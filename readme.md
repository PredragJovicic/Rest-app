Rest app

api_key = EgsIQjGV6oodeYMjJ0KD94Zmb8FsckXn5WHVb7OVwWp6bBnCeF2Vhj2aYmY7

Routes

/api/login - logovanje korisnika Administrator ili konatakt <br>
 method: post [email,password] <br>
/api/logout - Odjava korisnika  Administrator ili konatakt <br>
 method: post [api_token] <br>
/api/adduser - dodavanje novog kontakta, zahteva administratorski nivo pristupa <br>
 method: post [name,email,password,password_confirmation,agency,professions,phone,avatar,api_token] <br>
  <br>
/api/getagencies - dohvata sve agencije, zahteva administratorski nivo prist <br>upa
 method: get [api_token] <br>
/api/getagency/{agency} - {agency} = id - dohvata agenciju po id-u i sve kontakte koji joj pripadaju, zahteva administratorski nivo pristupa <br>
 method: get [id,api_token] <br>
/api/addagency - kreira novu agenciju, zahteva administratorski nivo pristupa <br>
 method: post [name,address,countri,city,phone,email,web,api_token] <br>
/api/updateagency/{agency} - {agency} = id - update - uje agenciju po id-u, zahteva administratorski nivo pristupa <br>
 method: post [name,address,countri,city,phone,email,web,api_token] <br>
/api/deleteagency/{agency} - {agency} = id - brise agenciju po id-u, zahteva administratorski nivo pristupa <br>
 method: delete [id,api_token] <br>
  <br>
/api/getusers - dohvata sve contakte i administratora, zahteva administratorski nivo pristupa <br>
 method: get [api_token] <br>
/api/getuser/{user} - {user} = id - dohvata contakt i administratora po id-u, dozvoljava pristup sopstvenim podacima <br>
 method: get [id,api_token] <br>
/api/getuserAdminstrator{user} - {user} = id - dohvata contakt i administratora po id-u, zahteva administratorski nivo pristupa i dozvoljava pristup svim kontaktima <br>
 method: get [id,api_token] <br>
/api/updateuser/{user} - {user} = id - update-uje kontakt po id-u, dozvoljava da logovani kontakt menja svoje podatke <br>
 method: post [name,email,password,password_confirmation,agency,professions,phone,avatar,api_token] <br>
/api/updateuserAdminstrator/{user} - {user} = id - update-uje kontakt po id-u, zahteva administratorski nivo pristupa i dozvoljava menjanje svih kontakata <br>
 method: post [name,email,password,password_confirmation,agency,professions,phone,avatar,api_token] <br>
/api/deleteuser/{user} - {user} = id - brise kontakt po id-u, zahteva administratorski nivo pristupa <br>
 method: delete [id,api_token] <br>
  <br>
/api/getprofessions - dohvata sve profesije <br>
 method: get [api_token] <br>
/api/getcountriescities - dohvata sve drzave i gradove <br>
 method: get [api_token] <br>
 <br>
/api/searchagencies - pretrazuje agencije i vraca rezultat u odredjenom limitu(paginacija), zahteva administratorski nivo pristupa <br>
 method: post [search,offset,limit,api_token] <br>
/api/searchcontacts - pretrazuje contakte i vraca rezultat u odredjenom limitu(paginacija), zahteva administratorski nivo pristupa <br>
 method: post [search,offset,limit,api_token] <br>
  <br>
Opis:

Da bi front aplikacija uopste pristupila rest aplikaciji potreban joj je api_key koji sam naveo gore.Zatim kada se user uloguje
generise se api_token koji mu omogucava pristum agencijama i kontaktima kao i da manipulise istim, U zavisnosti dali je administrator ili
user(kontakt) dobija odrdjeni nivo pristupa sto se proverava u middleware - u, tako da se dve provere vrse na serveru.
Profesije ( profesija1, profesija2, profesija3 ... ) se unose u isto polje u tabelu users.
U tabeli users je i adminstrator polje 'admin = 1' i kontakti  polje 'admin = 0' .
Za login i logout se postuje i api_key uz ostalo
