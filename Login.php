<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
        <link rel="stylesheet" type="text/css" href="Login.css" /> 	
     </head>
<body>

    <div class="login_wrap">
        <form action="Login.php" method="post">

            <label for="firstname">Korisničko ime</label>
            <br/>
            <input type="text" name="korisnik" id="korisnik"/>
            <br/>
       
            <label for="password">Lozinka</label>
            <br/>
            <input type="password" name="sifra" id="sifra"/>
            <br/>
       
            <button type="submit">Prijavi se</button>	
        </form>


		<button class="reg" onclick="location.href='Registracija.php'">Registracija</button>
    </div>  
</body>
</html>

<?php

$username="";
$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$podatak=$_POST;

	if (empty($podatak["korisnik"]))  {
        	echo "Unesite username!";
		
    		}
	else if (empty($podatak["sifra"]))  {
        	echo "Unesite password!";
		
    		}
	else {
		$username= $podatak["korisnik"];
		$password= $podatak["sifra"];
		provjera($username,$password);
	}
}

function provjera($username, $password) {
	$xml=simplexml_load_file("Korisnici.xml");
	foreach ($xml->korisnik as $usr) {
  	 	$korisnik_ime = $usr->ime;
		$korisnik_sifra = $usr->sifra;
		if($korisnik_ime==$username){
			if($korisnik_sifra == $password){
				header('Location: Novosti.html');
				exit;
				}
			else{
				echo "Kriva lozinka";
				return;
				}
			}
		}
	echo "Korisnik nije u sustavu.";
	return;
}
?>

