<?php
if (!function_exists('dd')) {
    function dd(...$vars)
    {
        echo '<pre>';
        foreach ($vars as $var) {
            echo 'Type: ' . gettype($var) . PHP_EOL;
            print_r($var); // You can also use var_dump($var);
        }
        echo '</pre>';
        exit; // Stops execution
    }
}
