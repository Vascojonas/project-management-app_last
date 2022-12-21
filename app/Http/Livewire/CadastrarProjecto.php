<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Projecto;

class CadastrarProjecto extends Component
{   
    public $projecto_principal;

    public $nrProjecto;
    public $descricao;
    public $contratante;
    public $localizacao;
    public $prazo;

    public 
    $quantidade,
    $preco_unitario;

    public $edit=false;
   

    public function mount(){
        $current_url = \Request::fullUrl();
        $arry = explode('--',$current_url );
        

        if(count($arry)==3){

            $this->edit=true;
            //dd($arry);
            $this->nrProjecto=$arry[1];
            $this->projecto_principal=$arry[2];

           $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
            
           $this->nrProjecto=$projecto['nrProjecto'] ;
           $this->descricao=$projecto['descricao'] ;
           $this->contratante=$projecto['contratante'] ;
            $this->localizacao=$projecto['localizacao'] ;
            $this->prazo=$projecto['prazo'] ;

         
            $this->quantidade=$projecto['quantidade'];
            $this->preco_unitario=$projecto['preco_unitario'] ;
           
           //dd($projecto);
        }
    }
 

    public function actualizarProjecto(){
        $data= $this->validate([
            'nrProjecto'=> 'required',
            'prazo'=> 'required',
            'quantidade'=> 'required',
        ]);
        $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
        $projecto->update($data);
        return redirect('/projectos/capitulos/--'.$this->projecto_principal);

    }


    public function cadastrarProjecto(){
        
        $data= $this->validate([
            'nrProjecto'=> 'required',
            'contratante'=> 'required',
            'descricao'=> 'required',
            'localizacao'=> 'required',
            'prazo'=> 'required',
        ]);

        $existe = Projecto::where('nrProjecto',$data['nrProjecto'])->first();

        if( $existe){
            session()->flash('codigoErro', 'Já existe um projecto com este código');
            return;
        }else{
            Projecto::create($data);
            return redirect('/projectos/capitulos/--'.$this->nrProjecto);
        }
    }
    
    
    public function render()
    {
        return view('livewire.cadastrar-projecto');
    }
}
