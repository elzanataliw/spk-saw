<?php
require 'connect.php';
require 'class/saw.php';
$cookiePilih=@$_COOKIE['pilih'];
if (isset($cookiePilih) and !empty($cookiePilih)) {
$saw=new saw();
$saw->setconfig($konek,$cookiePilih);
?>
<div id="Matriks Keputusan">
    <h3>Decision Matrix Table</h3>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Alternative</th>
                <th colspan="<?php echo count($saw->getKriteria()) ?>">Criteria</th>
            </tr>
            <tr>
                <?php
                foreach ($saw->getKriteria() as $key) {
                    echo "<th>$key</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($saw->getAlternative() as $key) {
             echo "<tr id='data'>";
                echo "<td>".$key['namaSupplier']."</td>";
                $no=0;
                foreach ($saw->getNilaiMatriks($key['id_supplier']) as $data) {
                    echo "<td>$data[nilai]</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<div id="Normalisasi Matriks Keputusan">
    <h3>Decision Matrix Normalization Table</h3>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Alternative</th>
                <th colspan="<?php echo count($saw->getKriteria()) ?>">Criteria</th>
            </tr>
            <tr>
                <?php
                foreach ($saw->getKriteria() as $key) {
                    echo "<th>$key</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            //foreach data supplier
            foreach ($saw->getAlternative() as $key) {
             echo "<tr id='data'>";
                echo "<td>".$key['namaSupplier']."</td>";
                $no=0;
                //foreach nilai supplier
                foreach ($saw->getNilaiMatriks($key['id_supplier']) as $data) {
                    //menghitung normalisasi
                    $hasil=$saw->Normalisasi($saw->getArrayNilai($data['id_kriteria']),$data['sifat'],$data['nilai']);
                    echo "<td>$hasil</td>";
                    $hitungbobot[$key['id_supplier']][$no]=$hasil*$saw->getBobot($data['id_kriteria']);
                    $no++;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<div id="Perangkingan">
    <h3>Ranking Table</h3>
    <table>
        <thead>
            <tr>
                <th rowspan="2">Alternative</th>
                <th colspan="<?php echo count($saw->getKriteria()) ?>">Criteria</th>
                <th rowspan="2">Result</th>
            </tr>
            <tr>
                <?php
                foreach ($saw->getKriteria() as $key) {
                    echo "<th>$key</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($saw->getAlternative() as $key) {
             echo "<tr id='data'>";
                echo "<td>".$key['namaSupplier']."</td>";
                $no=0;$hasil=0;
                foreach ($hitungbobot[$key['id_supplier']] as $data) {
                    echo "<td>$data</td>";
                    //menjumlahkan
                    $hasil+=$data;
                }
                $saw->simpanHasil($key['id_supplier'],$hasil);
                echo "<td>".$hasil."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php
//cetak hasil
$saw->getHasil();
}