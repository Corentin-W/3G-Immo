<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display all real estate agent's ad
     * @param $id
     * @return Response
     */
    public function agentDetail($id)
    {
        $annonces = Annonce::where('agent_id', $id)->get();
        return view('agent.agent-ad', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Display real estate agent's list
     * @return Response
     */
    public function agentList()
    {
        $agents = Agent::all();
        return view('agent.agent-list', [
            'agents' => $agents
        ]);
    }
}
