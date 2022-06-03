<?php
if(isset($_POST['reg']))
{
    $xml = new DomDocument("1.0","UTF-8");
    $xml->load('Korisnici.xml');

    $ime= $_POST['korisnik'];
    $sif= $_POST['sifra'];


    $rootTag = $xml ->getElementsByTagname("korisnici")->item(0);
    

    $infoTag = $xml ->createElement("korisnik");
        $nameTag = $xml ->createElement("ime",$ime);
        $sifTag = $xml ->createElement("sifra",$sif);
        $infoTag->appendChild($nameTag);
        $infoTag->appendChild($sifTag);

    $rootTag->appendChild($infoTag);     
    $xml->save('Korisnici.xml');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">  
        <link rel="stylesheet" type="text/css" href="Login.css" /> 	
     </head>
<body>

    <div class="login_wrap">
        <form action="Registracija.php" method="post">

            <label for="firstname">Unesi korisničko ime</label>
            <br/>
            <input type="text" name="korisnik" id="korisnik"/>
            <br/>
       
            <label for="password">Unesi lozinku</label>
            <br/>
            <input type="password" name="sifra" id="sifra"/>
            <br/>
       
            <button type="submit" name='reg'>Registriraj se</button>

			
        </form>
        
        <button class="prijava" onclick="location.href='Login.php'">Prijava</button>
    </div>  
</body>
</html>


