<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MaoObra extends Component
{

    public $salarioBruto;
    public $salarioLiquido;
    public $inss;
    public $irps;
    public $nrDependentes;

    public $valorMinimo;
    public $coefiiente;


  
  
    public function salarioLiquido(){

        if($this->salarioBruto >=20250 && $this->salarioBruto<20750){
                $this->valorMinimo=20250;
                $this->coefiiente=0.10;
        }else if($this->salarioBruto >=20750 && $this->salarioBruto<21000){
                $this->valorMinimo=20750;
                $this->coefiiente=0.10;
        }else if($this->salarioBruto >=21000 && $this->salarioBruto<21250){
            $this->valorMinimo=21000;
            $this->coefiiente=0.10;
        }else if($this->salarioBruto >=21250 && $this->salarioBruto<21750){
            $this->valorMinimo=21250;
            $this->coefiiente=0.10;
        }else if($this->salarioBruto >=21750 && $this->salarioBruto<22250){
            $this->valorMinimo=21750;
            $this->coefiiente=0.10;
        }else if($this->salarioBruto >=22250 && $this->salarioBruto<32750){
            $this->valorMinimo=22250;
            $this->coefiiente=0.15;
        }else if($this->salarioBruto >=32750 && $this->salarioBruto<60750){
            $this->valorMinimo=32750;
            $this->coefiiente=0.20;
        }else if($this->salarioBruto >=60750 && $this->salarioBruto<144750){
            $this->valorMinimo=60750;
            $this->coefiiente=0.25;
        }else if($this->salarioBruto >=144750 ){
            $this->valorMinimo=144750;
            $this->coefiiente=0.32;
        }else{
            $this->valorMinimo=0;
            $this->coefiiente=1;   
        }
    }




    public function render()
    {
        return view('livewire.mao-obra');
    }
}
