<?php


$view = new stdClass();
include('ajax.php');
$s1=$_REQUEST["n"];
$select_query="select * from trainerProducts where trainerProducts.trainer_name like '%".$s1."%'";
//$sql=mysql_query($select_query) or die (mysql_error());
$s="";
while($row=mysql_fetch_array($sql))
{
    $s=$s."
	<a class='link-p-colr' href='trainer.php?product=".$row['id']."'>
		<div class='live-outer'>
            	<div class='live-im'>
                	<img src='Images/Nike".$row['trainer_image']."'/>
                </div>
                <div class='live-product-det'>
                	<div class='live-product-name'>
                    	<p>".$row['name']."</p>
                    </div>
                    <div class='live-product-price'>
						<div class='live-product-price-text'><p>Rs.".number_format($row['price'])."</p></div>
                    </div>
                </div>
            </div>
	</a>
	"	;
}
echo $s;
//<a href='pview.php?id=".$row['id']."&productname=".$row['productname']."'>".$row['productname']."></a>
//<p>".$row['productname']."</p><br>	<p>".$row['producttotalprice']."</p>
?>

//use if( isset(REQUEST['query']) )

/*
 * call to model with parameter of REQUEST['query']
 *
 * query database here
 *
 * after query, use:
 *
 * json_encode()
 *
 *  print JSON;
 *
 */




