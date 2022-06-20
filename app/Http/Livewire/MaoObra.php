<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MaoObra extends Component
{

    public $salarioBruto;
    public $inss;
    public $irps;
    public $nrDependentes;




    public function render()
    {
        return view('livewire.mao-obra');
    }
}
