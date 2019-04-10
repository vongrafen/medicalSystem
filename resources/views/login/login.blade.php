<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login - {{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    <link href="{{ asset('/css/fonts_google.css') }}" rel="stylesheet">
    
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="{{ asset('/img/logo/unimed_p.png') }}"  alt="Logomarca"></div>
                                <!--<p class="lead">Entre com suas credenciais</p>  class="img-responsive" -->
                            </div>

                            <form action="{{ route('authentication') }}" method="post">
                            @csrf

                                <div class="form-group @if ($errors->has('user')) has-error @endif">
                                    <!--<label class="control-label sr-only">Usuário</label>-->
                                    <input type="text" class="form-control is-invalid" name="user" value="{{old('user')}}" placeholder="Usuário">
                                    @if ($errors->has('user'))
                                      <span class="help-block">{{ $errors->first('user') }}</span>
                                    @endif 
                                </div>
                               
                                <div class="form-group @if ($errors->has('password')) has-error @endif">
                                    <!--<label class="control-label sr-only">Senha</label>-->
                                    <input type="password" class="form-control" name="password" placeholder="Senha">
                                    @if ($errors->has('password'))
                                      <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                       

                                <!--<div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Lembrar-me?</span>
                                    </label>
                                </div>-->
                                <button type="submit" class="btn btn-success btn-lg btn-block">Entrar</button>

                                <br>
                                @if ($message = Session::get('falha'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <!--<div class="bottom">
                                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                                </div>-->
                            </form>

                        </div>
                        
                        
                    </div>
                    <div class="right">
                        <!--<div class="overlay"></div>-->
                        <div class="content text">
                            <h1 class="heading">Gerenciamento de chamados</h1>
                            <p>Tecnlogia da Informação</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>
