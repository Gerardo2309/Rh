<?php headerAdmin($data); ?>
<!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <?php headerMenu($data); ?>
      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="titlemb-30">
                  <h2><?= $data['page_title']?></h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Page
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Tabla <?=$data['page_title']?></h6>
                  <div class="table-responsive">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                      <div class="dataTable-container">
                        <table class="table " style="width: 100%;" id="tableColaboradores">
                          <thead>
                           <tr>
                            <th ><h6>RFC</h6></th>
                            <th ><h6>NOMBRE</h6></th>
                            <th ><h6>APELLIDOS</h6></th>
                            <th ><h6>PUESTO</h6></th>
                            <th ><h6>TELEFONO</h6></th>
                            <th><h6>Action</h6></th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      <!-- ========== footer start =========== -->
      <?php footerMenu($data); ?>
      <!-- ========== footer end =========== -->
    </main>
<!-- ======== main-wrapper end =========== -->

      <script src="<?=media();?>/js/functions_colaboradores.js"></script>
      

<?php footerAdmin($data); ?>