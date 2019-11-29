<html>
   <head>

   </head>
   <body>
   <div class="msg" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
   </div>
      <div>
         <table id="table_proposal" class="table table-striped table-bordered">
            <thead>
               <tr>
               <th width="10px">No</th>
               <th>NIM</th>
               <th>Judul Proposal</th>
               <th width="10px">Aksi</th>
               </tr>
            </thead>
         <tbody>
            <?php
               $i=0;
               foreach ($proposal as $row) {
                  $i++;
            ?>
               <tr>
                  <td><?php echo $i?></td>
                  <td><?php echo $row->nim?></td>
                  <td><?php echo basename($row->proposal)?></td>
                  <td><a class="btn btn-success" href="<?php echo base_url('Pertanyaan/download_proposal_tahap3/'.$row->id); ?>" role="button">Download Proposal</a></td>
               </tr>
            <?php
            }
            ?>
         </tbody>
         </table>
      </div>
   </body>
</html>