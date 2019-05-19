@extends('adminlte::page')

@section('title', 'Cadastro de Pessoas')

@section('content')
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
                                <th></th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Endereço</th>
                                <th>Ação</th>
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
                                    <!--<a class="btn btn-default" href="{{route('people.detail',$people->id)}}">Detalhe</a>-->
                                    <a class="btn btn-default" href="{{route('people.edit',$people->id)}}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('people.delete',$people->id)}}' : false)">Deletar</a>
                                </td>
                            <tr>
                        @endforeach
                            
                        </tbody>

                    </table>

                    <div align="center">
                        {!! $peoples->links() !!}
                    </div> 

                </div>
            </div>
        </div>
    </div>
</div>
@stop

