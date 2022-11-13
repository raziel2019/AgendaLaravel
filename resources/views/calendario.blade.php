@extends('adminlte::page')
@extends('layouts.app')
@section('title', 'Dashboard')
@section('content_header')
@section('content')

<br>

<div class="container">
    <div id="agenda"></div>
</div>


<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="eventoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eventoLabel">Agenda de Eventos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form  id="form1"action="">
                @csrf

                <div class="form-group d-none">
                  <label for="id">ID:</label>
                  <input type="text"
                    class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Help text</small>
                </div>

                    <div class="form-group">
                      <label for="title">Titulo</label>
                      <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
                    </div>
                <div class="form-group">
                  <label for="descripcion">Tipo de Evento</label>
                  <select class="form-select" name="descripcion" id="descripcion" aria-label="Default select example">
                  @foreach ($evento as $event)
                                <option value="{{$event->id}}">{{$event->descripcion}}</option>
                  @endforeach
                </select>
                </div>

                <div class="form-group">
                  <label for="start"></label>
                  <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">

                </div>

                <div class="form-group">
                  <label for="end"></label>
                  <input type="date"
                    class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">

                </div>

                </form>
            </div>
            <div class="modal-footer">

            <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
            <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>

@endsection



