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

    function afficherStage()
    {

        if (session('gestionnaire') != null) {
            $stage = PdoGspg::getStage();
            $view = view('afficherStage')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('stage', $stage);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    #-------------------------------------------- :D --------------------------------------------#
    #-------------------------------------------- :D --------------------------------------------#
    #-------------------------------------------- :D --------------------------------------------#

    function modifierStage(Request $request)
    {
        if (session('gestionnaire') != null) {
            $id = $request['id'];
            $stage = PdoGspg::getStageById($id);
            
            $dateDebut = $stage['dateDebut'];
            $dateFin = $stage['dateFin'];
         
            $message = "";
            $erreurs[] = "";
            $view = view('modifierStage')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
               
                ->with('dateDebut', $dateDebut)
                ->with('dateFin', $dateFin)
                
                ->with('id', $id)
                ->with('erreurs', null)
                ->with('message', null);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    #-------------------------------------------- :D --------------------------------------------#
    #-------------------------------------------- :D --------------------------------------------#
    #-------------------------------------------- :D --------------------------------------------#

    function enregModifStage(Request $request)
    {
        if (session('gestionnaire') != null) {

      
            $dateDebut = $request['dateDebut'];
            $dateFin = $request['dateFin'];
         
            $id = $request['id'];
            $ok = 1;
            $message = "";
            $view = view('modifierStage')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
               
                ->with('dateDebut', $dateDebut)
                ->with('dateFin', $dateFin)
               
                ->with('id', $id);
            if (!preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/", $dateDebut)) {
                $erreurs[] = "la date est invalide";
                $ok = 0;
            }
            if (!preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/", $dateFin)) {
                $erreurs[] =  "la date est invalide";
                $ok = 0;
            }
            if ($ok == 1) {
                PdoGspg::majStage($id, $dateDebut, $dateFin);
                $message = "Le stage a été mise à jour";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
    #-------------------------------------------- :D --------------------------------------------#
    #-------------------------------------------- :D --------------------------------------------#
    #-------------------------------------------- :D --------------------------------------------#

    function ajouterStage()
    {
        if (session('gestionnaire') != null) {
            $message = "";
            $erreurs[] = "";
            $view = view('ajouterStage')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('message', null)
                ->with('erreurs', null);

            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

        #-------------------------------------------- :D --------------------------------------------#
        #-------------------------------------------- :D --------------------------------------------#
        #-------------------------------------------- :D --------------------------------------------#
    function enregAjoutStage(Request $request)
    {
        if (session('gestionnaire') != null) {

            $libelle = $request['libelle'];
            $dateDebut = $request['dateDebut'];
            $dateFin = $request['dateFin'];
            $promotion = $request['promotion'];
            $numero = $request['numero'];
            $message = "";
            $ok = 1;
            $view = view('ajouterStage')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('libelle', $libelle)
                ->with('dateDebut', $dateDebut)
                ->with('dateFin', $dateFin)
                ->with('promotion', $promotion)
                ->with('numero', $numero);
            if (!preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/", $dateDebut)) {
                $erreurs[] =  "la date est invalide";
                $ok = 0;
            }
            if (!preg_match("/([0-9]{4})-([0-9]{2})-([0-9]{2})/", $dateFin)) {
                $erreurs[] =  "la date est invalide";
                $ok = 0;
            }   
            if ($ok == 1) {
                PdoGspg::ajouterStage($libelle, $dateDebut, $dateFin, $promotion, $numero);
                $message = "Le stage a été ajouté";
                $erreurs = null;
            }
            var_dump($erreurs);
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    

       
}
