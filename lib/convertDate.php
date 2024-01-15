<?php
function convertDateFormat($inputDate) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timestamp = strtotime($inputDate);
    return date('s:i:H d-m-Y', $timestamp);
}
?>