<?php

namespace App\Http\Livewire;
use App\Models\actividade;
use App\Models\Custo;
use App\Models\Projecto;

use Livewire\Component;

class CustosIndirectos extends Component
{
    public $projecto_principal;
    public $projecto;

    public $custos;
    public $custo=false;



    public $nrProjecto;
    public $actividade;
    public $preco_unitario;
    public $di;
    public $al;
    public $ac;
    public $df ;
    public $dm ;
    public $iva;
    
    public $taxa_di=0;
    public $taxa_al=2;
    public $taxa_ac=5;
    public $taxa_df=0 ;
    public $taxa_dm=2;
    public $taxa_iva=17;

    public $lucroBruto;
    public $taxa_lucroBruto=25;
    public $riscos;
    public $taxa_riscos=3;
    public $k;
    public $actividadeValida= true; 

    public $d1_txt="Outras despesas 1";
    public $d2_txt ="Outras despesas 2";
    public $d3_txt ="Outras despesas 3";

    public $d1_value;
    public $d2_value;
    public $d3_value;

    protected $listeners = [
        'getValue1ForInput',
        'getValueDi',
        'getValueRisco',
        'getValueAc',
        'getValueAl',
        'getValueDf'
   ];

   public function getValue1ForInput($value)
    {
        if(!is_null($value))
            $this->d1_value = $value;
    }

    public function getValueDi($value)
    {

        if(!is_null($value))
            $this->taxa_di = $value;
    }

    public function getValueDf($value)
    {
        if(!is_null($value))
            $this->taxa_df = $value;
    }
    public function getValueAl($value)
    {
        if(!is_null($value))
            $this->taxa_al = $value;
    }
    public function getValueAc($value)
    {
        if(!is_null($value))
            $this->taxa_ac = $value;
    }
    public function getValueRisco($value)
    {
        if(!is_null($value))
            $this->taxa_riscos = $value;
    }





    public $campo, $habilitar=false;


    public function mount(){
        $current_url = \Request::fullUrl();
        $arry = explode('-',$current_url );
        

        if(count($arry)==4){
            //dd($arry);
            $this->nrProjecto=$arry[1];
            $this->projecto_principal=$arry[2];
            $this->projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();

            $this->custos= $custo =$this->projecto->custo;
            if( $custo){
               // dd("tem custo",$custo);
                $this->custo=true;
                
                 $this->taxa_di=$custo['despesas_inicial'];
                 $this->taxa_al=$custo['administracao_local'];
                 $this->taxa_ac=$custo['administracao_central'];
                 $this->taxa_df=$custo['despesas_finaceiras'];
                 $this->taxa_dm=$custo['despesas_manutencao'];
                 $this->taxa_iva=$custo['iva'];
                 $this->taxa_lucroBruto=$custo['lucro_bruto'];
                 $this->taxa_riscos=$custo['riscos'];
                 $this->d1_value= $custo['despesa_1'];
                

                if($custo['despesa_2']!=0){
                    $array = explode("=",$custo['despesa_2'] );
                    $this->d2_txt=$array[0];
                    $this->d2_value=$array[1];
                }

                if($custo['despesa_3']!=0){
                    $array = explode("=",$custo['despesa_3'] );
                    $this->d3_txt=$array[0];
                    $this->d3_vaue=$array[1];
                }

            }
               


           // $this->preco_unitario=$arry[3];
            $this->preco_unitario=1;
           // $this->preco_unitario=$projecto['preco_unitario'];

            $this->calcular();

        }
    }

    public function voltar(){
        return redirect('/projectos/actividades/-'.$this->nrProjecto.'-'.$this->projecto_principal);

    }
    
    public function calcular(){
        // dd($this->d1_value);
        $data= $this->validate([
            'preco_unitario'=> 'required',
        ]);
  
       $al= $this->al = round($this->preco_unitario*($this->taxa_al/100) , 2);
  
       $ac= $this->ac = round($this->preco_unitario*($this->taxa_ac/100),2);
       $df= $this->df = 0;
       $dm=$this->dm = round($this->preco_unitario*($this->taxa_dm/100) ,2);
       $iva= $this->iva = round($this->preco_unitario*($this->taxa_iva/100), 2);
      $r=$this->riscos = round($this->preco_unitario*($this->taxa_riscos/100),2);
       $l= $this->lucroBruto = round($this->preco_unitario*($this->taxa_lucroBruto/100) , 2);
        
        //$this->d1_value= $this->d1_value/100;
       $this->d2_value= ($this->d2_value=='')? 0:$this->d2_value;
       $this->d3_value= ($this->d3_value=='')? 0:$this->d3_value;
   
       $numerador= (1+($this->taxa_al/100 +$this->taxa_ac/100+$this->taxa_riscos/100+$this->taxa_dm/100
        +$this->taxa_df/100 +$this->d1_value/100+$this->d2_value/100+$this->d3_value/100));

        $denominador=((1/(1+$this->taxa_lucroBruto/100))+(1/(1+$this->taxa_iva/100))-1);
     
      $k= $numerador/$denominador;
      $this->k=round($k,2);

    }
    
