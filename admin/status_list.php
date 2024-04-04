  
  <?php 
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
     $query_status = "SELECT * FROM tbl_status
        order by status_id " or die ("Error:" . mysqli_error());
       $result2 = mysqli_query($con, $query_status);

  ?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 80%;">สถานะ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th> 
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result2 as $row) {   ?> 

      <tr>
        <td>
         <?php echo $row['status_id']; ?>
        </td>
         <td>
         <?php echo $row['status_name']; ?>
        </td>
          <td align="center">         
          <a class="btn btn-warning btn-sm" onclick="open_modal('<?php echo $row['status_id'];?>','<?php echo $row['status_name'];?>')">
           แก้ไข
          </a>
        </td>       
        <td align="center">   
          <a class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['status_id'];?>)">
           ลบ
          </a>
        </td>  
         <?php   } ?>  
      </tr>
    </tbody>
  </table>
<?php include("status_edit.php"); ?> 
   <script type="text/javascript">
    $(window).load(function() { });
    </script>
      <script>
        function open_modal(status_id,status_name){
          // alert (user_id);
           document.getElementById("status_id").value = status_id;
           document.getElementById("status_name").value = status_name;
             $("#modal_edit").modal('show');
        }
            function confirmDelete(status_id) {
        // alert(user_id)
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#E74C3C',
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: true
    }, function (isConfirm) {
        if (!isConfirm) {
          return;
        }else { 
          window.location='status_delete.php?status_id='+status_id
        }
    });
}
    </script>



          



 