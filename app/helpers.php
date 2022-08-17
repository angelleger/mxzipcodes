
<?php

if (!function_exists('remove_accents')) {
    function remove_accents($string)
    {
        $string = str_replace('ñ', '?', $string);
        $string = str_replace('Ñ', '?', $string);
        $string = str_replace('ü', '?', $string);
        $string = str_replace('Ü', '?', $string);

        return $string;
    }
}
