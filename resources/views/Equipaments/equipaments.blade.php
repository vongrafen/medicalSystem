
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Equipamentos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('equipaments') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

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
                            <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{ old('modelo') }}" required autofocus>

                                @if ($errors->has('modelo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('modelo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="serialNumber" class="col-md-4 col-form-label text-md-right">{{ __('Número de Serie') }}</label>

                            <div class="col-md-6">
                                <input id="serialNumber" type="text" class="form-control{{ $errors->has('serialNumber') ? ' is-invalid' : '' }}" name="serialNumber" value="{{ old('serialNumber') }}" required autofocus>

                                @if ($errors->has('serialNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serialNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="status" class="col-md-1 control-label">{{ __('Status') }}</label>
                            <div name="status" class="col-md-3" value="{{ old('status') }}" required autofocus>
                            <select  class="form-control"  id="status" data-placeholder="Selecione">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="description">Descrição</label>
                        <br>
                            <textarea for="description" type="text" id="description" class="form-control rounded-0 {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>{{ __('Descreva o equipamento') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            
                        </div>



                        <div class="form-group row">
                            <label for="servicestype" class="col-md-1 control-label">{{ __('Tipo de Serviço') }}</label>
                            <div name="servicestype" class="col-md-3" value="{{ old('servicestype') }}" required autofocus>
                            <select  class="form-control"  id="servicestype" data-placeholder="Selecione">
                                <option value="0">Selecione</option>
                                <option value="1">Pegar da tabela tipo de servicos</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

