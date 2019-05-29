<<<<<<< HEAD
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

=======
﻿@extends('adminlte::page')

@section('title', 'Cadastro de Pessoas')

@section('content')
>>>>>>> master
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <ol class="breadcrumb panel-heading">
            
            <li class="active">People</li>
            </ol>

                <div class="panel-body">
                <p>
                <a class="btn btn-info" href="{{route('people.add')}}">Adicionar</a>
                </p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
<<<<<<< HEAD
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Endereco</th>
                                <th>Acao</th>
=======
                                <th></th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Ação</th>
>>>>>>> master
                                </tr>
                        </thead>
                        <tbody>
                        @foreach($peoples as $people)
                        <tr>
                                <th scope="row">{{ $people->id }}</th>
                                <td>{{ $people->name }}</td>
                                <td>{{ $people->email }}</td>
                                <td>{{ $people->address }}</td>
                                <td>
<<<<<<< HEAD
                                    <a class="btn btn-default" href="{{route('people.detail',$people->id)}}">Detalhe</a>
=======
                                    <!--<a class="btn btn-default" href="{{route('people.detail',$people->id)}}">Detalhe</a>-->
>>>>>>> master
                                    <a class="btn btn-default" href="{{route('people.edit',$people->id)}}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('people.delete',$people->id)}}' : false)">Deletar</a>
                                </td>
                            <tr>
                        @endforeach
                            
                        </tbody>

                    </table>

<<<<<<< HEAD
                    <!--
                    <div align="center">
                        {!! $people->links() !!}
                    </div>
                    -->
=======
                    <div align="center">
                        {!! $peoples->links() !!}
                    </div> 
>>>>>>> master

                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======
@stop
>>>>>>> master

