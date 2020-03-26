<?php
//set_time_limit(0);

use yii\helpers\VarDumper;

function d($var, $depth = 5)
{
    if (YII_DEBUG) {
        echo '<p style="background-color: #E6EFC2; margin:1px">';
        VarDumper::dump($var, $depth, true);
        echo '</p>';
    }
}

function dd($var, $depth = 5)
{
    if (YII_DEBUG) {
        echo '<p style="background-color: #E6EFC2; margin:1px">';
        VarDumper::dump($var, $depth, true);
        echo '</p>';
        die();
    }
}
