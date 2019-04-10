@extends('layout.index')

@section('main-content')

<!-- MAIN -->
<div class="main">
  <!-- MAIN CONTENT -->
  <div class="main-content">
    <div class="container-fluid">
      <!-- OVERVIEW -->
        <div class="panel panel-headline">
            <div class="panel-heading">
            	<div class="row">
            		<div class="col-md-6">
            			<h3 class="panel-title">Editar Grupo</h3>
              			<!--<p class="panel-subtitle">Informações do usuário</p>-->
            		</div>
            		<div class="col-md-6">
            			<a href="{{ route('usuario.ver', $usuario->id) }}" class="btn btn-default pull-right">Voltar</a>
            		</div>
            	</div>
				

            	<div class="row">
                  <div class="col-md-offset-2 col-md-8">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                      </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                      </div>
                    @endif
                </div>
              </div>

              <form action="{{ route('usuario.editar_grupo') }}" method="post">
              @csrf

              <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">
              <input type="hidden" name="user_grupo" value="{{ $grupo_user->id }}">
                <!-- Linha  1 formulário -->  
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group">
                         <label class="control-label">Usuário</label>
                         <input type="text" name="usuario" class="form-control" value="{{ $usuario->nome }}" readonly>
                      </div>
                  </div>
                </div>
                <!-- Linha  1 formulário -->
                <!-- Linha  2 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('grupo')) has-error @endif">
                         <label class="control-label">Grupo</label>
                         <select name="grupo" class="form-control">
                              	<option value="">Selecione</option>
                              	@foreach ($grupo as $gp)
		                       		<option value="{{ $gp->id }}" @if($gp->id == $grupo_user->grupo) selected @endif >{{ $gp->nome }}</option>
		                      	@endforeach
                          </select>
                          @if ($errors->has('grupo'))
                          <span class="help-block">{{ $errors->first('grupo') }}</span>
                         @endif
                      </div>
                  </div>
                </div>
                <!-- Linha  2 formulário -->
                <!-- Linha  3 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('supervisor')) has-error @endif">
                         <label class="control-label">Supervisor</label>
                         <select name="supervisor" class="form-control">
                         	  <option value="0" @if($grupo_user->supervisor == 0) selected @endif>Não</option>
                              <option value="1" @if($grupo_user->supervisor == 1) selected @endif>Sim</option>
                          </select>
                          @if ($errors->has('supervisor'))
                          <span class="help-block">{{ $errors->first('supervisor') }}</span>
                         @endif
                      </div>
                  </div>
                </div>
                <!-- Linha  3 formulário -->
                <!-- Linha  4 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('admin')) has-error @endif">
                         <label class="control-label">Admin</label>
                         <select name="admin" class="form-control">
                         	  <option value="0" @if($grupo_user->admin == 0) selected @endif>Não</option>
                              <option value="1" @if($grupo_user->admin == 1) selected @endif>Sim</option>    
                          </select>
                          @if ($errors->has('admin'))
                          <span class="help-block">{{ $errors->first('admin') }}</span>
                         @endif
                      </div>
                  </div>
                </div>
                <!-- Linha  4 formulário -->
                <!-- Linha  5 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group">
                          <button type="submit" name="abrir" class="btn btn-success">Salvar</button>
                      </div>
                  </div>
                </div>
                <!-- Linha  5 formulário -->
              </form>
            

        </div>
	</div>
  </div>
</div>

@endsection