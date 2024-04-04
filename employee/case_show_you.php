<div class="row">
    <div class="col-12">
        <?php
        // Assuming you have a session variable storing the user ID
        session_start();
        $user_id = $_SESSION['user_id'];

        include("condb.php"); // Connect to the database

        // Prepare and execute the SQL query
        $query_case = "SELECT c.*, u.u_name, u.u_lastname, s.status_name, u.u_tel, u.u_email
                        FROM tbl_case AS c
                        INNER JOIN tbl_login AS u ON c.user_id = u.user_id
                        INNER JOIN tbl_status AS s ON c.status_id = s.status_id
                        WHERE c.user_id = $user_id
                        ORDER BY c.case_id";
        $result = mysqli_query($con, $query_case) or die ("Error:" . mysqli_error($con));

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table id="example1" class="table table-hover text-nowrap">
                <thead>
                    <tr role="row" class="info">
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ID</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">ชื่องาน</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;">รายละเอียดผู้แจ้ง</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;">รายละเอียดงาน</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานที่</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
                        <th tabindex="0" rowspan="1" colspan="1" style="width: 8%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Fetch and display data
                    while ($row = mysqli_fetch_assoc($result)) { 
                    ?>
                    <tr>
                        <td><?php echo $row['case_id']; ?></td>
                        <td><?php echo $row['name_case']; ?></td>
                        <td><?php echo $row['u_name'].' '.$row['u_lastname']; ?></td>
                        <td><?php echo $row['detail_case']; ?></td>
                        <td><?php echo $row['place_case']; ?></td>
                        <td><?php echo $row['status_name']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning edit-btn" data-toggle="modal" data-target="#editModal<?php echo $row['case_id']; ?>">
                                แก้ไข
                            </button>
                            <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#deleteModal
                            <?php echo $row['case_id'];['name_case'];['u_name'].' '.$row['u_lastname'];['detail_case'];['place_case'];['status_name']; ?>">
                              ลบ
                             </button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="editModal<?php echo $row['case_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">แก้ไขข้อมูล</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- ฟอร์มแก้ไขข้อมูล -->
                                    <form action="update_case.php" method="post">
                                        <input type="hidden" name="case_id" value="<?php echo $row['case_id']; ?>">
                                        <!-- ส่วนอื่นๆของฟอร์ม เช่น input fields สำหรับแก้ไขข้อมูล -->
                                        <!-- ตัวอย่างเช่น -->
                                        <div class="form-group">
                                            <label for="name_case">ชื่องาน:</label>
                                            <input type="text" class="form-control" id="name_case" name="name_case" value="<?php echo $row['name_case']; ?>">
                                        </div>
                                        <!-- ส่วนอื่นๆของฟอร์ม -->
                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>  
                </tbody>
            </table>
        <?php
        } else {
            echo "No results found for the specified user.";
        }
        ?>
    </div>
    <!-- Modal for delete confirmation -->
<div class="modal fade" id="deleteModal<?php echo $row['case_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">ยืนยันการลบข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                คุณแน่ใจหรือไม่ว่าต้องการลบเคสนี้?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-danger" onclick="deleteCase(<?php echo $row['case_id']; ?>)">ลบ</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Function to delete the case
    function deleteCase(case_id) {
        // AJAX request to delete_case.php with the case_id as parameter
        $.ajax({
            url: 'show.php',
            type: 'POST',
            data: { case_id: case_id },
            success: function(response) {
                // Reload the page after successful deletion
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>

</div>
