@extends('layouts.base')
@section('content')
    <div class="content-body">


		<section class="bs-validation">
			<div class="row">
				<!-- Bootstrap Validation -->
				<div class="col-md-6 col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Registro de Usuario</h4>
						</div>
						<div class="card-body">
							
							<form id="formRegistro" action="{{route('Registro')}}">@csrf
								<div class="form-group">
									<label class="form-label" for="">Usuario</label>
									<input type="text" id="usuario" class="form-control" name="name" placeholder="usuario" />
									<p id="estadousuario" style="color: red"></p> 
								</div>
								<div class="form-group">
									<label class="form-label" for="">Nombres</label>
									<input type="text" id="nombres" class="form-control" name="nombres" placeholder="Nombres" />
									<p id="nombres" style="color: red"></p> 
								</div>
								<div class="form-group">
									<label class="form-label" for="">Apellidos</label>
									<input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="apellidos"/>
									<p id="apellidos" style="color: red"></p> 
								</div>
								<div class="form-group">
									<label for="">Rol Usuario</label>
									<select name="rol" id="rol" class="form-control">
										<option value="1">Administrador</option>
										<option value="0">Operador</option>
									</select>
								</div>
		
								<div class="form-group">
									<label class="form-label" for="">Correo</label>
									<input type="email" id="email" name="email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe@email.com" required />
									<p id="estadoemail" style="color: red"></p>
								</div>
								<div class="form-group">
									<label class="form-label" for="">Contraseña</label>
									<input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
								</div>
								<div class="form-group">
									<label for="">Status</label>
									<select name="status" id="status" class="form-control">
										<option value="1">Activo</option>
										<option value="0">Inactivo</option>
									</select>
								</div>
								<div class="row">
									<div class="col-12">
										<button type="submit" class="btn btn-primary btnRegistrar">Registrar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Bootstrap Validation -->
			</div>
		</section>

	</div>
</div>
@endsection


<script>
	

</script>
