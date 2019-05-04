<?php
session_start(); 
include("Data.php");
$_POST = json_decode(file_get_contents("php://input"),true);

class Login {
    private $contract;
    private $password;

    function __construct($contract, $password) {
        $this->contract = $contract;
        $this->password = $password;
    }

    function isLoggedin() {
        $body = ['Function' => "LogIn", 'ContractId' => $this->contract, 'Password' =>  $this->password];
        $login = new Data($body);
        $response = $login->getData();
        return $response;
    }
}

$contract = isset($_POST["contract"]) ? $_POST["contract"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

if(!empty($contract) && !empty($password)) {
    $login = new Login($contract, $password);
    $data = $login->isLoggedin();
    if(array_key_exists('faultstring', $data)) {
        echo json_encode($data);
    } else {
        $_SESSION['sessionId'] = $data["SessionId"];
        $_SESSION['ContractId'] = $data["ContractId"];
        $_SESSION['CompanyId'] = $data["CompanyId"];
        $_SESSION['CompanyName'] = $data["CompanyName"];
        echo "Success";
    }
} else {
    echo "Empty Fields";
}

?>