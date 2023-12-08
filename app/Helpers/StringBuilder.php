<?php

if (!function_exists('comma_separated_to_array')) {
    /**
     * Mengubah string yang dipisahkan dengan koma menjadi array
     * 
     * @param string $string
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return array
     */
    function comma_separated_to_array($string = '')
    {
        if (empty($string) || is_null($string)) {
            return [];
        }

        return collect(explode(',', $string))->map(function ($item) {
            return trim($item);
        });
    }
}