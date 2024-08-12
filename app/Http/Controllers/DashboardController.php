<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Interaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $tenantId = auth()->user()->tenant_id;

        // Fetch the total number of clients
        $totalClients = Client::where('tenant_id', $tenantId)->count();

        // Fetch the recent interactions
        $recentInteractions = Interaction::whereHas('client', function ($query) use ($tenantId) {
            $query->where('tenant_id', $tenantId);
        })->orderBy('created_at', 'desc')->take(10)->get();

        // Pass the data to the view
        return view('dashboard', compact('totalClients', 'recentInteractions'));
    }
}

