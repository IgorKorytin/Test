<?php
//set_time_limit(0);

function d($var, $depth = 5)
{
    if (YII_DEBUG) {
        echo '<p style="background-color: #E6EFC2; margin:1px">';
        \yii\helpers\VarDumper::dump($var, $depth, true);
        echo '</p>';
    }
}

function dd($var, $depth = 5)
{
    if (YII_DEBUG) {
        echo '<p style="background-color: #E6EFC2; margin:1px">';
        \yii\helpers\VarDumper::dump($var, $depth, true);
        echo '</p>';
        die();
    }
}
