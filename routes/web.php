<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*-------------------- Use case connexion---------------------------*/
Route::get('/', [        
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/', [       //post
        'as' => 'chemin_valider',
        'uses' => 'connexionController@valider'
]);
Route::get('deconnexion', [
        'as' => 'chemin_deconnexion',
        'uses' => 'connexionController@deconnecter'
]);

//------------------- Cas STAGE -----------------------------------

Route::get('choixstage', [
        'as' => 'chemin_choixstage',
        'uses' => 'gererStagesController@voir'
]);
Route::post('validerChoixStage', [      //post
        'as' => 'chemin_validerChoixStage',
        'uses' => 'gererStagesController@validerChoixStage'
]);
//------------------- Cas FORMATEURS  -----------------------------------

Route::get('afficherFormateurs', [
        'as' => 'chemin_afficherFormateurs',
        'uses' => 'gererFormateursController@afficherFormateurs',
]);

Route::get('modifierFormateurs', [
        'as' => 'chemin_modifierFormateurs',
        'uses' => 'gererFormateursController@modifierFormateurs'
]);

Route::post('enregModifFormateurs', [        //post
        'as' => 'chemin_enregModifFormateurs',
        'uses' => 'gererFormateursController@enregModifFormateurs'
]);

Route::get('ajouterFormateurs', [
        'as' => 'chemin_ajouterFormateurs',
        'uses' => 'gererFormateursController@ajouterFormateurs'
]);

Route::post('enregAjoutFormateurs', [       //post
        'as' => 'chemin_enregAjoutFormateurs',
        'uses' => 'gererFormateursController@enregAjoutFormateurs'
]);


//------------------- Cas STAGIAIRES -----------------------------------

Route::get('afficherStagiaires', [
        'as' => 'chemin_afficherStagiaire',
        'uses' => 'gererStagiairesController@afficherStagiaire'
]);

Route::get('modifierStagiaire', [
        'as' => 'chemin_modifierStagiaire',
        'uses' => 'gererStagiairesController@modifierStagiaire'
]);

Route::post('enregModifStagiaire', [     //post
        'as' => 'chemin_enregModifStagiaire',
        'uses' => 'gererStagiairesController@enregModifStagiaire'
]);

Route::get('ajouterStagiaire',[
        'as' => 'chemin_ajouterStagiaire',
        'uses' => 'gererStagiairesController@ajouterStagiaire'
]);

Route::post('enregAjoutStagiaire',[    //post
        'as' => 'chemin_enregAjoutStagiaire',
        'uses' => 'gererStagiairesController@enregAjoutStagiaire'

]);


//------------------- Cas ENTREPRISE -----------------------------------


Route::get('afficherEntreprise', [
        'as' => 'chemin_afficherEntreprise',
        'uses' => 'gererEntrepriseController@afficherEntreprise'
]);

Route::get('modifierEntreprise', [
        'as' => 'chemin_modifierEntreprise',
        'uses' => 'gererEntrepriseController@modifierEntreprise'
]);

Route::post('enregModifEntreprise', [    //post
        'as' => 'chemin_enregModifEntreprise',
        'uses' => 'gererEntrepriseController@enregModifEntreprise'
]);

Route::get('ajouterEntreprise',[
        'as' => 'chemin_ajouterEntreprise',
        'uses' => 'gererEntrepriseController@ajouterEntreprise'
]);

Route::post('enregAjoutEntreprise',[     //post
        'as' => 'chemin_enregAjoutEntreprise',
        'uses' => 'gererEntrepriseController@enregAjoutEntreprise'

]);

//------------------- Cas STAGE -----------------------------------


Route::get('afficherStage', [
        'as' => 'chemin_afficherStage',
        'uses' => 'gererStagesController@afficherStage'
]);

Route::get('modifierStage', [
        'as' => 'chemin_modifierStage',
        'uses' => 'gererStagesController@modifierStage'
]);

Route::post('enregModifStage', [    //post
        'as' => 'chemin_enregModifStage',
        'uses' => 'gererStagesController@enregModifStage'
]);

Route::get('ajouterStage',[
        'as' => 'chemin_ajouterStage',
        'uses' => 'gererStagesController@ajouterStage'
]);

Route::post('enregAjoutStage',[     //post
        'as' => 'chemin_enregAjoutStage',
        'uses' => 'gererStagesController@enregAjoutStage'

]);





