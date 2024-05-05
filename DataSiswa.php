<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa SMK WIKRAMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form container mt- 3 d-flex justify-content-center align-items-center flex-column">
        <h1 align="center">DATA SISWA SMK WIKRAMA</h1>
    <p align="center">Masukkan Data Siswa</p>
    <div class="form-container"></div>
    <form  method="POST" action="">
        <table class="table-striped table-hover table-responsive text-center">
        <tr>
       <td><label for ="name">Nama:</label><br>
        <td><input type="text" name="name" placeholder="Nama"><br>
    </tr>

        <tr>
        <td><label for ="nis">NIS:</label><br>
        <td><input type="number" name="nis" placeholder="NIS"><br>
    </tr>

        <tr>
        <td><label for ="rayon">Rayon:</label><br>
        <td><input type="text" name="rayon" placeholder="Rayon"><br>
</tr>
<td><input class="btn btn-primary mt-3" type="submit" name="kirim" value="Tambah">

<td><input class="btn btn-danger mt-3" type="submit" name="reset" value="Reset">
</table>
    </form>
</div>

    <?php
    session_start();

    
    if(!isset($_SESSION['datasiswa'])){
        $_SESSION['datasiswa'] = array();
    }
    
    //untuk tombol reset
    if(isset($_POST['reset'])){
        session_unset();
    }

    if(isset($_GET['hapus'])){ 
        $index = $_GET['hapus'];
        unset($_SESSION['datasiswa'][$index]);
    }

    if(isset($_POST['kirim'])){
    if(@$_POST['name'] && @$_POST['nis'] && @$_POST['rayon']){
    if(isset($_SESSION['datasiswa'])){
        $data = [
            'name' => $_POST['name'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon'],
        ];
        array_push($_SESSION['datasiswa'], $data);
        header('Location: sesi5.php');

    }else {
        echo "<p>lengkapi data</p>";
    }
}
}

    // var_dump($_SESSION);
    if(!empty($_SESSION['datasiswa'])){
        echo "<table border align=center>";
        echo  "<tr>";
        echo "<td>NAMA</td>";
        echo "<td>NIS</td>";
        echo "<td>RAYON</td>";
        echo "</tr>";
    
    foreach($_SESSION['datasiswa'] as $index => $value){
        echo "<tr>";
        echo "<td>".$value['name']."</td>";
        echo "<td>".$value['nis']."</td>";
        echo "<td>".$value['rayon']."</td>";
        echo '<td> <a class = "btn btn-danger" href="?hapus=' . $index .' ">Hapus</a></td>';
        echo "</tr>";
    }
    echo "</table>";
}else {
    echo "<p class= text-center mt- 3>Tidak ada data</p>";
}
    ?>
</body>
</html>