@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu login') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link de verificação foi enviado ao seu e-mail.') }}
                        </div>
                    @endif

                    {{ __('Depois desse procedimento, por favor verifique seu e-mail.') }}
                    {{ __('Se não recebeu o e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui que lhe enviaremos outro.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
