<?php 
    include "config.php";
    $query = "DELETE FROM categories WHERE id=".$_GET['id'].";";
    $result = $conn->query($query);
    if ($result === TRUE) {
        header("Location: index.php?status=Data terhapus");
    }
    else{
        header("Location: index.php?status=gagal terhapus");
    }

?>