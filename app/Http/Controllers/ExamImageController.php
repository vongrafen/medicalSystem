<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\exam_image;
use App\Exam;

class ExamImageController extends Controller
{
    protected $ExamImage;
    public function __construct(exam_image $ExamImage)
    {   
        $this->ExamImage = $ExamImage;
        $this->middleware('auth');
    }

    public function images($id)
    {
        try{
            $exm = Exam::find($id);
            return view('Exam.images', ['exm' => $exm] );

        }catch(Exeption $e){
            dd('Erro!');
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse exame cadastrado, deseja cadastrar?",
                'class'=>"alert-danger"
            ]);
            return view('Exam.add');
        }
    }


/*    MULTIPLAS IMAGENS 

$diretorio = "imagens/";

if(!is_dir($diretorio)){ 
	echo "Pasta $diretorio nao existe";
}else{
	$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
	for ($controle = 0; $controle < count($arquivo['name']); $controle++){
		
		$destino = $diretorio."/".$arquivo['name'][$controle];
		if(move_uploaded_file($arquivo['tmp_name'][$controle], $destino)){
			echo "Upload realizado com sucesso<br>"; 
		}else{
			echo "Erro ao realizar upload";
		}
		
	}
}
*/

    // TUTORIAL https://blog.especializati.com.br/upload-de-arquivos-no-laravel-com-request/

    public function uploadImages(Request $request)
    {
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
             
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
     
            // Recupera a extensão do arquivo

            $extension = $request->image->extension();
     
            // Define finalmente o nome
            // definimos ID(do cliente)+ID(exame)+dataatual???
            $nameFile = "{$name}.{$extension}";
     
            // Faz o upload:
            $upload = $request->image->storeAs('ImagensExame', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
     
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
     
        }
        echo('Não deu Certo, tem que upar a imagem.');
    }

        public function store(ManifestationFormRequest $request)
        {
            //Noma do arquivo a ser armazenado
            $name = date('dmYHis');
        
            //armazena form em dataForm
            $dataForm = $request->except('_token');
            //Armazena Input File em $file
            $file = $request->file('upload');
        
            //Se input file nulo
            if ($file = null)
            {
               return 'Não foi selecionado a imagem';
            }else
            {
                //Insere Formulário no Banco
               // $insert = $this->manifestation->insert($dataForm);
                //Pega extensão do arquivo original
                $extension = $request->file('upload')->extension();
                //Armazena arquivo em Storage/app/uploads e renomeia.
                $upload = $request->upload->storeAs('uploads', 
        $name.'.'.$extension);
            }
        
            Alert::success('Enviado...', 'Obrigado pela sua contribuição');
            return redirect()->route('index');
        }

}
