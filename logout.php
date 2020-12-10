<?php

//session start();

session_start();
session_unset();
session_destroy();
header('location:index.php'); //when a user logs out the session is destroyed and ridirects the user to the home page
