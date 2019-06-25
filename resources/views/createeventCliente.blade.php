<!-- createevent.blade.php -->
@extends('adminlte::page')

@section('title', 'Agendar um Exame')

@section('content')
    <div class="container">
      <br/>
      <form method="post" action="{{url('event/client')}}">
        @csrf

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <label>Meu Nome</label>
          
          <select class="form-control"  name="patients_id" id="patients_id">      
                  <option Selected value="{{Auth::user()->people_id}}">{{Auth::user()->name}}</option>
          </select>
        </div>
      </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Title">Titulo da Agenda:</label>
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
        
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Agendar</button>
          </div>
        </div>
      </form>
    </div>
@stop