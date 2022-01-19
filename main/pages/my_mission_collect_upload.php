			<form action="" method="POST" enctype="multipart/form-data">
			<tr>
                <td rowspan="2">Upload (pdf/xls/docx)<br/><small><p style="color:red">ukuran maksimal yang diizinkan adalah 2MB</p></small></td>
                <td>
                  <input type="file" name="user_file" class="form-control" accept="application/pdf,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                  <input type="hidden" name="mission_id" value="<?php echo $mission_show['mission_id']; ?>">
                </td>
              </tr>
              <tr>
                <td><button type="submit" name="collect" class="btn btn-primary"><i class="fas fa-upload" style="margin-right: 5px;"></i>Upload Assignment</button></td>
              </tr>
              </form>