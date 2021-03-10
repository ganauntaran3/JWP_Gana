<?php

//Mengatur timezone
date_default_timezone_set('Asia/Singapore');

//Function untuk mengambil file json, sekaligus men-decode
function getJson($file){
    $json = file_get_contents($file);
    $return = json_decode($json, true);

    if(!empty($return)){
        return $return;
    }else{
        return [];
    }
}

//Function untuk menghitung luas lingkaran
function circle($r){
    $result = 3.14 * $r * $r;
    return $result;
}

//Function untuk menghitung luas segitiga
function triangle($a, $t){
    $result = 0.5 * $a * $t;
    return $result;
}

//Function untuk menghitung luas persegi
function square($s){
    $result = $s * $s;
    return $result;
}

//Function untuk menghitung total perhitungan dari setiap bangun datar
function totalCount($s, $t, $c){
    $total = $s + $t + $c;
    return $total;
}

function prc($n, $total){
    $prc = 100 * $n/$total;
    return $prc;
}

//Function untuk menginput suatu array ke dalam file json
function insertJson($id, array $row, $file){
    $data = getJson($file);
    $data[$id] = $row;
    return putJson($data, $file);
}

//Function untuk menghapus file  json berdasarkan index
function deleteJson($file){
    $data = getJson($file);
    unset($data[$_GET['id']]);
    return putJson($data, $file);
}

//Function untuk menciptakan random string sebagai identifier
function createIndex(){
    return uniqid(rand());
}

//Function untuk meng-encode
function putJson($data, $file){
    $json = json_encode($data,JSON_PRETTY_PRINT);
    return file_put_contents($file, $json);
}
?>