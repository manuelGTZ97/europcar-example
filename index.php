<!DOCTYPE html>
<html lang="en">
<?php
    require_once('./components/head.php');
?>
<body>
    <main>
        <section class="container-fluid">
            <div class="container px-0 d-flex justify-content-center">
                <div class="form-container">
                    <img class="my-5" src="/img/logo.png" alt="">
                    <form id="loginForm" onsubmit="login(this);" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" id="contract" name="contract" placeholder="Contract" required />
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="password" name="password" placeholder="Password" required />
                        </div>
                        <button class="btn btn-blue" type="submit">LOG IN</button>
                    </form>
                </div>
            </div>
        </section> 
    </main>
    <?php
        /*$URL = 'http://www.triyolo.com/ejercicio/rest/index.php';
        $body = ['Function' => "LogIn", 'ContractId' => "0123456789", 'Password' => "0123456789"];
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
    <script src="./js/form.js"></script>
</body>
</html>