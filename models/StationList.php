<?php
include("Data.php");
session_start(); 
class StationList {

    private $functionName;
    function __construct($functionName) {
        $this->functionName = $functionName;
    }

    function getStationList() {
        $body = ['Function' => "GetStationList", 'SessionId' => $_SESSION['sessionId'], 'StationType' => $this->functionName ];
        $login = new Data($body);
        $response = $login->getData();
        return $response;
    }
}
?>