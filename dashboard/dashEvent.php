<?php
include "C:/xampp/htdocs/FinalProject/Controllers/ReservationC/eventC.php";
include "C:/xampp/htdocs/FinalProject/Controllers/ReservationC/reservationC.php";
include "C:/xampp/htdocs/FinalProject/Controllers/ReservationC/rateC.php";
include "C:/xampp/htdocs/FinalProject/Controllers/userC/userC.php";
$eventC = new EventC();
$reservationC = new ReservationC();
    $listevent = $eventC->afficherEvent();
    if($_POST["aff"] == "tri"){
        $listreservation = $reservationC->triReservation();
    }
    else if($_POST["aff"] == "Searsh"){
        $listreservation = $reservationC->rechercheReclamation($_POST["rech"]);
    }
    else
    $listreservation = $reservationC->afficherReservations();
    $userC= new UserC();
    $listeUser=$userC->afficheruser();
    session_start();
    foreach($listeUser as $user){
        if($user["email"] == $_SESSION['user']) {
         $id=$user["user_id"];
         $nom=$user["nom"];
         $prenom=$user["prenom"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Star Admin2</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../contents/vendors/feather/feather.css" />
    <link rel="stylesheet" href="../../contents/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../../contents/vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="../../contents/vendors/typicons/typicons.css" />
    <link rel="stylesheet" href="../../contents/vendors/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="../../contents/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../contents/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="../../contents/js/dahboard_js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../contents/css/dashboard_css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="../../contents/img/dashboard_img/favicon.png" />

    <link rel="stylesheet" href="../../contents/css/panier.css" />


</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3"></div>
                <div>
                    <a class="navbar-brand brand-logo" href="#">
                        <img src="../../contents/img/logo.png" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="#">
                        <img src="../../contents/img/dashboard_img/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">
                            Good Morning, <span class="text-black fw-bold"><?php echo $nom;?> <?php echo $prenom;?></span>
                        </h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here" />
                        </form>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">
                                    You have 7 unread mails
                                </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../contents/img/dashboard_img/faces/face10.jpg" alt="image" class="img-sm profile-pic" />
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">
                                        Marian Garner
                                    </p>
                                    <p class="fw-light small-text mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../contents/img/dashboard_img/faces/face12.jpg" alt="image" class="img-sm profile-pic" />
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">
                                        David Grey
                                    </p>
                                    <p class="fw-light small-text mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="../../contents/img/dashboard_img/faces/face1.jpg" alt="image" class="img-sm profile-pic" />
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">
                                        Travis Jenkins
                                    </p>
                                    <p class="fw-light small-text mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="../../contents/img/dashboard_img/faces/face8.jpg" alt="Profile image" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="../../contents/img/dashboard_img/faces/face8.jpg" alt="Profile image" />
                                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                            </div>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>
                                My Profile
                                <span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
                                Messages</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i>
                                Activity</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i>
                                FAQ</a>
                            <a class="dropdown-item" href="../../user/logout.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>
                        Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>
                        Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do" />
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" />
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" />
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" />
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked />
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked />
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary me-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">
                                Creating component page build a js
                            </p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary me-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">
                                Meeting with Alisa
                            </p>
                            <p class="text-gray mb-0">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">
                                Friends
                            </p>
                            <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile">
                                    <img src="../../contents/img/dashboard_img/faces/face1.jpg" alt="image" /><span class="online"></span>
                                </div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile">
                                    <img src="../../contents/img/dashboard_img/faces/face2.jpg" alt="image" /><span class="offline"></span>
                                </div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">
                                    4
                                </div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile">
                                    <img src="../../contents/img/dashboard_img/faces/face3.jpg" alt="image" /><span class="online"></span>
                                </div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile">
                                    <img src="../../contents/img/dashboard_img/faces/face4.jpg" alt="image" /><span class="offline"></span>
                                </div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile">
                                    <img src="../../contents/img/dashboard_img/faces/face5.jpg" alt="image" /><span class="online"></span>
                                </div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile">
                                    <img src="../../contents/img/dashboard_img/faces/face6.jpg" alt="image" /><span class="online"></span>
                                </div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                <li class="nav-item">
                        <a class="nav-link" href="../../user/dashUser.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Utilisateurs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashEvent.html">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Evenements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Panier/dashboard_panier-list.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Paniers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Panier/admin-dashboard.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Paniers charts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../produit/dashboard/dashProduit.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Produits</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../reclamation/dashboard/dashReclamation.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Reclamations</span>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="tab-content tab-content-basic">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                                        <div class="row">
                                            <div class="col-sm-12"></div>
                                        </div>
                                        <div class="main-panel">
                                            <div class="content-wrapper">
                                                <div class="row">
                                                    <div class="col-lg-12 grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Liste des evenements</h4>
                                                                <p class="card-description">
                                                                </p>
                                                                <form action="Ajoutevent.php" method="POST">
                                                                    <input type="submit" class="btn btn-inverse-warning btn-fw" name="aff" value="Ajouter" />
                                                                </form>
                                                                <div class="table-responsive pt-3">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nom Event</th>
                                                                                <th>Date Event</th>
                                                                                <th>Prix Event</th>
                                                                                <th>Rate</th>
                                                                                <th>Actions</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            foreach ($listevent as $event) {  
                                                                            ?>
                                                                                    <tr>
                                                                                        <td><?php echo $event["nom"]; ?></td>
                                                                                        <td><?php echo $event["date"]; ?></td>
                                                                                        <td><?php echo $event["prix"]; ?></td>
                                                                                        <td>
                                                                                            <?php
                                                                                            $rateC= new RateC(); 
                                                                                            $listeRate=$rateC->afficherRate($event["id"]);
                                                                                            foreach($listeRate as $rate){
                                                                                                echo $rate["rate"]/$rate["nbr_rate"];
                                                                                            }
                                                                                            ?>/5
                                                                                        </td>
                                                                                        <td>
                                                                                            <button type="button" class="btn btn-inverse-warning btn-fw"><a href="supprimerEvent.php?id=<?php echo $event["id"]; ?>">Supprimer</a></button>
                                                                                            <button type="button" class="btn btn-inverse-warning btn-fw"><a href="modifierEventForm.php?id=<?php echo $event["id"]; ?>">Modifier</a></button>
                                                                                        </td>
                                                                                    </tr>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Liste des reservations</h4>
                                                                <p class="card-description">
                                                                </p>
                                                                <form action="dashEvent.php" method="POST">
                                                                    <input type="submit" class="btn btn-inverse-warning btn-fw" name="aff" value="tri" />
                                                                </form>
                                                                <form action="dashEvent.php" method="POST">
                                                                    <input type="text" name="rech" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2">
                                                                    <input type="submit" class="btn btn-inverse-warning btn-fw" name="aff" value="Searsh" />
                                                                </form>
                                                                <div class="table-responsive pt-3">
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Date reservation</th>
                                                                                <th>Temps reservation</th>
                                                                                <th>Numero de personnes</th>
                                                                                <th>Nom Client</th>
                                                                                <th>Email Client</th>
                                                                                <th>Numero telephone</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            foreach ($listreservation as $reservation) {  
                                                                            ?>
                                                                                    <tr>
                                                                                        <td><?php echo $reservation["dateRes"]; ?></td>
                                                                                        <td><?php echo $reservation["timeRes"]; ?></td>
                                                                                        <td><?php echo $reservation["numbPers"]; ?></td>
                                                                                        <td><?php echo $reservation["nomClient"]; ?></td>
                                                                                        <td><?php echo $reservation["emailClient"]; ?></td>
                                                                                        <td><?php echo $reservation["numClient"]; ?></td>
                                                                                    
                                                                                    </tr>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                
                                                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                         
                                          
                                        </div>

                                        
                                        
                                   






                                        <div class="col-lg-4 d-flex flex-column">
                                            <div class="row flex-grow">
                                                <div class="col-md-6 col-lg-12 grid-margin stretch-card">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- content-wrapper ends -->
                            <!-- partial:partials/_footer.html -->
                            <footer class="footer">
                                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium
                                        <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a>
                                        from BootstrapDash.</span>
                                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
                                </div>
                            </footer>
                            <!-- partial -->
                        </div>
                        <!-- main-panel ends -->
                    </div>
                    <!-- page-body-wrapper ends -->
                </div>
                <!-- container-scroller -->

                <!-- plugins:js -->
                <script src="../../contents/vendors/js/vendor.bundle.base.js"></script>
                <!-- endinject -->
                <!-- Plugin js for this page -->
                <script src="../../contents/vendors/chart.js/Chart.min.js"></script>
                <script src="../../contents/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
                <script src="../../contents/vendors/progressbar.js/progressbar.min.js"></script>

                <!-- End plugin js for this page -->
                <!-- inject:js -->
                <script src="../../contents/js/dahboard_js/off-canvas.js"></script>
                <script src="../../contents/js/dahboard_js/hoverable-collapse.js"></script>
                <script src="../../contents/js/dahboard_js/template.js"></script>
                <script src="../../contents/js/dahboard_js/settings.js"></script>
                <script src="../../contents/js/dahboard_js/todolist.js"></script>
                <!-- endinject -->
                <!-- Custom js for this page-->
                <script src="../../contents/js/dahboard_js/dashboard.js"></script>
                <script src="../../contents/js/dahboard_js/Chart.roundedBarCharts.js"></script>
                <!-- End custom js for this page-->
                <script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", 
	animationEnabled: false,	
	title:{
		text: "Historique (Nombre evenements & reservations"
	},
	data: [
	{
		type: "column",
		dataPoints: [
			{ label: "nombre evenements",  y:3  },
			{ label: "nombre reservations", y:4 }
		]
	}
	]
});
chart.render();

}
</script>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>

</html>