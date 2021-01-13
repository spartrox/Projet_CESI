<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: BASE_URL . DS . frontend/Accueil");
