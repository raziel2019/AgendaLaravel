@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<br>
<div class="container-fluid mt--7" style="">
    <div class="card bg-white shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h1 class="mb-0">{{ __('Agregar Usuarios') }}</h1>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('usuarios.store' ) }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('post')

                <h6 class="heading-small text-muted mb-4">{{ __('Ingrese datos del Usuarios') }}</h6>
                
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-status">{{ __('Nombre') }}</label>
                        <input type="text" name="name" id="input-status" class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="" required>

                        @if ($errors->has('nombre'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>

                  

                    <div class="form-group{{ $errors->has('  	email   ') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-status">{{ __('  	Email  ') }}</label>
                        <input type="email" name="email" id="input-status" class="form-control form-control-alternative{{ $errors->has(' 	email ') ? ' is-invalid' : '' }}" placeholder="{{ __(' 	email ') }}" value="" required>

                        @if ($errors->has(' 	email  '))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first(' 	email  ') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('  	password   ') ? ' has-danger' : '' }}">
                        <label class="form-control-label" for="input-status">{{ __('  	Password  ') }}</label>
                        <input type="password" name="password" id="input-status" class="form-control form-control-alternative{{ $errors->has(' 	password ') ? ' is-invalid' : '' }}" placeholder="{{ __(' 	password ') }}" value="" required>

                        @if ($errors->has(' 	password  '))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first(' 	password  ') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 center">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Guardar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>
@endsection
