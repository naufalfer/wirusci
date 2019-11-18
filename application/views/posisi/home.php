<!-- HTML CSS JSResult -->
<div class="container">
    <form class="well form-horizontal" action="<?php echo base_url().'Upload/upload_malasngoding'; ?>" method="post"  id="contact_form" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<!-- <legend>Contact Us Today!</legend> -->

<!-- Text input-->

<div class="form-group">
  <label class="col-md-2 control-label">Isi NIM Anda:</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <input type="text" class="form-control" name="nim" placeholder="Jawaban Anda" maxlength="255" rows="4" cols="80"></input>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">File Proposal:</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <input type="file" class="form-control" name="proposal" placeholder="Jawaban Anda" maxlength="255" rows="4" cols="80"></input>
    </div>
  </div>
</div>

<!-- <div class="form-group">
  <label class="col-md-2 control-label">File Powerpoint:</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <input type="file" class="form-control" name="ppt" placeholder="Jawaban Anda" maxlength="255" rows="4" cols="80"></input>
    </div>
  </div>
</div> -->

<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->

<!-- Resources1×0.5×0.25×Rerun -->