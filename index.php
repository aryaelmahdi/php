<?php
session_start();
if ( !isset($_SESSION['username']) ){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
?>
<?php
  require "config.php";

  // METHOD GET
  $pagination = 5;
  $page = (isset($_GET['page'])) ? $page = $_GET['page'] : 1;
  $position = ($page == 1) ? 0 : ($page - 1) * $pagination;

  $dmlNoPagination = "SELECT id_pembeli, nama, hp, nama_barang, harga, jumlah*harga as total_bayar FROM elmahdi";
  $queryNoPagination = mysqli_query($conn, $dmlNoPagination);
  $rows = mysqli_num_rows($queryNoPagination);
  $pages = ceil($rows/$pagination);

  $dmlDefault = "SELECT id_pembeli, nama, hp, nama_barang, harga, jumlah*harga as total_bayar FROM elmahdi LIMIT $position, $pagination";
  $queryDefault = mysqli_query($conn, $dmlDefault);

  if (isset($_GET['searchBtn'])) {
    $field = $_GET['attribute'];
    $search = $_GET['search'];
    
    $dmlSearch = "SELECT id_pembeli, nama, hp, nama_barang, harga, jumlah*harga as total_bayar FROM elmahdi WHERE $field LIKE '%$search%'";
    $querySearch = mysqli_query($conn, $dmlSearch);
    $rows = mysqli_num_rows($querySearch);
    $pages = ceil($rows/$pagination);
  }
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
</head>

<body style="background-color:LightPink">
    <!-- Navbar -->
    <nav style="background-color:LightPink">
        <div style="width:100%; margin-top:1rem;">
            <div style="display:flex; float:left; width:33%;padding-left:1rem;">
                <a class="btn btn-dark" href="index.php">Home</a>
            </div>
            <div style="display:flex; float:right; width:33%;padding-left:25rem;">
                <a class="btn btn-dark" href="logout.php">Logout</a>
            </div>
            <div style="display:flex; justify-content:center; width:33%;">
                <form class="d-flex" method="get" action="index.php">
                    <select name="attribute" id="attribute" class="form-control me-2 text-center">
                        <option value="id_pembeli" selected>ID</option>
                        <option value="nama">Nama</option>
                    </select>
                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn  btn-dark" type="submit"
                        name="searchBtn">Search</button>
                </form>
            </div><br/>
            <div style="display:flex; float:left; width:33%;padding-left:1rem;">
                <a class="btn btn-dark" href="create.php">Create</a>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <br><br><br>
        <table class="table">
            <thead style="background-color:LightBlue">
                <tr>
                    <th>ID Pembeli</th>
                    <th>Nama</th>
                    <th>Telpon</th>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Detail</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = (isset($_GET['searchBtn'])) ? mysqli_fetch_array($querySearch) : mysqli_fetch_array($queryDefault)) { ?>
                <form>
                    <tr style="background-color:white">
                        <td><?= $data['id_pembeli'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['hp'] ?></td>
                        <td><?= $data['nama_barang'] ?></td>
                        <td><?= $data['harga'] ?></td>
                        <td><?= $data['total_bayar'] ?></td>
                        <td><a href="show.php?id=<?= $data['id_pembeli'] ?>" style="background-color:red" class="btn">Detail</a></td>
                        <td><a href="update.php?id=<?= $data['id_pembeli'] ?>" style="background-color:yellow" class="btn">Update</a></td>
                        <td><a href="delete.php?id=<?= $data['id_pembeli'] ?>" style="background-color:green" class="btn">Delete</a></td>
                    </tr>
                </form>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <ul style="display:flex; justify-content:center;" class="pagination">
            <?php for ($i = 1; $i <= $pages; $i++) { ?>
            <li class="page-item"><a class="btn btn-dark"
                    href="<?php echo ($i != $page) ? "index.php?page=" . $i : "#" ?>"><?= $i ?></a></li>
            <?php } ?>
        </ul>
    </div>
</body>

</html>