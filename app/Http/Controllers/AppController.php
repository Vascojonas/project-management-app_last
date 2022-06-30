<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\Projecto;
use App\Models\Capitulo;
use App\Models\Actividade;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public $nrProjecto;
    public $projectos=[];
    public $capitulos=[];

    public function relatorioExcel(){

        
        $current_url = \Request::fullUrl();
        $arry = explode('-',$current_url );
        

        if(count($arry)==2){
            //dd($arry);
            $this->nrProjecto=$arry[1];
            $this->projectoInfo();
        }


        $subTotal=0;
        $superTotal=0;

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

       
       
        $count = 1;

        foreach($this->capitulos as $capitulo){
            $subTotal=0;

            $sheet->setCellValue('C'.$count, 'Capitulo '.$capitulo);
            $count++;
         
            $sheet->setCellValue('A'.$count, 'Serviço');
            $sheet->setCellValue('B'.$count, 'Descrição')->getColumnDimension('B')->setWidth(50,'pt');
            $sheet->setCellValue('C'.$count, 'Quantidade');
            $sheet->setCellValue('D'.$count, 'Preço unitário');
            $sheet->setCellValue('E'.$count, 'Preço Total');
            $count++;
            foreach($this->projectos as $projecto){
                
                if($capitulo==$projecto['capitulo']){
                    $sheet->setCellValue('A'.$count, $projecto['nrProjecto']);
                    $sheet->setCellValue('B'.$count, $projecto['descricao']);
                    $sheet->setCellValue('C'.$count, $projecto['quantidade']);
                    $sheet->setCellValue('D'.$count, $projecto['preco_unitario']);
                    $sheet->setCellValue('E'.$count, $projecto['quantidade']*$projecto['preco_unitario']);
                    
                    $subTotal+=$projecto['quantidade']*$projecto['preco_unitario'];
                    $count++;
                }
            }
                $sheet->setCellValue('D'.$count, 'Sub Total '.$capitulo);
                $sheet->setCellValue('E'.$count, $subTotal);
                $superTotal+= $subTotal;
                $count++;
        }
        $count++;

        $sheet->setCellValue('D'.$count, 'Total');
        $sheet->setCellValue('E'.$count, $superTotal);
        $count++;
        $sheet->setCellValue('D'.$count, 'IVA');
        $sheet->setCellValue('E'.$count, $superTotal*0.17);
        $count++;
        $sheet->setCellValue('D'.$count, 'IVA');
        $sheet->setCellValue('E'.$count, $superTotal+$superTotal*0.17);
        $count++;

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="relatorio"'.time().'.xlsx"');
        header('Cache-Control: max-age=0');
        
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }


    public function activdadesRelatorio(){
      

        $current_url = \Request::fullUrl();
        $arry = explode('-',$current_url );
        

        if(count($arry)==2){
            //dd($arry);
            $this->nrProjecto=$arry[1];
            $this->projectoInfo();
        }




        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convertCostumerDataToHtml());

        return $pdf->stream();
    }


    public function downloadPdf(){
       
        
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convertCostumerDataToHtml());

        return $pdf->stream();
    }

    public function convertCostumerDataToHtml()
    {
        $subTotal=0;
        $superTotal=0;
    
     $output = '
     <div class=" justify-content-center">
        <img  src="./imagens/logo.jpg" class="logo" style="width: 80px; "
     <div>
     <div style="width:100%"> 
     </br>
    
     <span>PSPCV </span></br>
     <div style="width:100%; ">
          <span>Avenida Paulo Samuel Kankhomba, Maputo</span>
        <span style="margin: left 110px; margin-bottom:5px;;">'. now().'</span>
        <div>
     <div>

     <table width="100%" style="border-collapse: collapse; border: 0px; margin-top:10px;">';
     
    foreach($this->capitulos as $capitulo){
        $subTotal=0;
       
        $output .= 
        '<tr>
            <th colspan="5" style="border: 1px solid; padding:12px;" width="100%">Capitulo '. $capitulo.'</th>
         </tr> 
         <tr>
        <th style="border: 1px solid; padding:12px;" width="20%">Servico</th>
        <th style="border: 1px solid; padding:12px;" width="30%">Descricao</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Qantidade</th>
        <th style="border: 1px solid; padding:12px;" width="15%">Preco_Unitário</th>
        <th style="border: 1px solid; padding:12px;" width="20%">Preco_total</th>
       </tr>
         ';  
     
     foreach($this->projectos as $projecto){
        if($capitulo==$projecto['capitulo']){

            $output .= '
            <tr>
             <td style="border: 1px solid; padding:12px;">'.$projecto['nrProjecto'].'</td>
             <td style="border: 1px solid; padding:12px;">'.$projecto['descricao'].'</td>
             <td style="border: 1px solid; padding:12px;">'.$projecto['quantidade'].'</td>
             <td style="border: 1px solid; padding:12px;">'.$projecto['preco_unitario'].'00,Mts</td>
             <td style="border: 1px solid; padding:12px;">'.$projecto['quantidade']*$projecto['preco_unitario'].',00Mts</td>
            </tr>
            ';$subTotal+=$projecto['quantidade']*$projecto['preco_unitario'];
        }
     }

     $output .= '
        <tr>
            <th colspan="3" style="border: 1px solid; padding:12px;"></th>
            <th  style="border: 1px solid; padding:12px;">Sub_total '.$capitulo.'</th>
            <th  style="border: 1px solid; padding:12px;">'.$subTotal.',00Mts</th>
        </tr>';

        $superTotal+= $subTotal;

    }

     
     $output .= '
     </table>';

     $output .= '
        <table style="margin-left:380px; width:50%">
             <tr>
        <th colspan="3"></th>
        <th >total</th>
        <th >'.$superTotal.',00Mts</th>
     </tr>

     <tr>
     <th colspan="3" ></th>
     <th  >IVA(17%)</th>
     <th  >'.$superTotal*0.17.',00Mts</th>
    </tr>

    <tr>
    <th colspan="3"></th>
    <th  >Total_Geral </th>
    <th  >'.$superTotal+$superTotal*0.17.',00Mts</th>
    </tr>
 </table>
 
 
 <h4 align="center" style="margin-top:50px;">Obrigado!</h4>
     ';

     return $output;
}



    public function projectoInfo(){
        
        $novoServicoValido=false;

        $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();

        if(!$projecto){
            $this->projectos=[];
            $this->capitulos= array();
            session()->flash('codigoErro','Nao existe nenhum projecto com esse codigo');
           return;
        }

        $capitulos= $projecto->capitulos;
        $this->projecto_principal=$projecto['nrProjecto'];

        $c=[];
        foreach ($capitulos as $capitulo) {
            if(!in_array($capitulo['capitulo'], $c)){
                array_push( $c,$capitulo['capitulo']);
            }
        }

        $this->capitulosNumero =$c;
        
        if(count($capitulos)){
           $capitulo =$capitulos->first();
        
                $r=$capitulo->leftJoin('projectos','projectos.id', '=', 'capitulos.projecto_associado')
                ->select('projectos.*', 'capitulos.capitulo', 'capitulos.id as idCapitulo')
                ->where('capitulos.projecto_id', '=', $capitulo['projecto_id'])->get();
            
                $this->projectos=$r;
                $this->capitulos=$c;
           return;

        }else{
        
            $data=['capitulo'=>1,'projecto_associado'=> $projecto['id']];

            $capitulo= new Capitulo($data);
            $projecto->capitulos()->save($capitulo);

           $this->projectoInfo();
           
        }
    }


    function carregarDados(){
     
        ini_set('max_execution_time', 300);
        $inputFileName = 'db.xls';
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
    
        $datas = $spreadsheet->getActiveSheet()->toArray();
        $controleActividade=0;
    
        $total=0;
    
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
    
    
        
    }

}
