<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function browse()
    {
        $annonces = Annonce::orderBy("created_at", "asc")->paginate(6);
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

        return redirect()->route('browse');
    }

    public function edit($id)
    {
        $annonce = Annonce::find($id);
        $agent = $annonce->agent_id;
        return view('main.edit', [
            'annonce' => $annonce,
            'agent' => $agent
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
        $annonce->save();

        return redirect()->route('browse');
    }

    public function delete($id)
    {
        $annonceToDelete = Annonce::findOrFail($id);
        $annonceToDelete->delete();
        return back()->with('success','Annonce supprimée');
    }
}
