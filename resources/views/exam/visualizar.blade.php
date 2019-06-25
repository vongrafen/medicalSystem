@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Imagens Do Exame</h1>
@stop

@section('content')
<div class="panel-body">
        
            
         {{-- <img src="/imagens/Exames/{{$ImagemExame}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;"> --}}
            
                <img width="150" height="150" src="/imagens/Exames/1561453601.jpg" alt="">
              
</div>
@stop

<script type="text/javascript"
	src="https://slideshow.triptracker.net/slide.js"></script>
<script type="text/javascript">
<!--
  var viewer = new PhotoViewer();
  viewer.add('/photos/my-photo-1.jpg');
  viewer.add('/photos/my-photo-2.jpg');
  viewer.add('/photos/my-photo-3.jpg');
//--></script>
<a href="javascript:void(viewer.show(0))">Slideshow</a>
