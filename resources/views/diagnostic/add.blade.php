@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Digitação de Laudo</h3>
        </div>
               <div class="box-body">
                <form action="{{ route('diagnostic.save') }}" method="post">
                    {{ csrf_field() }}
                   <form>
                       <div class="form-group row">

                            <div class="form-group col-md-8">
                                    <label for="diagnostic">Laudo</label>
                            <textarea class="form-control" name="diagnostic" id="diagnostic"></textarea>
                            </div> 

                        <div class="form-group col-md-4">
                            <label for="exam_id">ID do Exame</label>
                            <input readonly type="text" value="{{$Exam->id}}" class="form-control" id="exam_id" name="exam_id"> 
                        </div>

                        <div class="form-group col-md-4">
                                <label for="status">Status do Laudo</label>
                                <select type="text" class="form-control" name="status">
                                    <option Selected>Aguardando</option>
                                    <option>Liberado</option>
                                    <option>Bloqueado</option>
                                </select>
                        </div>
                            
                        <div class="form-group col-md-4">
                            <label>Paciente</label>
                            <select class="form-control"  name="patients_id" id="patients_id">
                                @foreach($paciente as $pacientes)
                                <option selected required value="{{ $pacientes->id }}">{{ $pacientes->name }}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Medico radiologista</label>
                            <select class="form-control"  name="doctor_performer_id" id="doctor_performer_id">
                              
                                @foreach($medico as $medicos)
                                <option selected required value="{{ $medicos->id }}">{{ $medicos->name }}</option>
                                    @endforeach
                            </select>
                        </div>             

                    </div>

                    <hr>  
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="submit" class="btn btn-warning">Imprimir</button> 
                    </form>      

        </div>
</div>

@endsection

@section('js')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'diagnostic' );
    </script>
@append