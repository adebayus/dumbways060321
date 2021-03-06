<?php
    include 'config.php';
    // echo $_POST['nama_categori'];
    if(isset($_POST['nama_categori'])){
        $name = $_POST['nama_categori'];
        $checkDuplicate = "SELECT * FROM categories;";
        $resultCheckDuplicate = $conn->query($checkDuplicate);
        $isDupli = FALSE;
        while($rowDupli = $resultCheckDuplicate->fetch_assoc()){
            if( $rowDupli['name'] === $name ){
                $isDupli = TRUE;
            }
        }
        // echo $resultCheckDuplicate;
        if ($isDupli === TRUE ) {
            header("Location: index.php?status=Data Sudah Ada");
        }else{
            $query = "INSERT INTO categories (id, name) VALUES (NULL, '$name'); ";
            $result = $conn->query($query);
            if ($result === TRUE) {
                header("Location: index.php?status=Berhasil di tambahkan");
                // echo "New record created successfully";
            }else{
                header("Location: index.php?status=Sql Error");
            }
        }
    }else{
        echo "POST KOSONG";
    }
    
?>