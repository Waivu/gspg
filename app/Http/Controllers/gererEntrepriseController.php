<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class gererEntrepriseController extends Controller
{
    function afficherEntreprise()
    {
        if (session('gestionnaire') != null) {
            $entreprise = PdoGspg::getEntreprise();
            $view = view('afficherEntreprise')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('entreprise', $entreprise);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        } 

    }

    function modifierEntreprise(Request $request)
    {
        if (session('gestionnaire') != null) {
            $id = $request['id'];
            $entreprise = PdoGspg::getEntrepriseById($id);
            $nom = $entreprise['nom'];
            $adresse = $entreprise['adresse'];
            $ville = $entreprise['ville'];
            $mail = $entreprise['mail'];
            $tel = $entreprise['tel'];
            $nomTuteurStage = $entreprise['nomTuteurStage'];
            $telTuteurStage = $entreprise['telTuteurStage'];
            $message = "";
            $erreurs[] = "";
            $view = view('modifierEntreprise')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('adresse', $adresse)
                ->with('ville', $ville)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('nomTuteurStage', $nomTuteurStage)
                ->with('telTuteurStage', $telTuteurStage)
                ->with('id', $id)
                ->with('erreurs', null)
                ->with('message', null);
            return $view;
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    function enregModifEntreprise(Request $request)
    {
        if (session('gestionnaire') != null) {

            $nom = $request['nom'];
            $adresse = $request['adresse'];
            $ville = $request['ville'];
            $mail = $request['mail'];
            $tel = $request['tel'];
            $nomTuteurStage = $request['nomTuteurStage'];
            $telTuteurStage = $request['telTuteurStage'];
            $id = $request['id'];
            $ok = 1;
            $message = "";
            $view = view('modifierEntreprise')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('adresse', $adresse)
                ->with('ville', $ville)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('nomTuteurStage', $nomTuteurStage)
                ->with('telTuteurStage', $telTuteurStage)
                ->with('id', $id);
            if (!preg_match("#^(\+33|0)[1679][0-9]{8}$#", $tel)) {
                $erreurs[] = "Numero de téléphone de l'entreprise invalide";
                $ok = 0;
            }
            if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/i', $mail)) {
                $erreurs[] =  "le mail n'est pas valide";
                $ok = 0;

            if (!preg_match("#^(\+33|0)[1679][0-9]{8}$#", $telTuteurStage)) {
                $erreurs[] = "Numero de téléphone du tuteur invalide";
                $ok = 0;
            }
                
            }
            if ($ok == 1) {
                PdoGspg::majEntreprise($id, $nom, $mail, $tel, $adresse, $ville, $nomTuteurStage, $telTuteurStage);
                $message = "l'entreprise a été mise à jour";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }
    
    function ajouterEntreprise()
    {
        if (session('gestionnaire') != null) {
            $message = "";
            $erreurs[] = "";
            $view = view('ajouterEntreprise')
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
    function enregAjoutEntreprise(Request $request)
    {
        if (session('gestionnaire') != null) {

            $nom = $request['nom'];
            $adresse = $request['adresse'];
            $ville = $request['ville'];
            $mail = $request['mail'];
            $tel = $request['tel'];
            $nomTuteurStage = $request['nomTuteurStage'];
            $telTuteurStage = $request['telTuteurStage'];
            $id = $request['id'];
            $ok = 1;
            $message = "";
            $view = view('ajouterEntreprise')
                ->with('gestionnaire', session('gestionnaire'))
                ->with('lstStage', session('lstStage'))
                ->with('lstOption', session('lstOption'))
                ->with('nom', $nom)
                ->with('adresse', $adresse)
                ->with('ville', $ville)
                ->with('mail', $mail)
                ->with('tel', $tel)
                ->with('nomTuteurStage', $nomTuteurStage)
                ->with('telTuteurStage', $telTuteurStage)
                ->with('id', $id);
            if (!preg_match("#^(\+33|0)[1679][0-9]{8}$#", $tel)) {
                $erreurs[] = "Numero de téléphone de l'entreprise invalide";
                $ok = 0;
            }
            if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/i', $mail)) {
                $erreurs[] =  "le mail n'est pas valide";
                $ok = 0;

            if (!preg_match("#^(\+33|0)[1679][0-9]{8}$#", $telTuteurStage)) {
                $erreurs[] = "Numero de téléphone du tuteur invalide";
                $ok = 0;
            }
                
            }
            if ($ok == 1) {
                PdoGspg::ajouterEntreprise($id, $nom, $adresse, $ville, $mail, $tel, $nomTuteurStage, $telTuteurStage);
                $message = "l'entreprise a été ajouter";
                $erreurs = null;
            }
            return $view->with('erreurs', $erreurs)
                ->with('message', $message);
        } else {
            return view('connexion')->with('erreurs', null);
        }
    }

    
}
