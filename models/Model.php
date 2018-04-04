<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author echoes
 */
class Model 
{
    //put your code here
   
    private $connectionString;
    private $user;
    private $password;
    private $host;
    private $dbname;
    private $drive;

    public function __construct() 
    {
        include 'config.php';
        $this->user = $config->dbuser;
        $this->password = $config->dbpassword;
        $this->host = $config->host;
        $this->dbname = $config->dbname;
        $this->drive = $config->drive;
        
        if($this->drive === 'mysql') {
            $this->connectionString = "mysql:host={$this->host};dbname={$this->dbname};
            charset=utf8";
        } elseif($this->drive === 'pgsql') {
            $this->connectionString = "pgsql:host={$this->host};dbname={$this->dbname};
            charset=utf8";
        }
        
    }

    protected function ExecuteQuery($sql, $parameters) 
    {
        $connection = null;
        try {
            $connection = new PDO($this->connectionString, $this->user, $this->password);
            $connection->beginTransaction();
            $preparedStatment = $connection->prepare($sql);
            if ($parameters != null) {
                foreach ($parameters as $key => $value) {
                    $preparedStatment->bindValue($key, $value);
                }
            }

            if ($preparedStatment->execute() == FALSE) {
                throw new PDOException($preparedStatment->errorCode());
            }

            $error = $preparedStatment->errorInfo();
            if ($error[2]) {

                echo "<pre>";
                print_r($error[2]);
                var_dump($preparedStatment->fetchAll());
                var_dump($preparedStatment->debugDumpParams());
                echo "</pre>";
                die;
            } else {
                return $preparedStatment->fetchAll();
            }
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            die;
            return array();
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    protected function ExecuteCommand($sql, $parameters, $returnId = false) 
    {
        $connection = null;
        try {
            $connection = new PDO($this->connectionString, $this->user, $this->password);
            $connection->beginTransaction();
            $preparedStatment = $connection->prepare($sql);
            if ($parameters != null) {
                foreach ($parameters as $key => $value) {
                    $preparedStatment->bindValue($key, $value);
                }
            }
            $preparedStatment->execute();
            $error = $preparedStatment->errorInfo();
            if ($error[2]) {
                print_r($error[2]);
                die;
            }

            if ($returnId) {
                $ID = $connection->lastInsertId();
                $connection->commit();
                return $ID;
            } else {
                $connection->commit();
            }
            return $preparedStatment->rowCount();
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            die;
            return array();
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    protected function getAll($table) 
    {
    	$sql = "SELECT * FROM {$table}";
    	$results = $this->ExecuteQuery($sql, array());

        return $results;
    }

    protected function getAllById($table, $id) 
    {
    	$sql = "SELECT * FROM {$table} WHERE id = :id";
    	$results = $this->ExecuteQuery($sql,['id'=>$id]);
    }

    protected function delete($table, $id) 
    {
    	$sql = "DELETE FROM {table} WHERE id = :id";
    	try{
	    $this->ExecuteCommand($sql, [':id'=>$id]);
	    $results = true;
	    throw new Excepetion('Erro no delete!');
	} catch (Exception $e) {
	    $results = $e->getMessage();
	}	
    	
    }

}

