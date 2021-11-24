<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $data['titulo']; ?></h1>

</div>

<!-- Content Row -->

<div class="row">
    <?php
    if (DEBUG && isset($data['post'])) {
        ?>
        <div class="col-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Variables pasadas:</h6>                                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php var_dump($data['post']); ?>
                    <?php var_dump($data['sanitized_post']); ?>
                    <?php var_dump($data['errors']); ?>
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

                <form action="./?sec=formulario" method="post">
                    <div class="container-fluid">
                        <div class="row">
                            <!--<form method="get">-->
                            <input type="hidden" name="sec" value="formulario" />
                            <div class="mb-3 col-lg-6">
                                <label for="nombre">Nombre<span class="text-danger">*</span></label>
                                <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Inserte su nombre" value="<?php echo isset($data[S_POST]['nombre']) ? $data[S_POST]['nombre'] : ""; ?>">
                                <?php if(isset($data['errors']) && isset($data['errors']['nombre'])){ ?>
                                <p class="text-danger"><small><?php echo $data['errors']['nombre']; ?></small></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="url">URL<span class="text-danger">*</span></label>
                                <input class="form-control" id="url" type="text" name="url" placeholder="Inserte una URL" value="<?php echo isset($data[S_POST]['url']) ? $data[S_POST]['url'] : ""; ?>">
                                <?php if(isset($data['errors']) && isset($data['errors']['url'])){ ?>
                                <p class="text-danger"><small><?php echo $data['errors']['url']; ?></small></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="email">Correo electrónico<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com" value="<?php echo isset($data[S_POST]['email']) ? $data[S_POST]['email'] : ""; ?>">
                                <?php if(isset($data['errors']) && isset($data['errors']['email'])){ ?>
                                <p class="text-danger"><small><?php echo $data['errors']['email']; ?></small></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="selectnormal">Ejemplo select</label>
                                <select class="form-control" id="selectnormal" name="selectnormal">
                                    <option value="1" <?php echo $data[S_POST]['selectnormal'] === "1" ? 'selected' : ""; ?>>Uno</option>
                                    <option value="2" <?php echo $data[S_POST]['selectnormal'] === "2" ? 'selected' : ""; ?>>Dos</option>
                                    <option value="3" <?php echo $data[S_POST]['selectnormal'] === "3" ? 'selected' : ""; ?>>Tres</option>
                                    <option value="4" <?php echo $data[S_POST]['selectnormal'] === "4" ? 'selected' : ""; ?>>Cuatro</option>
                                    <option value="5" <?php echo $data[S_POST]['selectnormal'] === "5" ? 'selected' : ""; ?>>Cinco</option>
                                </select>
                                <?php if(isset($data['errors']) && isset($data['errors']['selectnormal'])){ ?>
                                <p class="text-danger"><small><?php echo $data['errors']['selectnormal']; ?></small></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="selectmultiple">Ejemplo multiple select</label>
                                <select class="form-control" id="selectmultiple" multiple="" name="selectmultiple[]">
                                    <option value="1" <?php echo in_array("1", $data[S_POST]['selectmultiple']) !== FALSE ? 'selected' : ""; ?>>Uno</option>
                                    <option value="2" <?php echo in_array("2", $data[S_POST]['selectmultiple']) !== FALSE ? 'selected' : ""; ?>>Dos</option>
                                    <option value="3" <?php echo in_array("3", $data[S_POST]['selectmultiple']) !== FALSE ? 'selected' : ""; ?>>Tres</option>
                                    <option value="4" <?php echo in_array("4", $data[S_POST]['selectmultiple']) !== FALSE ? 'selected' : ""; ?>>Cuatro</option>
                                    <option value="5" <?php echo in_array("5", $data[S_POST]['selectmultiple']) !== FALSE ? 'selected' : ""; ?>>Cinco</option>
                                </select>
                                <?php if(isset($data['errors']) && isset($data['errors']['selectmultiple'])){ ?>
                                <p class="text-danger"><small><?php echo $data['errors']['selectmultiple']; ?></small></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-lg-6">
                                <label for="exampleFormControlSelect2">Ejemplo checkbox</label>  
                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="a" name="opcions[]" <?php echo in_array("a", $data[S_POST]['opcions']) !== FALSE ? "checked" : ''; ?>>
                                            <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" id="flexCheckChecked" type="checkbox" value="b" checked" name="opcions[]" <?php echo in_array("b", $data[S_POST]['opcions']) !== FALSE ? "checked" : ''; ?>>
                                            <label class="form-check-label" for="flexCheckChecked">Checked checkbox</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" id="flexCheckDisabled" type="checkbox" value="c" disabled name="opcions[]" <?php echo in_array("c", $data[S_POST]['opcions']) !== FALSE ? "checked" : ''; ?>>
                                            <label class="form-check-label" for="flexCheckDisabled">Disabled checkbox</label>
                                        </div>
                                    </div>
                                </div>
                                <?php if(isset($data['errors']) && isset($data['errors']['opcions'])){ ?>
                                <p class="text-danger"><small><?php echo $data['errors']['opcions']; ?></small></p>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="textarea">Ejemplo textarea</label>
                                <textarea class="form-control" id="textarea" name="textarea" rows="3"><?php echo isset($data['sanitized_post']['textarea']) ? $data['sanitized_post']['textarea'] : ''; ?></textarea>
                            </div>
                            <div class="mb-3 col-lg-12">
                                <label for="summernote">Ejemplo textarea enriquecido</label>
                                <textarea class="form-control" id="summernote" name="summernote"><?php echo isset($data['sanitized_post']['summernote']) ? $data['sanitized_post']['summernote'] : ''; ?></textarea>
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

