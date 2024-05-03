<?php

function clear($input)
{
  global $connect;
  // Limpa SQL Injection
  $var = mysqli_escape_string($connect, $input);
  // Limpa XSS
  $var = htmlspecialchars($input);
  return $var;
}
