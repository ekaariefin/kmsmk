        <!-- Bidang Tacit -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tacit Knowledge</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><center>No.</center></th>
                    <th><center>Penulis</center></th>
                    <th><center>Judul</center></th>
                    <th><center>Mata Pelajaran</center></th>
                    <th><center>Action</center></th>                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($findtacit as $tacit) {
                  ?>
                  <tr>
                    <td><center>1</center></td>
                    <td><center><?php echo $tacit['user_name']; ?></center></td>
                    <td><?php echo $tacit['tacit_name']; ?></td>
                    <td><?php echo $tacit['mapel_name']; ?></td>
                    
                    <td>
                      <center>
                        <a href="show_tacit.php?id=<?php echo $tacit['tacit_id']; ?>&ex=<?php echo session_id()?>" type="button" class="btn btn-info btn-sm" style="margin-right: 5px;"><i class="fas fa-external-link-alt"></i></a>
                      </center>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th><center>No.</center></th>
                    <th><center>Penulis</center></th>
                    <th><center>Judul</center></th>
                    <th><center>Mata Pelajaran</center></th>
                    <th><center>Action</center></th>    
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>