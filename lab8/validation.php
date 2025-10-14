<?php
if (!function_exists('validate_length')) {
    function validate_length($text, $maxLength) {
        return strlen($text) <= $maxLength;
    }
}

if (!function_exists('validate_date')) {
    function validate_date($timestamp) {
        return is_numeric($timestamp) && $timestamp > 0 && $timestamp <= time();
    }
}

if (!function_exists('validate_type')) {
    function validate_type($value, $type) {
        switch (strtolower($type)) {
            case 'integer':
                return is_int($value) || (is_string($value) && is_numeric($value) && (int)$value == $value);
            case 'string':
                return is_string($value);
            default:
                return false;
        }
    }
}
?>