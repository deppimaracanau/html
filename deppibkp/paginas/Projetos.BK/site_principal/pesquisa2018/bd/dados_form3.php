<?php

    setcookie("publicacoes1", $_POST['publicacoes1'], time() + (86400 * 30), "/");
    setcookie("publicacoes2", $_POST['publicacoes2'], time() + (86400 * 30), "/");

    header("Location:../forms/F4.php");
?>