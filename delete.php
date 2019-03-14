<?php
  require_once "backend/functions.php";

  if(count($_GET) > 0) {
    $db = connect();

    $isDeleted = deleteGreitis($db, $_GET['id']);

    header('Location: index.php?delete='.$isDeleted.'&numeris='.$_GET['numeris']);
    exit;

  }

?>
