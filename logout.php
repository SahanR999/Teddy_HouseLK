<?php
session_start();
session_destroy(); // Destroy all sessions

// Redirect to index.php after logout
header("Location: index.php");
exit;
?>