    public function actividadeValidar(){
        $data= $this->validate([
            'copreco_unitariogo'=> 'required',
        ]);

        $actividade= Actividade::wherecopreco_unitariogo($this->copreco_unitariogo)->first();
        if(!$actividade){
            $this->actividadeValida =false;
            session()->flash('copreco_unitariogoErro','Nao existe nenhum actividade com esse copreco_unitariogo');
            $this->actividade=null;
            return;
        }

        $this->actividadeValida =true;
        $this->actividade=$actividade;

       // dd($actividade->custo());
        session()->flash('copreco_unitariogoCerto','Copreco_unitariogo Valido');

    }

    public function cadastrarCusto(){
        $this->calcular();
        
        
        
        $data= $this->validate([
            'taxa_di' => 'required',
            'taxa_al' => 'required',
            'taxa_ac'=> 'required',
            'taxa_df' => 'required',
            'taxa_dm' => 'required',
            'taxa_riscos' => 'required',
            'taxa_iva' => 'required',
            'taxa_lucroBruto' => 'required',
            'k' => 'required',
            'd1_value'=>'required'
           
        ]);

    

        $custo =[
            'despesas_inicial'=>$data['taxa_di'],
            'administracao_local' =>$data['taxa_al'],
            'administracao_central' =>$data['taxa_ac'],
            'despesas_finaceiras' =>$data['taxa_df'],
            'despesas_manutencao'=>$data['taxa_dm'],
            'riscos'=>$data['taxa_riscos'],
            'despesa_1' => $data['d1_value'],
            'despesa_2' => 0,
            'despesa_3' => 0,
            'iva'=>$data['taxa_iva'],
            'irps'=> 0,
            'tributo_1'=>0,
            'tributo_2'=>0,
            'tributo_3'=>0,
            'lucro_bruto'=>$data['taxa_lucroBruto'],
            'indutor_custo'=>$data['k']
       ];






        if($this->d2_value){
            $custo['despesa_2']= $this->d2_txt .'='. $this->d2_value;
        }
        if($this->d3_value){
            $custo['despesa_3']= $this->d3_txt .'='. $this->d3_value;
        }
      
        $c = new Custo($custo);
     
        
       $this->projecto->custo()->save($c);
        session()->flash('success','Custos cadastrados com sucesso');

    }

    public function actualizarCusto(){
        $this->calcular();
        
        $data= $this->validate([
            'taxa_di' => 'required',
            'taxa_al' => 'required',
            'taxa_ac'=> 'required',
            'taxa_df' => 'required',
            'taxa_dm' => 'required',
            'taxa_riscos' => 'required',
            'taxa_iva' => 'required',
            'taxa_lucroBruto' => 'required',
            'k' => 'required',
            'd1_value'=>'required'
        ]);

        $custo =[
            'despesas_inicial'=>$data['taxa_di'],
            'administracao_local' =>$data['taxa_al'],
            'administracao_central' =>$data['taxa_ac'],
            'despesas_finaceiras' =>$data['taxa_df'],
            'despesas_manutencao'=>$data['taxa_dm'],
            'riscos'=>$data['taxa_riscos'],
            'despesa_1' => $data['d1_value'],
            'despesa_2' => 0,
            'despesa_3' => 0,
            'iva'=>$data['taxa_iva'],
            'irps'=> 0,
            'tributo_1'=>0,
            'tributo_2'=>0,
            'tributo_3'=>0,
            'lucro_bruto'=>$data['taxa_lucroBruto'],
            'indutor_custo'=>$data['k']
    ];

 

        if($this->d2_value){
            $custo['despesa_2']= $this->d2_txt .'='. $this->d2_value;
        }
        if($this->d3_value){
            $custo['despesa_3']= $this->d3_txt .'='. $this->d3_value;
        }
    
     
        $this->custos->update($custo);
        
        session()->flash('success','Custos actualizados com sucesso');
    }

    public function editarCampo($id){
        $this->campo=$id;
        $this->habilitar=$id;
    }
    public function fecharCampo(){
        $this->campo='';
    }

    

    public function render()
    {
        return view('livewire.custos-indirectos');
    }
}



