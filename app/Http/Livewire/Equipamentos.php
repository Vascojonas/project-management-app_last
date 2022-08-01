<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actividade;
use App\Models\Equipamento;

class Equipamentos extends Component
{
    public $nrProjecto;
    public $projecto_principal;
    public $actividadeId;
    public $actividade;
    public $codigo;


    public $campo;

    public $dh;
    public $jh;
    public $sh;
    public $ah;
    public $ph;
    public $eh;
    public $gh;
    public $lh;
    public $moh;
    public $mh;
    public $totalP;
    public $totalI;
    public $valorAluguel;


    public $detalhesk=false;
    public $mo=false;

    


    //depreciacao
    public $dvi;
    public $dr;
    public $dn;
    public $da;

    //Juros
    public $jim;
    public $ji;
    public $ja;
    public $jvo;
    public $jvr;
    public $jn;


    //seguro
    public $svo;
    public $spa;
    public $shh;

     //Combustivel

     public $chp;
     public $cf;
     public $cpi;
     public $cm;
    
     //lubrificante

     public $lhp;
     public $lhh;
     public $lc;
     public $lt;
     public $lvr;
     public $ln;

     //Manutencao
     public $mvo;
     public $mn;
     public $mhh;
     public $mk;

     //variaveis para k
     public $horas_uso;
     public $vida_util;
     public $tipo_servico;
     public $temperatura;
     public $qualidade_equipamento;
     public $conhecimento_servico;
     public $ritmo_trabalho;
     public $qualidade_operdador;
     public $tipo;
     public $condicao_trabalho;
     public $manutencao;

     //Armazenamento
     public $acma;
     public $aha;

     //Pneus
     public $pp;
     public $pcp;
     public $pvup;

     //Energia
     public $ehp;
     public $ecusto;


      

     public function mount(){
        $current_url = \Request::fullUrl();
        $arry = explode('-',$current_url );
        

        if(count($arry)==5){

            $this->nrProjecto=$arry[3];
            $this->actividadeId=$arry[1];
            $this->codigo =$arry[2];
            $this->projecto_principal =$arry[4];


            $equipamento = Equipamento::where('actividade_id', $this->actividadeId)->first();
            
            if($equipamento){
                //dd($equipamento);

                $this->dh = $equipamento->dh;
                $this->jh = $equipamento->jh;
                $this->sh = $equipamento->sh;
                $this->ah = $equipamento->ah;
                $this->ph = $equipamento->ph;
                $this->eh = $equipamento->eh;
                $this->ch = $equipamento->ch;
                $this->moh = $equipamento->moh;
                $this->mh = $equipamento->mh;
                $this->valorAluguel=$equipamento->valorAluguel;
                $this->lh=$equipamento->lh;
                $this->totalP = $equipamento->totalP;
                $this->totalI = $equipamento->totalIp;
            }

    
        }
        $this->total();
    }





    public function calcularK($tabela, $constante){

        if($tabela==1){
            $this->horas_uso=$constante;
        }else if($tabela==2){
            $this->vida_util=$constante;
        }else if($tabela==3){
            $this->tipo_servico=$constante;
            
        }else if($tabela==4){
            $this->temperatura = $constante;
            
        }else if($tabela==5){
            $this->qualidade_equipamento=$constante;
            
        }else if($tabela==6){
            $this->conhecimento_servico=$constante;

        }else if($tabela==7){
            $this->ritmo_trabalho=$constante;
            
        }else if($tabela==8){
            $this->manutencao=$constante;
            
        }else if($tabela==9){
            $this->qualidade_operdador=$constante;
            
        }else if($tabela==10){
            $this->tipo=$constante;
            
        }else if($tabela==11){
            $this->condicao_trabalho=$constante;
            
        }


        $horas_uso = ($this->horas_uso!='')? (double)$this->horas_uso : 1;
        $vida_util = ($this->vida_util!='')? (double)$this->vida_util: 1;
        $tipo_servico = ($this->tipo_servico!='')? (double)$this->tipo_servico: 1;
        $temperatura = ($this->temperatura!='')? (double)$this->temperatura: 1;
        $qualidade_equipamento = ($this->qualidade_equipamento!='')? (double)$this->qualidade_equipamento: 1;
        $conhecimento_servico = ($this->conhecimento_servico!='')? (double)$this->conhecimento_servico: 1;
        $ritmo_trabalho = ($this->ritmo_trabalho!='')? (double)$this->ritmo_trabalho: 1;
        $qualidade_operdador = ($this->qualidade_operdador!='')? (double)$this->qualidade_operdador: 1;
        $tipo = ($this->tipo!='')? (double)$this->tipo : 1;
        $condicao_trabalho = ($this->condicao_trabalho!='')? (double)$this->condicao_trabalho: 1;
        $manutencao = ($this->manutencao!='')? (double)$this->manutencao: 1;

        $mk = $horas_uso*$vida_util*$tipo_servico*$temperatura*$qualidade_equipamento*$conhecimento_servico*$ritmo_trabalho*$qualidade_operdador*$tipo*$condicao_trabalho*$manutencao;
        $this->mk =round($mk,2);   

    }






    
    

    public function detalhesK() {
        $this->detalhesk = (!$this->detalhesk);
    } 
    
  

