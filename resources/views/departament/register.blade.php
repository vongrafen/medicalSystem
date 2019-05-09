@extends('adminlte::page')

@section('title', 'Cadastro de Equipamentos')

@section('content')
<link rel="stylesheet" href="css/main.css">

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Departamentos</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('registerDepartament') }}" method="post" role="form">
      {!! csrf_field() !!}
    <div class="box-body">
        <div class="form-row">
            <div class="col-md-3">
              <label for="name">Nome do Setor</label>
              <input type="text" class="form-control" name="name" placeholder="Ex.: Financeiro">
            </div>

            <div class="col-md-2">
                <label for="local">Local</label>
                <select type="text" class="form-control" name="local" placeholder="Ex.: Hospital Unimed">
                  <option value="Hospital Unimed">Hospital Unimed</option>
                  <option value="Sede Administrativa">Sede Administrativa</option>
                </select>
            </div>

            <div class="col-md-1">
                <label for="cost_center">Centro de Custo</label>
                <input type="text" class="form-control" name="cost_center" placeholder="Ex.: 1098">
            </div>
        </div>
      </div>
      <div class="box-body">            
        <button type="submit" class="btn btn-success mb-2">Cadastrar</button>    
      </div>

  </form>
</div>


<div class="box box-success">
    <div class="box-header">
      <h3 class="box-title">Departamentos Cadastrados</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="tableDepartament" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <thead>
              <tr>
                
                <th>Centro de Custo</th>
                <th>Nome</th>
                <th>Local</th>
                
              </tr>
            </thead>
        <tbody>
            @foreach($result as $x)
            <tr>
              <td>{{ $x->cost_center }}</td>
              <td>{{ $x->name }}</td>
              <td>{{ $x->local }}</td>
            </tr>
          @endforeach
      </table>
    </div>
  </div>

</div>
</div>
</div>


@stop