@php
        function dateTrans($datef){
    //Create a date object out of a string (e.g. from a database):
    $date1 = date_create_from_format('Y-m-d H:i:s', $datef);

    //Create a date object out of today's date:
    $date2 = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));

    //Create a comparison of the two dates and store it in an array:
    $diff = (array) date_diff($date1, $date2);

    //Output the array:
    // echo '<pre>'.print_r($diff,1).'</pre>';

    if($diff["y"]>0){
    $date= $diff["y"] . " year";
    }else if($diff["m"]>0){
        $date= $diff["m"] . " mon";
    }else if($diff["d"]>0){
        $date= $diff["d"] . " day";
    }else if($diff["h"]>0){
        $date= $diff["h"] . " hour";
    }else if($diff["i"]>0){
        $date= $diff["i"] . " min";
    }else if($diff["s"]>0){
        $date='NOW';
    } 
    return $date;
}
@endphp