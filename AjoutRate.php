<?php
include "C:/xampp/htdocs/FinalProject/Controllers/ReservationC/rateC.php";
$rateC=new RateC();
$trouve=0;
$r=0;
$n=0;
if(
    isset($_POST['rating']) && !empty($_POST['rating'])
){
 $listeRate=$rateC->afficherRate($_GET["idEvent"]);
    foreach($listeRate as $rate){
        if($rate["id"] == $_GET["idEvent"]){
            $r=$rate["rate"];
            $n=$rate["nbr_rate"];
            $trouve=1;
        }
    }
    if($trouve == 1){
        $rate = new Rate($_GET["idEvent"],$_POST['rating']+$r,$n+1);
        $rateC->modifierRate($rate,$_GET["idEvent"]);
    }
    else{
        $rate = new Rate($_GET["idEvent"],$_POST['rating'],1);
        $rateC->ajouterRate($rate);
    }

    header('Location: ListeEvent.php');
}
?>