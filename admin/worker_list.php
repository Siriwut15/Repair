<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <?php 
  include("condb.php"); // เชื่อมต่อฐานข้อมูล
     $query_worker = "SELECT * FROM tbl_login WHERE user_level = 'worker'
        order by user_id " or die ("Error:" . mysqli_error());
       $result = mysqli_query($con, $query_worker);
  include("crop.php");
  ?>
  <table id="example1" class="table table-bordered table-striped dataTable">
    <thead>
      <tr role="row" class="info">
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลำดับ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">รูป</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">username</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 20%;">ชื่อ-สกุล</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 25%;">อีเมล์-เบอร์โทร</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">สถานะ</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">--</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">แก้ไข</th>
        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">ลบ</th> 
      </tr>
    </thead>
    <tbody>
       <?php foreach ($result as $row) {  ?> 

      <tr>
        <td>
         <?php echo $row['user_id'];; ?>
        </td>
        <td>
        <label>
        <img src="upload/<?php echo $row['u_img']; ?>" id="uploaded_image" class="img-responsive img-circle " />
        <input type="file"  name="image" data-id="<?php echo $row['user_id']; ?>" class="image upload_image" id="upload_image" style="display:none">      
        </label>
        </td>
         <td>
         <?php echo $row['username']; ?>
        </td>
         <td>
         <?php echo $row['u_name'].' '.$row['u_lastname'] ?>
        </td>
         <td>
         <?php echo $row['u_email'].' |เบอร์.'.$row['u_tel'] ?>
        </td>
          <td>
         <?php echo $row['user_level']; ?>
        </td>
        <td>
         <input type="checkbox" id="toggle" onchange="toggle_check(<?= $row['user_id']?>)" <?php echo($row['user_status'] == 1)?'
         checked':''; ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-size="mini">
        </td>
        <td align="center">         
          <a class="btn btn-warning btn-sm" onclick="open_modal('<?php echo $row['user_id'];?>','<?php echo $row['username'];?>','
          <?php echo $row['password'];?>','<?php echo $row['u_name'];?>','<?php echo $row['u_lastname'];?>','<?php echo $row['u_tel'];?>','
          <?php echo $row['u_email'];?>','<?php echo $row['user_level'];?>')">
           แก้ไข
          </a>
        </td>    
        <td align="center">   
          <a class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['user_id'];?>)">
           ลบ
          </a>
        </td>  
         <?php   } ?>  
      </tr>
    </tbody>
  </table>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
                 <input type="hidden" name="user_id" id="user_id"> 
			        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			        		<button type="button" class="btn btn-primary" id="crop">Crop</button>
			      		</div>
			    	</div>
			  	</div>
			</div>			

  <?php include("worker_edit.php"); ?> 
   <script type="text/javascript">
    $(window).load(function() { });
    </script>
      <script>
        function open_modal(user_id,username,password,u_name,u_lastname,u_tel,u_email){
          // alert (u_name);
           document.getElementById("user_id").value = user_id;
           document.getElementById("username").value = username;
           document.getElementById("password").value = password;
           document.getElementById("u_name").value = u_name;
           document.getElementById("u_lastname").value = u_lastname;
           document.getElementById("u_tel").value = u_tel;
           document.getElementById("u_email").value = u_email;
             $("#modal_edit").modal('show');
        }
            function confirmDelete(user_id) {
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
          window.location='worker_delete.php?user_id='+user_id
        }
    });
    }
    </script>

    <script>
    function toggle_check(user_id) {
    // alert(user_id) เช็คค่า user_id
    $.ajax({
    method: 'POST',
    url: 'worker_update_status.php',
    data: {
    user_id: user_id
    },
    });
    }
    $(document).ready(function(){

var $modal = $('#modal');
var image = document.getElementById('sample_image');
var cropper;

$('.upload_image').change(function(event){
// console.log()
$(".modal-footer #user_id").val($(this).data('id'));

var files = event.target.files;
var done = function (url) {
  image.src = url;
  $modal.modal('show');


};

  if (files && files.length > 0)
  {
        reader = new FileReader();
        reader.onload = function (event) {
            done(reader.result);
        };
        reader.readAsDataURL(files[0]);
  }
});

$modal.on('shown.bs.modal', function() {
  cropper = new Cropper(image, {
    aspectRatio: 1,
    viewMode: 3,
    preview: '.preview'
  });
}).on('hidden.bs.modal', function() {
  cropper.destroy();
  cropper = null;
});
$("#crop").click(function(){
canvas = cropper.getCroppedCanvas({
    width: 400,
    height: 400,
});
canvas.toBlob(function(blob) {
var reader = new FileReader();
reader.readAsDataURL(blob); 
reader.onloadend = function() {
    var base64data = reader.result;  
    let user_id = $(".modal-footer #user_id").val();
    $.ajax({
      url: "upload_img.php",
      method: "POST",                 
      data: {image: base64data,user_id: user_id}, 
      success: function(data){
        console.log(data);
          window.location='worker.php?do=success'
      }
    });
}
});
});
});



</script>
          



 