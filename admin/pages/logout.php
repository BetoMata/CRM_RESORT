<?php 

session_start();
session_destroy();

header('Location: screens/login.html');

