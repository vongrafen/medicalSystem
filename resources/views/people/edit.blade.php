@extends('adminlte::page')

@section('title', 'Cadastro de Pessoas')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

            <ol class="breadcrumb panel-heading">
            <li><a href="{{ route('people.index') }}">People</a></li>
            <li class="active">Editar</li>
            </ol>

                    <form action="{{ route('people.update', $people->id) }}" method="post">
                    {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="name do people" value="{{$people->name}}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do people" value="{{$people->email}}">
                        </div>

                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" class="form-control" placeholder="Endereço do people" value="{{$people->address}}">
                        </div>

                        <button class="btn btn-info">Salvar</button>
                        
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