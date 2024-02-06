<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Facades\PdoGspg;

class connexionController extends Controller
{
    function connecter(){
        
        return view('connexion')->with('erreurs',null);
    } 
    function valider(Request $request){
        $login = $request['login'];
        $mdp = $request['mdp'];
        $gestionnaire = PdoGspg::getInfosGestionnaire($login,$mdp);
        if(!is_array($gestionnaire)){
            $erreurs[] = "Login ou mot de passe incorrect(s)";
            return view('connexion')->with('erreurs',$erreurs);
        }
        else{
            $lstStage = "";
            $lstOption = "";
            session(['gestionnaire' => $gestionnaire]);
            return view('sommaire')
                    ->with('gestionnaire',session('gestionnaire'))
                    ->with('lstStage', $lstStage)
                    ->with('lstOption', $lstOption);
        }
    } 
    function deconnecter(){
            session(['gestionnaire' => null]);
            return redirect()->route('chemin_connexion');
    }
       
}
