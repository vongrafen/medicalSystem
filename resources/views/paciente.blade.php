@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Meus Exames</h1>
@stop

@section('content')
                      <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Meus Exames Realizados</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Código Exame</th>
                    <th>Nome Exame</th>
                    <th>Status</th>
                    <th>Ação</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                        <a class="btn btn-sm btn-info btn-flat pull-left" >Editar</a> <!-- href="{ {route('User.edit',$x->id)}}"-->
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                        <a class="btn btn-sm btn-info btn-flat pull-left" >Editar</a> <!-- href="{ {route('User.edit',$x->id)}}"-->
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                        <a class="btn btn-sm btn-info btn-flat pull-left" >Editar</a> <!-- href="{ {route('User.edit',$x->id)}}"-->
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                    <td>
                        <a class="btn btn-sm btn-info btn-flat pull-left" >Editar</a> <!-- href="{ {route('User.edit',$x->id)}}"-->
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                    <td>
                        <a class="btn btn-sm btn-info btn-flat pull-left" >Editar</a> <!-- href="{ {route('User.edit',$x->id)}}"-->
                    </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                    <td>
                        <a class="btn btn-sm btn-info btn-flat pull-left" >Editar</a> <!-- href="{ {route('User.edit',$x->id)}}"-->
                      </td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                    <td>
                      <a class="btn btn-sm btn-info btn-flat pull-left" >Editar</a> <!-- href="{ {route('User.edit',$x->id)}}"-->
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Solicitar um exame</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver todos os exames</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
          <!-- TABLE: LATEST ORDERS -->
@stop