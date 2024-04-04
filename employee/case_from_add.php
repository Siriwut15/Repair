<?php
include('condb.php');
$sql = "SELECT * FROM tbl_login WHERE user_id =$user_id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
//echo $sql;
//exit();
?>



<script>
function countWords(text) {
    var words = text.split(/\b[\s,\.-:;]*/).filter(function(word) {
        return word.trim() !== '';
    });
    return words.length;
}

function limitTextarea() {
    var textarea = document.getElementById('myTextarea');
    var maxWords = 10;
    var currentWords = countWords(textarea.value);
    if (currentWords > maxWords) {
        alert('คำที่คุณพิมพ์เกิน 50 คำ');
        textarea.value = textarea.value.split(/\b[\s,\.-:;]*/).slice(0, maxWords).join(' ');
    }
}
</script>





<div class="container">
	<form action="case_from_add_db.php" method="post">
		<div class="card-body">
			<div class="form-group col-md-3">
				<label>ผู้แจ้งซ่อม</label>
				<input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
				<input type="text" class="form-control" value="คุณ <?php echo $row['u_name'] . ' ' . $row['u_lastname'] . '| เบอร์โทร ' . $row['u_tel']; ?>" disabled>
			</div>
			<div class="form-group col-md-6">
				<label>แจ้งปัญหางาน</label>
				<!--<input type="text" class="form-control" placeholder="แจ้งปัญหางาน" required name="name_case">-->   <!--คำสั่งไว้สำหรับจำกัดข้อความของข้างล่าง-->
				<input type="text" class="form-control" placeholder="แจ้งปัญหางาน" required name="name_case" id="myTextarea" rows="4" cols="50" oninput="limitTextarea(10)">
			</div>
			<div class="form-group col-md-6">
    <label>ชื่อเครื่อง</label>
    <select class="form-control" placeholder="ชื่อเครื่อง" required name="detail_case">
        <option value="">เลือกชื่อเครื่อง</option>
        <option value="เครื่อง Dell pc">Dell pc</option>
        <option value="เครื่อง Lenovo pc">Lenovo pc</option>
        <option value="จอ Dell">จอ Dell</option>
		<option value="จอ Lenovo">จอ Lenovo </option>
		<option value="Notebook Lenovo"> Notebook Lenovo </option>
		<option value="Notebook Dell">Notebook Dell </option>
		<option value="ปริ้นเตอร์ hp pro 400">ปริ้นเตอร์ hp pro 400</option>
		<option value="ปริ้นเตอร์ hp laser jet p1102w">ปริ้นเตอร์ hp laser jet p1102w </option>
		<option value="ปริ้นเตอร์ hp laser jet p1102">ปริ้นเตอร์ hp laser jet p1102 </option>
		<option value="ปริ้นเตอร์ Epson L3210">ปริ้นเตอร์ Epson L3210</option>
    </select>
</div>

			<div class="form-group col-md-6">
    <label>สถานที่แจ้ง</label>
	<select class="form-control" placeholder="สถานที่" required name="place_case">
        <option value="">เลือกสถานที่แจ้ง</option>
        <option value="Zone A">Zone A</option>
        <option value="Zone B">Zone B</option>
        <option value="Zone C">Zone C</option>
		<option value="Zone X">Zone X</option>
		<option value="คลังสินค้า">คลังสินค้า</option>
		<option value="King Back">King Back</option>
		<option value="ส่งออกในประเทศ">ส่งออกในประเทศ</option>
		<option value="ส่งออกนอกประเทศ">ส่งออกนอกประเทศ</option>
		<option value="จัดซื้อ">จัดซื้อ</option>
		<option value="ห้องประชุม">ห้องประชุม</option>
    </select>
</div>
<div class="form-group col-md-6">
                <label>อัพโหลดรูปภาพ</label>
                <input type="file" class="form-control-file" required name="img_case">
            </div>
		</div>
		<div>
    <form action="show.php" method="GET">
        <button type="submit" class="btn btn-success">บันทึกงานแจ้งซ่อม</button>
    </form>
</div>

	</form>
</div>