
@section('title', $title)
@section('content_header')
    @include('doctors.partials.contentHeader')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table class="datatables table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Pefil</th>
                                <th>Cadastro</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td>{{$doctor->name}}</td>
                                    <td>{{$doctor->email}}</td>
                                    <td>
                                    @foreach($doctor->roles as $role)
                                            {{$role->display_name}}
                                    @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-xs btn-primary">Editar</a>
                                        <a href="{{ route('doctors.destroy', $doctor->id) }}" class="btn btn-xs btn-danger">Excluir</a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop