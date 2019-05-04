<!DOCTYPE html>
<html lang="en">
<?php
    require_once('./components/head.php');
    require_once('./models/StationList.php');

    $CheckIn = new StationList("CheckIn");
    $CheckOut = new StationList("CheckOut");
    $listCheckIn = $CheckIn->getStationList();
    $listCheckOut = $CheckOut->getStationList();
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
    <main class="container mb-5">
        <form class="blue-background my-5 px-2 rounded-lg position-relative" id="formAvailability" onsubmit="formAvailability(this);" method="post">
            <div class="row my-5">
                <div class="col-12 col-md-6">
                    <object type="image/svg+xml" data="/img/shapeTitle.svg" class="shape-title img-fluid">
                        <img src="/img/shapeTitle.png" alt="Shape">
                    </object>
                    <h2 class="text-shadow font-weight-bolder font-italic absolute-title">Elige Fecha y Lugar</h2>
                </div>
                <div class="col-12 col-md-6 text-right mt-5 mt-md-0">
                    <h1 class="text-shadow font-weight-bolder font-italic">Paso 1</h1>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md">
                    <label for="officeDeliver">OFICINA DE ENTREGA</label>
                    <select class="form-control input-square" id="officeDeliver" name="officeDeliver">
                        <?php
                            foreach($listCheckIn as $list) {
                                echo "<option value=" .$list['StationId']. ">" .$list['StationName']. "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-12 col-md">
                    <label for="officeDevolution">OFICINA DE DEVOLUCIÓN</label>
                    <select class="form-control input-square" id="officeDevolution" name="officeDevolution">
                        <?php
                            foreach($listCheckOut as $list) {
                                echo "<option value=" .$list['StationId']. ">" .$list['StationName']. "</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6 col-md-3">
                    <input type="text" class="pl-5 form-control input-square" placeholder="Fecha de Salida" id="dateDeliver" name="dateDeliver">
                    <img  class="icon-form" src="/img/date-icon.png" alt="Date">
                </div>
                <div class="form-group col-6 col-md-3">
                    <select class="pl-5 form-control input-square" id="hourDeliver" name="hourDeliver">
                        <option>1:00</option>
                        <option>2:00</option>
                        <option>3:00</option>
                        <option>4:00</option>
                        <option>5:00</option>
                        <option>6:00</option>
                        <option>7:00</option>
                        <option>8:00</option>
                        <option>9:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                        <option>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                        <option>21:00</option>
                        <option>22:00</option>
                        <option>23:00</option>
                    </select>
                    <img class="icon-form" src="/img/clock-icon.png" alt="Date">
                </div>
                <div class="form-group col-6 col-md-3">
                    <select class="pl-5 form-control input-square" id="hourDevolution" name="hourDevolution">
                        <option>1:00</option>
                        <option>2:00</option>
                        <option>3:00</option>
                        <option>4:00</option>
                        <option>5:00</option>
                        <option>6:00</option>
                        <option>7:00</option>
                        <option>8:00</option>
                        <option>9:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                        <option>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                        <option>21:00</option>
                        <option>22:00</option>
                        <option>23:00</option>
                    </select>
                    <img class="icon-form" src="/img/clock-icon.png" alt="Date">
                </div>
                <div class="form-group col-6 col-md-3">
                    <input type="text" class="pl-5 form-control input-square" placeholder="Fecha de Devolución" id="dateDevolution"  name="dateDevolution">
                    <img class="icon-form" src="/img/date-icon.png" alt="Date">
                </div>
            </div>
            <div class="divider-top my-3"></div>
            <div class="row py-3">
                <div class="col-6">
                    <h4 class="underline">OFICINAS PRINCIPALES</h4>
                </div>
                <div class="col-6 text-right">
                    <button class="btn-blue btn-lg border-white" type="submit">Continuar</button>
                </div>
            </div>
        </form>
        <div class="bg-secondary text-center py-1" id="banner">
            <h1 class="text-white font-italic font-weight-bold">Renta desde<span class="blue-white"> $30 </span>al día</h1>
        </div>
    </main>
    <footer class="container bg-blue-gradient fixed-bottom-md">
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
        /*$URL = 'http://www.triyolo.com/ejercicio/rest/index.php';
        $body = ['Function' => "GetCarAvailability", 
                'SessionId' => "5968145", 
                'CheckOutStationId' => "4", 
                'CheckOutDate' => "2014-11-14T17:00",
                'CheckInStationId' => "4", 
                'CheckInDate' => "2014-11-14T17:00",
                "PLI" => 1,
                "CDW" => 1,
                "PAI" => 0,
                "DP" => 0,
                "CA" => 0,
                "CM" => 0,
                "GPS" => 0,
                "BS" => 0,
                "DealId" => "0"
                ];
        $options = array(
                'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($body),
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents( $URL, false, $context );
        $reponse = json_decode($response, true);
        var_dump($reponse);*/
    ?>
    <?php
        require_once('./components/footer.php');
    ?>
    <script src="./js/formAvailability.js"></script>
</body>
</html>