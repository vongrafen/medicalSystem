<?php

Route::get('/', function () {
    return Redirect::to('login');
});

Route::redirect('/', '/login', 301);

Route::view('/login', 'login.login')->name('login');
Route::post('/authentication', 'LoginController@authentication')->name('authentication');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::view('/home', 'layout.index')->name('home');

/************ Autenticação ****************/
Route::group(['middleware' => ['auth']],function(){ 

	Route::prefix('administrativo')->group(function () {

		Route::prefix('usuario')->group(function () {
			Route::get('/index', 'Administrativo\UsuarioController@index')->name('usuario.index');
			Route::get('/ver/{id}', 'Administrativo\UsuarioController@ver')->name('usuario.ver');
			Route::view('/novo', 'administrativo.usuario.novo')->name('usuario.novo');
			Route::post('/criar', 'Administrativo\UsuarioController@criar')->name('usuario.criar');
			Route::get('/form_grupo/{id}', 'Administrativo\UsuarioController@form_grupo')->name('usuario.form_grupo');
			Route::post('/criar_grupo', 'Administrativo\UsuarioController@criar_grupo')->name('usuario.criar_grupo');
			Route::get('/form_edit_grupo/{id}', 'Administrativo\UsuarioController@form_edit_grupo')->name('usuario.form_edit_grupo');
			Route::post('/editar_grupo', 'Administrativo\UsuarioController@editar_grupo')->name('usuario.editar_grupo');
			Route::get('/apagar_grupo/{id}', 'Administrativo\UsuarioController@apagar_grupo')->name('usuario.apagar_grupo');
			Route::get('/form_usuario/{id}', 'Administrativo\UsuarioController@form_usuario')->name('usuario.form_usuario');
			Route::post('/editar_usuario', 'Administrativo\UsuarioController@editar_usuario')->name('usuario.editar_usuario');
			Route::post('/update_avatar', 'Administrativo\UsuarioController@update_avatar')->name('usuario.update_avatar');

		});

		Route::prefix('grupo')->group(function () {
			Route::get('/index', 'Administrativo\GrupoController@index')->name('grupo.index');
			Route::get('/novo', 'Administrativo\GrupoController@novo')->name('grupo.novo');
			Route::post('/criar', 'Administrativo\GrupoController@criar')->name('grupo.criar');
			Route::get('/form_editar/{id}', 'Administrativo\GrupoController@form_editar')->name('grupo.form_editar');
			Route::post('/editar', 'Administrativo\GrupoController@editar')->name('grupo.editar');
			Route::get('/apagar/{id}', 'Administrativo\GrupoController@apagar')->name('grupo.apagar');
		});

		Route::prefix('categoria')->group(function () {
			Route::get('/index/{id}', 'Administrativo\CategoriaController@index')->name('categoria.index');
			Route::get('/adicionar/{id}', 'Administrativo\CategoriaController@adicionar')->name('categoria.adicionar');
			Route::post('/criar', 'Administrativo\CategoriaController@criar')->name('categoria.criar');
			Route::get('/form_editar/{id}/', 'Administrativo\CategoriaController@form_editar')->name('categoria.form_editar');
			Route::post('/editar', 'Administrativo\CategoriaController@editar')->name('categoria.editar');
			Route::get('/apagar/{id}', 'Administrativo\CategoriaController@apagar')->name('categoria.apagar');
		});

		Route::prefix('subCategoria')->group(function () {
			Route::get('/index/{id}', 'Administrativo\SubCategoriaController@index')->name('subCategoria.index');
			Route::get('/adicionar/{id}', 'Administrativo\SubCategoriaController@adicionar')->name('subCategoria.adicionar');
			Route::post('/criar', 'Administrativo\SubCategoriaController@criar')->name('subCategoria.criar');
			Route::get('/form_editar/{id}/', 'Administrativo\SubCategoriaController@form_editar')->name('subCategoria.form_editar');
			Route::post('/editar', 'Administrativo\SubCategoriaController@editar')->name('subCategoria.editar');
			Route::get('/apagar/{id}', 'Administrativo\SubCategoriaController@apagar')->name('subCategoria.apagar');
		});

		Route::prefix('sla')->group(function () {
			Route::get('/index', 'Administrativo\SlaController@index')->name('sla.index');
			Route::get('/novo_ta', 'Administrativo\SlaController@novo_ta')->name('sla.novo_ta');
			Route::post('/criar_ta', 'Administrativo\SlaController@criar_ta')->name('sla.criar_ta');
			Route::get('/form_editar_ta/{id}/', 'Administrativo\SlaController@form_editar_ta')->name('sla.form_editar_ta');
			Route::post('/editar_ta', 'Administrativo\SlaController@editar_ta')->name('sla.editar_ta');
			Route::get('/apagar_ta/{id}', 'Administrativo\SlaController@apagar_ta')->name('sla.apagar_ta');
			Route::get('/novo_ts', 'Administrativo\SlaController@novo_ts')->name('sla.novo_ts');
			Route::post('/criar_ts', 'Administrativo\SlaController@criar_ts')->name('sla.criar_ts');
			Route::get('/form_editar_ts/{id}/', 'Administrativo\SlaController@form_editar_ts')->name('sla.form_editar_ts');
			Route::post('/editar_ts', 'Administrativo\SlaController@editar_ts')->name('sla.editar_ts');
			Route::get('/apagar_ts/{id}', 'Administrativo\SlaController@apagar_ts')->name('sla.apagar_ts');

		});

	});


	Route::prefix('ocorrencia')->group(function () {

		Route::get('/getCategoria/{id}', 'Aplicacao\OcorrenciaController@getCategoria')->name('ocorrencia.getCategoria');
		Route::get('/getSubCategoria/{id}', 'Aplicacao\OcorrenciaController@getSubCategoria')->name('ocorrencia.getSubCategoria');
		Route::get('/getSubCategoriaDescricao/{id}', 'Aplicacao\OcorrenciaController@getSubCategoriaDescricao')->name('ocorrencia.getSubCategoriaDescricao');
		Route::get('/download/{id}', 'Aplicacao\AnexoController@download')->name('anexo.download');
		//Route::post('/upAnexo', 'Aplicacao\OcorrenciaController@upAnexo')->name('ocorrencia.upAnexo');

		Route::prefix('novo')->group(function () {
			//Route::view('/form', 'chamados.novo')->name('novo.fomr');
			Route::get('/form/', 'Aplicacao\OcorrenciaController@form')->name('ocorrencia.novo.form');
			Route::post('/criar/', 'Aplicacao\OcorrenciaController@criar')->name('ocorrencia.criar');
			Route::get('/form_sub/{id}', 'Aplicacao\OcorrenciaController@form_sub')->name('ocorrencia.novo.form_sub');
			Route::post('/criar_sub/', 'Aplicacao\OcorrenciaController@criar_sub')->name('ocorrencia.criar_sub');

		});
		Route::prefix('pendente')->group(function () {
			Route::get('/listar', 'Aplicacao\OcorrenciaController@pendenteListar')->name('pendente.listar');
			Route::get('/ver/{id}', 'Aplicacao\OcorrenciaController@pendenteVer')->name('pendente.ver');
			Route::get('/atender/{id}', 'Aplicacao\OcorrenciaController@atender')->name('pendente.atender');
		});

		Route::prefix('atendimento')->group(function () {
			Route::get('/listar', 'Aplicacao\OcorrenciaController@atendimentoListar')->name('atendimento.listar');	
			Route::get('/ver/{id}', 'Aplicacao\OcorrenciaController@atendimentoVer')->name('atendimento.ver');
			Route::post('/adicionar', 'Aplicacao\AssentamentoController@adicionar')->name('assentamento.adicionar');
			
		});

		/*Route::prefix('assentamento')->group(function () {
			Route::post('/adicionar', 'Aplicacao\AssentamentoController@adicionar')->name('assentamento.adicionar');	
			Route::get('/ver/{id}', 'Aplicacao\OcorrenciaController@atendimentoVer')->name('atendimento.ver');
			
		});*/

	});


});
/************ Autenticação ****************/
