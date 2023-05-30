<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Add data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="kriteria">
    <div class="panel-middle">
        <div class="group-input">
            <label for="kriteria" >Criteria Name :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Criteria Name" id="kriteria" name="kriteria">
        </div>
        <div class="group-input">
            <label for="sifat" >Criteria Type :</label>
            <select class="form-custom" required id="sifat" name="sifat">
                <option selected disabled>-- Select Criteria Type --</option>
                <option value="Benefit">Benefit</option>
                <option value="Cost">Cost</option>
            </select>
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Save</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>