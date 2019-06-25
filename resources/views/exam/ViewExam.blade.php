@extends('adminlte::page')

@section('title', 'Visualizar Imagens de Exames')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                
                <li class="active">Visualizar Exames dos Pacientes</li>
                </ol>

                <div class="panel-body">
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Paciente</th>
                                <th>Médico</th>
                                <th>Data Realizada</th>
                                <th>Tipo Equipamento</th>
                                <th>Staus</th>
                                <th>Ação</th>
                                </tr>
                        </thead>
                        <tbody>
                        @foreach($results as $x)
                        <tr>
                                <th scope="row">{{ $x->id }}</th>
                                <td>{{ $x->paciente }}</td>
                                <td>{{ $x->medico }}</td>
                                <td>{{ $x->dataRealizada }}</td>
                                <td>{{ $x->TipoEquipaments }}</td>
                                <td> 
                                    @if($x->status == 'Agendado')
                                        <span class="label label-info">{{$x->status}}</span>
                                    @elseif ($x->status == 'Realizado')
                                        <span class="label label-success">{{$x->status}}</span>
                                    @elseif ($x->status == 'Cancelado')
                                        <span class="label label-danger">{{$x->status}}</span>
                                    @elseif ($x->status == 'Solicitado')
                                        <span class="label label-warning">{{$x->status}}</span>
                                    @else
                                        <span class="label label-default">{{$x->status}}</span>
                                        @endif
                                </td>
                                <td>    
                                    <a class="btn btn-info" href="{{route('Exam.visualizar',$x->id)}}">Visuallizar</a>
                                    
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

