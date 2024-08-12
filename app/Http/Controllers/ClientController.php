<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Tenant;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::where('tenant_id', auth()->user()->tenant_id)->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = Tenant::all();
        return view('clients.create', compact('tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);
        Client::create([
            'tenant_id' => auth()->user()->tenant_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $client = Client::where('id',$id)->first();
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,'.$client->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
