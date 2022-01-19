		<div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Hasil Pencarian</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th><center>No.</center></th>
                    <th><center>Group Name</center></th>
                    <th><center>Topics</center></th>
                    <th><center>Total Member</center></th>
                    <th><center>Action</center></th>                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    $find = $qother->find_group($_GET['group_code'], $_SESSION['user_id']);
                    foreach ($find as $row) {
                    	$gid = $row['group_id'];
                  ?>
                  <tr>
                    <td><center><?php echo $no++; ?></center></td>
                    <td><?php echo $row['group_name']; ?></td>
                    <td><?php echo $row['group_topic']; ?></td>
                    <td><center><?php echo $qother->count_group_user($row['group_id']) ?></center></td>
                    <td>
                      <center>
                        <a href="my_group.php?gid=<?php echo $gid ?>&action=add&ex=<?php echo session_id(); ?>" type="button" class="btn btn-success">
                        	<i class="fa fa-user-plus" aria-hidden="true" style="margin-left: 5px;margin-right: 5px;"></i>
							Bergabung
						</a>
                      </center>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>