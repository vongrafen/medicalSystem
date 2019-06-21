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

                    <form action="{{ route('ExamImage.update', $exams->id) }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="put">

                        <button id="mensagem-sucesso" class=" form-group btn btn-info" >Salvar</button>
                    </form>
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
                   
@stop
