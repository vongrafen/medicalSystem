<!-- createevent.blade.php -->
@extends('adminlte::page')

@section('title', 'Agenda')

@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel Full Calendar Example</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
  </head>
  <body>
    <div class="container">
      <br/>
      <form method="post" action="{{url('event/add')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Title">Title:</label>
            <input  required type="text" class="form-control" name="title">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong> Data inicial : </strong>  
            <input  required class="date form-control" value='2019-06-29 08:00:00' type="text" id="startdate" name="startdate">   
         </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <strong> Data final : </strong>  
            <input required class="date form-control" value='2019-06-29 12:00:00' type="text" id="enddate" name="enddate">   
         </div>
        </div>

        
        <div class="row">
         <div class="col-md-4"></div>
         <div class="form-group col-md-4">
        <label>Médico</label>
        <select class="form-control"  name="doctor_requests_id" id="doctor_requests_id">
            <option   value="">Selecione um Médico</option>       
            @foreach($medico as $medicos)
                <option required value="{{ $medicos->id }}">{{ $medicos->name }}</option>
            @endforeach
        </select>
      </div>
      </div>
        
        <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
        <label>Pacientes</label>
        <select class="form-control"  name="patients_id" id="patients_id">
            <option   value="">Selecione um Pacientes</option>       
            @foreach($paciente as $pacientes)
                <option required value="{{ $pacientes->id }}">{{ $pacientes->name }}</option>
            @endforeach
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4"></div>
      <div class="form-group col-md-4">
        <label>Equipamentos</label>
        <select class="form-control"  name="equipament_id" id="equipament_id">
            <option   value="">Selecione um Equipamentos</option>       
            @foreach($equipamento as $equipamentos)
                <option required value="{{ $equipamentos->id }}">{{ $equipamentos->name }}</option>
            @endforeach
        </select>
      </div>
    </div>

              <div class="row">
                  <div class="col-md-4"></div>
                  <div class="form-group col-md-4">
                    <strong> Convênio : </strong>  
                    <input class="date form-control"  type="text" id="convenant" name="convenant">   
                 </div>
                </div>
  

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <strong> Observação : </strong>  
              <input class="date form-control"  type="text" id="note" name="note">   
           </div>
          </div>
        
<!-- https://eonasdan.github.io/bootstrap-datetimepicker/-->

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Add Event</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
@stop