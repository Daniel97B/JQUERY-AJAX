<!DOCTYPE html>
<html>

<head>
	<title>PHP Jquery Ajax CRUD Example</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script src="miscript.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../../CSS/Index9.css" type="text/css">
	<link rel="stylesheet" href="../../CSS/fontello.css">

	<!-- Creamos una conexion para que se abre aen el puerto 8080/CRUD-Ajax/mysql/-->
	<script type="text/javascript">
		var url = " http://localhost:8080/CRUD-Ajax/mysql/";
	</script>
	<!--Unimos el index con un archivo ajax-->
	<script src="js/item-ajax.js"></script>
</head>

<body>
	<!--Creamos un container donde va toda la informacion-->
	<div class="container-fluid">
		<header class="col-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<!--Columna donde ira el link-->
				<div class="col-5">
					<!-- El imput donde ira el link para regrwesar al inicio -->
					<imput type="checkbox" id="btn-mas">
						<div class="otros">
							<h1 class="text-center">
								<!--Link inicio-->
								<a href="../../index.html" class="icon-home"></a>
								<!--Insertamos la imagen y el texto del header-->
								<img src="../../Img/1045px-Sena_Colombia_logo.svg.png" alt="Sena.png" class="img">
								Ficha:2252471 - JQUERY
							</h1>
						</div>
					</imput>
				</div>
				<!--Columna donde ira El titulo y Ficha del aprendiz -->
				<div class="col-11">
					<h1 class="text-center">


					</h1>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<!--Ceamos el titulo-->
				<div class="pull-left">
					<h2>PHP Jquery Ajax CRUD Example</h2>
				</div>
				<!--Boton para crear registros-->
				<div class="pull-right">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
						Crear Elemento
					</button>
				</div>
			</div>
		</div>

		<!--Tabla donde ira toda la información-->
		<table class="table table-bordered">
			<thead>
				<!--Campos de la tabla-->
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th width="200px">Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>

		<!--Linga para la paginación-->
		
  <ul id="pagination" class="pagination" > </ul>



		<!-- Creacion del modal (Crear)-->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<!-- Header del modal-->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<!--Boton del modal-->
							<span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Crear Elemento</h4>
					</div>
					<!--Container del modal-->
					<div class="modal-body">
						<form data-toggle="validator" action-data="api/create.php" method="POST">

							<!--Creamos cada uno de los campos donde ira la información-->
							<div class="form-group">
								<label class="control-label" for="title">Titulo</label>
								<input type="text" name="title" class="form-control" data-error="Please enter title."
									required />
								<div class="help-block with-errors"></div>
							</div>

							<!--Creamos cada uno de los campos donde ira la información-->
							<div class="form-group">
								<label class="control-label" for="title">Descripcion</label>
								<textarea name="description" class="form-control" data-error="Please enter description."
									required></textarea>
								<div class="help-block with-errors"></div>
							</div>

							<!--Creamos boton para subir campos donde ira la información-->
							<div class="form-group">
								<button type="submit" class="btn crud-submit btn-success">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Creacion del modal (Editar)-->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<!-- Header del modal-->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<!--Boton del modal-->
							<span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">Editar Item</h4>
					</div>

					<!--Container del modal-->
					<div class="modal-body">
						<form data-toggle="validator" action="api/update.php" method="put">
							<input type="hidden" name="id" class="edit-id">

							<!--Creamos cada uno de los campos donde ira la información-->
							<div class="form-group">
								<label class="control-label" for="title">Titulo</label>
								<input type="text" name="title" class="form-control" data-error="Please enter title."
									required />
								<div class="help-block with-errors"></div>
							</div>

							<!--Creamos cada uno de los campos donde ira la información-->
							<div class="form-group">
								<label class="control-label" for="title">Descripcion</label>
								<textarea name="description" class="form-control" data-error="Please enter description."
									required></textarea>
								<div class="help-block with-errors"></div>
							</div>

							<!--Creamos boton para subir campos donde ira la información-->
							<div class="form-group">
								<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>