<?php
include("../../connection.php");

$id = $_GET['id'];
$hapusData = mysqli_query($connect, "DELETE FROM paket WHERE id='$id'");
if ($hapusData) {
    ?>
    <script type="text/javascript">
        alert("Hapus data berhasil");
        window.location.href = "./paket.php";
    </script>
    <?php
}
?>