<?php



if(!empty($_POST['search']) && isset($_POST['search']))
{





require 'rest.php';

$c = new RestCurlClient();


$request = 'https://online.x-express.ba/api/posiljkaStatus?sifra='.$_POST['sifra'];



$res = $c->get( 'https://online.x-express.ba/api/posiljkaStatus?sifra='.$_POST['sifra'], array(
    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
    CURLOPT_USERPWD => 'tntadmin:broj1'
  )
);



$result = json_decode($res);


//var_dump($result);
print_r($result);


//foreach ($result as $key => $object) {
    //echo $object->sifra . ", " . $object->statusDesc . "<br>";
  //}


//foreach ($result as $key => $object) {
    
//echo $object->statusDesc;
//echo $object->sifra;
//!empty($_POST['sifra']) && 


    //echo '<br>';
//}

if(count($result)>0)
{
$output = '';
foreach ($result as $key => $object) {

  echo '<div> Vaša pošiljka je '.$object->statusDesc.' </div>';

}
}
else
{

	echo "nista nije pronadjeno.";
}

}
else
{
echo "Molimo Vas unesite vasu sifru";

}




?>

<!--$characters = json_decode($res);-->

<form action="" method="post">
  <input type="text" name="sifra" /><br>
<br>

  <input type="submit" name="search"  />
</form>
   