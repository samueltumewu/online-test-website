<?php
    $q = $_REQUEST["q"];

    require 'pdo.php';
    $sql = "select * from client join detail_soal on client.id_client=detail_soal.id_client join soal on soal.id_soal=detail_soal.id_soal where client.type = 's' and soal.judul = '$q'";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
    $counter = 0;
    foreach ( $rows as $row ) {
        $nama[] =$row['name'];
        $namaBelakang[] = $row['last_name'];
        $nilai[] = $row['score'];
        $counter++;
    }

    if ($counter>0) {
        ?>
        <table class="table table-hover table-bordered" style="margin-top: 50px;">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Nama Murid</th>
                    <th>Nilai</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i=0; $i < sizeof($nama); $i++) { 
                    $j = $i+1;
                    if ($nilai[$i] == -1) {
                        echo "<tr class='table-danger'>";
                    } else {
                        echo "<tr class='table-success'>";
                    }
                    echo "<td>$j</td>";
                    echo "<td>$nama[$i] $namaBelakang[$i]</td>";
                    if ($nilai[$i] == -1) {
                        echo "<td>-</td>";
                        echo "<td>Sedang Dikerjakan</td>";
                    } else {
                        echo "<td>$nilai[$i]</td>";
                        echo "<td>Selesai</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    else {
        echo "Belum ada siswa yang mengerjakan";
    }
?>