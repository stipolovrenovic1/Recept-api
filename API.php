<?php

function prosjecnaVrijednost($arr)
{
	$arr2 = array_map(fn($val) => explode(' ', $val), $arr);

	$sum = 0;

	foreach($arr2 as $obj)
	{
		$sum += $obj[1];
	}

	return $sum / count($arr2);
}


include "connection.php";

$apiID = "";


switch($_SERVER['REQUEST_METHOD'])
{
	case 'GET':
		ini_set('memory_limit', '2048M');
		header('Content-type: text/json');
		header('Content-type: application/json; charset=utf-8');

		$apiID = $_GET['api_id'];
		$oJson=array();

		switch($apiID)
		{
			case "daj_osobu":

			$oib = $_GET['oib'];

			$sQuery="SELECT * FROM osobe WHERE oib = '".$oib."'";
			$oRecord=$oConnection->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
				$oOsoba=new Osoba(
						$oRow['ime'],
						$oRow['prezime'],
						$oRow['oib'],
						$oRow['rođendan'],
						$oRow['email'],
						$oRow['mobitel'],
						$oRow['ulica'],
						$oRow['kućni_br'],
						$oRow['grad'],
						$oRow['poštanski_br'],
						$oRow['država']
					);
				array_push($oJson, $oOsoba);
			}
			break;

			case "daj_sve_osobe":
			$sQuery="SELECT * FROM osobe";
			$oRecord=$oConnection->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
				$oOsoba=new Osoba(
						$oRow['ime'],
						$oRow['prezime'],
						$oRow['oib'],
						$oRow['rođendan'],
						$oRow['email'],
						$oRow['mobitel'],
						$oRow['ulica'],
						$oRow['kućni_br'],
						$oRow['grad'],
						$oRow['poštanski_br'],
						$oRow['država']
					);
				array_push($oJson, $oOsoba);
			}
			break;

			case "daj_namirnicu":
			$naziv = $_GET['naziv'];
			
			$sQuery="SELECT * FROM namirnice WHERE naziv = '".$naziv."'";
			$oRecord=$oConnection->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
				$oNamirnica=new Namirnica(
						$oRow['naziv'],
						$oRow['cijena'],
						$oRow['tip'],
						$oRow['mjerna_jedinica']
					);
				array_push($oJson, $oNamirnica);
			}
			break;

			case "daj_sve_namirnice":
			$sQuery="SELECT * FROM namirnice";
			$oRecord=$oConnection->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
				$oNamirnica=new Namirnica(
						$oRow['naziv'],
						$oRow['cijena'],
						$oRow['tip'],
						$oRow['mjerna_jedinica']
					);
				array_push($oJson, $oNamirnica);
			}
			break;

			case "traži_recept":
			switch($_GET['filter'])
			{
				case 'po_osobi':
				$osoba = $_GET['oib'];

				$sQuery="SELECT * FROM recepti WHERE oib = '".$osoba."'";
				$oRecord=$oConnection->query($sQuery);
				
				while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
				{
					$oRecept = new Recept(
							$oRow['naziv'],
							$oRow['datum'],
							$oRow['oib'],
							$oRow['porcije'],
							$oRow['email'],
							$oRow['sastojci'],
							$oRow['upute'],
							$oRow['vrijeme'],
							$oRow['grad'],
							$oRow['komentari'],
							$oRow['ocjene']
						);
					array_push($oJson, $oRecept);
				}

				break;

				case 'po_nazivu':
				$naziv = $_GET['naziv'];

				$sQuery="SELECT * FROM recepti WHERE naziv LIKE '%".$naziv."%'";
				$oRecord=$oConnection->query($sQuery);
				
				while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
				{
					$oRecept = new Recept(
							$oRow['naziv'],
							$oRow['datum'],
							$oRow['oib'],
							$oRow['porcije'],
							$oRow['email'],
							$oRow['sastojci'],
							$oRow['upute'],
							$oRow['vrijeme'],
							$oRow['grad'],
							$oRow['komentari'],
							$oRow['ocjene']
						);
					array_push($oJson, $oRecept);
				}
				break;

				case 'po_porcijama':
				$porcije = $_GET['porcije'];

				$sQuery="SELECT * FROM recepti WHERE porcije = '".$porcije."'";
				$oRecord=$oConnection->query($sQuery);
				
				while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
				{
					$oRecept = new Recept(
							$oRow['naziv'],
							$oRow['datum'],
							$oRow['oib'],
							$oRow['porcije'],
							$oRow['email'],
							$oRow['sastojci'],
							$oRow['upute'],
							$oRow['vrijeme'],
							$oRow['grad'],
							$oRow['komentari'],
							$oRow['ocjene']
						);
					array_push($oJson, $oRecept);
				}
				break;

				case 'po_namirnici':
				$namirnica = $_GET['namirnica'];

				$sQuery="SELECT * FROM recepti WHERE namirnice LIKE '%".$namirnica."%'";
				$oRecord=$oConnection->query($sQuery);
				
				while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
				{
					$oRecept = new Recept(
							$oRow['naziv'],
							$oRow['datum'],
							$oRow['oib'],
							$oRow['porcije'],
							$oRow['email'],
							$oRow['sastojci'],
							$oRow['upute'],
							$oRow['vrijeme'],
							$oRow['grad'],
							$oRow['komentari'],
							$oRow['ocjene']
						);
					array_push($oJson, $oRecept);
				}
				break;

				case 'po_vremenu':
				$vrijeme = $_GET['vrijeme'];

				$sQuery="SELECT * FROM recepti WHERE vrijeme = '".$vrijeme."'";
				$oRecord=$oConnection->query($sQuery);
				
				while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
				{
					$oRecept = new Recept(
							$oRow['naziv'],
							$oRow['datum'],
							$oRow['oib'],
							$oRow['porcije'],
							$oRow['email'],
							$oRow['sastojci'],
							$oRow['upute'],
							$oRow['vrijeme'],
							$oRow['grad'],
							$oRow['komentari'],
							$oRow['ocjene']
						);
					array_push($oJson, $oRecept);
				}
				break;

				case 'po_ocjeni':
				$ocjena = $_GET['ocjena'];

				$oRecord=$oConnection->query($sQuery);
			
				while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
				{
					$oRecept = new Recept(
							$oRow['naziv'],
							$oRow['datum'],
							$oRow['oib'],
							$oRow['porcije'],
							$oRow['email'],
							$oRow['sastojci'],
							$oRow['upute'],
							$oRow['vrijeme'],
							$oRow['grad'],
							$oRow['komentari'],
							$oRow['ocjene']
						);

					if(round(prosjecnaVrijednost(explode(', ', $oRecept->ocjene))) == $ocjena)
					{
						array_push($oJson, $oRecept);
					}
				}
				break;
			}
			break;

			case "daj_sve_recepte":
			$sQuery="SELECT * FROM recepti";
			$oRecord=$oConnection->query($sQuery);
			
			while($oRow=$oRecord->fetch(PDO::FETCH_BOTH))
			{
				$oRecept = new Recept(
						$oRow['naziv'],
						$oRow['datum'],
						$oRow['oib'],
						$oRow['porcije'],
						$oRow['email'],
						$oRow['sastojci'],
						$oRow['upute'],
						$oRow['vrijeme'],
						$oRow['grad'],
						$oRow['komentari'],
						$oRow['ocjene']
					);
				array_push($oJson, $oRecept);
			}
			break;
		}

	if($apiID == "traži_recept" || $apiID == "daj_sve_recepte")
	{
		switch($_GET['sort'])
		{
			case 'po_nazivu':

			usort($oJson,  fn($a, $b) => $_GET['order'] == 'uzlazno' ? strcmp($a->naziv, $b->naziv) : strcmp($b->naziv, $a->naziv));

			break;

			case 'po_datumu':

			usort($oJson,  fn($a, $b) => $_GET['order'] == 'uzlazno' ? strtotime($a->datum) - strtotime($b->datum) : strtotime($b->datum) - strtotime($a->datum));

			break;

			case 'po_ocjeni':

			usort($oJson,  fn($a, $b) => $_GET['order'] == 'uzlazno' ? prosjecnaVrijednost(arrayexplode(', ', $a->ocjene)) - prosjecnaVrijednost(arrayexplode(', ', $b->ocjene)) :prosjecnaVrijednost(arrayexplode(', ', $b->ocjene)) - prosjecnaVrijednost(arrayexplode(', ', $a->ocjene));

			break;

			case 'po_komentarima':

			usort($oJson,  fn($a, $b) => $_GET['order'] == 'uzlazno' ? count(explode(', ', $a->komentari)) - count(explode(', ', $b->komentari)) : count(explode(', ', $b->komentari)) - count(explode(', ', $a->komentari)));

			break;
		}
	} 

	echo json_encode($oJson);
	break;

	case 'POST':
		$apiID = $_POST['api_id'];

		switch($apiID)
		{
			case "nova_osoba":
			$sQuery = "INSERT INTO osobe (ime, prezime, oib, rođendan, email, mobitel, ulica, kućni_br, grad, poštanski_br, država) VALUES (:ime, :prezime, :oib, :rođendan, :email, :mobitel, :ulica, :kućni_br, :grad, :poštanski_br, :država)";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
						'ime' => $_POST['ime'],
						'prezime' => $_POST['prezime'],
						'oib' => $_POST['oib'],
						'rođendan' => $_POST['rođendan'],
						'email' => $_POST['email'],
						'mobitel' => $_POST['mobitel'],
						'ulica' => $_POST['ulica'],
						'kućni_br' => $_POST['kućni_br'],
						'grad' => $_POST['grad'],
						'poštanski_br' => $_POST['poštanski_br'],
						'država' => $_POST['država']
						);
			$oStatement->execute($oData);
			break;

			case "ažuriraj_osobu":
			$sQuery = "UPDATE osobe SET ime = :ime, prezime = :prezime, oib = :oib, rođendan = :rođendan, email = :email, mobitel = :mobitel, ulica = :ulica, kućni_br = :kućni_br, grad = :grad, poštanski_br = :poštanski_br, država = :država WHERE oib = :stari_oib";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
						'ime' => $_POST['ime'],
						'prezime' => $_POST['prezime'],
						'oib' => $_POST['oib'],
						'rođendan' => $_POST['rođendan'],
						'email' => $_POST['email'],
						'mobitel' => $_POST['mobitel'],
						'ulica' => $_POST['ulica'],
						'kućni_br' => $_POST['kućni_br'],
						'grad' => $_POST['grad'],
						'poštanski_br' => $_POST['poštanski_br'],
						'država' => $_POST['država'],
						'stari_oib' => $_POST['stari_oib']
				         );
			$oStatement->execute($oData);
			break;

			case "obriši_osobu":
			$sQuery = "DELETE FROM osobe WHERE oib = :oib";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
			 			'oib'=>$_POST['oib']
						 );	
			$oStatement->execute($oData);
			echo 1;
			break;

			case "nova_ocjena":
			$sQuery = "UPDATE recepti SET ocjene = CASE
														WHEN ocjene = 'N/A' THEN :ocjene
														ELSE ocjene + ', ' + :ocjena
												   END
					   WHERE naziv = :naziv AND NOT oib = :oib AND ocjene NOT LIKE '%:oib%'";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
						'naziv' => $_POST['naziv'],
						'ocjena' => $_POST['oib'] + ' ' + $_POST['ocjena'],
						'oib' => $_POST['oib']
				         );
			$oStatement->execute($oData);
			break;

			case "novi_komentar":
			$sQuery = "UPDATE recepti SET komentari = CASE 
															WHEN komentari = 'N/A' THEN :komentar
															ELSE komentari + ' ' + :komentar
													  END 
			           WHERE naziv = :naziv";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
						'naziv' => $_POST['naziv'],
						'komentar' => $_POST['oib'] + ' ' + $_POST['vrijeme'] + ' ' + $_POST['text']
				         );
			$oStatement->execute($oData);
			break;

			case "nova_namirnica":
			$sQuery = "INSERT INTO namirnice (naziv, cijena, tip, mjerna_jedinica) VALUES (:naziv, :cijena, :tip, :mjerna_jedinica)";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
						'naziv' => $_POST['naziv'],
						'cijena' => $_POST['cijena'],
						'tip' => $_POST['tip'],
						'mjerna_jedinica' => $_POST['mjerna_jedinica']
						);
			$oStatement->execute($oData);
			break;

			case "ažuriraj_namirnicu":
			$sQuery = "UPDATE namirnice SET naziv = :naziv, cijena = :cijena, tip = :tip, mjerna_jedinica = :mjerna_jedinica WHERE naziv = :stari_naziv";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
						'naziv' => $_POST['naziv'],
						'cijena' => $_POST['cijena'],
						'tip' => $_POST['tip'],
						'mjerna_jedinica' => $_POST['mjerna_jedinica'],
						'stari_naziv' => $_POST['stari_naziv']
				         );
			$oStatement->execute($oData);
			break;

			case "obriši_namirnicu":
			$sQuery = "DELETE FROM namirnice WHERE naziv = :naziv";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
			 			'naziv'=>$_POST['naziv']
						 );	
			$oStatement->execute($oData);
			echo 1;
			break;

			case "novi_recept":
			$sQuery = "INSERT INTO recepti (naziv, datum, oib, porcije, email, sastojci, upute, vrijeme, grad, komentari, ocjene) VALUES (:naziv, :datum, :oib, :porcije, :email, :sastojci, :upute, :vrijeme, :grad, :komentari, :ocjene)";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
						'naziv' => $_POST['naziv'],
						'datum' => $_POST['datum'],
						'oib' => $_POST['oib'],
						'porcije' => $_POST['porcije'],
						'email' => $_POST['email'],
						'sastojci' => $_POST['sastojci'],
						'upute' => $_POST['upute'],
						'vrijeme' => $_POST['vrijeme'],
						'grad' => $_POST['grad'],
						'komentari' => '',
						'ocjene' => ''
						);
			$oStatement->execute($oData);
			break;

			case "ažuriraj_recept":
			$sQuery = "UPDATE recepti SET naziv = :naziv, datum = :datum, oib = :oib, porcije = :porcije, email = :email, sastojci = :sastojci, upute = :upute, vrijeme = :vrijeme, grad = :grad, WHERE naziv = :stari_naziv";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
						'naziv' => $_POST['naziv'],
						'datum' => $_POST['datum'],
						'oib' => $_POST['oib'],
						'porcije' => $_POST['porcije'],
						'email' => $_POST['email'],
						'sastojci' => $_POST['sastojci'],
						'upute' => $_POST['upute'],
						'vrijeme' => $_POST['vrijeme'],
						'grad' => $_POST['grad'],
						'stari_naziv' => $_POST['stari_naziv']
				         );
			$oStatement->execute($oData);
			break;

			case "obriši_recept":
			$sQuery = "DELETE FROM recepti WHERE naziv = :naziv";
			$oStatement = $oConnection->prepare($sQuery);
			$oData = array(
			 			'naziv'=>$_POST['naziv']
						 );	
			$oStatement->execute($oData);
			echo 1;
			break;
		}
	break;
}

?>