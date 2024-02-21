<?php
include 'C:/xampp/htdocs/FinalProject/Controllers/ReservationC/eventC.php';
$eventC=new EventC();
$eventC->supprimerEvent($_GET["id"]);

header('Location: dashEvent.php');
?>