


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista de Equipamentos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('listaequipamentos') }}">
                        @csrf
                         <table class="table">
                            <thead>
                                <tr>
                                <th>...</th>
                                <th>...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th>...</th>
                                <td>...</td>
                                </tr>
                            </tbody>
                            </table>   
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('listaequipamentos') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

