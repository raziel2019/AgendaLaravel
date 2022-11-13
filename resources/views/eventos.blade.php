@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@section('content')

<br>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Eventos</h3>
                        </div>
                        <div class="col-4">
                        <!-- Button trigger modal -->
                        <div class="text-right">
                        <button type="button" class="btn btn-sm btn-primary text-right" data-toggle="modal" data-target="#modelId">
                         Agregar Evento
                        </button>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">  Agrega un Evento</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" action="{{ route('Eventos.store' ) }}" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="form-group">
                                    <label for="descripcion">Titulo</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="">

                                    </div>
                                <div class="d-flex flex-row ">
                                    <div class="form-group mr-3">
                                    <label for="backgroundColor">Fondo </label>
                                    <input type="color" class="form-control form-control-color" style="width:125%;"  name="backgroundColor" id="backgroundColor" aria-describedby="helpId" placeholder="">
                                    </div>

                                    <div class="form-group mr-3">
                                    <label for="textColor">Texto</label>
                                    <input type="color" class="form-control form-control-color " style="width:125%;" id="textColor" name="textColor" value="#563d7c" title="Choose your color">

                                    </div>

                                    <div class="form-group mr-3">
                                    <label for="borderColor">Borde</label>
                                    <input type="color" class="form-control form-control-color " style="width:125%;" id="borderColor" name="borderColor" value="#883d7c" title="Choose your color">    
                                    </div>
                                </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Guardar') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fondo</th>
                                <th scope="col">Borde</th>
                                <th scope="col">Texto</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        @foreach ($Eventos as $orden=>$evento)
                    <tbody>
                        <tr>
                <td>{{++$orden}}</td>
                <td>{{$evento->descripcion}}</td>
                <td> <input type="color" value="{{$evento->backgroundColor}}" disabled> {{$evento->backgroundColor}}</td> 
                <td> <input type="color" value="{{$evento->borderColor}}" disabled> {{$evento->borderColor}}</td> 
                <td> <input type="color" value="{{$evento->textColor}}" disabled> {{$evento->textColor}}</td> 
                
                <td class="d-flex">
            
        
                                                    

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#modelEdit{{$evento->id}}">
                          Editar
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modelEdit{{$evento->id}}" tabindex="-1" role="dialog" aria-labelledby="modelEditId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar Evento</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <form action="{{route("Eventos.update", $evento->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                                    <div class="modal-body">

                        <h6 class="heading-small text-muted mb-4">{{ __('Información del Evento') }}</h6>

                        <div class="form-group">
                                    <label for="descripcion">Titulo</label>
                                    <input type="text" name="descripcion" value="{{$evento->descripcion}}" id="descripcion" class="form-control" placeholder="">

                                    </div>
                                <div class="d-flex flex-row ">
                                    <div class="form-group mr-3">
                                    <label for="backgroundColor">Fondo </label>
                                    <input type="color" class="form-control form-control-color"  value="{{$evento->backgroundColor}}" style="width:125%;"  name="backgroundColor" id="backgroundColor" aria-describedby="helpId" placeholder="">
                                    </div>

                                    <div class="form-group mr-3">
                                    <label for="textColor">Texto</label>
                                    <input type="color" class="form-control form-control-color" value="{{$evento->textColor}}" style="width:125%;" id="textColor" name="textColor" value="#563d7c" title="Choose your color">

                                    </div>

                                    <div class="form-group mr-3">
                                    <label for="borderColor">Borde</label>
                                    <input type="color" class="form-control form-control-color " value="{{$evento->borderColor}}" style="width:125%;" id="borderColor" name="borderColor" value="#883d7c" title="Choose your color">    
                                    </div>
                                </div>
               
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Modificar</button>
                                    </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                        <form action="{{route("Eventos.destroy", $evento->id)}}" method="POST"> 
                            @method("DELETE")
                            @csrf
                        <button class="btn btn-secondary btn-sm" type="submit">Eliminar</button>
                       
                        </form>
            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
   </nav>
                    </div>
            </div>
        </div>
        
    </div>
    
</div>

@endsection



