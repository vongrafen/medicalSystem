@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                
                <li class="active">Exames</li>
                </ol>

                <div class="panel-body">
                    <p><a class="btn btn-info" href="{{route('Exam.add')}}">Adicionar</a></p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Data</th>
                                <th>Tipo Equipamento</th>
                                <th>Staus</th>
                                <th>Ação</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $x)
                        <tr>
                                <th scope="row">{{ $x->id }}</th>
                                <td>{{ $x->patients_id }}</td>
                                <td>{{ $x->doctor_performer_id }}</td>
                                <td>{{ $x->performed_date }}</td>

                                <td>    
                                    <a class="btn btn-default" href="{{route('Exam.edit',$x->id)}}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('Exam.delete',$x->id)}}' : false)">Deletar</a>
                                    <a class="btn btn-info" href="{{route('Exam.images',$x->id)}}">Adicionar Imagens</a>
                                    
                                </td>
                            <tr>
                        @endforeach                           
                        </tbody>
                    </table>

                    <div align="center">
                        {!! $results->links() !!}
                    </div> 

                </div>
            </div>
        </div>
    </div>
</div>
@stop

