<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function browse()
    {
        $annonces = Annonce::orderBy("created_at", "asc")->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }

    public function read($id)
    {
        $annonce = Annonce::find($id);
        return view('main.read', [
            'annonce' => $annonce
        ]);
    }

    public function create()
    {
        $agents = Agent::all();
        return view('main.create', [
            'agents' => $agents
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'ref_annonce' => ['required','min:8','max:8','unique:annonces'],
            'prix_annonce' => ['required'],
            'surface_habitable' => ['required'],
            'nombre_de_piece' => ['required'],
            'agent' => ['required']
        ]);

        //I check if the route is still the good one
        if(!$request->routeIs('add')){
            return redirect()->route('browse');
        };
        $annonce = new Annonce();
        $annonce->ref_annonce = $request->input('ref_annonce');
        $annonce->surface_habitable = $request->input('surface_habitable');
        $annonce->prix_annonce = $request->input('prix_annonce');
        $annonce->nombre_de_piece = $request->input('nombre_de_piece');
        $annonce->agent_id = $request->input("agent");
        $annonce->save();

        return redirect()->route('browse')->with('success','Annonce ajoutée');
    }

    public function edit($id)
    {
        $annonce = Annonce::find($id);
        $agentId = $annonce->agent_id;
        $agentOwner = Agent::find($agentId);
        $agents = Agent::all();
        return view('main.edit', [
            'annonce' => $annonce,
            'agentOwner' => $agentOwner,
            'agents' => $agents
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'ref_annonce' => ['required','min:8','max:8'],
            'prix_annonce' => ['required'],
            'surface_habitable' => ['required'],
            'nombre_de_piece' => ['required'],
        ]);

        $annonce = Annonce::find($id);
        $annonce->ref_annonce = $request->input('ref_annonce');
        $annonce->surface_habitable = $request->input('surface_habitable');
        $annonce->prix_annonce = $request->input('prix_annonce');
        $annonce->nombre_de_piece = $request->input('nombre_de_piece');
        $annonce->agent_id = $request->input("agent");
        $annonce->save();
        return redirect()->route('browse')->with('success','Annonce éditée');
    }

    public function delete($id)
    {
        $annonceToDelete = Annonce::findOrFail($id);
        $annonceToDelete->delete();
        return back()->with('success','Annonce supprimée');
    }
}
