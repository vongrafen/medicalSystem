@extends('adminlte::page')

@section('title', 'Cadastro de Pacientes')

@section('content')
<link rel="stylesheet" href="css/main.css">

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Pacientes</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('cadastrar') }}" method="post" role="form">
      {!! csrf_field() !!}
    <div class="box-body">
        <div class="form-row">
    <div class="col-md-3">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Ex.: João">
    </div>
    <div class="col-md-2">
        <label for="cpf">CPF</label>
        <input type="text" class="form-control" name="cpf" placeholder="Ex.: 00000">
    </div>
    <div class="col-md-2">
        <label for="endereco">Endereço</label>
        <input type="text" class="form-control" name="endereco" placeholder="Ex.: 00000">
    </div>
    </div>
    <div class="box-body">            
        <button type="submit" class="btn btn-primary mb-2">Salvar</button>    
    </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </form>
</div>
@stop