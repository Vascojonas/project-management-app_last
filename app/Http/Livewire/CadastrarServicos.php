<?php

namespace App\Http\Livewire;
use App\Models\Projecto;
use App\Models\Capitulo;
use App\Models\Actividade;
use Livewire\Component;

class CadastrarServicos extends Component
{   public $projecto_principal;
    public $actualizar= false;


    public $actividadeId;
    public $nrProjecto;
    public $codigo;
    public $designacao;
    public $unidade;
    public $quantidade;
    public $coeficiente;
    public $preco_unitario;
    public $preco_final;
    public $capitulo_id;

    public $capitulos=[];

    


    public function mount(){
        $current_url = \Request::fullUrl();
        $arry = explode('-',$current_url );
        

        if(count($arry)==5){
            //dd($arry);

            $this->actualizar=true;

            $this->nrProjecto=$arry[3];
            $this->actividadeId=$arry[1];
            $this->codigo =$arry[2];
            $this->projecto_principal =$arry[4];
            $actividade= Actividade::find($this->actividadeId);
            
            //dd($actividade);
            
            $this->designacao=$actividade['designacao'];    
            $this->unidade=$actividade['unidade']; 
            $this->quantidade=$actividade['quantidade'];
            $this->coeficiente =$actividade['coeficiente'];
            $this->preco_unitario =$actividade['preco_unitario'];
            $this->preco_final =$actividade['preco_final'];
            $this->capitulo_id = $actividade['capitulo_id'];
            
        }

       
        
    }
    public function calcular(){
        $data= $this->validate([
            'preco_unitario'=> 'required',
            
        ]);

        if($this->preco_unitario==''){
            $this->preco_unitario=0;
        }

        $this->preco_final= round($this->preco_unitario*$this->coeficiente,2);
    }

    public function actualizarServico(){
       // dd("Chegamos aqui");
        $data= $this->validate([
            'codigo'=> 'required',
            'designacao'=> 'required',
            'quantidade'=> 'required',
            'unidade'=> 'required',
            'preco_final'=> 'required',
            'preco_unitario'=> 'required',
            
        ]);

        $actividade=Actividade::find($this->actividadeId)->update($data);
        
        
       /* $actividade->preco_unitario= $data['preco_unitario'];
        $actividade->quantidade=$data['quantidade'];
        $actividade->designacao =$data['designacao'];
        $actividade->unidade =$data['unidade'];
        $actividade->capitulo_id =$data['capitulo_id'];
        */
        
        //dd($actividade);
       // $actividade->update();
        session()->flash('success', 'Actividade actualizada com sucesso');
        $nrProjecto=  $this->nrProjecto;
        return redirect('/projectos/actividades/-'.$nrProjecto.'-'.$this->projecto_principal);

    }

    public function capitulos(){
        
        $data= $this->validate([
            'nrProjecto'=> 'required',
        ]);
        
        $projecto= Projecto::whereNrprojecto($this->nrProjecto)->first();
       
        if($projecto){
           $this->capitulos= $projecto->capitulos;
           session()->flash('codigoCerto','Codigo valido');
        }else{
            session()->flash('codigoErro','Nao existe nenhum projecto com esse codigo');
        }

    }
    
    public function cadastrarServico(){

        
        $data= $this->validate([
            'codigo'=> 'required',
            'designacao'=> 'required',
            'quantidade'=> 'required',
            'unidade'=> 'required',
            'preco_unitario'=> 'required',
            'capitulo_id'=> 'required',
        ]);


        $actividade = new Actividade($data);
        $capitulo= Capitulo::whereId($this->capitulo_id)->first();

        $capitulo->actividades()->save($actividade);
        session()->flash('success', 'Actividade registrada com sucesso');
    }

    public function render()
    {
        return view('livewire.cadastrar-servicos');
    }
}
