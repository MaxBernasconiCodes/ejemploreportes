<?php

namespace App\Http\Livewire;

use App\Charts\pie;
use App\Models\Campaign;
use App\Models\Client;
use App\Models\Period;
use App\Models\Platform;
use Livewire\Component;

class Chart extends Component
{
    protected $listeners = ['selectionmade' => 'selectionmade'];
    public $type;
    public $selected_clients;
    public $selected_campaigns;
    public $selected_platforms;
    public $selected_periods;
    public $clients;
    public $campaigns;
    public $platforms;
    public $periods;

    public function render(pie $reporte)
    {
        $result = '';
        switch ($this->type) {
            case 'pie':
                $result = $reporte->build('pie');
                break;
            case 'bar':
                $result = $reporte->build('bar');
                break;
            case 'hbar':
                $result = $reporte->build('hbar');
                break;
                case 'line':
                $result = $reporte->build('line');
                break;
            default:
            break;
        }

        return view('livewire.chart', ['chart' => $result]);
    }

    public function selectionmade($id, $filter, $type)
    {
        $this->emitUp('selectionmade',$id, $filter, $type);
    }
}
