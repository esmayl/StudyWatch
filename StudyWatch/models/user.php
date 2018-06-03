<?php

function getPasswordHash($email){
  global $connection;

  $stmt = $connection->prepare("SELECT password FROM user WHERE email=:email");

  $waardes = array(
    'email' => $email
  );

  $stmt->execute($waardes);
  $result = $stmt->fetch();

  return $result['password'];
}
function checkUsertype($email){
  global $connection;

  $stmt = $dbh->prepare("SELECT user_type FROM user WHERE email=:email");

  $waardes = array(
    'email' => $email
  );

  $stmt->execute($waardes);
  $result = $stmt->fetch();

  return $result['user_type'];
}
function getName($email){
  global $connection;

  $stmt = $connection->prepare("SELECT concat(naam, ' ', achternaam) as naam FROM user WHERE email=:email");

  $waardes = array(
    'email' => $email
  );

  $stmt->execute($waardes);
  $result = $stmt->fetch();

  return $result['naam'];
}
?>
