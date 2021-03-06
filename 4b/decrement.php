<?php 
    include "config.php";

    $stock =(int)$_GET['stock'];
    $id = (int)$_GET['id'];
    $newStock = $stock - 1;
    echo gettype($id);
    echo gettype($stock);
    $query = "UPDATE books SET stock='$newStock' WHERE id='$id';";
    
    $result = $conn->query($query);

    if ($result === TRUE) {
        // echo "true";
        header("Location: index.php?status=Berhasil DiPinjam");
    }
    else{
        echo "Error: " . $result . "<br>" . $conn->error;
        // echo "false";
        header("Location: index.php?status=gagal Dipinjam");
    }

?>