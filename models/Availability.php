<?php
include("Data.php");
$_POST = json_decode(file_get_contents("php://input"),true);
session_start(); 
class Availability {

    private $officeDeliverId;
    private $officeDevolutionId;
    private $dateDeliver;
    private $hourDeliver;
    private $hourDevolution;
    private $dateDevolution;

    function __construct($officeDeliverId, $officeDevolutionId, $dateDeliver, $hourDeliver, $hourDevolution, $dateDevolution) {
        $this->officeDeliverId = $officeDeliverId;
        $this->officeDevolutionId = $officeDevolution;
        $this->dateDeliver = $dateDeliver;
        $this->hourDeliver = $hourDeliver;
        $this->hourDevolution = $hourDevolution;
        $this->dateDevolution = $dateDevolution;
    }

    function getStationList() {
        $body = ['Function' => "GetCarAvailability", 
                'SessionId' =>  $_SESSION['sessionId'], 
                'CheckOutStationId' => $this->officeDeliverId, 
                'CheckOutDate' => $this->dateDeliver . "T". $this->hourDeliver, 
                'CheckInStationId' => $this->officeDevolutionId, 
                'CheckInDate' => $this->dateDevolution . "T". $this->hourDevolution,
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
        $data = new Data($body);
        $response = $data->getData();
        return $response;
    }
}

$dateDeliver = isset($_POST["dateDeliver"]) ? $_POST["dateDeliver"] : "";
$dateDevolution = isset($_POST["dateDevolution"]) ? $_POST["dateDevolution"] : "";
$officeDeliverId = isset($_POST["officeDeliverId"]) ? $_POST["officeDeliverId"] : "";
$officeDevolutionId = isset($_POST["officeDevolutionId"]) ? $_POST["officeDevolutionId"] : "";
$hourDeliver = isset($_POST["hourDeliver"]) ? $_POST["hourDeliver"] : "";
$hourDevolution = isset($_POST["hourDevolution"]) ? $_POST["hourDevolution"] : "";

if(!empty($dateDeliver) && !empty($dateDevolution)) {
    $Availability = new Availability($officeDeliverId, $officeDevolutionId, $dateDeliver, $hourDeliver, $hourDevolution, $dateDevolution);
    $data = $Availability->getStationList();
    if(array_key_exists('faultstring', $data)) {
        echo json_encode($data);
    } else {
        $_SESSION['carAvailability'] = $data;
        echo "Success";
    }
} else {
    echo "Empty Fields";
}

?>