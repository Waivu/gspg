<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererStagesController extends Controller
{

    function voir()
    {
        if (session('gestionnaire') != null) {

            $stages = PdoGspg::getStages();
            $lstStage = "";
            $lstOption = "";
            $view = view('choixStage')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('stages', $stages)
                ->with('lstStage', $lstStage)
                ->with('lstOption', $lstOption);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function validerChoixStage(Request $request)
    {
        if (session('gestionnaire') != null) {
            $lstStage = $request['lstStage'];
            $lstOption = $request['lstOption'];
            session(['lstOption' => $lstOption]);
            session(['lstStage' => $lstStage]);
            $view = view('sommaire')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', $lstStage)
                ->with('lstOption', $lstOption);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    

       
}
