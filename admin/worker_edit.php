
    <div class="modal fade" id="modal_edit">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="worker_edit_db.php" method="post" accept-charset="utf-8">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">แก้ไขข้อมูล|จัดการข้อมูลช่าง </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="container">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" required name="username" id='username'>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="text" class="form-control" required name="password" id='password' >
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">ชื่อ:</label>
                        <input type="text" class="form-control" required name="u_name" id='u_name'>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">นามสกุล:</label>
                        <input type="text" class="form-control" required name="u_lastname" id='u_lastname'>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">เบอร์โทร:</label>
                        <input type="text" class="form-control" required name="u_tel" id='u_tel'>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">อีเมล์:</label>
                        <input type="email" class="form-control" required name="u_email" id='u_email'>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">สถานะ:</label>
                        <select name="user_level" class="form-control" required disabled>
                          <option value="worker">-worker-</option>
                        </select>
                      </div>
                      
                    </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <input type="hidden" name="user_id" id='user_id'>
                    <input type="hidden" name="user_level" value="worker">
                    <button type="submit" class="btn btn-success">แก้ไข</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                  </div>
                </form>
              </div>
            </div>
          </div>