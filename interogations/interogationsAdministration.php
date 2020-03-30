<?php
  class csrf_workflow {

    public function GenerateToken ($FormName) {

      $secretKey = "gsfhs154aergz2#";

      if (!session_id())
        session_start();

      $sessionID = session_id();

      return sha1 ($FormName.$sessionID);
    }

    public function CheckToken ($Token, $FormName) {

      return $Token === $this->GenerateToken ( $FormName );
    }
  }
?>
<form method="post">
  <input type="text" name="name" placeholder="name"> </br></br>
  <input type="email" name="email" placeholder="email"> </br></br>
  <input type="submit" name="submit" value="submit">
  <input type="hidden" name="csrf_token" value="<?php $formsCsrf_Token = new csrf_workflow;echo $formsCsrf_Token->GenerateToken('protectedForm'); ?>"/>
</form>
<?php

  $formsCsrf_Token = new csrf_workflow;

  if (!empty( $_POST['csrf_token'])) {
    if ( $formsCsrf_Token->CheckToken( $_POST['csrf_token'], 'protectedForm' )) {
        $name = $_POST['name'];
        $email = $_POST['email'];
    }
  }
?>
