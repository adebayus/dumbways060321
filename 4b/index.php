<!DOCTYPE html>
<html lang="en"class="bg-gray-400 " >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../4b/tailwind.css" rel="stylesheet">
    <script src="../4b/main.js"></script>
    <title>Document</title>
</head>
<body id="body" class="box-border" >
    <?php 
        include 'config.php';
        if ( isset( $_GET['status'])) {
            echo "
                <script> 
                    alert('". $_GET['status'] ."')
                </script>
            ";
        } 
    ?>

    <div style="max-width: 1280px;" class="container mx-auto bg-white p-10">
        <button onclick="showAddListButton();" class="hover:bg-green-600 focus:outline-white relative bg-green-400 py-2 px-6 text-white text-xl rounded-md tracking-wider mt-10">
            Tambah
        </button> 

        <div id="menu_tambah" style="width: 150px;" class="hidden border absolute p-4 text-lg flex flex-col bg-white shadow-xl rounded mt-1">
            <button onclick="addFormHandle(`tambah_form_categori`);" class="hover:bg-none hover:bg-blue-400 hover:text-white py-1 border border-blue-400 text-blue-400 rounded mb-2 "> Category </button>
            <button onclick="addFormHandle(`tambah_form_books`);" class="hover:bg-none hover:bg-green-400 hover:text-white py-1 border border-green-400 text-green-400 rounded"> Books </button>
        </div>

        <div id="tambah_form_categori" class="hidden absolute w-full top-0 bottom-0 left-0 right-0">
            <div id="outside_close" onclick="closeModalForm(`tambah_form_categori`);" class="absolute w-full p-5 top-0 bottom-0 left-0 right-0 bg-black opacity-30 "></div>
           
            <div id="content" style="max-width: 350px; " class="shadow-lg p-3 my-10 relative w-full bg-white p-10 mx-auto">
                <h1 class="text-gray-400 text-2xl font-semibold mb-5"> Tambah Data Categori</h1>
                <form class="" action="form_add_categori.php" method="POST" enctype="multipart/form-data">
                    <div id="container_nama_categori" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                        <label for="nama_categori" class="text-xs text-gray-400"> Nama Kategori</label>
                        <input type="text" name="nama_categori" id="nama_categori" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required> 
                    </div>
                    <input type="submit" name="submit" value="Tambahkan" class="cursor-pointer w-full rounded bg-green-400 text-white py-2 px-3">
                </form>
                <button onclick="closeModalForm(`tambah_form_categori`);" class="mt-2 cursor-pointer w-full rounded bg-gray-400 text-white py-2 px-3"> Close </button>
            </div>
            
        </div>

        <div id="tambah_form_books" class="hidden absolute w-full top-0 bottom-0 left-0 right-0">
            <div id="outside_close" onclick="closeModalForm(`tambah_form_books`);" class="absolute w-full p-5 top-0 bottom-0 left-0 right-0 bg-black opacity-30 ">gfghf</div>
           
            <div id="content" style="max-width: 350px; " class="shadow-lg p-3 my-10 relative w-full bg-white p-10 mx-auto">
                <h1 class="text-gray-400 text-2xl font-semibold mb-5"> Tambah Data Book</h1>
                <form class="" action="form_add_books.php" method="POST" enctype="multipart/form-data">
                    <div id="container_nama_categori" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                        <label for="nama_buku" class="text-xs text-gray-400"> Nama Book</label>
                        <input type="text" name="nama_buku" id="nama_buku" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required> 
                    </div>
                    <div id="container_stock" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                        <label for="stock" class="text-xs text-gray-400"> Stock </label>
                        <input type="number" name="stock" id="stock" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required> 
                    </div>
                    <div id="container_deskripsi" style="max-height: 100px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                        <label for="deskripsi" class="text-xs text-gray-400"> Deskripsi </label>
                        <textarea  name="deskripsi" id="deskripsi" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required></textarea>  
                    </div>
                    <div id="container_categori_id" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                        <select name="categori_id" id="categori_id" class="focus:outline-none text-sm text-green-400" >
                            <?php
                                $queryCategoriList = "SELECT * FROM categories;";
                                $resultCategoriList = $conn->query($queryCategoriList);
                                while($rowCatList = $resultCategoriList->fetch_assoc()){
                            ?>
                            <option value="<?php echo $rowCatList['id'] ?>"> <?php echo $rowCatList['name'] ?> </option>
                            <?php
                                }
                            ?>
                            
                            <option value="Biologi"> Biologi </option>
                        </select> 
                    </div>
                    <div id="container_image"  class="relative flex flex-col  py-1 px-4 border mb-3">
                        <label for="image" class="text-xs text-gray-400"> Image </label>
                        <input type="file" name="image" id="image" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required> 
                    </div>
                    

                    <input type="submit" name="submit" value="Tambahkan" class="cursor-pointer w-full rounded bg-green-400 text-white py-2 px-3">
                </form>
                <button onclick="closeModalForm(`tambah_form_books`);" class="mt-2 cursor-pointer w-full rounded bg-gray-400 text-white py-2 px-3"> Close </button>
            </div>
            
        </div>

        

        <?php 
            $queryCategoryName = "SELECT categories.name, categories.id FROM books LEFT JOIN categories on books.category_id=categories.id GROUP BY categories.name;";
            $resultQueryCategoryName = $conn->query($queryCategoryName);
            if ($resultQueryCategoryName->num_rows > 0 ) {
                while ($rowCategory = $resultQueryCategoryName->fetch_assoc()) {
        ?>

        <div id="product_template" class="mt-7">
            <div class="flex">
                <h1 class="text-gray-400 text-lg font-semibold"> 
                    <?php 
                        echo $rowCategory['name'];
                    ?> 
                </h1>
                <a href="delete_categori.php?id=<?php echo $rowCategory['id'] ?>" class="ml-2 py-1 px-3 bg-red-400 rounded text-white"> Delete </a>
            </div>

            <div id="grid_book" style="max-width: 1200px;" class="mt-3 grid gap-5 lg:grid-cols-5 xl:grid-cols-6 md:grid-cols-4">
                <?php 
                    $nameCategory = $rowCategory['name'];
                    $queryListBook = "SELECT books.id, books.name, books.stock, books.image, books.category_id FROM books JOIN categories ON books.category_id= categories.id Where books.category_id = ". $rowCategory['id'] . ";";
                    $resultQueryListBook = $conn->query($queryListBook);
                    while ($rowListBook = $resultQueryListBook->fetch_assoc()) {
                        // echo $rowListBook["name"];
                ?> 
                <div id="card_template" style="max-width: 180px;" class="rounded ">
                    <img class="" style="width: 180px; height: 180px;" src="images/<?php echo $rowListBook['image'] ?>" class=""alt="">
                    <div id="detail_card" class="mt-1 mb-2 grid grid-cols-12 ">
                        <h2 class="truncate font-semibold text-gray-800 text-sm col-start-1 col-end-8 text-left "> <?php echo $rowListBook['name'] ?> </h2>
                        <h2 class="truncate text-sm col-start-8 text-gray-500 col-end-13 text-right">Stock : <?php echo $rowListBook['stock'] ?> </h2>
                    </div>
                    <div id="button" class="text-sm text-white text-center grid grid-cols-2 gap-2 justify-between">
                        <a id="pinjam" href="decrement.php?stock=<?php echo $rowListBook['stock'] ?>&id=<?php echo $rowListBook['id'] ?>" class="w-full py-1 bg-blue-500 rounded-lg <?php if($rowListBook['stock'] == 0){echo 'pointer-events-none'; } ?>  " > Pinjam </a>
                        <a id="kembalikan" href="increment.php?stock=<?php echo $rowListBook['stock'] ?>&id=<?php echo $rowListBook['id'] ?>"  class="py-1 bg-yellow-400 rounded-lg "> Kembalikan </a>
                    </div>
                </div>

                <?php
                    }
                ?> 

            </div>
        </div>
        <?php
                }
            }
        ?>

    </div>

</body>
</html>