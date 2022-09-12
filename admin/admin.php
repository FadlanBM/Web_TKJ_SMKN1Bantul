<?php
$host       = "localhost";
$user       = "root";
$pass       = "12345123";
$db         = "datasiswa";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$NIS        = "";
$name      = "";
$alamat     = "";
$kelas      = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "DELETE from user where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "SELECT * from user where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $NIS        = $r1['NIS'];
    $name       = $r1['name'];
    $alamat     = $r1['alamat'];
    $kelas   = $r1['kelas'];

    if ($NIS == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $NIS        = $_POST['NIS'];
    $name       = $_POST['name'];
    $alamat     = $_POST['alamat'];
    $kelas   = $_POST['kelas'];

    if ($NIS && $name && $alamat && $kelas) {
        if ($op == 'edit') { //untuk update
            $sql1       = "UPDATE user set NIS = '$NIS',name='$name',alamat = '$alamat',kelas='$kelas' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data siswa berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "INSERT into user(NIS,name,alamat,kelas) values ('$NIS','$name','$alamat','$kelas')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<?php
session_start();
include('includes/config.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">-->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />

    <style>
        

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

<!-- Top Bar Start -->
<?php include('includes/topheader.php');?>
<!-- Top Bar End -->
<?php include('includes/leftsidebar.php');?>



    <div class="">
        <!-- untuk memasukkan data -->
        <div class="pl-96 mt-48 ">
            <div class="font-bold" id="te">
                Tambah / Edit Data Siswa
            </div>
            <div class="content-center ml-28">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=admin.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                  
                }
                ?>
                <form action="" method="POST">
                    <div class="w-full md:w-1/2 px-3 py-9">
                            <div class="">
                            <label for="NIS" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">NIS</label>
                            </div>
                            <div class="col-sm-10">
                            <input type="text" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 hover:placeholder:text-slate-500"  id="NIS" name="NIS" placeholder="NIS...." value="<?php echo $NIS ?>">   
                            </div>                
                    </div>
                    <br>
                    <div class="w-full md:w-1/2 px-3 py-4">
                        <div>
                        <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nama</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="name" value="<?php echo $name ?>">
                        </div>
                    </div>
                    <br>
                    <div class="w-full md:w-1/2 px-3 py-4">
                        <label for="alamat" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <br>
                    <div class="w-full md:w-1/2 px-3 py-4">
                        <label for="kelas" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Kelas</label>
                        <div class="col-sm-10">
                            <select class="bg-slate-400 rounded-full" name="kelas" id="kelas">
                                <option value="">- Pilih Kelas -</option>
                                <option value="X TKJ 1" <?php if ($kelas == "X TKJ 1") echo "selected" ?>>X TKJ 1</option>
                                <option value="X TKJ 2" <?php if ($kelas == "X TKJ 2") echo "selected" ?>>X TKJ 2</option>
                                <option value="XI TKJ 1" <?php if ($kelas == "XI TKJ 1") echo "selected" ?>>XI TKJ 1</option>
                                <option value="XI TKJ 2" <?php if ($kelas == "XI TKJ 2") echo "selected" ?>>XI TKJ 2</option>
                                <option value="XII TKJ 1" <?php if ($kelas == "XII TKJ 1") echo "selected" ?>>XII TKJ 1</option>
                                <option value="XII TKJ 2" <?php if ($kelas == "XII TKJ 2") echo "selected" ?>>XII TKJ 2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-blue mt-3 bg-blue-500 hover:bg-white text-white font-bold py-1 px-4 left-5 rounded-full hover:text-blue-700 cursor-pointer hover:border-2 border-blue-500 border-2 hover:border-blue-600" />
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="my-auto pl-96 block bg-slate-50">
            <div class="card font-sans font-bold py-4">
                Data Siswa
            </div>
            <div class="card-body ">
                <table class="table-fixed">
                    <thead>
                        <tr >
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">NIS</th>
                            <th class=" py-2">Nama</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">Kelas</th>
                            <th class="px-7 py-2">Edit/Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "SELECT * from user order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $NIS        = $r2['NIS'];
                            $name       = $r2['name'];
                            $alamat     = $r2['alamat'];
                            $kelas   = $r2['kelas'];

                        ?>
                            <tr class="">
                                <th class="border px-9 py-2"><?php echo $urut++ ?></th>
                                <td class="border px-9 py-2"><?php echo $NIS ?></td>
                                <td class="border px-9 py-2"><?php echo $name ?></td>
                                <td class="border px-9 py-2"><?php echo $alamat ?></td>
                                <td class="border px-9 py-2"><?php echo $kelas ?></td>
                                <td class="border px-9 py-2">
                                    <a href="admin.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-blue bg-blue-500 hover:bg-blue-900 text-white font-bold py-1 px-4 rounded-full">Edit</button></a>
                                    <a href="admin.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-red ml-3  bg-red-600 focus:ring-2 hover:bg-red-900 text-white font-bold py-1 px-4 rounded-full">Hapus</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
     </div>
</body>

</html>