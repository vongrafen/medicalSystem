

@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Equipamentos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('equipamentos') }}">
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
                            <label for="serialNumber" class="col-md-4 col-form-label text-md-right">{{ __('Número de Serial') }}</label>

                            <div class="col-md-6">
                                <input id="serialNumber" type="text" class="form-control{{ $errors->has('serialNumber') ? ' is-invalid' : '' }}" name="serialNumber" value="{{ old('serialNumber') }}" required autofocus>

                                @if ($errors->has('serialNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serialNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                             <!-- colocar aqui o código do combobox https://pt.stackoverflow.com/questions/128914/laravel-como-popular-uma-combobox-no-evento-on-load-de-uma-view-blade -->   
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div name="status" value="{{ old('status') }}" required autofocus">
                            <Select>
                                <option>Ativo</option>
                                <option>Inativo</option>
                            </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="serialNumber" class="col-md-4 col-form-label text-md-right">{{ __('Número de Serial') }}</label>

                            <div class="col-md-6">
                                <input id="serialNumber" type="text" class="form-control{{ $errors->has('serialNumber') ? ' is-invalid' : '' }}" name="serialNumber" value="{{ old('serialNumber') }}" required autofocus>

                                @if ($errors->has('serialNumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('serialNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Equipamentos') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
