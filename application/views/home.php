<html>
   <head>

   </head>
   <body>
   <div class="msg" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
   </div>
      <!-- <div><img src="" alt="Smiley face" height="42" width="42"> -->
      <!-- <div><center><img class="masthead-avatar mb-5" src="img/wirus.png" alt="" height="250" width="500">
          </center></div> -->
          <div><table width="100%" id="table_proposal" class="table table-striped table-bordered">
            <thead>
               <tr>
               <th width="10px">No</th>
               <!-- <th width="10px">No</th> -->
               <th width="320px"><center>Tanggal Kegiatan</center></th>
               <!-- <th>Jawaban Pertanyaan</th> -->
               <th width="320px"><center>Nama Kegiatan</center></th>
               <?php  $user = $this->session->userdata();
               if ($userdata->roleid == '4'){ ?>
               <th width="10px"><center>Aksi</center></th>
               <?php } ?>
               </tr>
            </thead>
            <tbody>
            <?php
               $i=0;
               foreach ($timelinekegiatan as $row) {
                  $i++;
            ?>
               <tr>
                  <td><center><?php echo $i?></center></td>
                  <td><center><?php echo $row->tanggalkegiatan?></center></td>
                  <td><center><?php echo $row->namakegiatan?></center></td>
                  <?php  $user = $this->session->userdata();
               if ($userdata->roleid == '4'){ ?>
                  <td class="text-center" style="min-width:10px;">
               <h5><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete" data-idkegiatan="<?php echo $row->id; ?>">
                     Delete
                  </button></h5>
               </td>
               <?php } ?>
               </tr>
            <?php
            }
            ?>
         </tbody>
         </table>
      </div>
      <!-- Modal -->
   <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h2 class="modal-title" id="exampleModalCenterTitle">Delete Timeline Kegiatan</h2>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button> -->
         </div>
         <div class="modal-body">
         <form action="<?php echo base_url('Timeline/set_status'); ?>" method="post">
               <input type="hidden" id="idkegiatan" name="idkegiatan">
            <p>
               Delete timeline kegiatan ini?
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
   <div><center><img class="masthead-avatar mb-5" src="img/wirus.png" alt="" height="250" width="500">
          </center></div>
</div>
          <script>
   $('#delete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('idkegiatan') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-body input').val(recipient)
   })
</script>
   </body>
</html>