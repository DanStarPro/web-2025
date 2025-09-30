<?php
function validate_date($date) {
    if (is_numeric($date) && $date > 0) {
        return true;
    }
    else {
        return false;
    }
}
function validate_length($data, $max_len){
    if (is_numeric($data)) {
        strval($data);
    }
    if (strlen($data) <= $max_len) {
        return true;
    }
    else {
        return false;
    }
}
function validate_type($data, $type){
    if (gettype($data) == $type) {
        return true;
    }
    else {
        return false;
    }
}
?>