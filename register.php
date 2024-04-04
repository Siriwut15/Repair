<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register KPI</title> 
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="container">
  <div class="register-wrapper">
    <form class="register-form" action="submit_registration.php" method="POST">
          <h2>Register HelpDesk KPI</h2>  
          <input type="text" name="username" placeholder="ชื่อผู้ใช้" required>
          <input type="text" name="uname" placeholder="ชื่อ" required>
          <input type="text" name="lname" placeholder="นามสกุล" required>
          <input type="email" name="email" placeholder="อีเมล" required>
          <input type="password" name="password" placeholder="รหัสผ่าน" required>
          <input type="tel" name="tel" placeholder="เบอร์โทร" required>
          <input type="text" name="uque" placeholder="คำถามกู้คืนรหัสผ่าน" required>
          <input type="text" name="uans" placeholder="คำตอบกู้คืนรหัสผ่าน" required>
          <select name="user_level" required>
            <option value="" disabled selected hidden>เลือกสถานะ</option>
            <option value="employee">พนักงาน</option>
            <option value="worker">ช่าง</option>
          </select>
          <br>
          <button type="submit">สมัครสมาชิก</button>
      </form>
  </div>
</div>
