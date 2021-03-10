<?php

require_once "control.php";

if(isset($_POST['circle'])){
       //mengambil field name dari form
       $r = $_POST['r'];

       $result = circle($r);
       $id = createIndex();
       $row = array(
           'id' => $id,
           'r' => $r,
           'luas' => $result,
           'create_at' => date('d-m-Y H:i:s'),
       );
   
       $finalJson = insertJson($id, $row, 'circle.json');
       if($finalJson){
           header('Location: http://localhost/JWP_Gana/circle.php');
       }

}


if(isset($_POST['square'])){
       //mengambil field name dari form
       $s = $_POST['s'];
   
       $id = createIndex();
       $result = square($s);
       $row = array(
           'id' => $id,
           's' => $s,
           'luas' => $result,
           'create_at' => date('d-m-Y H:i:s'),
       );
   
       $finalJson = insertJson($id, $row, 'square.json');
       if($finalJson){
           header('Location: http://localhost/JWP_Gana/square.php');
       }

}

//menghitung luas segitiga
if (isset($_POST['triangle'])) {

    //mengambil field name dari form
    $a = $_POST['a'];
    $t = $_POST['t'];

    $id = createIndex();
    $result = triangle($a, $t);
    $row = array(
        'id' => $id,
        'a' => $a,
        't' => $t,
        'luas' => $result,
        'create_at' => date('d-m-Y H:i:s'),
    );

    $finalJson = insertJson($id, $row, 'triangle.json');
    if($finalJson){
        header('Location: http://localhost/JWP_Gana/triangle.php');
    }
    // $final = encode($data);
    // if (file_put_contents('triangle.json',$final)) {
    //     header('Location: http://localhost/simulasi/triangle.php');
    // }
}

if(isset($_GET['deleteT'])) {

    $finalJson = deleteJson('triangle.json');
    if ($finalJson) {
        header('Location: http://localhost/JWP_Gana/triangle.php');
    }

}

if(isset($_GET['deleteC'])) {

    $finalJson = deleteJson('circle.json');
    if ($finalJson) {
        header('Location: http://localhost/JWP_Gana/circle.php');
    }

}

if(isset($_GET['deleteS'])) {

    $finalJson = deleteJson('square.json');
    if ($finalJson) {
        header('Location: http://localhost/JWP_Gana/square.php');
    }

}

?>