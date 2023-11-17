<?php headerHome($data); ?>

<style type="text/css">
  #formSolicitud fieldset:not(:first-of-type) {
    display: none;
  }

  .divformSolicitud{
	margin-top: 40px;
	width: 70%;
	margin-left:15%; 
  }
  .divtit{
	  margin-top:100px;
  }
  .progress{
	  margin-top: 50px;
	  margin-bottom:2%;
  }
  .titprogress{
	  text-align:center;
  }

  .previous{
	  margin-top:35px;
	  margin-left:35%;
  }
  .next{
	margin-top:35px;
  }

  .empezar{
	margin-left:40%;
	margin-top: 20%;
  }




  
</style>

<div class="container">
  	<div class="divtit">
	  <h1 class= "titprogress">Registro de usuarios</h1>
	</div>

	<div class="divformSolicitud">
		<div class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<form id="formSolicitud" method="post">

			<fieldset>
				<input type="button" class="next btn btn-primary btn-lg empezar" value="Empezar" />
			</fieldset>

			<fieldset>
				<div class="card-style mb-30">
                  <h6 class="mb-25">Ingresa tu RFC</h6>
				  <div class="input-style-3">
						<input type="text" class="form-control" name="txtPuesto" id="txtPuesto" placeholder="Puesto a Postularse">
						<span class="icon"><i class="lni lni-user"></i></span>
					</div>
					<!-- end input -->
                  <div class="input-style-3">
                    <input type="text" class="form-control" id="txtRfc" name="txtRfc" placeholder="RFC">
                    <span class="icon"><i class="lni lni-user"></i></span>
                  </div>
                  <!-- end input -->
                </div>
				<input type="button" name="previous" class="previous btn btn-secondary btn-lg me-md-2" value="Previo" />
				<input type="button" class="next btn btn-primary btn-lg" value="Siguiente" />
			</fieldset>

			<fieldset>
				<div class="card-style mb-30">
					<h6 class="mb-25">Ingresa Tus Datos</h6>
					<div class="input-style-3">
						<input type="text"  class="form-control" name="txtNombre" id="txtNombre"  placeholder="Nombre Completo">
						<span class="icon"><i class="lni lni-user"></i></span>
					</div>
					<!-- end input -->
					<div class="input-style-3">
						<input type="text" class="form-control" name="txtApellidoP" id="txtApellidoP" placeholder="Apellido Paterno">
						<span class="icon"><i class="lni lni-user"></i></span>
					</div>
					<!-- end input -->
					<div class="input-style-3">
						<input type="text"  class="form-control" name="txtApellidoM" id="txtApellidoM" placeholder="Apellido Materno">
						<span class="icon"><i class="lni lni-user"></i></span>
					</div>
					<!-- end input -->
				</div>
				<input type="button" name="previous" class="previous btn btn-secondary btn-lg me-md-2" value="Previo" />
				<input type="button" class="next btn btn-primary btn-lg" value="Siguiente" />
			</fieldset>

			<fieldset>
				<div class="card-style mb-30">
					<h6 class="mb-25">Ingresa Tus Datos de Contacto</h6>
					<div class="input-style-3">
						<input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion">
						<span class="icon"><i class="lni lni-user"></i></span>
					</div>
					<!-- end input -->
					<div class="input-style-3">
						<input type="text" class="form-control" id="intmob" name="intmob" placeholder="Numero Celular">
						<span class="icon"><i class="lni lni-user"></i></span>
					</div>
					<!-- end input -->
					<div class="input-style-3">
						<input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Correo">
						<span class="icon"><i class="lni lni-user"></i></span>
					</div>
					<!-- end input -->
				</div>			
				<input type="button" name="previous" class="previous btn btn-secondary btn-lg" value="Previo" />
				<input type="button" class="next btn btn-primary btn-lg" value="Siguiente" />
			</fieldset>

			<fieldset>
				<div class="card-style mb-30">
                  <h6 class="mb-25">Ingresa tu CV</h6>
                  <div class="input-style-2">
                    <input type="file" accept=".doc, .docx,.pdf" class="form-control" id="txtFile" name="txtFile" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <span class="icon"><i class="lni lni-add-files"></i></span>
                  </div>
                  <!-- end input -->
                </div>
				<input type="button" name="previous" class="previous btn btn-secondary btn-lg" value="Previo" />
				<input type="submit" name="submit" class="next btn btn-success btn-lg" value="Enviar" id="submit_data" />
			</fieldset>

		</form>
	</div>
</div>
	<script src="<?=media();?>/js/progress.js"></script>

    <script src="<?=media();?>/js/functions_fsolicitud.js"></script>

<?php footerHome($data); ?>
