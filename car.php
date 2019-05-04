<!DOCTYPE html>
<html lang="en">
<?php
    require_once('./components/head.php');
    require_once('./models/StationList.php');

    $car = $_SESSION['carAvailability'];
    $checkOutStationName = $car['CheckOutStationName'];
    $checkInStationName = $car['CheckOutStationName'];
    $checkOutDate = date_create($car['CheckOutDate']);
    $checkInDate = date_create($car['CheckInDate']);
?>

<body>
    <div class="container pos-f-t px-0">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <h5 class="text-white h4">Hello!</h5>
                <span class="text-muted">Europcar Example!</span>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="/img/menu.png" alt="">
            </button>
            <img class="img-fluid img-absolute" src="/img/logo.png" alt="">
            <img src="/img/call.png" alt="">
        </nav>
    </div>
    <main>
        <div class="container my-5">
            <div class="row d-none d-md-flex">
                <div class="col-4 step-1 py-2 position-relative">
                    <h3 class="d-inline-block">Paso 1</h3><small> Su Itinerario</small>
                </div>
                <div class="col-4 step-2 py-2">
                    <h3 class="d-inline-block">Paso 2</h3><small> Seleccione su Auto</small>
                </div>
                <div class="col-4 step-3 py-2">
                    <h3 class="d-inline-block"  >Paso 3</h3><small> Extras-Reserva</small>
                </div>
            </div>
            <div class="row py-3 d-flex justify-content-center text-center">
                <div class="col-12 col-md-6">
                    <h4 class="blue-white font-weight-bolder">Lugar y Fecha de Entrega:</h4>
                    <p><?php echo $checkInStationName; ?></p>
                    <p><?php echo date_format($checkInDate, 'g:ia \o\n l jS F Y'); ?></p>
                </div>
                <div class="col-12 col-md-6">
                    <h4 class="blue-white font-weight-bolder">Lugar y Fecha de Devolucion:</h4>
                    <p><?php echo $checkOutStationName; ?></p>
                    <p><?php echo date_format($checkOutDate, 'g:ia \o\n l jS F Y'); ?></p>
                </div>
                <a class="btn btn-lg btn-blue" href="detail.php">Modificar Itenerario</a>
            </div> 
        </div>
        <div class="container">
            <h1 class="blue-white">Selecciona su Auto</h1>
            <h4 class="blue-white font-italic mb-5">CATEGORIAS DE AUTOS:</h4>
            <nav>
                <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active blue-link" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Todas</a>
                    <?php
                        foreach($car['CarList'] as $carList) {
                            echo '
                            <a class="nav-link blue-link" id="'. $carList['Group']['GroupId'].'-tab" data-toggle="tab" href="#'. $carList['Group']['GroupId'].'" role="tab" aria-controls="'. $carList['Group']['GroupId'].'" aria-selected="false">'
                                . $carList['Group']['GroupName'].
                            '</a>';
                        }
                    ?>
                </div>
            </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <?php
                            foreach($car['CarList'] as $key => $carList) {
                                echo '
                                <div class="row py-3">
                                    <div class="col-12 col-md-6 text-center">
                                        <img class="img-fluid" src="/img/car.png" alt="">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <h4>'. $carList['Group']['CarModel'] .'</h4>
                                        <h6 class="mb-4">'. $carList['Group']['Category'] .' </h6>
                                        <div class="d-inline-block mr-3">
                                            <img src="/img/person.png" alt="">
                                            <p class="d-inline">'. $carList['Features']['Pax'] .'</p>
                                        </div>
                                        <div  class="d-inline-block mr-3">
                                            <img src="/img/door.png" alt="">
                                            <p class="d-inline">'. $carList['Features']['Doors'] .'</p>
                                        </div>
                                        <div  class="d-inline-block mr-3">
                                            <img src="/img/case.png" alt="">
                                            <p class="d-inline">'. $carList['Features']['BigLuggage'] .'</p>
                                        </div>
                                        '.
                                            (($carList['Features']['AirCondition'] == 1) ? 
                                            '<div  class="d-inline-block">
                                                <img src="/img/aa.png" alt="">
                                            </div>' 
                                            : '')
                                        .'
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="mb-2">
                                                    <img src="/img/automatic.png" alt="">
                                                    <p class="d-inline">Automatico</p>
                                                </div>
                                                <div>
                                                    <img src="/img/manual.png" alt="">
                                                    <p class="d-inline">Manual</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h4 class="mb-0">Desde:</h4>
                                                <h1 class="blue-white font-italic">$30</h1>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h6 class="underline blue-white">*Precio por Dia</h6>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-blue" href="#">Reservar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        ?>
                    </div>
                    <?php 
                       foreach($car['CarList'] as $carList) {
                            echo '<div class="tab-pane fade" id="'. $carList['Group']['GroupId'].'" role="tabpanel" aria-labelledby="'. $carList['Group']['GroupId'].'-tab">';
                            echo '
                                <div class="row py-3">
                                    <div class="col-12 col-md-6 text-center">
                                        <img class="img-fluid" src="/img/car.png" alt="">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <h4>'. $carList['Group']['CarModel'] .'</h4>
                                        <h6 class="mb-4">'. $carList['Group']['Category'] .' </h6>
                                        <div class="d-inline-block mr-3">
                                            <img src="/img/person.png" alt="">
                                            <p class="d-inline">'. $carList['Features']['Pax'] .'</p>
                                        </div>
                                        <div  class="d-inline-block mr-3">
                                            <img src="/img/door.png" alt="">
                                            <p class="d-inline">'. $carList['Features']['Doors'] .'</p>
                                        </div>
                                        <div  class="d-inline-block mr-3">
                                            <img src="/img/case.png" alt="">
                                            <p class="d-inline">'. $carList['Features']['BigLuggage'] .'</p>
                                        </div>
                                        '.
                                            (($carList['Features']['AirCondition'] == 1) ? 
                                            '<div  class="d-inline-block">
                                                <img src="/img/aa.png" alt="">
                                            </div>' 
                                            : '')
                                        .'
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="mb-2">
                                                    <img src="/img/automatic.png" alt="">
                                                    <p class="d-inline">Automatico</p>
                                                </div>
                                                <div>
                                                    <img src="/img/manual.png" alt="">
                                                    <p class="d-inline">Manual</p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h4 class="mb-0">Desde:</h4>
                                                <h1 class="blue-white font-italic">$30</h1>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <h6 class="underline blue-white">*Precio por Dia</h6>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-blue" href="#">Reservar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            echo '</div>';
                        }
                    ?>
                </div>
        </div>
    </main>
    <footer class="container bg-blue-gradient">
        <div class="row py-2">
            <div class="col col-md-2 d-flex align-items-center">
                <div>
                    <img class="img-fluid" src="/img/logoWhite.png" alt="">
                </div>
            </div>
            <div class="col boder-left">
                <h5>Atención a Clientes</h5>
                <p class="mb-0">01 800 272 02 91</p>
                <p class="mb-0">Nuestro horario de atención telefónica es 24 hrs.</p>
            </div>
        </div>
        <div class="row text-center bg-white py-1">
            <div class="col">
                <h5 class="text-secondary">Sitio Clásico</h5>
            </div>
            <div class="col boder-left-dark">
                <h5 class="text-secondary">Términos y Condiciones</h5>
            </div>
        </div>
    </footer>
    <?php
        require_once('./components/footer.php');
    ?>
</body>
</html>