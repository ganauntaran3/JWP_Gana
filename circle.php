<?php
include "partials/header.php";
include "partials/navbar.php";
?>

<div class="container">

<div class="row">
    <div class="col-lg-12">
        <form class="mt-3" action="shape/action.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jari - jari (cm)</label>
            <input type="number" class="form-control" name="r" id="exampleFormControlInput1" placeholder="Masukkan jari - jari">
           
        </div>

         
        <button type="submit" name="circle" class="btn btn-primary">Hitung</button>
        </form>
    </div>
</div>

<table class="table mt-5">
        <thead>
        <tr>
        <th>Jari - jari</th>
        <th>Luas</th>
        <th>Create at</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $json = file_get_contents('shape/circle.json');
            $data = json_decode($json,true);
            if ($data !== null && !empty($data)) :
            foreach ($data as $key =>$v) { 
                $sort[$key] = strtotime($v['create_at']); 
            } 
            array_multisort($sort,SORT_DESC,$data); 
                $i=1; 
                foreach ($data as $row): 
            ?>
            <tr>
                <td><?= $row["r"] ?></td>
                <td><?= $row["luas"] ?></td>
                <td><?= $row["create_at"] ?></td>
                <td>
                    <form action="shape/action.php" method="GET">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" >
                        <button name="deleteC" class="btn btn-danger text-white" type="submit">Delete</button>
                    </form>
                </td>
            </tr>


            <?php 
                endforeach;
            endif;
            ?>
        </tbody>
        
    </table>
</div>



    <?php
    include "partials/footer.php";
    ?>