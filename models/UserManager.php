<?php
include_once "PDO.php";

function GetOneUserFromId($id)
{
  global $PDO;
  $response = $PDO->prepare("SELECT * FROM user WHERE id = $id");
  $response->execute();
  return $response->fetch();
}

function GetAllUsers()
{
  global $PDO;
  $response = $PDO->prepare("SELECT * FROM user ORDER BY nickname ASC");
  $response->execute();
  return $response->fetchAll();
}

function GetUserIdFromUserAndPassword($username, $password)
{
  global $PDO;
  $response = $PDO->prepare("SELECT id FROM user
                            WHERE nickname LIKE '$username' and PASSWORD LIKE '$password'");
  $response->execute();
  return $response->fetchColumn();
}
