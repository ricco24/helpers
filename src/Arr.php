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
        if ($sep === '') {
            throw new InvalidArgumentException('Separator cannot be an empty string.');
        }

        if (empty($string)) {
            return [];
        }
        return array_map('trim', explode($sep, $string));
    }
}
