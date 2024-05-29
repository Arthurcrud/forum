<?php

function clear($input)
{
  global $connect;
  // Limpa SQL Injection
  $var = mysqli_real_escape_string($connect, $input);
  // Limpa XSS
  $var = htmlspecialchars($var);
  return $var;
}
