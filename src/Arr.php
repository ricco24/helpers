<?php

namespace Kelemen\Helper;

use InvalidArgumentException;

class Arr
{
    /**
     * Convert string separated by $sep to array
     * @param string $string
     * @param string $sep
     * @return array
     */
    public static function explode(string $string, string $sep = ','): array
    {
        if (empty($string) || empty($sep)) {
            return [];
        }
        return array_map('trim', explode($sep, $string));
    }
}
