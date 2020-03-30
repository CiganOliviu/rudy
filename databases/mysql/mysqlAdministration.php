<?php
  namespace databases;

  class ServerAttributes {

      public const LOCALHOST = "localhost";
      public const USER = "root";
      public const PASSWORD = "";
  }

  class DatabasesApplications {

    public function StabiliseConnection (ServerAttributes $attributes, $DataBase = "") {

      $connection = mysqli_connect ($attributes::LOCALHOST, $attributes::USER, $attributes::PASSWORD, $DataBase);

      return $connection;
    }

    public function CloseConnection ($ServerConnection) {

      if ($ServerConnection->close()) return TRUE;

      return FALSE;
    }

    public function CreateDatabase ($ServerConnection, $DatabaseName) {

      $SqlCommand = "CREATE DATABASE IF NOT EXISTS $DatabaseName";

      if (!$ServerConnection->query($SqlCommand))
        die ("Unable to create database ". $DatabaseName . " " . $ServerConnection->error);
    }

    public function DeleteDatabase ($ServerConnection, $DatabaseName) {

      $SqlCommand = "DROP DATABASE IF EXISTS $DatabaseName";

      if (!$ServerConnection->query($SqlCommand))
        die ("Unable to delete database ". $DatabaseName . " " . $ServerConnection->error);
    }
  }

  class SystemDatabases {

    public function CreateTableUsers ($ServerConnection) {

      $sql = "CREATE TABLE IF NOT EXISTS users (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      email VARCHAR(200) NOT NULL,
      password VARCHAR(255) NOT NULL,
      reg_date TIMESTAMP
      )";

      if (mysqli_query($ServerConnection, $sql) === FALSE)
          die("Error creating table: " . $ServerConnection->error);
    }
  }
?>
