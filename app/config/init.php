<?php
// session_init.php

// Check if a session is already active, and start one if not
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// You can also add other global initialization here if needed
?>