@extends('inc.app')
@section('title' ,'| Listado de estados')
@section('contenido')
        @include('inc.sidebar')
        <div class="col-md-9">
            <div class="card mb-3">
                <div class="card-header bg-color-2 text-white">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Listado de <b>estados</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('estado.create')}}" class="btn btn-warning float-right" 
                        data-toggle="tooltip" data-placement="bottom" title="Añadir estado"><i class="fa fa-plus"></i> <span>Añadir estado</span></a>        
                        </div>
                    </div>
                </div>
            </div>
            @if( session('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if( session('error') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif  
            <table class="table table-hover table-responsive-md">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($estados as $estado)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $estado->estado }}</td>
                        <td>
                            <div class="dropdown dropleft" data-toggle="tooltip" data-placement="bottom" title="Acciones">
                                <a class="dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-dark fa fa-ellipsis-v fa-md"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLeft">
                                    <a class="btn  btn-info btn-block" href="{{ route('estado.edit', $estado->id) }}">Editar</a>
                                    <button class="btn  btn-danger btn-block" data-toggle="modal" data-target="#eliminarEstado{{ $estado->id }}">Eliminar</button>
                                </div>
                            </div>
                            <!-- MODAL ELIMINAR-->
                            <div class="modal fade" id="eliminarEstado{{ $estado->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" >Eliminar <b>dirección</b>!</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fa fa-window-close text-color-8"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Esta seguro en eliminar este estado?.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('estado.destroy', $estado->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection