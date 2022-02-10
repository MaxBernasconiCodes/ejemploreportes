<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Client;
use App\Models\Period;
use App\Models\Platform;
use Illuminate\Http\Request;

class reports extends Controller
{
    public function reporte()
    {
        $clients = Client::all();
        $campaigns = Campaign::all();
        $platforms = Platform::all();
        $periods = Period::all();

        return view('livewire.reportes', compact(['clients', 'campaigns', 'platforms', 'periods']));
    }
}
