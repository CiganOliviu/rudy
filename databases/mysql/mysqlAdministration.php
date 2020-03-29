<?php
    namespace databases;

    class ServerAttributes {

        public const LOCALHOST = "localhost";
        public const USER = "root";
        public const PASSWORD = "";
        public const DATABASE = "";
    }

    class DatabasesApplications {

      public function StabiliseConnection (ServerAttributes $attributes) {

        $connection = mysqli_connect ($attributes::LOCALHOST, $attributes::USER, $attributes::PASSWORD, $attributes::DATABASE);

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

?>
