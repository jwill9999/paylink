<?php

// Here I create a Db class which injects through dependency injection
// a type of database that implements a IDatabase interface. This allows for the Db class
// to be extended to use new database services and therfore extend
// the class without modification in line with SOLID principles.

/**
 * IDtabase interface
 */
interface IDatabase
{
 public function __get($property);
 public function __set($property, $value);
 public function connect();

}

/**
 * database injection of database service
 * @param IDatabase $database
 * @return void
 */
class Db
{

 private $db;
 public function __construct(IDatabase $database)
 {
  $this->db = $database;
  $this->db->connect();
 }

}

/**
 * SQL database class with magic getters and setters
 * @param String $servername;
 * @param String $username;
 * @param String $password;
 *
 * @return void
 */
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

/**
 *  SUDO CODE connect to my SQL database  using the connection string provided.
 *  sudo code
 *
 *  @return void
 */
 public function connect()
 {

  try {
   /*
   $conn = new PDO("mysql:host={$this->servername};dbname=myDB", $this->username, $this->password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    */
   echo "I am now connected to my database";
  } catch (Exception $e) {
   echo $e->getMessage();
  }
 }
}

$sqlDatabase = new sqlDatabase();

// set values
$sqlDatabase->servername = "localhost";
$sqlDatabase->username   = "username";
$sqlDatabase->password   = "password";

// get values stored in sqlDatabase
echo $sqlDatabase->servername . "\n";
echo $sqlDatabase->username . "\n";
echo $sqlDatabase->password . "\n";

$db = new Db($sqlDatabase);
