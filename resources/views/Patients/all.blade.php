@extends('adminlte::page')

@section('title', 'Cadastro de Pacientes')

@section('content')

<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pacientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                    <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Endereço</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($patients as $paciente)
                                <tr>
                                <td>{{ $paciente->name }}</td>
                                <td>{{ $paciente->cpf }}</td>
                                <td>{{ $paciente->endereco }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
            <!-- /.box-body -->
    </div>
@stop