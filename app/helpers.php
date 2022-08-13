
<?php

if (!function_exists('remove_accents')) {
    function remove_accents($string)
    {
        return iconv('UTF-8', 'ASCII//TRANSLIT', $string);
    }
}
