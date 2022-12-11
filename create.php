<?php
    require "config.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $id_pembeli = $_POST['id_pembeli'];
        $name = $_POST['name'];
        $alamat = $_POST['alamat'];
        $phone_number = $_POST['phone_number'];
        $date = $_POST['date'];
        $item_type = $_POST['item_type'];
        $item_name = $_POST['item_name'];
        $item_number = $_POST['item_number'];
        $item_price = $_POST['item_price'];

        $sql = "INSERT INTO elmahdi SET 
                id_pembeli = '$id_pembeli',
                nama = '$name',
                alamat = '$alamat',
                hp = '$phone_number',
                tgl_transaksi = '$date',
                jenis_barang = '$item_type',
                nama_barang = '$item_name',
                jumlah = '$item_number',
                harga = '$item_price'";
        $query = mysqli_query($conn, $sql);

        if ($query) header("location:index.php");

        echo "Something Went Wrong On The Create";
    }
?>
<!DOCTYPE html>
<html>

<head>
    <style>
    .input-group-append {
        cursor: pointer;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
</head>

<body style="background-color:LightPink">
    <!-- Navbar -->
    <div style="display:flex; flex-wrap: wrap;">
        <nav style="background-color:LightPink;">
            <div style=" width:100vw; margin-top:1rem;">
                <div style="display:flex; float:left; width:33%;padding-left:1rem;">
                    <a class="btn btn-dark" href="index.php">Home</a>
                </div>
            </div>
        </nav>
        <!-- Begin page content -->
        <main style="width:100vw">
            <div class="container text-center">
                <h1 class="mt-5 text-center">Transaction</h1>
                <p class="lead">Gugu</p>
                <div class="pt-5">
                    <div>
                        <form method="POST" action="create.php"
                            style="display:flex; justify-content:center; width:100%">
                            <div style="width:50%">
                                <label class="form-label">ID Pembeli</label>
                                <input type="text" class="form-control" name="id_pembeli" required>

                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>

                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="alamat" required>

                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" name="phone_number" required>

                                <label class="form-label">Transaction Date</label>
                                <input type="date" class="form-control" name="date" required>

                                <label class="form-label">Type of Item</label>
                                <input type="text" name="item_type" class="form-control" required>

                                <label class="form-label">Name of Item</label>
                                <input type="text" name="item_name" class="form-control" required>

                                <label class="form-label">Number of Item</label>
                                <input type="number" class="form-control" name="item_number" required>

                                <label class="form-label">Price of Item</label>
                                <input type="number" class="form-control" name="item_price" required>
                                <div style="margin-top:1rem;">
                                    <a href="index.php" class="btn btn-dark">Back</a>
                                    <input type="submit" class="btn btn-dark" value="Create">
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
    </main>
    </div>
</body>

</html>