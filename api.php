<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-1.8.3.js"></script>
<style>
.content {
	display:none;
}

.loader {
	margin:0;
	position:absolute;
	top:50%;
	left:50%;
	width: 100%
	height:100%;
	margin-right: -50%;
	transform:translate(-50%, -50%);
}
</style>


</head>

<div class="content">

<?php

$date = '/Date(1500454094562)/';

// get the timestamp
$pattern = '~/Date\(([0-9]*)~';
preg_match($pattern, $date, $matches);
$timestamp = round(((int) $matches[1]) / 1000);

$dt = new DateTime();
$dt->setTimestamp($timestamp);


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
//print_r($result);


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

  echo '<div> Status posiljke: '.$object->statusDesc.' <br> i '.$dt->format('Y-m-d H:i:s').'</div>';

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
</div>
<script>
	$(function() {
		$(".loader").fadeOut(2000, function() {
			$(".content").fadeIn(1000);
		});
	});
</script> 

<!--$characters = json_decode($res);-->
<section style="">
	<div class="loader"><img src="spinner.gif" /></div>
<form action="" method="post">
  <input type="text" name="sifra" /><br>
<br>

  <input type="submit" name="search" placeholder="Traži" />
</form>
   </section>