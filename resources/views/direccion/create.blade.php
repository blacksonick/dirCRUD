@extends('inc.app')
@section('title' ,'| Nuevo')
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-title bg-color-2 py-3 mt-2 mb-3">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Registrar una nueva <b>Dirección</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="{{ route('cancelar') }}" class="btn btn-danger float-right" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="fa fa-back"></i> <span>Cancelar</span></a>        
                    </div>
                </div>
            </div>
        </div>
		<div class="col-md-12">
			<form  method="POST" action="{{ route('direccion.store') }}" name="add_product">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<strong>Selecciones un estado de la lista</strong>
							<select id="select_estados" name="estado" class="form-control validate" required>
								<option value="">Selecciones un estado</option>
								@foreach($estados as $estado)
									<option value="{{ $estado->id }}">{{ $estado->estado }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<strong>Selecciones un municipio de la lista</strong>
							<select id="select_municipios" name="municipio" class="form-control validate" required>
							</select>
						</div>
						<div class="form-group">
							<strong>Selecciones una ciudad de la lista</strong>
							<select id="select_ciudades" name="ciudad" class="form-control validate" required>
							</select>
						</div>
						<div class="form-group">
							<strong>Selecciones una parroquia de la lista</strong>
							<select id="select_parroquias" name="parroquia" class="form-control validate" required>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<strong>Ingrese un numero de calle</strong>
							<input type="text"  name="calle" class="form-control validate"required>
						</div>
						<div class="form-group">
							<strong>Ingrese un numero de avenida</strong>
							<input type="text"  name="avenida" class="form-control validate"  required>
						</div>
						<div class="form-group">
							<strong>Ingrese su numero de casa</strong>
							<input type="text"  name="nro_casa" class="form-control validate"  required>
						</div>
					</div>

					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-success btn-block">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
