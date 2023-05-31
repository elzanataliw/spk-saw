<div class="panel-top">
    <b class="text-pink"><i class="fa fa-plus-circle text-pink"></i> Add data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="supplier">
    <div class="panel-middle">
        <div class="group-input">
            <label for="supplier" >Supplier Name :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Supplier Name" id="supplier" name="supplier">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-pink"><i class="fa fa-save"></i> Save</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>