<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererFormateursController extends Controller
{

    function afficherFormateurs()
    {

        if (session('gestionnaire') != null) {
            $formateurs = PdoGspg::getFormateurs();
            $view = view('afficherFormateurs')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('formateurs', $formateurs);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    #-------------------------------------------- :D --------------------------------------------#
    #-------------------------------------------- :D --------------------------------------------#
    #-------------------------------------------- :D --------------------------------------------#

    function modifierFormateurs(Request $request)
    {
        if (session('gestionnaire') != null) {
            $id = $request['id'];
            $formateur = PdoGspg::getFormateurById($id);
            $nom = $formateur['nom'];
            $prenom = $formateur['prenom'];
            $mail = $formateur['mail'];
            $tel = $formateur['tel'];
            $message = "";
            $erreurs[] = "";
            $view = view('modifierFormateurs')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('prenom', $prenom)
                ->with('mail', $mail)
                ->with('tel', $tel)
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

    function enregModifFormateurs(Request $request)
    {
        if (session('gestionnaire') != null) {

            $nom = $request['nom'];
            $prenom = $request['prenom'];
            $mail = $request['mail'];
            $tel = $request['tel'];
            $id = $request['id'];
            $ok = 1;
            $message = "";
            $view = view('modifierFormateurs')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('prenom', $prenom)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('id', $id);
            if (strlen($tel) != 10) {
                $erreurs[] = "Numero de téléphone du formateur invalide";
                $ok = 0;
            }
            if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/i', $mail)) {
                $erreurs[] =  "le mail n'est pas valide";
                $ok = 0;
            }
            if ($ok == 1) {
                PdoGspg::majFormateurs($id, $nom, $prenom, $mail, $tel);
                $message = "Votre Formateur a été mise à jour";
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

    function ajouterFormateurs()
    {
        if (session('gestionnaire') != null) {
            $message = "";
            $erreurs[] = "";
            $view = view('ajouterFormateurs')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('message', null)
                ->with('erreurs', null);

            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }


        #-------------------------------------------- :D --------------------------------------------#
        #-------------------------------------------- :D --------------------------------------------#
        #-------------------------------------------- :D --------------------------------------------#
    }
    function enregAjoutFormateurs(Request $request)
    {
        if (session('gestionnaire') != null) {

            $nom = $request['nom'];
            $prenom = $request['prenom'];
            $mail = $request['mail'];
            $tel = $request['tel'];
            $message = "";
            $ok = 1;
            $view = view('ajouterFormateurs')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('prenom', $prenom)
                ->with('mail', $mail)
                ->with('tel', $tel);
            if (strlen($tel) != 10) {
                $erreurs[] =  "numéro de téléphone invalide";
                $ok = 0;
            }
            if ($ok == 1) {
                PdoGspg::ajouterFormateurs($nom, $prenom, $mail, $tel);
                $message = "Votre Formateur a été ajouté";
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
