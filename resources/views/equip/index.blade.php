@extends('adminlte::page')

@section('title', 'Cadastro de Equipamentos')

@section('content')

<div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                  <thead>
                      <tr>
                        
                        <th>Patrimônio</th>
                        <th>Setor</th>
                        <th>Nome do PC</th>
                        <th>Usuário</th>
                        <th>S.O.</th>
                        <th>Arquitetura</th>
                        <th>Fabricante</th>
                        <th>Modelo PC</th>
                        <th>Processador</th>
                        <th>Ghz</th>
                        <th>GB's</th>
                        <th>DDR</th>
                        <th>Mhz</th>
                        <th>Disco</th>
                        
                      </tr>
                    </thead>
                <tbody>
                    @foreach($resultado as $x)
                    <tr>
                      <td>{{ $x->patrimony }}</td>
                      <td>{{ $x->departament }}</td>
                      <td>{{ $x->name }}</td>
                      <td>{{ $x->user }}</td>
                      <td>{{ $x->so }}</td>
                      <td>{{ $x->arquiteture }}</td>
                      <td>{{ $x->pc_brand }}</td>
                      <td>{{ $x->pc_model }}</td>
                      <td>{{ $x->proc }}</td>
                      <td>{{ $x->proc_hz }}</td>
                      <td>{{ $x->memory }}</td>
                      <td>{{ $x->memory_ddr }}</td>
                      <td>{{ $x->memory_frequency }}</td>
                      <td>{{ $x->disk }}</td>

                    </tr>
                  @endforeach
              </table>
            </div>
          </div>
            </div>
            <!-- /.box-body -->
          </div>
@stop