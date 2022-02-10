<?php

namespace App\Http\Livewire;

use App\Charts\pie;
use App\Models\Campaign;
use App\Models\Client;
use App\Models\Period;
use App\Models\Platform;
use Livewire\Component;
use ArielMejiaDev\LarapexCharts\LarapexChart;

use function PHPUnit\Framework\isNull;

class Reportes extends Component
{
    protected $listeners = ['createchart' => 'create', 'selectionmade' => 'changeSelection'];
    public $offset = 1;
    public $reportes = [['id' => 0, 'type' => 'pie']];

    public $clients;
    public $platforms;
    public $campaigns;
    public $periods;

    public $selected_clients = [];
    public $selected_campaigns = [];
    public $selected_platforms = [];
    public $selected_periods = [];

    public $checked_clients = [];
    public $checked_campaigns = [];
    public $checked_platforms = [];
    public $checked_periods= [];

    public function render()
    {
        $this->clients = Client::all();
        $this->campaigns = Campaign::all();
        $this->platforms = Platform::all();
        $this->periods = Period::all();

        return view('livewire.reportes');
    }

    public function create($type)
    {
       if($type != 'actualizar'){
       if(empty($this->checked_clients)){foreach ($this->clients as $option){$this->selected_clients[$option->id] = false;}}
       if(empty($this->checked_campaigns)){foreach ($this->campaigns as $option){$this->selected_campaigns[$option->id] = false;}}
       if(empty($this->checked_platforms)){foreach ($this->platforms as $option){$this->selected_platforms[$option->id] = false;}}
       if(empty($this->checked_periods)){foreach ($this->periods as $option){$this->selected_periods[$option->id] = false;}}

        $id = count($this->reportes);
        $this->reportes[] = ['id' => $id, 'type' => $type];

    }
        $this->actualizar();
    }

    public function actualizar()
    {
        $viejosreportes= [];
        foreach ($this->reportes as $oldreport)
        {
            $this->offset += count($this->reportes); //cambia el id en las actualizaciones por que sino apex charts lo toma como el mismo
            $viejosreportes[] = ['id' => count($this->reportes) , 'type' => $oldreport['type'] ];
        }
        $this->reportes = [];
        foreach($viejosreportes as $actualizado)
        {
            $this->reportes[] = ['id' => $actualizado['id'] , 'type' => $actualizado['type'] ];
        }

    }

    public function changeSelection($id, $filter, $type){
        if($type == 'gral'){
        switch($filter){
            case 'Clients':
                if(empty($this->checked_clients)){ $this->selected_clients = [];}
                if(empty($this->selected_clients[$id]))
                {$this->selected_clients[$id] = true;}
                else{unset($this->selected_clients[$id]);}

                if(empty($this->checked_clients[$id]))
                {$this->checked_clients[$id] = true;}
                else{unset($this->checked_clients[$id]);}

                break;

            case 'Campaigns':
                if(empty($this->checked_campaigns)){ $this->selected_campaigns = [];}
                if(empty($this->selected_campaigns[$id]))
                {$this->selected_campaigns[$id] = true;}
                else{unset($this->selected_campaigns[$id]);}

                if(empty($this->checked_campaigns[$id]))
                {$this->checked_campaigns[$id] = true;}
                else{unset($this->checked_campaigns[$id]);}

            case 'Platforms':
                    if(empty($this->checked_platforms)){ $this->selected_platforms = [];}
                    if(empty($this->selected_platforms[$id]))
                    {$this->selected_platforms[$id] = true;}
                    else{unset($this->selected_platforms[$id]);}

                    if(empty($this->checked_platforms[$id]))
                    {$this->checked_platforms[$id] = true;}
                    else{unset($this->checked_platforms[$id]);}
                    break;

            case 'Periods':
                if(empty($this->checked_periods)){ $this->selected_periods = [];}
                if(empty($this->selected_periods[$id]))
                {$this->selected_periods[$id] = true;}
                else{unset($this->selected_periods[$id]);}

                if(empty($this->checked_periods[$id]))
                {$this->checked_periods[$id] = true;}
                else{unset($this->checked_periods[$id]);}
                break;

            default:
             break;
        }
        $this->create('actualizar');
    }
    }
}
