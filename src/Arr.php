<?php

namespace Kelemen\Helper;

class Arr
{
    /**
     * Convert string separated by $sep to array
     * @param string $string
     * @param string $sep
     * @return array
     */
    public static function explode($string, $sep = ',')
    {
        if (empty($string)) {
            return [];
        }
        return array_map('trim', explode($sep, $string));
    }
}
