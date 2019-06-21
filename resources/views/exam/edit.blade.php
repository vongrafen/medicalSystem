@extends('adminlte::page')

@section('title', 'Editar Exames')

@section('content')

<div class="box box-primary">
 <div class="box-header with-border">
    <h3 class="box-title">Edição de Exames</h3>
 </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

            <ol class="breadcrumb panel-heading" >
            <li><a style="font-size:110%" href="{{ route('Exam.index') }}"><b>Exames</b></a></li>
            <li class="active" style="font-size:110%">Editar</li>
            </ol>

                    <form action="{{ route('Exam.update', $exams->id) }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="_method" value="put">

                    <div class="form-group">
                        <label for="profile" >Perfil</label>
                        <div required name="profile" class="auto-control" required autofocus>
                        <select class="form-control"  id = "profile" name="profile" onchange="habilitaBtn()">
                            @if($exams->profile == '4')
                            <option value= "{{ $exams->profile }}" >Paciente</option>
                            <option value="4">Paciente</option>
                            @endif
                            @if($exams->profile == '3')
                            <option value= "{{ $exams->profile }}" >Médico</option>
                            <option value="3">Médico</option>
                            @endif
                            @if($exams->profile == '2')
                            <option value= "{{ $exams->profile }}" >Funcionário</option>
                            <option value="2">Funcionário</option>
                            @endif

                            
                           
                            


                        </select>
                        @if($errors->has('profile'))
                        <span class="help-block">
                            <strong>{{$errors->first('profile')}}</strong>
                        </span>
                        @endif
                        </div>
                    </div>
					<!-- se clicar em Funcionario -->
                    <div style="display:none" id='funcionario'class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="office">Cargo</label>
                            <input id = "cargo" type="text" name="office"  value="{{$exams->office}}" class="form-control" placeholder="Descreva o Cargo do Funcionário">
                            <label for="sector">Setor</label>
                            <input type="text" name="sector" value="{{$exams->sector}}" class="form-control" placeholder="Descreva o setor que trabalha">
                    </div>

                    <!-- se clicar em Medico -->
                    <div style="display:none" id='medico'  class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                        <label for="crm">CRM</label>
                        <input type="text" id = "crm" value="{{$exams->crm}}" name="crm" class="form-control" placeholder="CRM do Médico">
                        <label for="specialty_id" value="{{$exams->specialty_id}}" class="col-md-auto">Especialidade</label>
                    </div>

                    <div class="form-group {{$errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome</label>
                            <input type="text" value="{{$exams->name}}" name="name" class="form-control" placeholder="Nome do cliente">
                        @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class=" form-group" value="{{ old('birthdate') }}">
                            <label for="birthdate">Data de nascimento</label>
                            <input type="date" name="birthdate" value="{{$exams->birthdate}}" class="form-control" placeholder="Data de nascimento">
                        </div>


                        <div class=" form-group" >
                            <label for="genre">Genero</label>
                            <select class="form-control" value="{{$exams->genre}}" name = "genre">
                                @if($exams->genre == 'M')
                                <option value= "{{ $exams->genre }}" >Masculino</option>
                                <option value="F">Femenino</option>
                                @endif
                                @if($exams->genre == 'F')
                                <option value= "{{ $exams->genre }}" >Feminino</option>
                                <option value="M">Masculino</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group {{$errors->has('cpf') ? 'has-error' : '' }}" value="{{ old('cpf') }}">
                            <label for="cpf">CPF</label>
                            <input disabled=true  type="text" name="cpf" value="{{$exams->cpf}}" id= "cpf"  class="form-control" placeholder="999.999.999-99" >
                        @if($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{$errors->first('cpf')}}</strong>
                        </span>
                        @endif
                       </div>

                        <div class="form-group">
                            <label for="rg">RG</label>
                            <input type="text" value="{{$exams->rg}}" name="rg" id ="rg" class="form-control" placeholder="9999.999.99-9">
                        </div>

                        <div  class="form-group ">
                            <label for="state">Estado</label>
                            <select  name ='state' value="{{$exams->state}}" class="form-control" value='' id="state" ></select>
                            <small class="text-danger"></small>
                        </div>

                        <div  class="form-group ">
                            <label for="city">Cidade</label>
                            <select  name ='city' class="form-control" value="{{$exams->city}}" id="city"></select>
                            <small class="text-danger"></small>
                        </div>

                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input class="form-control" name="cep" value="{{$exams->cep}}" type="text" id="cep"  placeholder="99.999-999">
                            <small class="text-danger"></small>
                        </div>

                        <div class="form-group {{$errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" value="{{$exams->address}}" class="form-control" placeholder="Endereço do cliente">
                            @if($errors->has('address'))
                        <span class="help-block">
                            <strong>{{$errors->first('address')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group ">
                            <label for="number">Número</label>
                            <input type="text" name="number" value="{{$exams->number}}" class="form-control" placeholder="Número residência">
                        </div>

                        <div class="form-group ">
                            <label for="district">Bairro</label>
                            <input type="text" name="district" value="{{$exams->disctict}}" class="form-control" placeholder="Bairro">
                        </div>

                        <div class="form-group ">
                            <label for="complement">Complemento</label>
                            <input type="text" name="complement" value="{{$exams->complement}}" class="form-control" placeholder="Complemento">
                        </div>

                        <div class="form-group {{$errors->has('telephone') ? 'has-error' : '' }}">
                            <label for="telephone">Telefone</label>
                            <input type="text" name="telephone" value="{{$exams->telephone}}" id = "telephone" class="form-control" placeholder="Telefone do cliente">
                        @if($errors->has('telephone'))
                        <span class="help-block">
                            <strong>{{$errors->first('telephone')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" value="{{$exams->email}}" class="form-control" placeholder="E-mail do cliente">
                            @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                        </div>

                        <div class="form-group {{$errors->has('obs') ? 'has-error' : '' }}">
                            <label for="obs">Observação</label>
                            <input type="textarea" name="obs" value="{{$exams->obs}}" class="form-control" placeholder="Observação">
                            @if($errors->has('obs'))
                        <span class="help-block">
                            <strong>{{$errors->first('obs')}}</strong>
                        </span>
                        @endif
                        </div>
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
                    <!-- Inicio Modal -->
                    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center" id="myModalLabel">Cadastrar Especialidade</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('specialty.save') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Nome:</label>
                                            <input name="name" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="control-label">Detalhes:</label>
                                            <textarea name="description" class="form-control"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Cadastrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal -->
@stop


 
<!-- validação dos medicos -->
<script type="text/javascript">
    function habilitaBtn () {
        var op = document.getElementById("profile").value;

        if(op == "4") // Paciente
        {
            document.getElementById('medico').style.display = 'none';
            document.getElementById('funcionario').style.display = 'none';
        }

        if(op == "3") // Medico
        {
            document.getElementById('medico').style.display = 'block';
            document.getElementById('funcionario').style.display = 'none';
            document.getElementById('crm').required = true;
        }

        if(op == "2") // Funcionário
        {
            document.getElementById('funcionario').style.display = 'block';
            document.getElementById('medico').style.display = 'none';
            document.getElementById('cargo').required = true;
        }
    }

    //<!-- validação dos medicos -->
    function addCert() {
    var lista = document.getElementsByName('certificados[]');
    var ultimoLista = lista[lista.length - 1];
    var novoCert = ultimoLista.cloneNode(true);
    var formPai = ultimoLista.parentNode; //ou document.getElementById('id_do_form');
    formPai.insertBefore(novoCert, ultimoLista.nextSibling);
}
</script>
<!-- validação dos medicos -->
