<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Interaction;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function index()
    {
        $interactions  = Interaction::all();
        return view('interactions.index',compact('interactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'details' => 'required|string',
            'client_id' => 'required|exists:clients,id',
            'tenant_id' => 'required|exists:tenants,id',
        ]);
        Interaction::create($request->all());
        $client_id = $request->client_id;
        return view('interactions.form',compact('client_id'));
    }

    public function show($id)
    {
        return Interaction::findOrFail($id);
    }
    public function create($id)
    {
        $client_id = $id;
        return view('interactions.form',compact('client_id'));
    }
    public function update(Request $request, $id)
    {
        $interaction = Interaction::findOrFail($id);
        $interaction->update($request->all());
        return $interaction;
    }

    public function destroy($id)
    {
        $interaction = Interaction::findOrFail($id);
        $interaction->delete();
        return response()->json(['message' => 'Interaction deleted']);
    }
}
