@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="https://www.minhaserie.com.br//images/highlights/000/033/138/32072.jpg" alt="User profile picture">
  
                <h3 class="profile-username text-center">Nina Mcintire</h3>
  
                <p class="text-muted text-center">Empresária</p>
  
               
                      <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Aqui você pode editar seus dados!</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">

                  <tbody>
                      <tr>
                        <td><a>Nome</a></td>
                        <td>Nome da pessoa</td>
                        <td><a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Editar</a></td>
                      </tr>
                      <tr>
                        <td><a>Fazer dinâmico</a></td>
                        <td>Fazer dinâmico</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td><a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Editar</a></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
          <!-- TABLE: LATEST ORDERS -->
  
                <a href="#" class="btn btn-primary btn-block"><b>Salvar</b></a>
                <a href="#" class="btn btn-primary btn-block"><b>Sair</b></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
@stop