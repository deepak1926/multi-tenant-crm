<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Interaction;

class ReportingController extends Controller
{
    public function clientsReport()
    {
        $totalClients = Client::count();
        return response()->json(['total_clients' => $totalClients]);
    }

    public function interactionsReport()
    {
        $recentInteractions = Interaction::orderBy('created_at', 'desc')->take(10)->get();
        return response()->json($recentInteractions);
    }
}

