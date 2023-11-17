<?php headerAdmin($data);
getModal('modalAsistencia',$data);
 ?>
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
                  <form id="formSearchAsis" method="POST">
                    <input type="date"id="datini" name="datini" value="<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 15 days"));?>">
                    <input type="date"id="datfin" name="datfin" value="<?php echo date("Y-m-d");?>">
                  </form>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <button id="modalformAsistencia" type="button" onclick="openModal();" class="main-btn primary-btn btn-hover">
                        <i class="lni lni-chevron-left me-2"></i> Subir Asistencia
                      </button>
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
                  <h6 class="mb-10">TABLA DE ASISTENCIA</h6>
                  <div class="table-responsive">
                    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                      <div class="dataTable-container">
                        <table class="table " style="width: 100%;" id="tableAsistencia">
                          <thead>
                           <tr>
                            <th ><h6>NO.RFC</h6></th>
                            <th ><h6>NOMBRE</h6></th>
                            <th ><h6>APELLIDOS</h6></th>
                            <th ><h6>DEPARTAMENTO</h6></th>
                            <th><h6>FECHA</h6></th>
                            <th ><h6>ENTRADA</h6></th>
                            <th><h6>SALIDA</h6></th>
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

      <script src="<?=media();?>/js/functions_asistencia.js"></script>
      

<?php footerAdmin($data); ?>