<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Order date by parameter
     */
    public function orderDate($order)
    {
        $annonces = Annonce::orderBy("created_at", $order)->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Order price by parameter
     */
    public function orderPrice($order)
    {
        $annonces = Annonce::orderBy("prix_annonce", $order)->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Order surface by parameter
     */
    public function orderSurface($order)
    {
        $annonces = Annonce::orderBy("surface_habitable", $order)->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Order rooms by parameter
     */
    public function orderRooms($order)
    {
        $annonces = Annonce::orderBy("nombre_de_piece", $order)->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }
}
