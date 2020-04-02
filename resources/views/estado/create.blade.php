@extends('inc.app')
@section('title' ,'| Nuevo estado')
@section('contenido')
 @include('inc.sidebar')
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header bg-color-2 text-white">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Registrar un nuevo <b>Estado</b></h2>
                        </div>
                        <div class="col-sm-6">
                           <a href="{{ route('cancelar') }}" class="btn btn-danger float-right" data-toggle="tooltip" data-placement="bottom" title="Cancelar"><i class="fa fa-back"></i> <span>Cancelar</span></a>          
                        </div>
                    </div>
                </div>
            </div>
			<form  method="POST" action="{{ route('estado.store') }}" name="add_estado">
				@csrf
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<strong>Ingrese un estado</strong>
							<input type="text" class="form-control" name="estado" >
						</div>
					</div>

					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-success btn-block">Guardar</button>
					</div>
				</div>
			</form>
	</div>
@endsection
