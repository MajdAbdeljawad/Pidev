<?php
include "C:/xampp/htdocs/FinalProject/Controllers/ReservationC/eventC.php";
$eventC=new EventC();
$id=$_GET["id"];
if(
    isset($_POST['nom']) && !empty($_POST['nom'])
    &&isset($_POST['date']) && !empty($_POST['date'])
    &&isset($_POST['prix']) && !empty($_POST['prix'])
){

    $event = new Event($_POST['nom'],$_POST['date'],$_POST['prix']);
    $eventC->modifierEvent($event,$id);
    header('Location: dashEvent.php');
}
?>