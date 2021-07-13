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

if (!function_exists('tag_replace')) {
    /**
     * @param  string|mixed|T  $text
     * @param  array|object  $materials
     * @param  string  $pattern
     * @return array|string|mixed|T
     * @template T
     */
    function tag_replace(mixed $text, array|object $materials, string $pattern = "{*}"): array|string|null
    {
        if (!is_string($text)) {
            return $text;
        }
        $pattern = preg_quote($pattern);
        $pattern = str_replace('\*', '([a-zA-Z0-9\_\-\.]+)', $pattern);

        return preg_replace_callback("/{$pattern}/", function ($m) use ($materials) {
            return multi_dot_call($materials, $m[1]);
        }, $text);
    }
}

if (!function_exists('file_lines_get_contents')) {
    /**
     * Get data from file by lines
     *
     * @param  string  $file
     * @param  int  $to
     * @param  int  $from
     * @return string|null
     */
    function file_lines_get_contents(string $file, int $to = -1, int $from = 0): ?string
    {
        if ($file = fopen($file, "r")) {
            $line = 1;
            $lines = [];
            while(!feof($file)) {
                $line_data = fgets($file);
                if ($to > 0) {
                    if ($line <= $to) {
                        if ($line >= $from) {
                            $lines[] = $line_data;
                        }
                    } else {
                        break;
                    }
                } else {
                    $lines[] = $line_data;
                }
                $line++;
            }
            fclose($file);

            return implode("", $lines);
        }

        return null;
    }
}
