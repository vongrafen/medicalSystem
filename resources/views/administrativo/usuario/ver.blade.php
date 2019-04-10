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
            			<h3 class="panel-title">Perfil Usuário</h3>
              			<!--<p class="panel-subtitle">Informações do usuário</p>-->
            		</div>
            		<div class="col-md-6">
            			<a href="{{ route('usuario.index') }}" class="btn btn-default pull-right">Voltar</a>
            		</div>
            	</div>


				<div class="panel panel-profile">
					<div class="clearfix">
						<!-- LEFT COLUMN -->
						<div class="profile-left">


							<!-- PROFILE HEADER -->
							<div class="profile-header">
								<div class="overlay"></div>
								<div class="profile-main">
									<a href="#" data-toggle="modal" data-target="#modalImg">
										@if ($usuario->img != null)
					                    	<img src="{{ asset('/img/avatar/'.$usuario->img) }}" class="img-circle" alt="User Image" width="200px" height="200px">
					                  	@else
					                    	<img src="{{ asset('/img/avatar/user_padrao.png') }}" class="img-circle" alt="User Image" width="200px" height="200px">
					                  	@endif
									</a>
									<h3 class="name">{{ $usuario->nome }}</h3>
									<span class="online-status status-available">Ativo</span>
								</div>
								<div class="profile-stat">
									<div class="row">
										<div class="col-md-4 stat-item">
											<span>Último login</span>	01/01/1999 12:00 
										</div>
										<div class="col-md-4 stat-item">
											15 <span>Awards</span>
										</div>
										<div class="col-md-4 stat-item">
											2174 <span>Points</span>
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE HEADER -->


							<!-- PROFILE DETAIL -->
							<div class="profile-detail">
								<div class="profile-info">
									<h4 class="heading">Informações</h4>
									<ul class="list-unstyled list-justify">
										<li>Nome <span>{{ $usuario->nome }}</span></li>
										<li>Login <span>{{ $usuario->login }}</span></li>
										<li>Email <span>{{ $usuario->email }}</span></li>
										<li>Telefone (Ramal) <span>{{ $usuario->telefone }}</span></li>
									</ul>
								</div>
								<!--<div class="profile-info">
									<h4 class="heading">Social</h4>
									<ul class="list-inline social-icons">
										<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
									</ul>
								</div>-->
								<!--<div class="profile-info">
									<h4 class="heading">About</h4>
									<p>Interactively fashion excellent information after distinctive outsourcing.</p>
								</div>-->
								<div class="text-center">
									<a href="{{ route('usuario.form_usuario', $usuario->id) }}" class="btn btn-primary">Editar</a>
								</div>

							</div>
							<!-- END PROFILE DETAIL -->

						</div>
						<!-- END LEFT COLUMN -->


							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading"><i class="fa fa-cogs"></i> - Administrativo</h4>
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Grupos</a></li>
										<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Logins</a></li>
										<li><a href="#tab-bottom-left3" role="tab" data-toggle="tab">Painel 3</a></li>
									</ul>
								</div>

								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-bottom-left1">
										<table class="table project-table">
											<thead>
												<tr>
													<th>Grupo</th>
													<th>Supervisor</th>
													<th>Admin</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											@foreach($grupo as $x)	
												<tr>
													<td>{{ $x->grupo_nome }}</td>
													<td>
														@if($x->supervisor == true)
														<i class="fa fa-check" style="color: #41B314"></i> 
														@else 
														<i class="fa fa-close" style="color: #ff0000"></i>
														@endif
													</td>
													<td>
														@if($x->admin == 1)
														<i class="fa fa-check" style="color: #41B314"></i> 
														@else 
														<i class="fa fa-close" style="color: #ff0000"></i>
														@endif
													</td>
													<td>
														<a href="{{ route('usuario.form_edit_grupo', $x->user_group_id) }}" class="label label-warning" style="font-size:14px"><i class="fa fa-pencil-square-o"></i></a>
														<a href="{{ route('usuario.apagar_grupo', $x->user_group_id) }}" class="label label-danger" style="font-size:14px" onclick="return confirm('Deseja realmente apagar a informação?')"><i class="fa fa-trash-o"></i></a>
													</td>
												</tr>
											@endforeach
											</tbody>
										</table>
										<div class="margin-top-30 text-center"><a href="{{ route('usuario.form_grupo', $usuario->id) }}" class="btn btn-default">Adicionar</a></div>

										<!-- MODAL DE NOTIFICAÇÃO DO APAGAR -->
										<br>
						                  <div class="col-md-offset-2 col-md-8">
						                    @if ($message = Session::get('success'))
						                    <div class="alert alert-success alert-block">
						                        <button type="button" class="close" data-dismiss="alert">×</button>
						                        <strong>{{ $message }}</strong>
						                      </div>
						                    @endif

						                    @if ($message = Session::get('error'))
						                    <div class="alert alert-danger alert-block">
						                        <button type="button" class="close" data-dismiss="alert">×</button>
						                        <strong>{{ $message }}</strong>
						                      </div>
						                    @endif
						                </div>
						                <!-- MODAL DE NOTIFICAÇÃO DO APAGAR -->

									</div>

									<div class="tab-pane fade" id="tab-bottom-left2">
										<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Data</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a href="#">Spot Media</a></td>
														<td><span class="label label-success">Login</span></td>
													</tr>
													<tr>
														<td><a href="#">E-Commerce Site</a></td>
														<td><span class="label label-warning">Logoff</span></td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>

									<div class="tab-pane fade in active" id="tab-bottom-left3">
	
										

									</div>

								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
		
			<!-- END MAIN CONTENT -->




            </div>

            

        </div>
	</div>
  </div>
