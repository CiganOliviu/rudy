<?php
    namespace databases\mysql;

    class ServerAttributes {

        $localhost = "localhost";
        $user = "root";
        $password = "";
        $database = "";
    }

    class DatabasesApplications {

      public function StabiliseConnection (ServerAttributes attributes) {

        $connection = mysqli_connect (attributes.$localhost, attributes.$user, attributes.$password, attributes.$database);

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
