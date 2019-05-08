


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                <a href="{{ route('equipaments') }}">{{ __('Cadastrar um Novo') }}</a> 
                                </button>
                            </div>
                        </div>
                <div class="card-header">{{ __('Lista de Equipamentos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('equipamentslist') }}">
                        @csrf
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                </tr>
                            </tbody>
                            </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

