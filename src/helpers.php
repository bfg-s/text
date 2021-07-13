<?php

if (!function_exists("is_json")) {

    /**
     * @param $string
     * @param bool $return_data
     * @return bool|mixed
     */
    function is_json($string, $return_data = false) {

        if (!is_string($string)) {

            return false;
        }

        $data = json_decode($string, 1);

        return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
    }
}

if (!function_exists("lang_in_text")) {

    /**
     * @param $string
     * @return bool|mixed
     */
    function lang_in_text($string) {

        if (is_string($string)) {

            $string = preg_replace_callback('/@([a-zA-Z0-9_\-.]+)/', function ($m) {
                return __($m[1]);
            }, $string);
        }

        return $string;
    }
}
