<?php
    //delete email cookie
    setcookie("email", "", time() - 3600, "/");
    //redirect to home
    header("Location: /");
?>