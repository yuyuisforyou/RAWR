<?php
session_start();
session_destroy();
header("location: /Forum/index.php?logout=true");
exit();

?>