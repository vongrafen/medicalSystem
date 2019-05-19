@extends('adminlte::page')

@section('title', 'Lista de Equipamentos')

@section('content')

<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Lista de Equipamentos</h3>
            </div>
            <div class="panel-body">
                <p>
                <a class="btn btn-info" href="{{route('equipaments.register')}}">Adicionar</a>
                </p>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                      <tr>
                        
                        <th>Name</th>
                        <th>Model</th>
                        <th>SerialNumber</th>
                        <th>Active</th>
                        <th>Description</th>
                        <th>Arquitetura</th>
                        <th>ServicesType</th>
                       
                        
                      </tr>
                    </thead>
                <tbody>
                    @foreach($resultado as $x)
                    <tr>
                      <td>{{ $x->Name }}</td>
                      <td>{{ $x->Model }}</td>
                      <td>{{ $x->SerialNumber }}</td>
                      <td>{{ $x->Active }}</td>
                      <td>{{ $x->Description }}</td>
                      <td>{{ $x->Arquitetura }}</td>
                      <td>{{ $x->ServicesType }}</td>

                    </tr>
                  @endforeach
              </table>
            </div>
          </div>
            </div>
            <!-- /.box-body -->
          </div>
@stop