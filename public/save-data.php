<?php
    $data = json_decode(file_get_contents('php://input'));
    $file_name = 'data.json';

    if (json_last_error() == JSON_ERROR_NONE) {
        $fp = fopen($file_name, 'w');
        if (fwrite($fp, json_encode($data, JSON_PRETTY_PRINT)) === FALSE) {
            echo "Error writing " . $file_name;
        };
        fclose($fp);

    } else {
        echo "Invalid JSON";
    }
?>