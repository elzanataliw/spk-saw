<!-- judul -->
<div class="panel">
    <div class="panel-middle" id="judul">
        <img src="asset/image/criteria.png" style="width:42px; height:42px">
        <div id="judul-text">
            <h2 class="text-pink">CRITERIA</h2>
            Administrator Page Criteria
        </div>
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                include 'ubahkriteria.php';
            }else{
                include 'tambahkriteria.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
            <div class="panel-top">
                <b class="text-pink">List of Criteria</b>
            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Name</th><th>Type</th><th>Action</th></tr></thead>
                        <tbody>
                        <?php
                        $query="SELECT * FROM kriteria";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namaKriteria]</td>
                                    <td>$data[sifat]</td>
                                    <td><div class='norebuttom'>
                                    <a class=\"btn btn-light-pink\" href='./?page=kriteria&aksi=ubah&id=".$data['id_kriteria']."'><i class='fa fa-pencil-alt'></i></a>
                                    <a class=\"btn btn-yellow\" data-a=".$data['namaKriteria']." id='hapus' href='./proses/proseshapus.php/?op=kriteria&id=".$data['id_kriteria']."'><i class='fa fa-trash-alt'></i></a></td>
                                </div></tr>";
                                $no++;
                            }
                        }else{
                            echo "<tr><td  class='text-center text-pink' colspan='4'><b>Empty</b></td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-bottom"></div>
        </div>
    </div>
</div>