@extends('adminlte::page')

@section('title', 'Cadastro de Exames')

@section('content')

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>

<div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Digitação de Laudo</h3>
        </div>
               <div class="box-body">

                   <form>
                       <div class="form-group row">

                            <div class="form-group col-md-8">
                                    <label for="diagnostic">Laudo</label>
                                    <textarea class="form-control" name="diagnostic" id="diagnostic"></textarea>
                            </div> 

                        <div class="form-group col-md-4">
                            <label for="id">ID do Laudo</label>
                            <input type="text" class="form-control" name="id" placeholder=""> 
                        </div>

                        <div class="form-group col-md-4">
                                <label for="status">Status do Laudo</label>
                                <select type="text" class="form-control" name="status" placeholder="">
                                    <option Selected>Aguardando</option>
                                    <option>Liberado</option>
                                    <option>Bloqueado</option>
                                </select>
                        </div>
                            
                        <div class="form-group col-md-4">
                                    <label for="name">Data do Exame</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ex.: H-TI-14">
                        </div>

                        <div class="form-group col-md-4">
                                <label for="name">Paciente</label>
                                <input type="text" class="form-control" name="name" placeholder="Ex.: H-TI-14">
                        </div>

                        <div class="form-group col-md-4">
                                <label for="name">Médico Radiologista</label>
                                <input type="text" class="form-control" name="name" placeholder="Ex.: H-TI-14">
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