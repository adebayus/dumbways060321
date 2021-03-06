<?php
    include 'config.php';
    // echo $_POST['nama_categori'];
    if(isset($_POST['nama_buku'])){
        $nama_buku = $_POST['nama_buku'];
        $stock = $_POST['stock'];
        $deskripsi = $_POST['deskripsi'];
        $categori_id = $_POST['categori_id'];

        $rand = rand();
        $imageTmpPth = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        
        // $imageSize = $_FILES['image']['size'];
        $checkDuplicateBook = "SELECT * FROM books;";
        $resultCheckDuplicateBook = $conn->query($checkDuplicateBook);
        $isDupli = FALSE;

        while($rowDupli = $resultCheckDuplicateBook->fetch_assoc()){
            if( $rowDupli['name'] === $nama_buku ){
                $isDupli = TRUE;
            }
        }
        // echo $resultCheckDuplicate;
        if ($isDupli === TRUE ) {
            // echo $resultCheckDuplicateBook;
            // echo empty($resultCheckDuplicateBook);
            header("Location: index.php?status=Data Sudah Ada");
        }else{
            $randImageName = $rand."_".$imageName;
            $query = "INSERT INTO books (id, name, stock, image, deskripsi, category_id) VALUES (NULL, '$nama_buku', '$stock', '$randImageName', '$deskripsi', $categori_id);";
            $result = $conn->query($query);
            if ($result === TRUE) {
                move_uploaded_file($imageTmpPth, 'images/'.$randImageName);
                header("Location: index.php?status=Berhasil di tambahkan");
                // echo "New record created successfully";
            }else{
                // echo "Error: " . $sql . "<br>" . $conn->error;
                header("Location: index.php?status=Sql Error");
            }
        }
    }else{
        echo "POST KOSONG";
    }
    
?>