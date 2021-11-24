
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $data['titulo']; ?></h1>

</div>

<!-- Content Row -->

<div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Variables pasadas:</h6>  
                </div>
                <div class="mb-3 col-lg-12">
                    <p>
                        <?php
                        echo $data['resultado']['nombre'];
                        ?>
                    </p>
                    <p>
                        <?php
                        echo $data['resultado']['pass'];
                        ?>
                    </p>
                    <p>
                        <?php
                        echo $data['resultado']['passConfirm'];
                        ?>
                    </p>
                    <p>
                        <?php
                        echo $data['resultado']['email'];
                        ?>
                    </p>
                    <p>
                        <?php
                        echo $data['resultado']['estudios'];
                        ?>
                    </p>
                </div>
                   
            </div>
        </div>
      
    <div class="col-12">
        <div class="card shadow mb-4">
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $data['div_titulo']; ?></h6>                                    
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <form action="./?sec=login" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <!--<form method="get">-->
                            <div class="mb-3 col-lg-12">
                                <p>
                                    <label>Nombre</label>
                                    <input type="text" id="name" name="nombre">
                                </p>
                                <?php
                                    echo $data['errors']['nombre'];
                                ?>
                                <p>
                                    <label>Contraseña</label>
                                    <input type="password" id="pass" name="pass">
                                </p>
                                <?php
                                    echo $data['errors']['pass'];
                                ?>
                                <p>
                                    <label>Confirmar contraseña</label>
                                    <input type="password" id="passConfirm" name="passConfirm">
                                </p>
                                <?php
                                    echo $data['errors']['passConfirm'];
                                ?>
                                <p>
                                    <label>Email</label>
                                    <input type="email" id="email" name="email">
                                </p>
                                <?php
                                    echo $data['errors']['email'];
                                ?>
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label>Estudio superior cursado</label>
                                <br>
                                <select id="estudios" name="estudios">
                                    <option value="0">Sin estudios</option>
                                    <option value="1">Primaria</option>
                                    <option value="2">Secundaria</option>
                                    <option value="3">FP</option>
                                    <option value="4">Universidad</option>
                                </select>
                                <?php
                                    echo $data['errors']['estudios'];
                                ?>
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label>Fecha de nacimiento</label>
                                <br>
                                
                                <input type="date" name="fecha">
                            </div>
                            <div class="mb-3 col-lg-12">
                                <input type="submit" value="Enviar" name="submit" class="btn btn-primary"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>                        
</div>