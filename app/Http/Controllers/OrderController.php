<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Order by date
     * @param $order
     *
     * @return Illuminate\View\View
     */
    public function orderDate($order)
    {
        $annonces = Annonce::orderBy("created_at", $order)->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Order by price
     * @param $order
     *
     * @return Illuminate\View\View
     */
    public function orderPrice($order)
    {
        $annonces = Annonce::orderBy("prix_annonce", $order)->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Order by surface
     * @param $order
     *
     * @return Illuminate\View\View
     */
    public function orderSurface($order)
    {
        $annonces = Annonce::orderBy("surface_habitable", $order)->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }

    /**
     * Order by number of rooms
     * @param $order
     *
     * @return Illuminate\View\View
     */
    public function orderRooms($order)
    {
        $annonces = Annonce::orderBy("nombre_de_piece", $order)->paginate(8);
        return view('main.home', [
            'annonces' => $annonces
        ]);
    }
}
