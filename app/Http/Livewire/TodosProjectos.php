<?php

namespace App\Http\Livewire;
use App\Models\Projecto;
use Livewire\Component;

class TodosProjectos extends Component
{
    public $projectos=[];

    public function mount(){
        $dados = Projecto::all();
        $this->projectos=$dados;

    }

    public function render()
    {
        return view('livewire.todos-projectos');
    }
}
