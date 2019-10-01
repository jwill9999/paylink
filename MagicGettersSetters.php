<?php

// Here I create a Db class which injects through dependency injection
// a type of database that implements a IDatabase interface. This allows for the Db class
// to be extended to use new database services and therfore extend
// the class without modification in line with SOLID principles.

interface IDatabase
{
 public function __get($property);
 public function __set($property, $value);
 public function connect();

}

/// database injection of database service
class Db
{

 private $db;
 public function __construct(IDatabase $database)
 {
  $this->db = $database;
  $this->db->connect();
 }

}

/// sql database
class sqlDatabase implements IDatabase
{

 private $servername;
 private $username;
 private $password;

 public function __get($property)
 {
  try {
   if (property_exists($this, $property)) {
    return $this->$property;
   } else {
    throw new Exception("ERROR:  Property {$property} is not available please check property name \n");
   }
  } catch (exception $e) {
   echo $e->getMessage();
  }
 }

 public function __set($property, $value)
 {
  try {
   if (property_exists($this, $property)) {
    $this->$property = $value;
   } else {
    throw new Exception("ERROR:  Property {$property} can not be set please check property name \n");
   }
  } catch (Exception $e) {
   echo $e->getMessage();
  }
 }

 public function connect()
 {
  // connect to my chosen database that implements an IDatabase
  // interface using the connection string provided.
  // sudo code
  try {
//    $conn = new PDO("mysql:host={$this->servername};dbname=myDB", $this->username, $this->password);
   //    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "I am now connected to my database";
  } catch (Exception $e) {
   echo $e->getMessage();
  }
 }
}

$sqlDatabase             = new sqlDatabase();
$sqlDatabase->servername = "localhost";
$sqlDatabase->username   = "username";
$sqlDatabase->password   = "password";

$db = new Db($sqlDatabase);
