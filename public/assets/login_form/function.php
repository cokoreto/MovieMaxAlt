<?php 
    $conn= mysqli_connect('localhost','root','movie_max_id');
    
    if (!$conn) {
        die("koneksi gagal: ". mysqli_connect_error());
    } else {
        echo "<script>
                koneksi berhasil
            </script> ";
    }
?>