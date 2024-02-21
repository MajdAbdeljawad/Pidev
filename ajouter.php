<?php
include "C:/xampp/htdocs/FinalProject/Controllers/ReservationC/reservationC.php";
$reservationC=new ReservationC();
if(
    isset($_POST['dateRes']) && !empty($_POST['dateRes'])
    &&isset($_POST['timeRes']) && !empty($_POST['timeRes'])
    &&isset($_POST['numbPers']) && !empty($_POST['numbPers'])
    &&isset($_POST['name']) && !empty($_POST['name'])
    &&isset($_POST['email']) && !empty($_POST['email'])
    &&isset($_POST['phone']) && !empty($_POST['phone'])
){

    $reservation = new Reservation($_POST['dateRes'],$_POST['timeRes'],$_POST['numbPers'],$_POST['name'],$_POST['email'],$_POST['phone'],$_GET["idEvent"]);
    $reservationC->ajouterReservation($reservation);
    header('Location: ListeEvent.php');
}

?>