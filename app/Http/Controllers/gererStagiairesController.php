<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererStagiairesController extends Controller
{


    function afficherStagiaire()
    {
        if (session('gestionnaire') != null) {

            $stagiaires = PdoGspg::getStagiaires();
            $view = view('afficherStagiaires')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('stagiaires', $stagiaires);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

}
