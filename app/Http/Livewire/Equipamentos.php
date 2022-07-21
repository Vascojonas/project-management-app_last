<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actividade;
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
            
           $numerador= $this->ji*($this->jvo-$this->jvr)*($this->jn+1);
           $denuminador= $this->ja*$this->jn*2;

           $this->jh =  round($numerador/$denuminador + $this->jvr,2);

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
}
