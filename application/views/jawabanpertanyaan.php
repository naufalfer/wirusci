<html>
   <head>

   </head>
   <body>
   <div class="msg" style="display:none;">
      <?php echo @$this->session->flashdata('msg'); ?>
   </div>
      <div>
      <table><tr> <td><a class="btn btn-success" href="<?php echo base_url('Pertanyaan/export/'); ?>" role="button">Download Jawaban Pertanyaan Semua Pengusul</a></td></tr></table>
        </div>
        <div><table id="table_proposal" class="table table-striped table-bordered">
            <thead>
               <tr>
               <th width="10px">No</th>
               <th>NIM</th>
               <!-- <th>Jawaban Pertanyaan</th> -->
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
                  <td><?php echo $row->NIM?></td>
                  <!-- <td><?php echo basename($row->jawabanpertanyaan1)?></td> -->
                  <td><a class="btn btn-success" href="<?php echo base_url('Pertanyaan/exportid/'.$row->id); ?>" role="button">Download Jawaban Pertanyaan</a></td>
               </tr>
            <?php
            }
            ?>
         </tbody>
         </table>
      </div>
   </body>
</html>