<?php

namespace App\Http\Livewire;

use Error;
use Exception;
use Livewire\Component;

class MaoObra extends Component
{

    public $salarioBruto;
    public $salarioLiquido;
    public $inss=0.07;
    public $irps;
    public $nrDependentes=0;

    public $valorMinimo;
    public $coefiiente;
    public $valorDependentes=0;

    public $campo;
  
  
    public function salarioLiquido(){

        if($this->salarioBruto >=20250 && $this->salarioBruto<20750){
                $this->valorMinimo=20250;
                $this->coefiiente=0.10;
                
        }else if($this->salarioBruto >=20750 && $this->salarioBruto<21000){
                $this->valorMinimo=20750;
                $this->coefiiente=0.10;
                if($this->nrDependentes==0){
                    $this->valorDependentes=50;
                }
        }else if($this->salarioBruto >=21000 && $this->salarioBruto<21250){
            $this->valorMinimo=21000;
            $this->coefiiente=0.10;
            if($this->nrDependentes==0){
                $this->valorDependentes=75;
            }else if($this->nrDependentes==1){
                $this->valorDependentes=25;
            }
        }else if($this->salarioBruto >=21250 && $this->salarioBruto<21750){
            $this->valorMinimo=21250;
            $this->coefiiente=0.10;
            if($this->nrDependentes==0){
                $this->valorDependentes=100;
            }else if($this->nrDependentes==1){
                $this->valorDependentes=50;
            }else if($this->nrDependentes==2){
                $this->valorDependentes=25;
            }
        }else if($this->salarioBruto >=21750 && $this->salarioBruto<22250){
            $this->valorMinimo=21750;
            $this->coefiiente=0.10;
            if($this->nrDependentes==0){
                $this->valorDependentes=150;
            }else if($this->nrDependentes==1){
                $this->valorDependentes=100;
            }else if($this->nrDependentes==2){
                $this->valorDependentes=75;
            }else if($this->nrDependentes==3){
                $this->valorDependentes=50;
            }
        }else if($this->salarioBruto >=22250 && $this->salarioBruto<32750){
            $this->valorMinimo=22250;
            $this->coefiiente=0.15;
            if($this->nrDependentes==0){
                $this->valorDependentes=200;
            }else if($this->nrDependentes==1){
                $this->valorDependentes=150;
            }else if($this->nrDependentes==2){
                $this->valorDependentes=125;
            }else if($this->nrDependentes==3){
                $this->valorDependentes=100;
            }if($this->nrDependentes>=4){
                $this->valorDependentes=50;
            }
        }else if($this->salarioBruto >=32750 && $this->salarioBruto<60750){
            $this->valorMinimo=32750;
            $this->coefiiente=0.20;
            if($this->nrDependentes==0){
                $this->valorDependentes=1775;
            }else if($this->nrDependentes==1){
                $this->valorDependentes=1725;
            }else if($this->nrDependentes==2){
                $this->valorDependentes=1700;
            }else if($this->nrDependentes==3){
                $this->valorDependentes=1675;
            }if($this->nrDependentes>=4){
                $this->valorDependentes=1625;
            }
        }else if($this->salarioBruto >=60750 && $this->salarioBruto<144750){
            $this->valorMinimo=60750;
            $this->coefiiente=0.25;
            if($this->nrDependentes==0){
                $this->valorDependentes=7375;
            }else if($this->nrDependentes==1){
                $this->valorDependentes=7325;
            }else if($this->nrDependentes==2){
                $this->valorDependentes=7300;
            }else if($this->nrDependentes==3){
                $this->valorDependentes=7275;
            }if($this->nrDependentes>=4){
                $this->valorDependentes=7225;
            }
        }else if($this->salarioBruto >=144750 ){
            $this->valorMinimo=144750;
            $this->coefiiente=0.32;
            if($this->nrDependentes==0){
                $this->valorDependentes=28375;
            }else if($this->nrDependentes==1){
                $this->valorDependentes=28325;
            }else if($this->nrDependentes==2){
                $this->valorDependentes=28300;
            }else if($this->nrDependentes==3){
                $this->valorDependentes=28275;
            }if($this->nrDependentes>=4){
                $this->valorDependentes=28225;
            }
        }else{
            $this->valorMinimo=0;
            $this->coefiiente=0;   
            $this->valorDependentes=0;
        }

        try {
            $this->irps= ($this->salarioBruto /($this->salarioBruto-(($this->salarioBruto-$this->valorMinimo)
            *$this->coefiiente + $this->valorDependentes)))-1;
        } 
        catch (Error $th) {
            $this->irps=0;
        }
        

         $this->irps =round($this->irps,5);            
    }


    public function habilitar($id){
       $this->campo=$id;
    }



    public function render()
    {
        return view('livewire.mao-obra');
    }
}
