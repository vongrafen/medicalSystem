@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')


<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Exames</h3>
 </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

            <ol class="breadcrumb panel-heading" >
            <li><a style="font-size:110%" href="{{ URL::previous() }}"><b>Exames</b></a></li>
            <li class="active" style="font-size:110%">Adicionar</li>
            </ol>

                    <form action="{{ route('Exam.save') }}" method="post">
                    {{ csrf_field() }}


                        <!-- Fazer esse formulário de editar também value= "{ {$results->email or old('email')}}" -->

                        <div class="row">
                            <div class="col-md-4" value= "{{ old('scheduled_date')}}" ></div>
                            <div class="form-group col-md-4">
                              <strong> Data Agendada : </strong>  
                              <input  required class="date form-control"  type="text" id="scheduled_date" name="scheduled_date">   
                           </div>
                          </div>

                          <div class="row" value= "{{ old('performed_date')}}">
                            <div class="col-md-4"></div>
                            <div class="form-group col-md-4">
                              <strong> Data Realizada : </strong>  
                              <input  required class="date form-control"  type="text" id="performed_date" name="performed_date">   
                           </div>
                          </div>


                        <div class="form-group" value= "{{ old('description')}}" >
                            <label for="description">Descricao</label>
                            <input type="text" name="description"  class="form-control" placeholder="Descriçao">
                        </div>

                        <div class="form-group" value= "{{ old('employee_id')}}" >
                            <label for="employee_id">Funcionário Responsável</label>
                            <input type="text" name="employee_id"  class="form-control" >
                        </div>

                        <div class="form-group" value= "{{ old('doctor_performer_id')}}" >
                            <label for="doctor_performer_id">Médico Executante Responsável</label>
                            <input type="text" name="doctor_performer_id"  class="form-control" >
                        </div>

                        <div class="form-group" value= "{{ old('patients_id')}}" >
                            <label for="patients_id">Paciente</label>
                            <input type="text" name="patients_id"  class="form-control">
                        </div>

                        <div class="form-group" value= "{{ old('id_schedules_exam')}}" >
                            <label for="id_schedules_exam">Identificador da agenda</label>
                            <input type="text" name="id_schedules_exam"  class="form-control">
                        </div>

                        <button id="mensagem-sucesso" class=" form-group btn btn-info">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop