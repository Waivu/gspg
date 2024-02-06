<?php

namespace App\MyApp;

use PDO;
use Illuminate\Support\Facades\Config;

class PdoGspg
{
	private static $serveur;
	private static $bdd;
	private static $user;
	private static $mdp;
	private  $monPdo;

	/**
	 * crée l'instance de PDO qui sera sollicitée
	 * pour toutes les méthodes de la classe
	 */
	public function __construct()
	{

		self::$serveur = 'mysql:host=' . Config::get('database.connections.mysql.host');
		self::$bdd = 'dbname=' . Config::get('database.connections.mysql.database');
		self::$user = Config::get('database.connections.mysql.username');
		self::$mdp = Config::get('database.connections.mysql.password');
		$this->monPdo = new PDO(self::$serveur . ';' . self::$bdd, self::$user, self::$mdp);
		$this->monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct()
	{
		$this->monPdo = null;
	}


	/**
	 * Retourne les informations d'un gestionnaire
 
	 * @param $login 
	 * @param $mdp
	 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif 
	 */
	public function getInfosGestionnaire($login, $mdp)
	{
		$req = "select id, nom, prenom from gestionnaire 
        where login='" . $login . "' and mdp='" . $mdp . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	// Cas STAGES --------------------------------------------------------------------------

	public function getStages()
	{
		$req = "select * from stage";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}
	
	// Cas FORMATEURS ---------------------------------------------------------------------

	public function getFormateurs()
	{
		$req = "select * from formateur";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}

	public function ajouterFormateurs($nom, $prenom, $mail, $tel)
	{
		$req = "insert into formateur (nom,prenom,mail,tel) VALUES('$nom', '$prenom', '$mail', '$tel')";
		$rs = $this->monPdo->query($req);
		return $rs;
	}

	public function getFormateurById($id)
	{
		$req = "select id,nom,prenom,mail,tel from formateur WHERE id ='" . $id . "'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function majFormateurs($id, $nom, $prenom, $mail, $tel)
	{
		$req = "update formateur set nom = '$nom', prenom = '$prenom', mail = '$mail', tel = '$tel' ";
		$req .= "where id = '$id'";
		$rs = $this->monPdo->exec($req);
		return $rs;
	}

	// Cas STAGIAIRES -----------------------------------------------------------------

	public function getStagiaires()
	{
		$req = "select * from stagiaire";
		$rs = $this->monPdo->query($req);
		$lignes = $rs->fetchAll();
		return $lignes;
	}
}

	

	

	


	

	

	

