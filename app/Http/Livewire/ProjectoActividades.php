<?php

namespace App\Http\Livewire;
use PDF;
use App\Models\Custo;
use Livewire\Component;
use App\Models\Capitulo;
use App\Models\Projecto;
use App\Models\Actividade;
use Illuminate\Support\Facades\DB;

class ProjectoActividades extends Component
{   
    public $projecto_principal;
    public $custos;

    public $nrProjecto;
    public $projecto;
    public $actividades=[];

    public $total=0;

    public $totalReal;


    protected $listeners = [
        'custos'

   ];

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

        $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
      
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
        $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
       
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
        $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
        
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


    public function lastCustoIndirecto(){
        $c = DB::table('custos')->orderBy('updated_at', 'desc')->first();

        // +"id": 1
        // +"projecto_id": 2506
        // +"despesas_inicial": "0"
        // +"administracao_local": "2"
        // +"administracao_central": "5"
        // +"despesas_finaceiras": "0"
        // +"despesas_manutencao": "2"
        // +"riscos": "3"
        // +"despesa_1": "95"
        // +"despesa_2": "0"
        // +"despesa_3": "0"
        // +"iva": "17"
        // +"irps": "0"
        // +"tributo_1": "0"
        // +"tributo_2": "0"
        // +"tributo_3": "0"
        // +"lucro_bruto": "25"
        // +"indutor_custo": "3.16"
        // +"created_at": "2022-11-08 10:07:56"
        // +"updated_at": "2022-11-08 10:07:56"

        $custo =[
            'despesas_inicial'=>$c->despesas_inicial,
            'administracao_local' =>$c->administracao_local,
            'administracao_central' => $c->administracao_central,
            'despesas_finaceiras' => $c->despesas_finaceiras,
            'despesas_manutencao'=> $c->despesas_manutencao,
            'riscos'=>$c->riscos,
            'despesa_1' => $c->despesa_1,
            'despesa_2' =>$c->despesa_2,
            'despesa_3' => $c->despesa_3,
            'iva'=>$c->iva,
            'irps'=> $c->irps,
            'tributo_1'=>$c->tributo_1,
            'tributo_2'=>$c->tributo_2,
            'tributo_3'=>$c->tributo_3,
            'lucro_bruto'=>$c->lucro_bruto,
            'indutor_custo'=>$c->indutor_custo,
       ];
      
        $c = new Custo($custo);
        
       $this->projecto->custo()->save($c);

       return redirect('/projectos/capitulos/-'.$this->projecto_principal);
    }

    public function actividadeDelete($id){
        Actividade::find($id)->delete();
        $this->projectoInfo();
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
