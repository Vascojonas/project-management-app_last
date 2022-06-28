<?php

namespace App\Http\Livewire;
use App\Models\Projecto;
use App\Models\Capitulo;
use PDF;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProjectoCapitulo extends Component
{
    public $projecto_principal;
    
    public $projecto=['contratante'=>'','prazo'=>'', 'descricao'=>'', 'localizacao'=>''];

    public $projectosCode=[];
    public $nrProjecto;
    public $projectos=[];
    public $actividades=[];
    public $capitulos=[];
    public $capitulosNumero=[];

    public $codigo;
    public $capitulo;


    public $adcionarValido=false;
    public $novoServicoValido=false;

    public $quantidade;
    public $preco_unit;
    

    public $editar;

    public function mount(){
        $current_url = \Request::fullUrl();
        $arry = explode('-',$current_url );
        

        if(count($arry)==2){
            //dd($arry);
            $this->nrProjecto=$arry[1];
            $this->projecto= $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
            $this->adcionarValido=true;
            $this->projectoInfo();

        }
    }



    public function novoServico(){
        $data= $this->validate([
            'nrProjecto'=> 'required',
        ]);
        $this->novoServicoValido=true;

        $this->projectosCode= Projecto::select('id','nrProjecto')->get();

       $this->projecto= $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
       $this->projectoInfo();
        
    }

    public function cadastrarServico(){
        $data= $this->validate([
            'codigo'=> 'required',
            'capitulo'=> 'required',
        ]);

        $projecto= Projecto::where('nrProjecto', $data['codigo'])->first();
        $data['projecto_associado']=$projecto['id'];

        $capitulo = new Capitulo($data);
        $this->projecto->capitulos()->save($capitulo);

        $this->projectoInfo();
    }

    public function projectoInfo(){
        $data= $this->validate([
            'nrProjecto'=> 'required',
        ]);
        $novoServicoValido=false;

        $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
        $this->projecto=$projecto;
        if(!$projecto){
            $this->projecto=['contratante'=>'','prazo'=>'', 'descricao'=>'', 'localizacao'=>''];
            $this->capitulos= array();
            session()->flash('codigoErro','Nao existe nenhum projecto com esse codigo');
           return;
        }

        $this->adcionarValido=true;

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
            $this->adcionarValido=true;
           $this->capitulos=$capitulos;

           $capitulo =$this->capitulos->first();
        
                $r=$capitulo->leftJoin('projectos','projectos.id', '=', 'capitulos.projecto_associado')
                ->select('projectos.*', 'capitulos.capitulo', 'capitulos.id as idCapitulo')
                ->where('capitulos.projecto_id', '=', $capitulo['projecto_id'])->get();
            
                $this->projectos=$r;
                $novoServicoValido=false;
           return;

        }
    }


    public function delete($capituloId){
        Capitulo::find($capituloId)->delete();
        $this->projectoInfo();
    }

    public function editar($codigo){
        $this->editar=$codigo;
        $this->projectoInfo();
    }
   
    public function update($codigo){
      
        $this->editar=0;
        $data= $this->validate([
            'quantidade'=> 'required',
        ]);
        $projecto = Projecto::find($codigo);
       
        
        $data=[
            'nrProjecto'=>$projecto['nrProjecto'],
        'descricao'=>$projecto['descricao'],
        'contratante'=>$projecto['contratante'],
        'localizacao'=>$projecto['localizacao'],
        'quantidade'=>$this->quantidade,
        'preco_unitario'=>$projecto['preco_unitario'],
        'prazo'=>$projecto['prazo'],
        ];

        $projecto = Projecto::find($codigo)->update($data);
        $this->projectoInfo();
    }

    
    public function downloadPdf(){
        $projecto= $this->projecto;
     
        $actividades = $this->actividades;
        
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convertCostumerDataToHtml());

        return $pdf->stream();
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
        return view('livewire.projecto-capitulo');
    }
}