</div>


<!-- ******************* MODAL ALTERAÇÃO AVATAR *********************  -->
<div id="modalImg" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        
          <div id="view_img"></div>

          	<div class="row">
                <div class="col-md-9">
		            <div class="form-group">
		              <input type="file" id="upload_img">
		            </div>
		        </div>
		        <div class="col-md-3">
		            <div class="form-group">
		              <input type="button" id="salvar_avatar" value="Salvar" class="btn btn-success" />
		            </div>
		      	</div>
		    </div>

            <form action="{{ route('usuario.update_avatar') }}" method="post" id="id_form">
            {{ csrf_field() }}
              
              <input type="hidden" name="imagebase64" id="imagebase64"> <!-- id="imagebase64" -->

            </form>
   
            <small>Para remover a imagem, somente clique em salvar.</small>
      </div>
    </div>

  </div>
</div>

<!-- ******************* MODAL ALTERAÇÃO AVATAR *********************  -->

@endsection

@section('script')
<script type="text/javascript">

var $uploadCrop = $('#view_img').croppie({
    enableOrientation: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        height: 200
    }
}); 

$('#upload_img').on('change', function() { uploadImg(this); });

function uploadImg(input) {
  if (input.files && input.files[0]) {
    
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#view_img').addClass('ready');
      $uploadCrop.croppie('bind', {
        url: e.target.result
      });
    };
    
    console.log(event);
    
    reader.readAsDataURL(input.files[0]);
    
  } else {
    alert('Navegador não suportado!');
  };
};



$('#salvar_avatar').on('click', function (ev) {

  var x = document.getElementById("upload_img");

  if (x.files.length == 0) {
        $('#imagebase64').val(null);
        $('#id_form').submit();
    } else {

      $uploadCrop.croppie('result', {
        type: 'base64',
        format: 'png'
        //size: {width: 200, height: 200, type: 'circle'}
      }).then(function (resp) {
        $('#imagebase64').val(resp);
        $('#id_form').submit();
      });

  }

});
 



</script>
@endsection