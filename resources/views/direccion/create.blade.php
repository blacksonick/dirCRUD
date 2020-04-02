@extends('inc.app')
@section('title' ,'| Nueva dirección')
@section('contenido')
 @include('inc.sidebar')
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header bg-color-2 text-white">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Editar de <b>Dirección</b></h2>
                        </div>
                        <div class="col-sm-6">
                           <a href="{{ route('cancelar') }}" class="btn btn-danger float-right" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="fa fa-back"></i> <span>Cancelar</span></a>          
                        </div>
                    </div>
                </div>
            </div>
			<form  method="POST" action="{{ route('direccion.store') }}" name="add_product">
				@csrf
				<div class="row">
					<div class="col-md-12">
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
@endsection
