<?php
    function convertDateFormat($inputDate) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timestamp = strtotime($inputDate);
        return date('H:i A d/m/Y', $timestamp);
    }

    