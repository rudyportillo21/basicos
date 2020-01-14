
<body class="container">
	<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#nueAlumno">Nuevo Alumno</button>
	<table border="1" class="table table-dark table-hover">
		<thead>
			<tr>
				<td>N°</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Sexo</td>
				<td>Seccion</td>
				<td>Año</td>
				<td>Eliminar</td>
				<td>Editar</td>
			</tr>
		</thead>
		<tbody>
			<?php $n=1; foreach ($alumno as $val) { ?>


				<tr>
					<td><?= $n;  ?></td>
					<td><?= $val->nombre  ?></td>
					<td><?= $val->apellido ?></td>
					<td><?= $val->sexo ?></td>
					<td><?= $val->seccion ?></td>
					<td><?= $val->anio ?></td>
					<td><a href="<?= base_url('alumnoC/eliminar/').$val->id_alumno ?>" onclick="return confirm('Esta seguro de eliminar este Alumno')"><button class="btn btn-danger">Eliminar</button></a></td>
					<td><a href="<?= base_url('alumnoC/get_datos/').$val->id_alumno ?>"><button class="btn btn-primary">Editar</button></a></td>
				</tr>
				<?php $n++; } ?>
			</tbody>
		</table>


		<div class="modal" tabindex="-1" role="dialog" id="nueAlumno">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">Nuevo Alumno</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="formAlumno" action="<?= base_url('alumnoC/ingresar') ?>" method="POST" onsubmit="return validar();">
							<input type="hidden" name="id_alumno" id="id">
							<div>
								<label>Nombre</label>
								<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del alumno..." maxlength="30">
							</div>
							<div>
								<label>Apellido</label>
								<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido del alumno..." maxlength="30">
							</div>
							<div>
								<label>Sexo</label>
								<select id="sexo" name="sexo" class="form-control">
									<option value="">Seleccione un sexo</option>
									<?php foreach ($sexo as $va) {  ?>
										<option value="<?= $va->id_sexo ?>"><?= $va->sexo ?></option>
									<?php }  ?>
								</select>
							</div>
							<div>
								<label>Seccion</label>
								<select id="seccion" name="seccion" class="form-control">
									<option value="">Seleccione un seccion</option>
									<?php foreach ($seccion as $va) {  ?>
										<option value="<?= $va->id_seccion ?>"><?= $va->seccion ?></option>
									<?php }  ?>
								</select>
							</div>
							<div>
								<label>Año</label>
								<input type="text" name="anio" id="anio" class="form-control" placeholder="Ingrese el año..." maxlength="4">
							</div>

						</div>
						<div class="modal-footer">
							<input type="submit" name="INGRESAR" value="INGRESAR" class="btn btn-primary">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

						</div>
					</form>
				</div>
			</div>
		</div>
		<?php if(isset($msj)){
			if($msj=="eli"){
				header('refresh: 2; url=http://localhost/basico/alumnoC/');?>
				<script>
					alertify.notify('Eliminado exitosamente','success',2,null);
				</script>
			<?php } if($msj=="add"){
				header('refresh: 2; url=http://localhost/basico/alumnoC/');?>
				<script>
					alertify.notify('Ingresado exitosamente','success',2,null);
				</script>
			<?php } if($msj=="edi"){
				header('refresh: 2; url=http://localhost/basico/alumnoC/');?>
				<script>
					alertify.notify('Actualizado exitosamente','success',2,null);
				</script>
			<?php } if($msj==false){
				header('refresh: 2; url=http://localhost/basico/alumnoC/');?>
				<script>
					alertify.notify('Error, Ocurrio un conflicto!!!','error',2,null);
				</script>
			<?php } } ?>

			<script>
				function validar(){
					var nombre = document.getElementById("nombre").value;
					var apellido = document.getElementById("apellido").value;
					var sexo = document.getElementById("sexo").selectedIndex;
					var seccion = document.getElementById("seccion").selectedIndex;
					var anio = document.getElementById("anio").value;

					if(nombre.length==0 || nombre.length>30){
						document.getElementById("nombre").style.borderColor="red";
						document.getElementById("nombre").placeholder="Campo obligatorio";
						document.getElementById("nombre").style.boxShadow="0 0 5px red";
						return false;	
					}else{
						document.getElementById("nombre").style.borderColor="green";
						document.getElementById("nombre").style.boxShadow="0 0 5px green";
					}


					if(apellido.length==0 || apellido.length>30){
						document.getElementById("apellido").style.borderColor="red";
						document.getElementById("apellido").placeholder="Campo obligatorio";
						document.getElementById("apellido").style.boxShadow="0 0 5px red";
						return false;
					}else{
						document.getElementById("apellido").style.borderColor="green";
						document.getElementById("apellido").style.boxShadow="0 0 5px green";
					}


					if(sexo==''){
						document.getElementById("sexo").style.borderColor="red";
						document.getElementById("sexo").style.boxShadow="0 0 5px red";
						return false;	
					}else{
						document.getElementById("sexo").style.borderColor="green";
						document.getElementById("sexo").style.boxShadow="0 0 5px green";
					}

					if(seccion==''){
						document.getElementById("seccion").style.borderColor="red";
						document.getElementById("seccion").style.boxShadow="0 0 5px red";
						return false;	
					}else{
						document.getElementById("seccion").style.borderColor="green";
						document.getElementById("seccion").style.boxShadow="0 0 5px green";
					}

					if(anio.length==''){
						document.getElementById("anio").style.borderColor="red";
						document.getElementById("anio").placeholder="Campo obligatorio";
						document.getElementById("anio").style.boxShadow="0 0 5px red";
						return false;
					}else{
						document.getElementById("anio").style.borderColor="green";
						document.getElementById("anio").style.boxShadow="0 0 5px green";
					}

					return true;

				}



			</script>
