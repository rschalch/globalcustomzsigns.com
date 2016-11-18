<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

    if (!function_exists('br_to_mysql')) {
        function br_to_mysql($date)
        {
            $mysql_date = implode('-', array_reverse(explode('/', $date)));

            return $mysql_date;
        }

        function mysql_to_br($date)
        {
            $br_date = implode('/', array_reverse(explode('-', $date)));

            return $br_date;
        }

        function IsNullOrEmptyString($question)
        {
            return (!isset($question) || trim($question) === '');
        }
    }
