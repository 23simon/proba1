<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $data['titulo']; ?></h1>

</div>

<!-- Content Row -->

<div class="row">
    <?php
    if (isset($data['resultado'])) {
        ?>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Variables pasadas:</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    
                    <?php 
                    echo $data['resultado']; 
                    ?>
                    
                </div>
            </div>
        </div>
    
    
        <?php
    }
    ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo']; ?></h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="./?sec=formulario01" method="post">
                    <!--<form method="get">-->
                   
                     <div class="mb-3">
                        <label for="exampleFormControlInput1">Array numerico</label>
                        <input class="form-control" id="numeros" type="text" name="numeros" placeholder="Introduzca un array" value="<?php echo isset($data[S_POST]['numeros']) ? $data[S_POST]['numeros'] : ""; ?>">
                        <?php
                        if(isset($data['errors']) && isset($data['errors']['numeros'])){
                           ?>
                        <p class="text-danger"><small><?php echo $data['errors']['numeros']; ?></small></p>
                            <?php
                        }
                        ?>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Seleccion ejercicio</label>
                        <select class="form-control" id="select" name="select">
                            <option value="0" <?php echo $data[S_POST]['select'] === "0" ? 'selected' : ""; ?>>Elije ejercicio</option>
                            <option value="1" <?php echo $data[S_POST]['select'] === "1" ? 'selected' : ""; ?>>1</option>
                            <option value="2" <?php echo $data[S_POST]['select'] === "2" ? 'selected' : ""; ?>>2</option>
                            <option value="3" <?php echo $data[S_POST]['select'] === "3" ? 'selected' : ""; ?>>3</option>
                            <option value="4" <?php echo $data[S_POST]['select'] === "4" ? 'selected' : ""; ?>>4</option>
                            <option value="5" <?php echo $data[S_POST]['select'] === "5" ? 'selected' : ""; ?>>5</option>
                            <option value="6" <?php echo $data[S_POST]['select'] === "6" ? 'selected' : ""; ?>>6</option>
                        </select>
                        
                        <?php
                        if(isset($data['errors']) && isset($data['errors']['select'])){
                           ?>
                        <p class="text-danger"><small><?php echo $data['errors']['select']; ?></small></p>
                            <?php
                        }
                        ?>
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="submit" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>

