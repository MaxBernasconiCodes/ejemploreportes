<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Btndrag extends Component
{
    public $type;
    public function render()
    {
        return view('livewire.btndrag');
    }
    public function nuevochart($type)
    {
        $this->emitUp('createchart', $type);
    }
}
