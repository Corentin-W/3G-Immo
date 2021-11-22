<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * I can use theses methods only if i'm logged in
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List all ads with pagination (8 perpage)
     *
     * @return Illuminate\View\View
     */
    public function browse()
    {
        $annonces = Annonce::orderBy("created_at", "asc")->paginate(8);
        if (count($annonces) === 0) {
            $message = "Aucune annonce à ce jour";
            return redirect()->route('error', [$message]);
        }
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Detail page
     * @param $id
     *
     * @return Illuminate\View\View
     */
    public function read($id)
    {
        $annonce = Annonce::find($id);
        if (is_null($annonce)){
            $message = "Cette annonce n'existe pas";
            return redirect()->route('error', [$message]);
        }
        return view('main.read', [
            'annonce' => $annonce
        ]);
    }

    /**
     * Create page
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $agents = Agent::all();
        return view('main.create', [
            'agents' => $agents
        ]);
    }

    /**
     * Process to add the new ad in the database
     * @param Request
     *
     * @return Redirect
     */
    public function add(Request $request)
    {
        $request->validate([
            'ref_annonce' => ['required','min:8','max:8','unique:annonces'],
            'prix_annonce' => ['required'],
            'surface_habitable' => ['required'],
            'nombre_de_piece' => ['required'],
            'agent' => ['required']
        ]);

        $annonce = new Annonce();
        $annonce->ref_annonce = $request->input('ref_annonce');
        $annonce->surface_habitable = $request->input('surface_habitable');
        $annonce->prix_annonce = $request->input('prix_annonce');
        $annonce->nombre_de_piece = $request->input('nombre_de_piece');
        $annonce->agent_id = $request->input("agent");
        $annonce->save();

        return redirect()->route('browse')->with('success','Annonce ajoutée');
    }

    /**
     * Edit page
     * @param $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $annonce = Annonce::find($id);
        if (is_null($annonce)){
            $message = "Cette annonce n'existe pas";
            return redirect()->route('error', [$message]);
        }
        $agentId = $annonce->agent_id;
        $agentOwner = Agent::find($agentId);
        $agents = Agent::all();
        return view('main.edit', [
            'annonce' => $annonce,
            'agentOwner' => $agentOwner,
            'agents' => $agents
        ]);
    }

    /**
     * Process to edit the page in the database
     * @param $id
     * @param Request
     *
     * @return Redirect
     */
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

    /**
     * Process to edit the page in the database
     * @param $id
     *
     * @return Illuminate\View\View
     */
    public function delete($id)
    {
        $annonceToDelete = Annonce::findOrFail($id);
        if (is_null($annonceToDelete)){
            $message = "Cette annonce n'existe pas";
            return redirect()->route('error', [$message]);
        }
        $annonceToDelete->delete();
        return back()->with('success','Annonce supprimée');
    }

    /**
     * Display error page
     *
     * @return Illuminate\View\View
     */
    public function error($message)
    {
        return view('main.error', [
            'message' => $message
        ]);
    }
}
