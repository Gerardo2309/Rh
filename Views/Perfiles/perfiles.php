<?php headerAdmin($data); ?>
<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">
    <!-- ========== header start ========== -->
    <?php headerMenu($data); ?>
    <!-- ========== header end ========== -->
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="titlemb-30">
                            <h2>Profile</h2>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');


            .container {
                max-width: 1000px;
                padding: 0
            }

            p {
                margin: 0
            }

            .d-flex a {
                text-decoration: none;
                color: #686868
            }
            .rowperfil{
              border-radius: 5%;
            }
            .photo {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                object-fit: cover
            }

            .fab.fa-twitter {
                color: #8ab7f1
            }

            .fab.fa-instagram {
                color: #E1306C
            }

            .fab.fa-facebook-f {
                color: #5999ec
            }
            </style>


            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-12 bg-white p-0 px-3 py-3 mb-3 rowperfil" >
                                <div class="d-flex flex-column align-items-center"> <img class="photo"
                                        src="<?= media()."/archivos/". $data['perfil']; ?>" alt="">
                                    <div class="update-image">
                                        <form enctype="multipart/form-data" id="formFotoperfil" method="post">
                                            <input type="hidden" id="txtRfc" name="txtRfc"
                                                value="<?=  $data['idtrabajador']; ?>">
                                            <input type="file" id="txtFotop" name="txtFotop" accept="image/*">
                                            <label for=""><i class="lni lni-camera"></i></label>
                                        </form>
                                    </div>
                                    <p class="fw-bold h4 mt-3"><?=  $data['nombres']; ?></p>
                                    <p class="text-muted"><?=  $data['puesto']; ?></p>
                                    <p class="text-muted mb-3"><?=  $data['sucursal']; ?></p>
                                    <div class="d-flex ">
                                        <div class="btn btn-primary follow me-2">Editar</div>
                                        <div class="btn btn-outline-primary message">Dar De Baja</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 bg-white p-0 px-2 pb-3 mb-3 rowperfil">
                                <div class="d-flex justify-content-between border-bottom py-2 px-3">
                                    <p><span class="fas fa-globe me-2"></span>Curriculum</p> <a
                                        href="http://<?= $_SERVER['HTTP_HOST']."/rh/assets/archivos/".$data['doc2']?>">Abrir</a>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2 px-3">
                                    <p><span class="fab fa-github-alt me-2"></span>Contrato</p> <a
                                        href="http://<?= $_SERVER['HTTP_HOST'].$data['doc2']?>">Abrir</a>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2 px-3">
                                    <p><span class="fab fa-twitter me-2"></span>Acta de nacimiento</p> <a
                                        href="http://<?= $_SERVER['HTTP_HOST'].$data['doc3']?>">Abrir</a>
                                </div>
                                <div class="d-flex justify-content-between border-bottom py-2 px-3">
                                    <p><span class="fab fa-instagram me-2"></span>Curp</p> <a
                                        href="http://<?= $_SERVER['HTTP_HOST'].$data['doc4']?>">Abrir</a>
                                </div>
                                <div class="d-flex justify-content-between py-2 px-3">
                                    <p><span class="fab fa-facebook-f me-2"></span>RFC</p> <a
                                        href="http://<?= $_SERVER['HTTP_HOST'].$data['doc5']?>">Abrir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 ps-md-4">
                        <div class="row">
                            <div class="col-12 bg-white px-3 mb-3 pb-3 rowperfil">
                                <div class="d-flex align-items-center justify-content-between border-bottom">
                                    <p class="py-2">Full Name</p>
                                    <p class="py-2 text-muted"> <?= $data['apellidos'];?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom">
                                    <p class="py-2">Email</p>
                                    <p class="py-2 text-muted"><?=  $data['correo']; ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom">
                                    <p class="py-2">RFC</p>
                                    <p class="py-2 text-muted"><?=  $data['idtrabajador']; ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between border-bottom">
                                    <p class="py-2">Mobile</p>
                                    <p class="py-2 text-muted"><?=  $data['telefono']; ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="py-2">Address</p>
                                    <p class="py-2 text-muted"><?=  $data['direccion']; ?></p>
                                </div>
                            </div>
                            <div class="col-12 bg-white px-3 pb-2 rowperfil">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end container -->
    </section>

    <!-- ========== footer start =========== -->
    <?php footerMenu($data); ?>
    <!-- ========== footer end =========== -->
</main>
<!-- ======== main-wrapper end =========== -->

<script src="<?=media();?>/js/functions_perfiles.js"></script>



<?php footerAdmin($data); ?>