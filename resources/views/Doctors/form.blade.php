<!-- @extends('adminlte::page')

@section('title', $title)

@section('content_header')
    @include('admin.partials.contentHeader')
@stop

@section('content')
	@include('admin.partials.alert') -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Formulário de cadastro</h3>
                </div>
                <div class="box-body">
				@if (isset($data))
            		{!! Form::model($data, ['route' => $routeForm, 'method' => 'PUT', 'class' => 'form']) !!}
            	@else
            		{!! Form::open(['method' => 'POST', 'class' => 'form', 'route' => $routeForm]) !!}
            	@endif
	            	<div class="row">
						@if (isset($data->id) and $data->id === \Auth::user()->id)
							<div class="col-md-12">
								<h4>{!! Form::label('Seus Dados') !!}</h4>
							</div>
						@endif
						<div class="col-md-6 form-group @if($errors->first('name')) has-error @endif">
							{!! Form::label('name', 'Nome:') !!}
							{!! Form::text('name', (isset($data) ? $data->name : null), ['class' => 'form-control']) !!}
							<small class="text-danger">{{ $errors->first('name') }}</small>
						</div>

						<div class="col-md-6 form-group @if($errors->first('email')) has-error @endif">
							{!! Form::label('email', 'E-mail:') !!}
							{!! Form::text('email', (isset($data) ? $data->email : null), ['class' => 'form-control']) !!}
							<small class="text-danger">{{ $errors->first('email') }}</small>
						</div>
						@if (Auth::user()->hasRole('admin'))
							<div class="col-md-6 form-group">
								{!! Form::label('roles', 'Perfil:') !!}
								{!! Form::select('roles[]', $roles, (isset($data) ? $data->roles : null), array('id' => 'roles','class' => 'form-control select2-multiple','multiple')) !!}
								<small class="text-danger">{{ $errors->first('roles') }}</small>
							</div>
						@endif
							<div class="col-md-6 form-group">
								{!! Form::label('empresa', 'Empresa:') !!}
								<select name="empresa_id[]" class="select_empresa form-control" multiple="multiple">
									<option></option>
									@foreach($empresas as $empresa) 
										<option {{ isset($data->empresa) ? (in_array($empresa->id, $data->empresas) ? 'selected="selected' : '') : ''}} value="{{$empresa->id}}">{{$empresa->cnpj . ' - ' . ($empresa->nome ? $empresa->nome : 'Nome não informado')}}</option> 
									@endforeach
								</select>
								<small class="text-danger">{{ $errors->first('empresa') }}</small>
							</div>
					</div>
					<div class="row">
						@if (isset($data->id) and $data->id === \Auth::user()->id)
							<div class="col-md-12">
								<h4>{!! Form::label('Trocar Senha:') !!}</h4>
							</div>
						@endif
						<div class="col-md-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							{!! Form::label('password', 'Senha:') !!}
							{!! Form::password('password', ['class' => 'form-control']) !!}
							<small class="text-danger">{{ $errors->first('password') }}</small>
						</div>

						<div class="col-md-6 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							{!! Form::label('password_confirmation', 'Confirmar senha:') !!}
							{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
							<small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
						</div>
					</div>
					<div class="box-footer">
						<div class="form-group btn-group pull-left">
							{!! Form::submit("Salvar", ['class' => 'btn btn-primary']) !!}
						</div>
	            	</div>
		        {!! Form::close() !!}
            </div>
        </div>
    </div>
<!-- @stop

@section('js')

	<script>
        $(document).ready(function() {
            $(".select").select2({
                placeholder: "Por Favor selecione uma opção",
                language: "pt-BR"
			});
			$(".select2-multiple").select2({
				placeholder: "Selecione uma ou mais opções",
				language: "pt-BR"
            });
             $(".select_empresa").select2({
				placeholder: "Selecione uma ou mais opções",
				language: "pt-BR"
            });

        });
    </script>

@stop -->