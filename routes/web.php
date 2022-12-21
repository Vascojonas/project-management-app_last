<?php

use Illuminate\Support\Facades\Route;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\Projecto;
use App\Models\Capitulo;
use App\Models\Actividade;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (App::environment('production')) {
    URL::forceScheme('https');
}



Route::get('/' , App\Http\Livewire\CadastrarProjecto::class);
Route::get('/{code}' , App\Http\Livewire\CadastrarProjecto::class);
Route::get('/servicos/cadastrar/{code}' , App\Http\Livewire\CadastrarServicos::class);
Route::get('/servico/update/{code}' , App\Http\Livewire\CadastrarServicos::class);
Route::get('/projectos' , App\Http\Livewire\TodosProjectos::class);
Route::get('/projectos/capitulos/--{code}' , App\Http\Livewire\ProjectoCapitulo::class);
Route::get('/projectos/capitulos/' , App\Http\Livewire\ProjectoCapitulo::class);
Route::get('/projectos/actividades/{code}' , App\Http\Livewire\ProjectoActividades::class);
Route::get('/projectos/actividades/{code}' , App\Http\Livewire\ProjectoActividades::class);
Route::get('/capitulos' , App\Http\Livewire\CadastrarCapitulos::class);
Route::get('/processar/pagamentos/--{code}' , App\Http\Livewire\MaoObra::class);
Route::get('/actividades/equipamentos/--{code}' , App\Http\Livewire\Equipamentos::class);
Route::get('/custos/{code}' , App\Http\Livewire\CustosIndirectos::class);
Route::get('/projectos/relatorio/pdf/{code}' , [App\Http\Controllers\AppController::class,'activdadesRelatorio']);
Route::get('/projectos/relatorio/excel/{code}' , [App\Http\Controllers\AppController::class,'relatorioExcel']);


//Route::get('/', [App\Http\Controllers\AppController::class,'carregarDados']);

Route::get('/xls' , function(){
    
    ini_set('max_execution_time', 300);
    $inputFileName = 'db.xls';
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

    $datas = $spreadsheet->getActiveSheet()->toArray();
    $controleActividade=0;

    $projecto= new Projecto;

    $codigos =[];

    $index=0;
    foreach($datas as $data){
        if($index==0){
            $index ++;
            continue;
        }

        
        if($data[12]!=''){
            if(!in_array($data[6], $codigos)){
                array_push($codigos,$data[6]);

                $p =[
                    'nrProjecto' => $data[6],
                    'descricao'  => $data[7],
                    'contratante' => ' ',
                    'localizacao' => ' ',
                    'prazo' => now(),
                ];

                $projecto = Projecto::create($p);

                $a =[
                    'codigo'=> $data[12],
                    'designacao'=> $data[13],
                    'unidade'=> $data[8],
                    'coeficiente'=> str_replace(',', '.',$data[16]),
                    'quantidade' =>1,
                    'preco_unitario'=> 0,
                    'preco_final'=> 0,
                ];

                $actividade = new Actividade($a);

                $projecto->actividades()->save($actividade);
                
            
                //echo  $controleActividade .'<br>';
                $controleActividade++;
            }else{
                
                // echo  $controleActividade .'<br>';
                $a =[
                    'codigo'=> $data[12],
                    'designacao'=> $data[13],
                    'unidade'=> $data[8],
                    'coeficiente'=> str_replace(',', '.',$data[16]),
                    'quantidade' =>1,
                    'preco_unitario'=> 0,
                    'preco_final'=> 0,
                ];
                $actividade = new Actividade($a);
                $projecto->actividades()->save($actividade);
                
            }
        }
    }


    
});