<?php

require_once("Repository/EntityRepository.php");
require_once("Class/Clients.php");

/**
 *  Classe ClientsRepository
 * 
 *  Cette classe représente le "stock" de Clients.
 *  Toutes les opérations sur les Clients doivent se faire via cette classe 
 *  qui tient "synchro" la bdd en conséquence.
 * 
 *  La classe hérite de EntityRepository ce qui oblige à définir les méthodes  (find, findAll ... )
 *  Mais il est tout à fait possible d'ajouter des méthodes supplémentaires si
 *  c'est utile !
 *  
 */
class ClientsRepository extends EntityRepository {

    public function __construct(){
        // appel au constructeur de la classe mère (va ouvrir la connexion à la bdd)
        parent::__construct();
    }

    public function find($id): ?Clients {
        $requete = $this->cnx->prepare("select * from Clients where id=:value");
        $requete->bindParam(':value', $id);
        $requete->execute();
        $answer = $requete->fetch(PDO::FETCH_OBJ);
        
        if ($answer == false) return null;
        
        $client = new Clients($answer->id);
        $client->setFirstName($answer->first_name)
               ->setLastName($answer->last_name)
               ->setEmail($answer->email)
               ->setCountry($answer->country)
               ->setCity($answer->city)
               ->setLat($answer->lat)
               ->setLng($answer->lng);
        return $client;
    }

    public function findAll(): array {
        $requete = $this->cnx->prepare("select * from Clients");
        $requete->execute();
        $answer = $requete->fetchAll(PDO::FETCH_OBJ);

        $res = [];
        foreach($answer as $obj){
            $client = new Clients($obj->id);
            $client->setFirstName($obj->first_name)
                   ->setLastName($obj->last_name)
                   ->setEmail($obj->email)
                   ->setCountry($obj->country)
                   ->setCity($obj->city)
                   ->setLat($obj->lat)
                   ->setLng($obj->lng);
            array_push($res, $client);
        }
       
        return $res;
    }

    public function save($client){
        // Not implemented ! TODO when needed !          
        return false;
    }

    public function delete($id){
        // Not implemented ! TODO when needed !
        return false;
    }

    public function update($client){
        // Not implemented ! TODO when needed !
        return false;
    }
}