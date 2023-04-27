<?php

function init()
{
  routeHome();
  $name = $_SESSION['name'];
  return ["<p>Welcome $name</p>", ""];
}

?>