<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-body">
    <table id="table_peserta" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width:10px">No</th>
          <th>NIM</th>
          <th style="text-align: center; width:10px">Status</th>
          <th style="text-align: center; width:10px">Set status</th>
        </tr>
      </thead>
      <tbody>
      <?php
         $no = 1;
         foreach ($peserta as $row) {
            ?>
            <tr>
               <td><?php echo $no; ?></td>
               <td><?php echo $row->username; ?></td>
               <td class="text-center" style="min-width:230px;"><?php if($row->statusid == 0){ ?>
						<h5><button type="button" class="btn btn-warning">Belum Lolos</button></h5>
					<?php }elseif($row->statusid == 1){ ?>
						<h5><button type="button" class="btn btn-success">Lolos tahap 1</button></h5>
					<?php } elseif ($row->statusid == 2){ ?>
						<h5><button type="button" class="btn btn-success">Lolos tahap 2</button></h5>
               <?php }else{?>
                  <h5><button type="button" class="btn btn-success">Lolos tahap 3</button></h5>
               <?php  } ?>
            </td>
               <td class="text-center" style="min-width:230px;">
               <h5><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update" data-idpeserta="<?php echo $row->id; ?>">
                     Update
                  </button></h5>
               </td>
            </tr>
            <?php
            $no++;
         }
         ?>
      </tbody>
    </table>
  </div>
   
   <!-- Modal -->
   <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h2 class="modal-title" id="exampleModalCenterTitle">Update status</h2>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button> -->
         </div>
         <div class="modal-body">
         <form action="<?php echo base_url('Kota/set_status'); ?>" method="post">
               <input type="hidden" id="idpeserta" name="idpeserta">
            <p>
               Anda yakin akan meloloskan peserta ini ke tahap selanjutnya
            </p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-primary">Ya</button>
         </div>
      </form>
      </div>
   </div>
   </div>
</div>

<script>
   $('#update').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('idpeserta') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-body input').val(recipient)
   })
</script>
