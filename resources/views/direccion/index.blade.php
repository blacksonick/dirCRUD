@extends('inc.app')
@section('title' ,'| Listado')
@section('contenido')
        @include('inc.sidebar')
        <div class="col-md-8">
            <div class="table-title bg-color-2 py-3 mt-2 mb-3 mr-1">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Listado de <b>Direcciones</b></h2>
                    </div>
                    <div class="col-sm-7">
                        <a href="{{route('direccion.create')}}" class="btn btn-warning float-right" 
                        data-toggle="tooltip" data-placement="bottom" title="Añadir dirección"><i class="fa fa-plus"></i> <span>Añadir dirección</span></a>        
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
                        <th>Ciudad</th>                    
                        <th>Municipio</th>
                        <th>Estado</th>   
                        <th>Parroquia</th>
                        <th>Calle</th>
                        <th>Avenida</th>
                        <th>Nro casa</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($direccion as $dir)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><a href="#">{{ $dir->id_ciudad }}</a></td>
                        <td>{{ $dir->id_municipio }}</td>                        
                        <td>{{ $dir->id_estado }}</td>
                        <td>{{ $dir->id_parroquia }}</td>
                        <td>{{ $dir->calle }}</td>
                        <td>{{ $dir->avenida }}</td>
                        <td>{{ $dir->nro_casa }}</td>
                        <td>
                            <div class="dropdown dropleft" data-toggle="tooltip" data-placement="bottom" title="Acciones">
                                <a class="dropdown-toggle " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-dark fa fa-ellipsis-v fa-md"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLeft">
                                    <button class="btn  btn-info btn-block" data-toggle="modal" data-target="#editarDir{{ $dir->id }}">Editar</button>
                                    <button class="btn  btn-danger btn-block" data-toggle="modal" data-target="#eliminarDir{{ $dir->id }}">Eliminar</button>
                                </div>
                            </div>
                            <!-- MODAL EDITAR-->
                            <div class="modal fade" id="editarDir{{ $dir->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" >Editar dirección!</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fa fa-window-close text-color-8"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('direccion.update', $dir->id) }}" method="POST" name="update_dir">
                                            @csrf
                                            @method('PATCH')

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <strong>Ingrese un estado</strong>
                                                                <input type="text"  name="estado" class="form-control validate" value="{{ $dir->estado }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Ingrese un municipio</strong>
                                                                <input type="text"  name="municipio" class="form-control validate"  value="{{ $dir->municipio }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Ingrese una ciudad</strong>
                                                                <input type="text"  name="ciudad" class="form-control validate" value="{{ $dir->ciudad }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Ingrese una parroquia</strong>
                                                                <input type="text"  name="parroquia" class="form-control validate" value="{{ $dir->parroquia }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <strong>Ingrese un numero de calle</strong>
                                                                <input type="text"  name="calle" class="form-control validate"value="{{ $dir->calle }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Ingrese un numero de avenida</strong>
                                                                <input type="text"  name="avenida" class="form-control validate"  value="{{ $dir->avenida }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Ingrese su numero de casa</strong>
                                                                <input type="text"  name="nro_casa" class="form-control validate"  value="{{ $dir->nro_casa }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL ELIMINAR-->
                            <div class="modal fade" id="eliminarDir{{ $dir->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" >Eliminar <b>dirección</b>!</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fa fa-window-close text-color-8"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Esta seguro en eliminar esta dirección?.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <form action="{{ route('direccion.destroy', $dir->id) }}" method="post">
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