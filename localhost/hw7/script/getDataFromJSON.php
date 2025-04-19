<?php
    function getDataFromJSON(string $content) : array {
        $jsonPath = 'db/json/' . $content . '.json';
        $json = file_get_contents($jsonPath);
        return $data = json_decode($json, true);
    }
?>


