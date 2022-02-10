<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use App\Models\Client;
use App\Models\Period;
use App\Models\Platform;
use Livewire\Component;

class Chartfilter extends Component
{
    public $filtertype;
    public $placeholder;
    public $data;
    public $selecteds;
    public $checked;

    public function render()
    {
        if(empty($this->selecteds)){
           foreach($this->selecteds as $i => $item)
           {
               $this->data->where('id', '!=', $i);
           }
        }
        return view('livewire.chartfilter');
    }

    public function checkifchecked($id)
    {
        $result = isset($this->checked[$id]) ? $this->checked[$id] : false;
        return $result;
    }

    public function checkifavailable($id){
        $result = !empty($this->selecteds) ? isset($this->selecteds[$id]) : true;
        return $result;
    }

    public function checkitem($id)
    {
        if($this->checkifavailable($id)){

            if($this->filtertype == 'gral')
            {
                $this->emitUp('selectionmade', $id, $this->placeholder, $this->filtertype);
            }
        }

        $this->checked[$id] = isset($this->checked[$id]) ? !$this->checked[$id] : true;
    }
}
