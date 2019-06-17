@extends('adminlte::page')

@section('title', 'Cadastro de Usuários')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Usuários</h3>
 </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

            <ol class="breadcrumb panel-heading" >
            <li><a style="font-size:110%" href="{{ URL::previous() }}"><b>Usuários</b></a></li>
            <li class="active" style="font-size:110%">Adicionar</li>
            </ol>

                    <form action="{{ route('User.save') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}


                        <!-- Fazer esse formulário de editar também value= "{ {$results->email or old('email')}}" -->
                        <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}" value= "{{ old('name')}}">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do Usuário">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class=" form-group" value= "{{ old('user')}}">
                            <label required for="user">Nome de Login</label>
                            <input type="text" name="user" class="form-control" placeholder="Nome de login">
                        </div>

                        <div class=" form-group" value= "{{ old('password')}}">
                            <label for="password">Senha</label>
                            <input required type="password" name="password" class="form-control" placeholder="Digite a senha">

                        <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}" value= "{{ old('email')}}">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail do Usuário">
                            @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class=" form-group" value="{{ old('ativo') }}">
                            <label for="ativo">Ativo</label>
                            <select class="form-control" name = "ativo">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        
                        <div class=" form-group">
                                @if (auth()->user()->img != null)
                                <img src="{{ url('storage/users/'.auth()->user()->img) }}" alt="{{ auth()->user()->name }}" style="max-width: 50px;">
                                @endif
                            <label for="img">Imagem:</label>
                            <input  name="img" type="file" class="form-control">
                        </div>

                        <button id="mensagem-sucesso" class=" form-group btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop