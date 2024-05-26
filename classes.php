<?php

class Configuration
{
	public $host="hostPlaceholder";
	public $dbName="dbPlaceholder";
	public $username="userPlaceholder";
	public $password="passPlaceholder";
}


class Osoba
{
	public $name = "N/A";
	public $last_name = "N/A";
	public $OIB = "N/A";
	public $birthday = "N/A";
	public $email = "N/A";
	public $phone = "N/A";
	public $street = "N/A";
	public $house_num = 0;
	public $town = "N/A";
	public $mail_num = 0;
	public $state = "N/A";

	public function __construct($ime = null, $prezime = null, $oib = null, $rođendan = null, $email_adresa = null, $mobitel = null, $ulica = null, $kućni_br = null, $grad = null, $poštanski_br = null, $država = null)
	{
		if($ime) $this->name=$korisnicko_ime;
		if($prezime) $this->last_name=$prezime;
		if($oib) $this->OIB=$oib;
		if($rođendan) $this->birthday=$rođendan;
		if($email_adresa) $this->email=$email_adresa;
		if($mobitel) $this->phone=$mobitel;
		if($ulica) $this->street=$ulica;
		if($kućni_br) $this->house_num=$kućni_br;
		if($grad) $this->town=$grad;
		if($poštanski_br) $this->mail_num=$poštanski_br;
		if($država) $this->state=$država;
	}
}

class Namirnica
{
	public $name = "N/A";
	public $price = 0;
	public $type = "N/A";
	public $unit = "N/A";

	public function __construct($naziv = null, $cijena = null, $tip = null, $mjerna_jedinica = null)
	{
		if($naziv) $this->name=$naziv;
		if($cijena) $this->price=$cijena;
		if($tip) $this->type=$tip;
		if($mjerna_jedinica) $this->unit=$mjerna_jedinica;
	}
}

class Recept
{
	public $name = "N/A";
	public $date = "N/A";
	public $OIB = "N/A";
	public $servings = 0;
	public $email = "N/A";
	public $ingredients = "N/A";
	public $instructions = "N/A";
	public $time = 0;
	public $town = "N/A";
	public $comments = "N/A";
	public $ratings = "N/A";

	public function __construct($naziv = null, $datum = null, $oib = null, $porcije = null, $email_adresa = null, $sastojci = null, $upute = null, $vrijeme = null, $grad = null, $komentari = null, $ocjene = null)
	{
		if($naziv) $this->name=$naziv;
		if($datum) $this->date=$datum;
		if($oib) $this->OIB=$oib;
		if($porcije) $this->servings=$porcije;
		if($email_adresa) $this->email=$email_adresa;
		if($sastojci) $this->ingredients=$sastojci;
		if($upute) $this->instructions=$upute;
		if($vrijeme) $this->time=$vrijeme;
		if($grad) $this->town=$grad;
		if($komentari) $this->comments=$komentari;
		if($ocjene) $this->ratings=$ocjene;
	}
}


?>