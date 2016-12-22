<?php
if(!session_id())
  session_start();
  include 'template/header.php';
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="name-shop" style="color: #8c2830; text-align: center" > <h2>FREE STYLE</h2> </div>
      <ul class="fa-ul">
          <li><i class="fa-li fa fa-building-o"></i>60 Ung Văn Khiêm, phường 25, quận Bình Thạnh, TPHCM
          <li><i class="fa-li fa fa-phone"></i>0912 345 678</li>
          <li><i class="fa-li fa fa-envelope-o"></i><a href="mailto:qtdieu@gmail.com">qtdieu.com</a></li>
          <li><i class="fa-li fa fa-instagram"></i><a href="#">Instagram</a></li>
      </ul>
      
    </div>
    <div class="col-md-6">
      <form>
        <div class="form-group">
          <label for="txtHoTen">Họ Tên</label>
          <input type="text" class="form-control" id="txtHoTen">
        </div>
        <div class="form-group">
          <label for="txtEmail">Email</label>
          <input type="email" class="form-control" id="txtEmail">
        </div>
        <div class="form-group">
          <label for="txtNoiDung">Lời nhắn</label>
          <textarea class="form-control" id="txtNoiDung" rows="4"></textarea>
        </div>
        <div class="row">
            <div class="col-md-4">
              <button type="submit" class="btn btn-default btn-block" style="background-color: #8c2830;color: white">Gửi</button>
              <br>
            </div>
        </div>
        
      </form>
    </div>
  </div>

<?php
  include 'template/footer.php';
?>
<script language="javascript" type="text/javascript">
  $(document).ready(function(e) {
    setActive(3);
  });
  
</script>
