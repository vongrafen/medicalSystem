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
            			<h3 class="panel-title">Usuários</h3>
              			<p class="panel-subtitle">Lista dos usuário cadastrador no sistema</p>
            		</div>
            		<div class="col-md-6">
            			<a href="{{ route('usuario.novo') }}" class="btn btn-default pull-right">Novo</a>
            		</div>

            	</div>
            </div>

            <!-- Dentro do Painel -->

            <div class="row">
				<div class="col-md-12">
					<!-- Tabela de dados -->
					<div class="panel">
						<div class="panel-body">

							<table class="table table-hover">
								<thead>
									<tr>
										<th width="80px"></th>
										<th>Nome</th>
										<th>Login</th>
										<th>E-mail</th>
										<th>Ativo</th>
										<th width="80px"></th>
									</tr>
								</thead>
								<tbody>
								@foreach($resultado as $x)
									<tr>
										<td>
										@if ($x->img != null)
				                    	<img src="{{ asset('/img/avatar/'.$x->img) }}" class="img-circle" alt="User Image" width="30px" height="30px">
					                  	@else
					                    <img src="{{ asset('/img/avatar/user_padrao.png') }}" class="img-circle" alt="User Image" width="30px" height="30px">
					                  	@endif											
										</td>
										<td>{{ $x->nome }}</td>
										<td>{{ $x->login }}</td>
										<td>{{ $x->email }}</td>
										<td>
											@if($x->ativo == 1)
											<i class="fa fa-check" style="color: #41B314"></i> 
											@else 
											<i class="fa fa-close" style="color: #ff0000"></i>
											@endif	
										</td>
										<td><a href="{{ route('usuario.ver',[$x->id]) }}" class="btn btn-default fa fa-eye"></a></td>
									</tr>
								@endforeach
								</tbody>
							</table>

						</div>
					</div>
					<!-- Tabela de dados -->
				</div>
			</div>

            <!-- Dentro do Painel -->

        </div>
	</div>
  </div>
</div>

@endsection