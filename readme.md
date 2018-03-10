Rest app

api_key = EgsIQjGV6oodeYMjJ0KD94Zmb8FsckXn5WHVb7OVwWp6bBnCeF2Vhj2aYmY7

Routes

/api/login - logovanje korisnika Administrator ili konatakt
/api/logout - Odjava korisnika  Administrator ili konatakt
/api/adduser - dodavanje novog kontakta, zahteva administratorski nivo pristupa

/api/getagencies - dohvata sve agencije, zahteva administratorski nivo pristupa
/api/getagency/{agency} - dohvata agenciju po id-u i sve kontakte koji joj pripadaju, zahteva administratorski nivo pristupa
/api/addagency - kreira novu agenciju, zahteva administratorski nivo pristupa
/api/updateagency/{agency} - update - uje agenciju po id-u, zahteva administratorski nivo pristupa
/api/deleteagency/{agency} - brise agenciju po id-u, zahteva administratorski nivo pristupa

/api/getusers - dohvata sve contakte i administratora, zahteva administratorski nivo pristupa
/api/getuser/{user} - dohvata contakt i administratora po id-u, dozvoljava pristup sopstvenim podacima
/api/getuserAdminstrator{user} - dohvata contakt i administratora po id-u, zahteva administratorski nivo pristupa i dozvoljava pristup svim kontaktima
/api/updateuser/{user} - update-uje kontakt po id-u, dozvoljava da logovani kontakt menja svoje podatke
/api/updateuserAdminstrator/{user} - update-uje kontakt po id-u, zahteva administratorski nivo pristupa i dozvoljava menjanje svih kontakata

/api/deleteuser/{user} - brise kontakt po id-u, zahteva administratorski nivo pristupa

/api/getprofessions - dohvata sve profesije
/api/getcountriescities - dohvata sve drzave i gradove

/api/searchagencies - pretrazuje agencije i vraca rezultat u odredjenom limitu(paginacija), zahteva administratorski nivo pristupa
/api/searchcontacts - pretrazuje contakte i vraca rezultat u odredjenom limitu(paginacija), zahteva administratorski nivo pristupa

Opis:

Da bi front aplikacija uopste pristupila rest aplikaciji potreban joj je api_key koji sam naveo gore.Zatim kada se user uloguje
generise se api_token koji mu omogucava pristum agencijama i kontaktima kao i da manipulise istim, U zavisnosti dali je administrator ili
user(kontakt) dobija odrdjeni nivo pristupa sto se proverava u middleware - u, tako da se dve provere vrse na serveru.
Profesije ( profesija1, profesija2, profesija3 ... ) se unose u isto polje u tabelu users.
U tabeli users je i adminstrator polje 'admin = 1' i kontakti  polje 'admin = 0' .
