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
               </tr>
            <?php
            }
            ?>
         </tbody>
         </table>
      </div>
      <div><center><img class="masthead-avatar mb-5" src="img/wirus.png" alt="" height="250" width="500">
          </center></div>
   </body>
</html>