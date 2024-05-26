# Recept api
 API za dohvaćanje i uređivanje recepata.

 Indeks:
 1)Opis datoteka



 1) OPIS DATOTEKA

    classes.php
    - Definira klasu Config koja služi za povezivanje na bazu podataka; Podaci su samo placeholderi, za testiranje unesite pravilne podatke.
    - Definira klase opisane u zadatku i njihove konstruktore.
    - Atributi ocjene i komentari su spremljeni u obliku stringa:
      ocjene: "[OIB] [Ocjena], [OIB] [Ocjena], itd..."
      komentar: "[OIB] [Vrijeme] [Komentar], [OIB] [Vrijeme] [Komentar], itd..."
      Za prikazivanje potrebno je pretvoriti string u polje (npr. explode(", ", $ocjene);    
    
    connection.php
    - Za povezivanje na bazu podataka koristeći configuration objekt

    API.php
    - Glavna datoteka za komuniciranje s bazom podataka.
   
 2) API.php
 
    API komunicira sa bazom koristeći api_id koji sadrži informaciju o zahtjevu ("daj osobu", "ažuriraj recept" itd.)

    "daj osobu" ima dodatni parametar "oib" za dohvaćanje osobe po njihovom oib-u.

    "daj namirnicu" ima dodatni parametar "naziv" za traženje namirnice.

    "traži recept" i "daj sve recepte" imaju parametar "order" za sortiranje uzlazno ili silazno.

     "traži recept":
            "po osobi" ima "oib" parametar.
            "po nazivu" ima "naziv" parametar.
            "po porcijama" ima "porcije" parametar.
            "po namirnici" ima "namirnica" parametar.
            "po vremenu" ima "vrijeme" parametar.
            "po ocjeni" ima "ocjena" parametar za uspoređivanje prosječne ocjene.

    Sa klijentske strane, koristio sam javascript AJAX, primjerice:

    $.ajax(
   	{
   		url:'API.php?api_id=daj_osobu',
   		type:'GET',
   		dataType:'json',
   		data:
   		{
   			oib: oib
   		},
   		success:function (oData)
   		{
   			...
   		},
   		error: function (XMLHttpRequest, textStatus, exception) 
   		{
   	        console.log(textStatus);
   	    },
   	    async: true
   	});

