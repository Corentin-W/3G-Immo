<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * I can use theses methods only if i'm logged in
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all real estate agent's ad
     * @param $id
     *
     * @return Illuminate\View\View
     */
    public function agentDetail($id)
    {
        $annonces = Annonce::where('agent_id', $id)->get();
        //if i have nothing in $annonces i redirect to error page
        if (count($annonces) === 0) {
            $message = "Cet agent n'a encore aucune annonce";
            return redirect()->route('error', [$message]);
        }
        return view('agent.agent-ad', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Display real estate agent's list
     *
     * @return Illuminate\View\View
     */
    public function agentList()
    {
        $agents = Agent::all();
        //if i have nothing in $agents i redirect to error page
        if (count($agents) === 0) {
            $message = "Nous n'avons pas encore d'agents";
            return redirect()->route('error', [$message]);
        }
        return view('agent.agent-list', [
            'agents' => $agents
        ]);
    }


}
