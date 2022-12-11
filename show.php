<?php 
    require_once "config.php";
    if (!isset($_GET['id']) || $_GET['id'] == null) header("location:index.php");
    $id_pembeli = $_GET['id'];

    $sql = "SELECT *, jumlah*harga as total_bayar FROM elmahdi WHERE id_pembeli = '$id_pembeli'";
    $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .input-group-append {
                cursor: pointer;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css"> 
    </head>
    <body style="background-color:LightPink">
        <!-- Navbar -->
        <nav style="background-color:LightPink">
        <div style="width:100%; margin-top:1rem;">
            <div style="display:flex; float:left; width:33%;padding-left:1rem;">
                <a class="btn btn-dark" href="index.php">Home</a>
            </div><br/>
        </div>
    </nav>

        <!-- Begin page content -->
        <main class="flex-shrink-0">
            <div class="container text-center">
                <h1 class="mt-5">Show Transaction Detail - Nama Pembeli</h1>
                <p class="lead">Transaction Detail</p>
                <div class="row pt-5">
                    <div class="col-12">
                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="col-6">
                            <label class="form-label">User ID</label>
                            <input type="text" class="form-control" name="id" readonly value="<?= $data['id_pembeli'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" readonly value="<?= $data['nama'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address" readonly><?= $data['alamat'] ?></textarea>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" readonly value="<?= $data['hp'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Transaction Date</label>
                            <input type="date" class="form-control" name="date" value="<?= $data['tgl_transaksi'] ?>" readonly>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Type of Item</label>
                            <input type="text" name="item_type" class="form-control" value="<?= $data['jenis_barang'] ?>" readonly>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Name of Item</label>
                            <input type="text" name="item_name" class="form-control" value="<?= $data['nama_barang'] ?>" readonly>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Number of Item</label>
                            <input type="number" class="form-control" name="item_number" readonly value="<?= $data['jumlah'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Price of Item</label>
                            <input type="number" class="form-control" name="item_price" readonly value="<?= $data['harga'] ?>">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Total</label>
                            <input type="number" class="form-control" name="total" readonly value="<?= $data['total_bayar'] ?>">
                        </div>
                        <div class="mb-3"><br/>
                            <a href="index.php" class="btn btn-dark">Back</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>