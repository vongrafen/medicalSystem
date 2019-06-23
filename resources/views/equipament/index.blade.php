@extends('adminlte::page')

@section('title', 'Listas de Equipamentos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <ol class="breadcrumb panel-heading">
            
            <li class="active">Equipament</li>
            </ol>

                <div class="panel-body">
                <p>
                <a class="btn btn-info" href="{{route('equipament.add')}}">Adicionar</a>
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
                                <th>Modelo</th>
                                <th>Serial</th>
                                <th>Ativo</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Ação</th>
                                </tr>
                        </thead>
                        <tbody>
                               
                        @foreach($equipaments as $equipament)
                        
                        <tr>
                                <th scope="row">{{ $equipament->id }}</th>
                                <td>{{ $equipament->name }}</td>
                                <td>{{ $equipament->model }}</td>
                                <td>{{ $equipament->serialnumber }}</td>
                                <td> 
                                    @if($equipament->active  == 1)
                                        Ativo
                                    @else
                                        Inativo
                                    @endif
                                </td>



                                
                                <td>{{ $equipament->description }}</td>
                                <td>{{ $equipament->examtype_id }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('equipament.edit',$equipament->id)}}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('equipament.delete',$equipament->id)}}' : false)">Deletar</a>
                                </td>
                            <tr>
                        
                        @endforeach
                            
                        </tbody>

                    </table>
                    <div align="center">
                        {!! $equipaments->links() !!}
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@stop

