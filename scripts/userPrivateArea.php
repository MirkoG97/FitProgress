<?php
    session_start();
    if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== true){
        header("location: ../public/login.html");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitProgress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100" id='user_private_area'>
    <!-- WRAPPER -->
    <div class="d-flex flex-grow-1">

        <!-- SIDEBAR -->
        <div class="d-flex flex-column flex-shrink-0 bg-body-tertiary position-fixed h-100" style="width: 4.5rem"> 
            <a href="../../public/index.html" class="d-block p-3 link-body-emphasis text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only"> 
                <img src="../../public/assets/images/icon/fitprogress_logo.svg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                <span class="visually-hidden">FitProgress</span>
            </a> 
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center "> 
                    <li class="nav-item"> 
                        <a href="#" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="home" data-bs-original-title="home">  
                            <img src="../../public/assets/images/icon/house.svg" alt="home" width="24" height="24" class="bi pe-none">
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a href="#" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="workout" data-bs-original-title="workout">  
                            <img src="../../public/assets/images/icon/gym-dumbell.svg" alt="workout" width="24" height="24" class="bi pe-none">
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a href="#" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="nutrition" data-bs-original-title="nutrition">  
                            <img src="../../public/assets/images/icon/fork-knife.svg" alt="nutrition" width="24" height="24" class="bi pe-none">
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a href="#" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="analytics" data-bs-original-title="analytics">  
                            <img src="../../public/assets/images/icon/graph-up.svg" alt="analytics" width="24" height="24" class="bi pe-none">
                        </a> 
                    </li> 
                </ul> 
        </div>

        <!-- MAIN -->
        <main class="flex-grow-1 d-flex flex-column" style="margin-left:4.5rem">

            <!-- NAV -->
            <nav class="navbar sticky-top">
                <div class="dropdown ms-auto me-2"> 
                    <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <img src="https://github.com/mdo.png" alt="mdo" width="35" height="35" class="rounded-circle"> 
                    </a> 
                    <ul class="dropdown-menu dropdown-menu-end text-small shadow">
                        <li class="dropdown-header">
                            <div>
                                <div class="fw-bold"><?php echo $_SESSION['nome']?></div>
                                <small class="text-muted">Utente</small>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li> 
                        <li><a class="dropdown-item" href="#"><img src="../../public/assets/images/icon/gear.svg"><i class="bi bi-list-task me-2"></i> Impostazioni</a></li>
                        <li><a class="dropdown-item" href="#"><img src="../../public/assets/images/icon/headset.svg"><i class="bi bi-list-task me-2"></i> Supporto</a></li>
                        <li><a class="dropdown-item" href="#"><img src="../../public/assets/images/icon/person.svg"><i class="bi bi-person me-2"></i> Profilo</a></li> 
                        <li><hr class="dropdown-divider"></li> 
                        <li><a class="dropdown-item text-danger" href="../app/Services/logout.php"><img src="../../public/assets/images/icon/box-arrow-right.svg"><i class="bi bi-box-arrow-right me-2"></i> Log Out</a></li> 
                    </ul> 
                </div> 
            </nav>

            <!-- WIDGET BOARD -->
            <div name="widget-board" id="widget-board" class="flex-grow-1 overflow-auto p-4">
                <div class="row g-5">
                    <!-- Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body">
                                <h5 class="card-title">Area Privata Utente</h5>
                                <p class="card-text">
                                    <?php
                                        echo "ciao ".$_SESSION['nome']." con ID ".$_SESSION['id']." e ruolo ".$_SESSION['ruolo']." e PT ".$_SESSION['personal_trainer'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body">
                                <h5 class="card-title">Area Privata Utente</h5>
                                <p class="card-text">
                                    <?php
                                        echo "ciao ".$_SESSION['nome']." con ID ".$_SESSION['id']." e ruolo ".$_SESSION['ruolo']." e PT ".$_SESSION['personal_trainer'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body">
                                <h5 class="card-title">Area Privata Utente</h5>
                                <p class="card-text">
                                    <?php
                                        echo "ciao ".$_SESSION['nome']." con ID ".$_SESSION['id']." e ruolo ".$_SESSION['ruolo']." e PT ".$_SESSION['personal_trainer'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body">
                                <h5 class="card-title">Area Privata Utente</h5>
                                <p class="card-text">
                                    <?php
                                        echo "ciao ".$_SESSION['nome']." con ID ".$_SESSION['id']." e ruolo ".$_SESSION['ruolo']." e PT ".$_SESSION['personal_trainer'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body">
                                <h5 class="card-title">Area Privata Utente</h5>
                                <p class="card-text">
                                    <?php
                                        echo "ciao ".$_SESSION['nome']." con ID ".$_SESSION['id']." e ruolo ".$_SESSION['ruolo']." e PT ".$_SESSION['personal_trainer'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body">
                                <h5 class="card-title">Area Privata Utente</h5>
                                <p class="card-text">
                                    <?php
                                        echo "ciao ".$_SESSION['nome']." con ID ".$_SESSION['id']." e ruolo ".$_SESSION['ruolo']." e PT ".$_SESSION['personal_trainer'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body">
                                <h5 class="card-title">Area Privata Utente</h5>
                                <p class="card-text">
                                    <?php
                                        echo "ciao ".$_SESSION['nome']." con ID ".$_SESSION['id']." e ruolo ".$_SESSION['ruolo']." e PT ".$_SESSION['personal_trainer'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Widget -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card shadow rounded-4">
                            <div class="card-body">
                                <h5 class="card-title">Area Privata Utente</h5>
                                <p class="card-text">
                                    <?php
                                        echo "ciao ".$_SESSION['nome']." con ID ".$_SESSION['id']." e ruolo ".$_SESSION['ruolo']." e PT ".$_SESSION['personal_trainer'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </main>
    </div>

    <!-- FOOTER -->
    <footer class="d-flex flex-wrap justify-content-center align-items-center py-3">
        <span class="text-body-tertiary">© 2025 Mirko Giraldo</span>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>