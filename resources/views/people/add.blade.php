<<<<<<< HEAD
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="container">
=======
﻿@extends('adminlte::page')

@section('title', 'Cadastro de Pessoas')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Pessoas</h3>
 </div>
>>>>>>> master
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

<<<<<<< HEAD
            <ol class="breadcrumb panel-heading">
            <li><a href="{{ route('people.index') }}">Pessoas</a></li>
            <li class="active">Adicionar</li>
=======
            <ol class="breadcrumb panel-heading" >
            <li><a style="font-size:110%" href="{{ route('people.index') }}"><b>Pessoas</b></a></li>
            <li class="active" style="font-size:110%">Adicionar</li>
>>>>>>> master
            </ol>

                    <form action="{{ route('people.save') }}" method="post">
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

                        <div class="form-group {{$errors->has('birthdate') ? 'has-error' : '' }}">
                            <label for="birthdate">Data de nascimento</label>
                            <input type="text" name="birthdate" class="form-control" placeholder="Data de nascimento">
                        @if($errors->has('birthdate'))
                        <span class="help-block">
                            <strong>{{$errors->first('birthdate')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('genre') ? 'has-error' : '' }}">
                            <label for="genre">Genêro</label>
                            <input type="text" name="genre" class="form-control" placeholder="Genêro">
                        @if($errors->has('genre'))
                        <span class="help-block">
                            <strong>{{$errors->first('genre')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('cpf') ? 'has-error' : '' }}">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00">
                        @if($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{$errors->first('cpf')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('RG') ? 'has-error' : '' }}">
                            <label for="RG">RG</label>
                            <input type="text" name="RG" class="form-control" placeholder="0000000000">
                        @if($errors->has('RG'))
                        <span class="help-block">
                            <strong>{{$errors->first('RG')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" class="form-control" placeholder="Endereço do cliente">
                            @if($errors->has('address'))
                        <span class="help-block">
                            <strong>{{$errors->first('address')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('number') ? 'has-error' : '' }}">
                            <label for="number">Número</label>
                            <input type="text" name="number" class="form-control" placeholder="Número residência">
                        @if($errors->has('number'))
                        <span class="help-block">
                            <strong>{{$errors->first('number')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('district') ? 'has-error' : '' }}">
                            <label for="district">Bairro</label>
                            <input type="text" name="district" class="form-control" placeholder="Bairro">
                        @if($errors->has('district'))
                        <span class="help-block">
                            <strong>{{$errors->first('district')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('telephone') ? 'has-error' : '' }}">
                            <label for="telephone">Telefone</label>
                            <input type="text" name="telephone" class="form-control" placeholder="Telefone do cliente">
                        @if($errors->has('telephone'))
                        <span class="help-block">
                            <strong>{{$errors->first('telephone')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do cliente">
                            @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('obs') ? 'has-error' : '' }}">
                            <label for="obs">Observação</label>
                            <input type="obs" name="obs" class="form-control" placeholder="Observação">
                            @if($errors->has('obs'))
                        <span class="help-block">
                            <strong>{{$errors->first('obs')}}</strong>
                        </span>
                        @endif
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

<<<<<<< HEAD
=======
@stop

>>>>>>> master
