@extends('adminlte::page')

@section('title', 'Cadastro de Equipamentos')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Equipamentos</h3>
</div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

            <ol class="breadcrumb panel-heading" >
            <li><a style="font-size:110%" href="{{ route('equipament.index') }}"><b>Equipamentos</b></a></li>
            <li class="active" style="font-size:110%">Adicionar</li>
            </ol>

                    <form action="{{ route('equipament.save') }}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do cliente">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group row">
                            <label for="serialnumber" class="col-md-4 col-form-label text-md-right">Número de Série</label>

                            <div class="col-md-6">
                                <input id="serialnumber" type="text" class="form-control{{ $errors->has('serialnumber') ? ' is-invalid' : '' }}" name="serialnumber" value="{{ old('serialnumber') }}" required autofocus>

                                @if ($errors->has('serialnumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serialnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group {{$errors->has('model') ? 'has-error' : '' }}">
                            <label for="model">Serie</label>
                            <input type="text" model="model" class="form-control" placeholder="Nome do cliente">
                        @if($errors->has('model'))
                        <span class="help-block">
                            <strong>{{$errors->first('model')}}</strong>
                        </span>
                        @endif
                        </div> -->

                        <div class="form-group row">
                            <label for="status" class="col-md-1 control-label">Status</label>
                            <div name="status" class="col-md-3" value="{{ old('status') }}" required autofocus>
                            <select  class="form-control"  id="status" data-placeholder="Selecione">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                            @if ($errors->has('ativo'))
                            <span class="help-block">{{ $errors->first('ativo') }}</span>
                            @endif
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="description">Descrição</label>
                        <br>
                            <textarea for="description" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group {{$errors->has('servicestype    ') ? 'has-error' : '' }}">
                            <label for="servicestype   ">servicestypeo</label>
                            <input type="text" servicestype    ="servicestype    " class="form-control" placeholder="Nome do cliente">
                        @if($errors->has('servicestype     '))
                        <span class="help-block">
                            <strong>{{$errors->first('servicestype     ')}}</strong>
                        </span>
                        @endif
                        </div>

                        </div>
                        <button class="btn btn-info">Adicionar</button>
                    </form>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@stop

