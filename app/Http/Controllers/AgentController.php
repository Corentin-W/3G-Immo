<?php

namespace App\Http\Controllers;

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
}
