<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Add data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="subkriteria">
    <div class="panel-middle">
        <div class="group-input">
            <label for="kriteria" >Criteria :</label>
            <select class="form-custom" required id="kriteria" name="kriteria">
                <option selected disabled>-- Select Criteria Attribute --</option>
                <?php
                $query="SELECT * FROM kriteria";
                $execute=$konek->query($query);
                if ($execute->num_rows > 0){
                    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                        echo "<option value=\"$data[id_kriteria]\">$data[namaKriteria]</option>";
                    }
                }else {
                    echo "<option value=\"\">Belum ada kriteria</option>";
                }
                ?>
            </select>
        </div>
        <div class="group-input">
            <label for="Nilai" >Score :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Score" id="Nilai" name="nilai">
        </div>
        <div class="group-input">
            <label for="keterangan" >Description :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Description" id="keterangan" name="keterangan">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Save</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>