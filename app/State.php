<?php
/**
 * Created by PhpStorm.
 * User: alpho
 * Date: 18/06/2018
 * Time: 22:55
 */

namespace App;


class State
{
    public static function state($element){
        $a = '';
        $element === null ?$a='&#128473;':$a='&#x1F5D8;';

        return $a;
    }

}