<?php

include("database.php");
include("user.php");
require url('main');

function url($class) {
    return str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
}

?>