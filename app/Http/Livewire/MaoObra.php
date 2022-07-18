<?php

namespace App\Http\Livewire;

use Error;
use App\Models\Actividade;
use Livewire\Component;

class MaoObra extends Component
{
    public $nrProjecto;
    public $projecto_principal;
    public $actividadeId;
    public $actividade;
    public $codigo;

    public $salario;
    public $salarioBruto;
    public $salarioLiquido;
    public $inss=0.07;
    public $irps;
    public $nrDependentes=0;

    public $valorMinimo;
    public $coefiiente;
    public $valorDependentes=0;
    public $valorAnosTrabalho;

    public $trabalhoAnual=267;

    public $feriaAnualDia=26;
    public $feriaAnual ;

    public $valorRepousoSemanal=55;
    public $valorFaltasJustificadas=12;
    public $valorFeriados=9;
    public $valorFeriadosCidade=1;
    public $valorDiasMes=30;
 

    public $campoRepousoSemanal;
    public $campoFaltasJustificadas;
    public $campoFeriados;
    public $campoFeriadosCidade;
    public $campo13SalarioB;
    public $campo13SalarioC;
    public $campoTotalParcialA;
    public $campoTotalParcialB;
    public $campoTotalParcialC;
    public $campoIncidenciaAcumulativa;
    public $campoTotalEncargosA;
    public $campoTotalEncargosB;
    public $totalParcialC;


    public $campoPercetagem;

    




    public $campo;

    public function mount(){
        $current_url = \Request::fullUrl();
        $arry = explode('-',$current_url );
        

        if(count($arry)==5){

            $this->nrProjecto=$arry[3];
            $this->actividadeId=$arry[1];
            $this->codigo =$arry[2];
            $this->projecto_principal =$arry[4];

            $this->actividade= Actividade::find($this->actividadeId);
    
        }
        $this->total();
    }

  
    public function calcularCampo($campo){
        if($campo==8){
            $this->feriaAnual = round($this->feriaAnualDia/$this->trabalhoAnual,5);
        }else if($campo==11){
            $this->campoRepousoSemanal = round($this->valorRepousoSemanal/$this->trabalhoAnual,5);

        }else if($campo==14){
            $this->campoFaltasJustificadas = round($this->valorFaltasJustificadas/$this->trabalhoAnual,5);

        }else if($campo==17){
            $this->campoFeriados = round($this->valorFeriados/$this->trabalhoAnual,5);

        }else if($campo==20){
            $this->campoFeriadosCidade = round($this->valorFeriadosCidade/$this->trabalhoAnual,5);

        }else if($campo==23){
            $this->campo13SalarioB = round($this->valorDiasMes/$this->trabalhoAnual,5);

        }else if($campo==24){

            if($this->valorAnosTrabalho>=2){
                $this->campo13SalarioC = round($this->valorDiasMes/$this->trabalhoAnual*$this->valorAnosTrabalho,5);
            }else{
                $this->campo13SalarioC=0;
            }
        }else if($campo==33){
            $salarioMinimo=6300;
            $this->salario= (double)$this->salario;
            $s=$this->salario/$salarioMinimo;
            //Salarios 1-7 30 dias  end= anosDervico*30/267
            //salario 8-10 end= anoServico*15/267
            // 11-16   10 dias
            //16 > 3 dias 
            $this->valorAnosTrabalho =(int)$this->valorAnosTrabalho;

            if($s <=7){
                $this->campoTotalParcialC= round($this->valorAnosTrabalho*30/$this->trabalhoAnual,5);
            } else if ($s>7 && $s<=10){
                $this->campoTotalParcialC= round($this->valorAnosTrabalho*15/$this->trabalhoAnual,5);
            }else if ($s>10 && $s<=16){
                $this->campoTotalParcialC= round($this->valorAnosTrabalho*10/$this->trabalhoAnual,5);
            }else{
                $this->campoTotalParcialC= round($this->valorAnosTrabalho*3/$this->trabalhoAnual,5);
            }

            
        }

      
            $this->total();
    }

    
    public function feriasAnual(){
        $this->feriaAnual = round($this->feriaAnualDia/$this->trabalhoAnual,5);
    }
    
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
         
         
         //$this->campoTotalParcialA=round( $this->irps+  $this->inss,5);

         $this->total();
    }


    public function total(){
          $feriaAnual=(float) $this->feriaAnual;
          $campoRepousoSemanal=(float) $this->campoRepousoSemanal;
          $campoFaltasJustificadas=(float) $this->campoFaltasJustificadas;
          $campoFeriados=(float) $this->campoFeriados;
          $campoFeriadosCidade=(float) $this->campoFeriadosCidade;
          $campo13SalarioB=(float) $this->campo13SalarioB;
          $campo13SalarioC=(float) $this->campo13SalarioC;

           $irps= (float)  $this->irps;
           $inss= (float)  $this->inss;

          $this->campoTotalParcialA = round($irps+$inss,5);

          $this->campoTotalParcialB=round($feriaAnual+ $campoRepousoSemanal+$campoFaltasJustificadas
                                    +$campoFeriados+$campoFeriadosCidade+$campo13SalarioB,5);
          
          $this->campoIncidenciaAcumulativa= round($this->campoTotalParcialA *$this->campoTotalParcialB,5);
         
          $this->campoTotalEncargosB=round($this->campoTotalParcialA + $this->campoTotalParcialB + $this->campoTotalParcialC+$this->campoIncidenciaAcumulativa,5);
          $this->campoPercetagem= round($this->campoTotalEncargosB*100,2);
    }


    public function habilitar($id){
       $this->campo=$id;
    }

    public function actualizar(){

        $actividade= Actividade::find($this->actividadeId);

        if($actividade){
           $actividade->preco_final=$this->campoPercetagem;
           $actividade->preco_unitario=$this->campoPercetagem;
           $actividade->coeficiente=1;
           $actividade->save();

           session()->flash('success', 'Processo actualizado com sucesso');
        }

    }


    public function render()
    {
        return view('livewire.mao-obra');
    }
}
