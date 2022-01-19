		<div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Hasil Pencarian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10"><center>No.</center></th>
                    <th width="20"></th>
                    <th><center>Name</center></th>
                    <th><center>Kelas</center></th>    
                    <th width="150"><center>Aksi</center></th>        
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    $find = $quser->find_user($_GET['findUser']);
                    foreach ($find as $row) {
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                      <center>
                        <img src="files/user_photo/<?php echo $row['user_photo']; ?>" width="50" height="50" class="img-circle">
                      </center>
                    </td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                    <td>
                    	<a href="my_friends.php?&ex=<?php echo session_id() ?>&addFriend=<?php echo $row['user_id']; ?>&findUser=<?php echo $row['user_id']; ?>&submitCariTeman=&prosesAdd=" type="button" class="btn btn-block btn-primary"><i class="fas fa-user-plus" style="margin-right:5px"></i>Add</a>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th><center>No.</center></th>
                    <th></th>
                    <th><center>Name</center></th>
                    <th><center>Kelas</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->