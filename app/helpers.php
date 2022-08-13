
<?php

if (!function_exists('remove_accents')) {
    function remove_accents($string)
    {
        $string =str_replace('ñ', '?', $string);
        $string = str_replace('Ñ', '?', $string);

        return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    }
}
