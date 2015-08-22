<?php

namespace App\Library;

class Utils
{
    /**
     * Converte um objeto para array
     * @param  object ou array $var
     * @return array
     */
    public static function objectToArray($var)
    {
        if (is_object($var)) {
            $array = get_object_vars($var);
        } else {
            $array = $var;
        }

        foreach ($array as $key => &$item) {
            if (is_object($item) || is_array($item)) {
                $item = self::objectToArray($item);
            }
        }

        return $array;
    }

}
