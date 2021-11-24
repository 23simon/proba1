<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $data['titulo']; ?></h1>

</div>

<!-- Content Row -->

<div class="row">
    
        <div class="col-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Bingo</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table>
                        <tr>
                        <?php 
                            $array=$data['cartulina'];
                            for ($i = 0; $i < count($array); $i++) {
                               if($i%5==0){
                                   echo "</tr><tr>";
                               }
                               echo '<td style="width : 50px;">' . $array[$i] ."</td>";
                            }
                        ?>
                        <tr>
                    </table>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
   
</div>
<div class="row">
    <?php
    if (isset($data['salida'])) {
        ?>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Bingo</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        <?php
                        echo $data['salida'];
                        ?>
                </div>
                <div>
                    
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bingo</h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                  <form action="./?sec=bingo" method="post">
                        <input type="hidden" name="salida" value="<?php echo urlencode(json_encode($data['salida'])); ?>">
                        <input type="hidden" name="carton" value="<?php echo urlencode(json_encode($data['carton'])); ?>">
                        <input type="submit" value="Bola" name="bola" class="btn btn-primary"/>
                        <input type="submit" value="Iniciar" name="iniciar" class="btn btn-primary"/>
                  </form>
            </div>
        </div>
    </div>
</div>

