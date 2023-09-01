<?php
// Start the session and destroy it
session_start();
session_destroy();

// Redirect to the login page
header("Location: login");
exit;