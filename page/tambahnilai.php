<!-- judul -->
<div class="panel-top">
    <b class="text-pink"><i class="fa fa-plus-circle text-pink"></i> Add data</b>
</div>
<form id="form" action="./proses/prosestambah.php" method="POST">
    <input type="hidden" value="nilai" name="op">
    <div class="panel-middle">
        <div class="group-input">
            <label for="supplier">Supplier Name</label>
            <select class="form-custom" required name="supplier" id="supplier">
                <option selected disabled>--Select Supplier--</option>
                <?php
                $query="SELECT id_supplier,namaSupplier FROM supplier";
                $execute=$konek->query($query);
                if ($execute->num_rows > 0){
                    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                        echo "<option value=\"$data[id_supplier]\">$data[namaSupplier]</option>";
                    }
                }else {
                    echo "<option disabled value=\"\">There is no supplier listed</option>";
                }
                ?>
            </select>
        </div>
        <div class="group-input">
            <label for="barang">Item Name</label>
            <select class="form-custom" required name="barang" id="barang">
                <option selected disabled>--Select Item--</option>
                <?php
                $query="SELECT * FROM jenis_barang";
                $execute=$konek->query($query);
                if ($execute->num_rows > 0){
                    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                        echo "<option value=\"$data[id_jenisbarang]\">$data[namaBarang]</option>";
                    }
                }else {
                    echo "<option disabled value=\"\">There is no item listed</option>";
                }
                ?>
            </select>
        </div>
        <?php
        $query="SELECT * FROM kriteria";
        $execute=$konek->query($query);
        if ($execute->num_rows > 0){
            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                echo "<div class=\"group-input\">";
                echo "<label for=\"nilai\">$data[namaKriteria]</label>";
                echo "<input type='hidden' value=$data[id_kriteria] name='kriteria[]'>";
                echo "<select class=\"form-custom\" required name=\"nilai[]\" id=\"nilai\">";
                echo "<option disabled selected>-- Select $data[namaKriteria] --</option>";
                $query2="SELECT id_nilaikriteria,keterangan FROM nilai_kriteria WHERE id_kriteria='$data[id_kriteria]'";
                $execute2=$konek->query($query2);
                    if ($execute2->num_rows > 0){
                        while ($data2=$execute2->fetch_array(MYSQLI_ASSOC)){
                            echo "<option value=\"$data2[id_nilaikriteria]\">$data2[keterangan]</option>";
                        }
                    }else{
                        echo "<option disabled value=\"\">There is no criteria</option>";
                    };
                echo "</select></div>";
            }
        }
        ?>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-pink"><i class="fa fa-save"></i> Save</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>