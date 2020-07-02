<!-- HTML CSS JSResult -->
<div class="msg" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
   </div>
   
<div class="container">
    <form class="well form-horizontal" action="<?php echo base_url().'Timeline/inputData_action'; ?>" method="post"  id="contact_form">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label">1. Tanggal Kegiatan:</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <input class="form-control" type="date" name="tanggalkegiatan"></input>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">2. Nama Kegiatan:</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <textarea class="form-control" name="namakegiatan" placeholder="Jawaban Anda" maxlength="255" rows="4" cols="80"></textarea>
    </div>
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Kirim <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->

<!-- Resources1×0.5×0.25×Rerun -->