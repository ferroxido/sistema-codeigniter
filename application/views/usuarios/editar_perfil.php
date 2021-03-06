<div class="col-md-8">
	<div id="datos_editables">
		<legend>Edición de Perfil</legend>
		
		<?= form_open('usuarios/editando_perfil', array('class'=>'form-horizontal formulario')); ?>
		<fieldset>
		<div>
			<?= my_validation_errors(validation_errors()); ?>
			<?= my_mensaje_upload($mostrar,$error); ?>
			<div class="row">
				<div class="form-group">
					<?= form_hidden('dni', $registro->dni); ?>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<?= form_label('Nombre: ', 'nombre', array('class'=>'col-md-3 control-label')); ?>
					<div class="col-md-8">
						<?= form_input(array('class'=>'form-control','type'=>'text', 'name'=>'nombre', 'id'=>'nombre','value'=>$registro->nombre)); ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<?= form_label('Email: ', 'email', array('class'=>'col-md-3 control-label')); ?>
					<div class="col-md-8">
						<?= form_input(array('class'=>'form-control','type'=>'text', 'name'=>'email', 'id'=>'email','value'=>$registro->email)); ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<?= form_label('Provincia: ', 'id_provincia', array('class'=>'col-md-3 control-label')); ?>
					<div class="col-md-8">
						<?= form_dropdown('id_provincia', $provincias, $registro->id_provincia, "class='form-control'"); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-7">
					<?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-success glyphicon glyphicon-ok')); ?>
					<?= my_volver_editar_perfil(); ?>		
				</div>
			</div>
		</div>
		</fieldset>	
		<?= form_close(); ?>
	</div>
</div>

<!-- Agregamos esta archivo para poder subir la foto -->
<script src="<?= base_url('js/cambiar-foto.js'); ?>"></script>