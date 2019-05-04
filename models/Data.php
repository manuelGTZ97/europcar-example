<?php
class Data {
    private $body;

    function __construct($body) {
        $this->body = $body;
    }

    function getData() {
        $URL = 'http://www.triyolo.com/ejercicio/rest/index.php';
        $options = array(
                'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($this->body),
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents( $URL, false, $context );
        return json_decode($response, true);
    }
}
?>