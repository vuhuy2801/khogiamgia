<?php
function convertDateFormat($inputDate) {
    $timestamp = strtotime($inputDate);
    return date('d-m-Y', $timestamp);
}
?>