<?php

session_start();
//dit eindicht de sessie en logt je dus uit
if (session_destroy()) {
    header("Location: login.php");
}
