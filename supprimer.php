<?php
include 'C:/xampp/htdocs/FinalProject/Controllers/ReservationC/reservationC.php';
$reservationC=new ReservationC();
$reservationC->supprimerReservation($_GET["id"]);

header('Location: ListeEvent.php');
?>