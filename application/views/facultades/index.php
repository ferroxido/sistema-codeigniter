<div class="page-header">
	<h1>Facultades <small>mantenimiento de registros</small></h1>
</div>

<?= form_open('index.php/facultades/search', array('class' => 'form-search')); ?>
	<div class="row" style="margin:1em 0;">
		<div class="col-md-4">
			<div class="input-group">
	        <input type="text" class="form-control" placeholder="Buscar por nombre" name="buscar" id="buscar">
	        <div class="input-group-btn">
	            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>  
	        </div>
	    </div>
		</div>
		<div class="col-md-4">
			<div class="input-group">
	       		<?= my_boton_permisos('facultades/create', ' Agregar', 'btn btn-primary glyphicon glyphicon-plus'); ?>
	    	</div>
		</div>
	</div>
<?= form_close(); ?>

<div class="tablas-propias">
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th> ID </th>
			<th> Nombre </th>
			<th> Creado </th>
			<th> Modificado </th>
			<th> Edición </th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($registros as $registro): ?>
		<tr>
			<td><?= $registro->id; ?></td>
			<td><?= $registro->nombre; ?></td>
			<td><?= date("d/m/Y - H:i",strtotime($registro->created)); ?></td>
			<td><?= date("d/m/Y - H:i",strtotime($registro->updated)); ?></td>
			<td><a class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="<?= "#myModal".$registro->id ?>"></a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>


<?php foreach ($registros as $registro): ?>
<!-- Modal -->
<div class="modal fade" id="<?= "myModal".$registro->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      	</div>
      	<div class="modal-body">
      		<?= form_open('index.php/facultades/update', array('class'=>'form-horizontal')); ?>
				<legend>Editando una Facultad</legend>

				<?= my_validation_errors(validation_errors()); ?>

				<div class="row">
					<div class="form-group">
						<?= form_label('ID: ', 'id', array('class'=>'col-md-3 control-label')); ?>
						<div class="col-md-4">
							<input class="form-control" type="text" name="id" value="<?= $registro->id; ?>" disabled/>
						</div>
						<?= form_hidden('id', $registro->id); ?>
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<?= form_label('Nombre: ', 'nombre', array('class'=>'col-md-3 control-label')); ?>
						<div class="col-md-4">
							<?= form_input(array('class'=>'form-control','type'=>'text', 'name'=>'nombre', 'id'=>'nombre','value'=>$registro->nombre)); ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<?= form_label('Creado: ', 'created', array('class'=>'col-md-3 control-label')); ?>
						<div class="col-md-4">
							<input class="form-control" type="text" name="created" value="<?= date("d/m/Y - H:i",strtotime($registro->created)); ?>" disabled/>
						</div>	
						<?= form_hidden('created', $registro->created); ?>
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<?= form_label('Actualizado: ', 'updated', array('class'=>'col-md-3 control-label')); ?>
						<div class="col-md-4">
							<input class="form-control" type="text" name="updated" value="<?= date("d/m/Y - H:i",strtotime($registro->updated)); ?>" disabled/>
						</div>
						<?= form_hidden('updated', $registro->updated); ?>
					</div>
				</div>

				<hr>

				<div class="form-group">
					<div class="col-md-offset-2">
						<div class="col-md-10">
							<?= form_button(array('type'=>'submit', 'content'=>' Aceptar', 'class'=>'btn btn-success glyphicon glyphicon-ok')); ?>
							<?= anchor('facultades/index', ' Cancelar',array('class'=>'btn btn-default glyphicon glyphicon-remove')); ?>
						</div>
					</div>
				</div>

			<?= form_close(); ?>
      	</div>
      	<div class="modal-footer">
      	</div>
    	</div>
  	</div>
</div>
<?php endforeach; ?>