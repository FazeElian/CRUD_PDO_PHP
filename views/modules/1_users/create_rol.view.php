			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO ROL
				</h3>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="?c=Users&a=createRol"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO ROL</a>
					</li>
					<li>
						<a href="?c=Users&a=readRol"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ROLES</a>
					</li>
					<li>
						<a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ROL</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content -->
			<div class="container-fluid">
				<form action="" method="post" class="form-neon" autocomplete="off">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Rol</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-12">
									<div class="form-group">
										<label for="rolName" class="bmd-label-floating">Nombres</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="rolName" id="rolName" maxlength="35">
									</div>
								</div>
							</div>
						</div>
					</fieldset>					
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
					</p>
				</form>
			</div>			