    public function calcularCampo($campo){
        if($campo==1){
            $this->dh = round(($this->dvi-$this->dr)/($this->dn*$this->da),5);
        }else if($campo==2){
            
            //dd($this->ji, $this->ja, $this->jvo, $this->jvr, $this->jn);
           //$resultado= ($this->ji/$this->ja)*(((($this->jvo-$this->jvr)*($this->jn+1))/$this->jn*2) + $this->jvr);
           //$im = ((($this->jvo - $this->jvr)*($this->jn + 1))/2*$this->jn) + $this->jvr;
            
           $i = $this->ji/100;
           $m = ($this->jvo-$this->jvr);
           $z= ($this->jn +1);
           $k= 2*$this->jn;

           $im = $m *($z/$k)+ $this->jvr;
           //$resultado=($im*$i)/$this->ja;

           $this->jh =  round(($im*$i)/$this->ja,2);

        }else if($campo==3){
            

            $numerador= $this->svo*$this->spa;
            $denuminador= $this->shh;
            $this->sh =  round($numerador/$denuminador,2);
         }else if($campo==4){
            
            $numerador= $this->acma;
            $denuminador= $this->aha;
            $this->ah = round($numerador/$denuminador,2);
         }else if($campo==5){
            
            $numerador= $this->pp*$this->pcp;
            $denuminador= $this->pvup;
            $this->ph = round($numerador/$denuminador,2);
         }else if($campo==6){
            
            $numerador= $this->ehp*$this->ecusto*0.75;
            $denuminador=1;
            $this->eh = round($numerador/$denuminador,2);
         }else if($campo==7){
            
            $numerador= $this->cf*$this->chp*$this->cm;
            $denuminador= 1;
            $this->ch =  round($numerador/$denuminador ,2);
         }else if($campo==8){
            
            $numerador= $this->lhp*0.6*0.0027;
            $denuminador= 0.893*$this->lhp*$this->lhh;
            $this->lh =  round($numerador/$denuminador + ($this->lc+$this->lt),2);
         }
         else if($campo==10){
            
            $numerador= $this->mk*$this->mvo;
            $denuminador= $this->mn*$this->mhh;
            $this->mh =  round($numerador/$denuminador,2);
         }


         $this->total();

    }


    public function total(){

        $dh = (double) $this->dh;
        $jh = (double) $this->jh;
        $sh = (double) $this->sh;
        $ah = (double) $this->ah;
        $ph = (double) $this->ph;
        $eh = (double) $this->eh;
        $gh = (double) $this->gh;
        $lh = (double) $this->lh;
        $moh= (double) $this->moh ;
        $mh = (double) $this->mh;
        
        
        $this->totalP= $dh + $jh + $ph +$gh + $lh + $moh +$mh +$eh;
        $this->totalI= $dh + $jh + $moh;


    }




    public function habilitar($id){
       
        $this->campo=$id;
    }


     public function actualizar(){



        $equipamento= Equipamento::where('actividade_id', $this->actividadeId)->first();

        if($equipamento){
            

            $equipamento->dh=$this->dh;
            $equipamento->jh=$this->jh;
            $equipamento->sh=$this->sh;
            $equipamento->ah=$this->ah;
            $equipamento->ph=$this->ph;
            $equipamento->eh=$this->eh;
            $equipamento->ch=$this->ch;
            $equipamento->moh=$this->moh;
            $equipamento->mh=$this->mh;
            $equipamento->lh=$this->lh;
            $equipamento->valorAluguel=($this->valorAluguel)?$this->valorAluguel:0;

            $equipamento->totalP=$this->totalP;
            $equipamento->totalIp=$this->totalI;

            $equipamento->update();
        }else{

            $data =[
                'dh'=>$this->dh,
                'jh'=>$this->jh,
                'sh'=>$this->sh,
                'ah'=>$this->ah,
                'ph'=>$this->ph,
                'eh'=>$this->eh,
                'ch'=>$this->ch,
                'moh'=>$this->moh,
                'mh'=>$this->mh,
                'lh'=>$this->lh,
                'valorAluguel'=>($this->valorAluguel)?$this->valorAluguel:0,

                'totalP'=>$this->totalP,
                'totalIp'=>$this->totalI,
            ];

            $eq = new Equipamento($data);
            $actividade= Actividade::find($this->actividadeId);
            $actividade->equipamento()->save($eq);

        }



        $actividade= Actividade::find($this->actividadeId);

        if($actividade){
           $actividade->preco_final=$this->totalP;
           $actividade->preco_unitario=$this->totalP;
           $actividade->coeficiente=1;
           $actividade->save();

           session()->flash('success', 'Processo actualizado com sucesso');
        }

    }


    public function render()
    {
        return view('livewire.equipamentos');
    }



    // MO

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

    public $campoMo;

    public function habilitarMo($id){
       
        $this->campoMo=$id;
    }

    public function calcularCampoMo($campo){
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

      
            $this->totalMo();
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

         $this->totalMo();
    }


    public function totalMo(){
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


    public function mo() {

        if($this->mo){
            $this->moh=$this->campoPercetagem;
        }
        $this->mo = (!$this->mo);

    } 

    public function actualizarMo(){

        $actividade= Actividade::find($this->actividadeId);

        if($actividade){
           $actividade->preco_final=$this->campoPercetagem;
           $actividade->preco_unitario=$this->campoPercetagem;
           $actividade->coeficiente=1;
           $actividade->save();

           session()->flash('success', 'Processo actualizado com sucesso');
        }

    }


}
