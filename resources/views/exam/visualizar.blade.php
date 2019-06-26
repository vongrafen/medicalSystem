@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Imagens Do Exame</h1>
@stop

@section('content')
  <div class="panel-body">
      @if($ImagemExame[0]->imagem !== null)
        @foreach ($ImagemExame as $img)
          <img width="150" height="150" src="{{asset("imagens/Exames/".$img->imagem)}}"  alt="">
        @endforeach
      @else
          <h1>Não existe imagem!</h1>
      @endif
  </div>
@stop