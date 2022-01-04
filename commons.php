<?php

function getUtcTimeStamp($dt){

    $secs = 0;

    $d = DateTime::createFromFormat(
        'Y-m-d H:i',     // '2022-01-15 14:34'
        $dt,
        new DateTimeZone('+05:30')
    );
    
    if ($d === false) {
        $secs = 0;
    } else {
        $secs = $d->getTimestamp();
    }
    return $secs;    
}

?>