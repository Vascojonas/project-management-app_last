<?php

namespace App\Http\Livewire;
use App\Models\Projecto;
use App\Models\Capitulo;
use App\Models\Actividade;
use Livewire\Component;
use PDF;

class ProjectoActividades extends Component
{   
    public $projecto_principal;
    public $custos;

    public $nrProjecto;
    public $projecto;
    public $actividades=[];

    public $total=0;

    public $totalReal;


    public function mount(){
        $current_url = \Request::fullUrl();
        $arry = explode('-',$current_url );
        

        if(count($arry)==3){
            //dd($arry);
            $this->nrProjecto=$arry[1];
            $this->projecto_principal= $arry[2];
            
            $this->projectoInfo();
        }
    }

    public function projectoInfo(){
        $data= $this->validate([
            'nrProjecto'=> 'required',
        ]);

        $projecto= Projecto::whereNrprojecto($this->nrProjecto)->first();
      
        if(!$projecto){
            $this->projecto = ['contratante'=>'', 'localizacao'=>'','prazo'=>'', 'descricao'=>'' ];
            $this->capitulos= array();
            session()->flash('codigoErro','Nao existe nenhum projecto com esse codigo');
           return;
        }
    
        $actividades= $projecto->actividades;
        
        //dd($actividades);
        $this->projecto = $projecto;
        $this->custos= $custo =$this->projecto->custo;
        $this->actividades=$actividades;
    }

    public function downloadPdf(){
        $projecto= $this->projecto;
     
        $actividades = $this->actividades;
        
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convertCostumerDataToHtml());

        return $pdf->stream();
    }


    public function voltar($total){
        $projecto= Projecto::whereNrprojecto($this->nrProjecto)->first();
       
        $data=[
            'nrProjecto'=>$projecto['nrProjecto'],
        'descricao'=>$projecto['descricao'],
        'contratante'=>$projecto['contratante'],
        'localizacao'=>$projecto['localizacao'],
        'quantidade'=>$projecto['quantidade'],
        'preco_unitario'=>$total,
        'prazo'=>$projecto['prazo'],
        ];
        
        $this->projecto->update($data);

        return redirect('/projectos/capitulos/-'.$this->projecto_principal);
    }

    public function custos($total, $totalReal){
        $projecto= Projecto::whereNrprojecto($this->nrProjecto)->first();
        
        $data=[
            'nrProjecto'=>$projecto['nrProjecto'],
        'descricao'=>$projecto['descricao'],
        'contratante'=>$projecto['contratante'],
        'localizacao'=>$projecto['localizacao'],
        'quantidade'=>$projecto['quantidade'],
        'preco_unitario'=>$total,
        'prazo'=>$projecto['prazo'],
        ];
        
        $this->projecto->update($data);
        
        return redirect('/custos/-'.$this->nrProjecto.'-'.$this->projecto_principal.'-'.$totalReal);

    }

    
    public function convertCostumerDataToHtml()
    {
    
     $output = '
     <h3 align="center">Customer Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
    <th style="border: 1px solid; padding:12px;" width="15%">City</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Country</th>
   </tr>
     ';  
     
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.'</td>
       <td style="border: 1px solid; padding:12px;">'.'</td>
       <td style="border: 1px solid; padding:12px;">'.'</td>
       <td style="border: 1px solid; padding:12px;">'.'</td>
       <td style="border: 1px solid; padding:12px;">'.'</td>
      </tr>
      ';
     
     $output .= '</table>';

     return $output;
    }

    public function render()
    {
        return view('livewire.projecto-actividades');
    } 
}
