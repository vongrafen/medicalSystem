@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                
                <li class="active">Meus Exames</li>
                </ol>

                <div class="panel-body">
                    <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Data Agendada</th>
                              <th>Médico</th>
                              <th>Data Realizada</th>
                              <th>Tipo Exame</th>
                              <th>Staus</th>
                              <th>Ação</th>
                              </tr>
                      </thead>
                      <tbody>
                      @foreach($results as $x)
                      <tr>
                              <th scope="row">{{ $x->id }}</th>
                              <td>{{ $x->Data_Agendada }}</td>
                              <td>{{ $x->medico }}</td>
                              <td>{{ $x->Data_Realizada }}</td>
                              <td>{{ $x->Tipo_Exame }}</td>
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
                                  <a class="btn btn-info" href="{{route('paciente',$x->id)}}">Visualizar</a>
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

