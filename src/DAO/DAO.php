<?php

namespace App\src\DAO;

use PDO;
use Exception;

abstract class DAO
{


    private $connection;

    private function checkConnection()
    {
        // check if connection est NULL and call getConnection()
        if($this->connection === null) {

            return $this->getConnection();
        }
        // if connection exists : return it back. NO NEED TO DO NEW CONNECTION

        return $this->connection;
    }

    // connection method to database


    private function getConnection()
    {
        //Tentative de connexion à la base de données
        try{
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On renvoie un message avec le mot-clé return
            return $this->connection;
        }
            //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connexion :'.$errorConnection->getMessage());
        }

    }

    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $result;
    }

}