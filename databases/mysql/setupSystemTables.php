<?php
  namespace databases;

  require_once ("mysqlAdministration.php");

  use databases\ServerAttributes;
  use databases\DatabasesApplications;
  use databases\SystemDatabases;

  $attributes = new ServerAttributes;
  $dbWorkFlow = new DatabasesApplications;
  $SetupDatabases = new SystemDatabases;
  $DataBase = "rudy_system_database";

  $Connection = $dbWorkFlow->StabiliseConnection ($attributes, $DataBase);

  $SetupDatabases->CreateTableUsers ($Connection);

  $dbWorkFlow->CloseConnection($Connection);
?>
