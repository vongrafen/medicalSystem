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
            			<h3 class="panel-title">Novo Usuário</h3>
              			<p class="panel-subtitle">Cadastro de novo usuário</p>
            		</div>
            		<div class="col-md-6">
            			<a href="{{ route('usuario.index') }}" class="btn btn-default pull-right">Voltar</a>
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

              <form action="{{ route('usuario.criar') }}" method="post">
              @csrf

                <!-- Linha  1 formulário -->  
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('nome')) has-error @endif ">
                         <label class="control-label">Nome</label>
                         <input type="text" name="nome" class="form-control" value="{{old('nome')}}">
                         @if ($errors->has('nome'))
                          <span class="help-block">{{ $errors->first('nome') }}</span>
                         @endif
                      </div>
                  </div>
                </div>
                <!-- Linha  1 formulário -->
                <!-- Linha  2 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('login')) has-error @endif">
                         <label class="control-label">Login</label>
                         <input type="text" name="login" class="form-control" value="{{old('login')}}">
                         @if ($errors->has('login'))
                          <span class="help-block">{{ $errors->first('login') }}</span>
                         @endif
                      </div>
                  </div>
                </div>
                <!-- Linha  2 formulário -->
                <!-- Linha  3 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('password')) has-error @endif">
                         <label class="control-label">Senha</label>
                         <input type="password" name="password" class="form-control">
                         @if ($errors->has('password'))
                          <span class="help-block">{{ $errors->first('password') }}</span>
                         @endif
                      </div>
                      
                  </div>
                </div>
                <!-- Linha  3 formulário -->
                <!-- Linha  4 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('email')) has-error @endif">
                         <label class="control-label">E-mail</label>
                         <input type="text" name="email" class="form-control" value="{{old('email')}}">
                         @if ($errors->has('email'))
                          <span class="help-block">{{ $errors->first('email') }}</span>
                         @endif
                      </div>
                  </div>
                </div>
                <!-- Linha  4 formulário -->
                <!-- Linha  5 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('telefone')) has-error @endif">
                         <label class="control-label">Telefone</label>
                         <input type="text" name="telefone" class="form-control" value="{{old('telefone')}}">
                         @if ($errors->has('telefone'))
                          <span class="help-block">{{ $errors->first('telefone') }}</span>
                         @endif
                      </div>
                  </div>
                </div>
                <!-- Linha  5 formulário -->
                <!-- Linha  6 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group @if ($errors->has('ativo')) has-error @endif">
                         <label class="control-label">Status</label>
                         <select name="ativo" class="form-control">
                              <option value="1">Ativo</option>
                              <option value="0">Inativo</option>
                          </select>
                          @if ($errors->has('ativo'))
                          <span class="help-block">{{ $errors->first('ativo') }}</span>
                         @endif
                      </div>
                  </div>
                </div>
                <!-- Linha  6 formulário -->
                <!-- Linha  7 formulário -->
                <div class="row">
                  <div class="col-md-offset-2 col-md-8">
                      <div class="form-group">
                          <button type="submit" name="abrir" class="btn btn-success">Salvar</button>
                      </div>
                  </div>
                </div>
                <!-- Linha  7 formulário -->
              </form>

      </div>
	  </div>
  </div>
</div>

@endsection