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
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo']; ?></h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">
                
                <p><?php
                    echo $data['resultado'];
                ?></p>
                <form action="./?sec=aprobadosuspensos" method="post">
                    <!--<form method="get">-->
                   
                     <div class="mb-3">
                         <textarea style="resize:none;" rows="20" cols="50" id="introduccion" name="introduccion" value="<?php echo urlencode(json_encode($data['salida'])); ?>"></textarea>
                         <textarea style="resize:none;" id="id" name="name" rows="20" cols="50"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="submit" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>

