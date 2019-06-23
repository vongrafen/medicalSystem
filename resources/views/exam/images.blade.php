@extends('adminlte::page')

@section('title', 'Upload Exames')

@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
    <h3 class="box-title">Upload de Exames</h3>
    </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                 <div class="panel panel-default">
                    <ol class="breadcrumb panel-heading" >
                        <li><a style="font-size:110%" href="{{ route('Exam.index') }}"><b>Exames</b></a></li>
                        <li class="active" style="font-size:110%">Editar</li>
                    </ol>

                        <form action="{{ route('Exam.store') }}" method="POST" enctype="multipart/form-data"> 
                            {{ csrf_field() }}
                            
                            
                            {{-- <label>Identificador Exame</label>
                            <select class="form-control"  name="exam_id" id="exam_id">
                                <option value="">Selecione um Médico</option>       
                                @foreach($exm as $medicos)
                                    <option required value="{{ $medicos->id }}">{{ $medicos->id }}</option>
                                @endforeach
                            </select> --}}

                            <div class="form-row col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label for="file">Enviar Arquivo</label>
                                    <input type="file" name="upload" class="form-control-file" value="{{ old('upload') }}">
                                </div>
                            </div>



                             <!-- <input type="file" name="imagem" id = 'imagem' multiple="multiple" /><br><br> 
                             <input type="file" name="imagem">-->
                                <button class=" form-group btn btn-info" >Salvar</button> 
                        </form>
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                 </div>
            </div>
        </div>
</div>
                   
@stop
