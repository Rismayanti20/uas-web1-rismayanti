<?php
include("../../connection.php");

$id = $_GET['id'];
$hapusData = mysqli_query($connect, "DELETE FROM users WHERE id='$id'");
if ($hapusData) {
    ?>
    <script type="text/javascript">
        alert("Hapus data berhasil");
        window.location.href = "./users.php";
    </script>
    <?php
}
?>