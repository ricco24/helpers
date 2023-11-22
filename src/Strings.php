<?php

namespace Kelemen\Helper;

use Nette\Utils\Strings as NetteStrings;

class Strings
{
    /**
     * @param int $count
     * @param string $form1     count = 1
     * @param string $form2     count <2, 4>
     * @param string $form3     count = 0 || count >= 5
     * @param bool $withCount   return form prefixed with given count?
     * @return string
     */
    public static function nForm(int $count, string $form1, string $form2, string $form3, bool $withCount = false)
    {
        if ($count == 1) {
            return $withCount ? $count . ' ' . $form1 : $form1;
        }

        if ($count > 1 && $count < 5) {
            return $withCount ? $count . ' ' . $form2 : $form2;
        }
        return $withCount ? $count . ' ' . $form3 : $form3;
    }

    public static function slug(string $s, string $sep = '_', ?string $charlist = null, bool $lower = true): string
    {
        return str_replace('-', $sep, NetteStrings::webalize($s, $charlist, $lower));
    }
}
