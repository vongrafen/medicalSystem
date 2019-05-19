@extends('adminlte::page')

@section('title', 'Cadastro de Equipamentos')

@section('content')
<link rel="stylesheet" href="css/main.css">

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Equipamentos</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="{{ route('equipaments.cadastrar') }}" method="post" role="form">
      {!! csrf_field() !!}
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>




                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">Modelo</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model') }}" required autofocus>

                                @if ($errors->has('model'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="serialnumber" class="col-md-4 col-form-label text-md-right">Número de Série</label>

                            <div class="col-md-6">
                                <input id="serialnumber" type="text" class="form-control{{ $errors->has('serialnumber') ? ' is-invalid' : '' }}" name="serialnumber" value="{{ old('serialnumber') }}" required autofocus>

                                @if ($errors->has('serialnumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serialnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="status" class="col-md-1 control-label">Status</label>
                            <div name="status" class="col-md-3" value="{{ old('status') }}" required autofocus>
                            <select  class="form-control"  id="status" data-placeholder="Selecione">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                            @if ($errors->has('ativo'))
                            <span class="help-block">{{ $errors->first('ativo') }}</span>
                            @endif
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="description">Descrição</label>
                        <br>
                            <textarea for="description" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>Descrição</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            
                        </div>



                        <div class="form-group row">
                            <label for="servicestype" class="col-md-1 control-label">Tipo de Serviço</label>
                            <div name="servicestype" class="col-md-3" value="{{ old('servicestype') }}" required autofocus>
                            <select  class="form-control"  id="servicestype" data-placeholder="Selecione">
                                <option value="um">Um</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                Cadastrar
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                Editar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    
    
    <!--
    <div class="box-body">
        <div class="form-row">
            <div class="col-md-1">
              <label for="patrimony">Patrimônio</label>
              <input type="text" class="form-control" name="patrimony" placeholder="Ex.: 000000">
            </div>

            <div class="col-md-2">
                <label for="name">Nome do Equipamento</label>
                <input type="text" class="form-control" name="name" placeholder="Ex.: H-TI-14">
            </div>

            <div class="col-md-2">
                <label for="so">Sistema Operacional</label>
                <select type="text" class="form-control" name="so" >
                  <option>Terminal Service</option>
                  <option>Windows XP</option>
                  <option>Windows 7</option>
                  <option>Windows 8</option>
                  <option>Windows 10</option>
                </select>
              </div>

              <div class="col-md-2">
                  <label for="arquiteture">Sistema Operacional</label>
                  <select type="text" class="form-control" name="arquiteture" >
                    <option>x32</option>
                    <option>x64</option>
                  </select>
              </div>

            <div class="col-md-2">
                <label for="service_tag">ServiceTag</label>
                <input type="text" class="form-control" name="service_tag" placeholder="Ex.: NCS2280">
            </div>

            <div class="form-group col-md-3">
                <label for="partnumber">Partnumber</label>
                <input type="text" class="form-control" name="partnumber" placeholder="Ex.: 4568NZH2233NN">
            </div>
        </div>

        <div class="form-row">

            <div class="col-md-2">
                <label for="departament">Setor</label>
                <input type="text" class="form-control" name="departament" placeholder="Ex.: Medicina Preventiva">
              </div>

            <div class="col-md-2">
                <label for="user">Usuário</label>
                <input type="text" class="form-control" name="user" placeholder="Ex.: usuario.sobrenome">
              </div>

            <div class="col-md-4">
              <label for="pc_brand">Fabricante</label>
              <input type="text" class="form-control" name="pc_brand" placeholder="Ex.: Dell, HP...">
            </div>

            <div class="form-group col-md-4">
              <label for="pc_model">Modelo</label>
              <input type="text" class="form-control" name="pc_model" placeholder="Ex.: VOSTRO 230S">
            </div>

        </div>           
    </div>
  

  <div class="box">
    
      <div class="box-header with-border">
        <h3 class="box-title">Processador</h3>
      </div>
      

        <div class="box-body">
          <div class="form-row">
    
              <div class="col-md-4">
                <label for="proc_brand">Fabricante</label>
                <input type="proc_brand" class="form-control" name="proc_brand" placeholder="Ex.: Intel, AMD...">
              </div>
    
              <div class="col-md-4">
                  <label for="proc">Modelo</label>
                  <input type="proc" class="form-control" name="proc" placeholder="Ex.: I5-7500">
              </div>
    
              <div class="form-group col-md-4">
                <label for="proc_hz">Velocidade</label>
                <input type="proc_hz" class="form-control" name="proc_hz" placeholder="Ex.: 3.30">
              </div>
    
          </div>

    </div>

  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Memória</h3>
        </div>

          <div class="box-body">
            <div class="form-row">
      
                <div class="col-md-3">
                    <label for="memory">Tamanho</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ex.: 4, 8, 16, 32" name="memory" aria-describedby="teste">
                        <div class="input-group-addon">
                            <span class="input-group-text" id="memory">GB's</span>
                        </div>
                    </div>
                </div>
      
                <div class="col-md-2">
                    <label for="memory_ddr">Tipo</label>
                    <select type="text" class="form-control" name="memory_ddr" >
                      <option>DDR</option>
                      <option>DDR1</option>
                      <option>DDR2</option>
                      <option>DDR3</option>
                      <option>DDR4</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="memory_frequency">Frequência</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="memory_frequency" placeholder="Ex.: 1333">
                    <div class="input-group-addon">
                        <span class="input-group-text" id="memory_frequency">Ghz</span>
                    </div>
                    </div>
                  </div>

                <div class="col-md-2">
                      <label for="memory_slots">Nº de Slots</label>
                      <select type="text" class="form-control" name="memory_slots">
                          <option>2</option>
                          <option>4</option>
                      </select>
                </div>

                <div class="form-group col-md-1">
                  <label for="memory_slots">Ocupados</label>
                  <select type="text" class="form-control" name="memory_slots">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                  </select>
                </div>

            </div>
            </div>
  </div>

  <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Disco</h3>
        </div>
        

          <div class="box-body">
            <div class="form-row">
      
                <div class="col-md-2">
                    <label for="disk">Tamanho</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ex.: 230" name="disk" aria-describedby="disk">
                        <div class="input-group-addon">
                            <span class="input-group-text" id="memory">GB's</span>
                        </div>
                    </div>
                </div>
      
                <div class="col-md-1">
                    <label for="disk_type">Tipo</label>
                    <select type="text" class="form-control" name="disk_type">
                      <option>HDD</option>
                      <option>SSD</option>
                    </select>
                </div>

            </div>
          </div>
  </div>

      <div class="box-body">            
        <button type="submit" class="btn btn-primary mb-2">Salvar</button>    
      </div>
-->
      </form>
</div>
--
@stop