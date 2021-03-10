
<?php
include "partials/header.php";
include "partials/navbar.php";

require_once "shape/control.php";
?>


<div class="container">
      <?php  
        //ambil json
        // $json = file_get_contents('shapes/triangle.json');
        // $triangle = json_decode($json,true);

        $triangle = getJson('shape/triangle.json');
        $t = count($triangle);

        $circle = getJson('shape/circle.json');
        $c = count($circle);

        $square = getJson('shape/square.json');
        $s = count($square);

        $total = totalCount($s, $c, $t);
        $prcT = prc($t, $total);
        $prcC = prc($c, $total);
        $prcS = prc($s, $total);

        $data = [
          'Lingkaran' => $c,
          'Segitiga' => $t,
          'Persegi' => $s
        ];

        $max = max($c, $t, $s);
        $min = min($c, $t, $s);

      ?>
    

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center mt-2">Hitung Luas Bangun Datar</h2>
        </div>
      </div>
    </div>
      <h5>Diagram Batang</h5>
      <br>
    <table>
    <tr>
        <td valign=bottom><div class="text-white" style="width:50px; height:<?= $c*50 ?>px; background:green;  text-align: center;"><?= $c ?></div></td>
        <td valign=bottom><div class="text-white" style="width:50px; height:<?= $t*50 ?>px; background:red; text-align: center;"><?= $t ?></div></td>
        <td valign=bottom><div class="text-white" style="width:50px; height:<?= $s*50 ?>px; background:blue;  text-align: center;"><?= $s ?></div></td>
      </tr>
      
      <tr>
        <th>Lingkaran &nbsp;&nbsp;</th> 
        <th>Segitiga &nbsp;&nbsp;</th> 
        <th>Persegi &nbsp;&nbsp;</th>
      </tr>

      <tr>
      <th><?= round($prcC) ?>% &nbsp;&nbsp;</th> 
        <th><?= round($prcT) ?>% &nbsp;&nbsp;</th> 
        <th><?= round($prcS) ?>% &nbsp;&nbsp;</th>
      </tr>
      </table>

      <hr>

      <div class="row text-center mb-5">
        <div class="col-lg-4">
          <div class="card py-3">
          Total Perhitungan : 
          <?= $total ?>
          </div>
          
        </div>

        <div class="col-lg-4">
          <div class="card py-3"> 
          <?php
          foreach($data as $index => $val){
            if($val == $max){
              echo $index . " : ". $val;
            }
          }
          ?>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card py-3"> 
          <?php
          foreach($data as $index => $val){
            if($val == $min){
              echo $index . " : ". $val;
            }
          }
          ?>
          </div>
        </div>

      </div>
    </div>

<?php

include "partials/footer.php";

?>