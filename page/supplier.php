<div class="panel">
    <div class="panel-middle" id="judul">
        <img src="asset/image/supplier.png" style="width:42px; height:42px">
        <div id="judul-text">
            <h2 class="text-pink">SUPPLIER</h2>
            Administrator Page Supplier
        </div>
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                include 'ubahsupplier.php';
            }else{
                include 'tambahsupplier.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
            <div class="panel-top">
                <b class="text-pink">List of Supplier</b>
            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Name</th><th>Action</th></tr></thead>
                        <tbody>
                        <?php
                        $query="SELECT * FROM supplier";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namaSupplier]</td>
                                    <td>
                                    <div class='norebuttom'>
                                    <a class=\"btn btn-light-pink\" href='./?page=supplier&aksi=ubah&id=".$data['id_supplier']."'><i class='fa fa-pencil-alt'></i></a>
                                    <a class=\"btn btn-yellow\" data-a=".$data['namaSupplier']." id='hapus' href='./proses/proseshapus.php/?op=supplier&id=".$data['id_supplier']."'><i class='fa fa-trash-alt'></i></a>
                                    </div></td>
                                </tr>";
                                $no++;
                            }
                        }else{
                            echo "<tr><td  class='text-center text-pink' colspan='3'>Empty</td></tr>";
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