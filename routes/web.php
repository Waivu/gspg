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

Route::post('/', [
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
Route::post('validerChoixStage', [
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

Route::post('enregModifFormateurs', [
        'as' => 'chemin_enregModifFormateurs',
        'uses' => 'gererFormateursController@enregModifFormateurs'
]);

Route::get('ajouterFormateurs', [
        'as' => 'chemin_ajouterFormateurs',
        'uses' => 'gererFormateursController@ajouterFormateurs'
]);

Route::post('enregAjoutFormateurs', [
        'as' => 'chemin_enregAjoutFormateurs',
        'uses' => 'gererFormateursController@enregAjoutFormateurs'
]);


//------------------- Cas STAGIAIRES -----------------------------------

Route::get('afficherStagiaires', [
        'as' => 'chemin_afficherStagiaire',
        'uses' => 'gererStagiairesController@afficherStagiaire'
]);

