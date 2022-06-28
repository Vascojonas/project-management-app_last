<?php

namespace App\Http\Livewire;
use App\Models\Projecto;
use App\Models\Capitulo;
use Livewire\Component;

class CadastrarCapitulos extends Component
{

    public $projectos=[];

    public $projecto=[];

    public $capitulos=[];

    public $nrProjecto;




    public function mount(){
       
    }

    public function capitulo(){
        $data= $this->validate([
            'nrProjecto'=> 'required',
        ]);
        $this->projecto  =  $projecto= Projecto::where('nrProjecto',$this->nrProjecto)->first();
       
       if($projecto){
            $data= $projecto->capitulos;
            if(!$data->isEmpty()){
              
                $this->capitulos = $data;
            }else{

                $c=['capitulo'=> 1];
                $capitulo= new Capitulo($c);

                $projecto->capitulos()->save($capitulo);
                $this->capitulos=$projecto->capitulos;
            }
       }else{
        session()->flash('codigoErro','Nao existe nenhum projecto com esse codigo');
        return;
       }
    }

    public function novoCapitulo($code){

        $projecto= Projecto::where('nrProjecto',$code)->first();
        $data= $projecto->capitulos;

        $capituloNr= count($data)+1;

        $c=['capitulo'=>  $capituloNr];
        $capitulo= new Capitulo($c);

        $projecto->capitulos()->save($capitulo);
        $this->capitulos = $projecto->capitulos;
        session()->flash('success', 'Capitulo registrado com sucesso');
    }

    public function render()
    {
        return view('livewire.cadastrar-capitulos');
    }
}
