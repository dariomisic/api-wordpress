<?php
/*
Template Name: Api
*/

get_header();

// load variables
global $ht_options;
 
        if(have_posts()):
            while (have_posts()) :the_post();
        ?>     

        <script type="text/javascript"
   src="<?php bloginfo("template_url"); ?>/scripts/jquery-1.8.3.js"></script>

   <style>
.content {
	display: none;
}

.loader {
	margin:0;
	position:fixed;
	top:50%;
	left:50%;
	margin-right: -50%;
	transform:translate(-50%, -50%);
}
</style>
 
<div class="loader"><img src="<?php bloginfo('template_url'); ?>/images/spinner.gif"" /></div>
            <div class="content">
                <div class="row clearfix">
                    <div class="UCP">
                      
                        <h2 class="tac mbf"> <?php the_title();?> </h2>
                        

<?php 

if(!empty($_POST['search']) && isset($_POST['search']))
{

require ('rest.php');
    
$c = new RestCurlClient();

$request = 'https://online.x-express.ba/api/posiljkaStatus?sifra='.$_POST['sifra'];

$res = $c->get( 'https://online.x-express.ba/api/posiljkaStatus?sifra='.$_POST['sifra'], array(
    CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
    CURLOPT_USERPWD => 'tntadmin:broj1'
  )
);


$result = json_decode($res);



if(count($result)>0)
{
$output = '';
foreach ($result as $key => $object) {

  echo '<div class="notification-box notification-box-success"><i class="fa fa-check"> <h3>Vrsta pošiljke:</h3> <h3 style="color:#e75204;">"'.$object->vrstaPosiljke.'"</h3> <br> <h3>Status pošiljke:</h3> <h3 style="color:#e75204;">"'.$object->statusDesc.'"</h3> <br> <h3>D.C. pošiljke:</h3> <h3 style="color:#e75204;">"'.$object->centar.'"</h3></i></div>';

}
}
else
{

  echo '<div class="notification-box notification-box-error"><i class="fa fa-power-off"> <h3>Ništa nije pronađeno.</h3></i></div>';
}

}
else
{
echo '<div class="search-box" style="text-align: center !important;"><h3>Unesite prijemni broj pošiljke a potom pritisnite dugme "Pretraga", prijemni broj se unosi u cjelosti bez razmaka npr: X000235456 ili 40123456</h3></div>';

}
     ?>


   <div class="search-box" style="text-align: center !important;">
  
<form action="" method="post">
  <input type="text" name="sifra" style="width:30% !important;" /><br>
<br>
  <input class="tbutton accent large" type="submit" name="search" style="background: #111111 !important; width:30% !important; margin-right: 35%;" value="Pretraga" />
</form>
  </div></div>


<script>
	$(function() {
		$(".loader").fadeOut(3000, function() {
			$(".content").fadeIn(1000);
		});
	});
</script> 
                        
                    </div>
                </div><!-- row -->

            
    <?php endwhile;?>
    <?php else: ?>
        
    <?php endif; ?>
<?php get_footer(); ?>