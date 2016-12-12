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
      <h2>Free style</h2>
      <ul class="fa-ul">
          <li><i class="fa-li fa fa-building-o"></i>60 Ung Văn Khiêm, phường 25, quận Bình Thạnh, TPHCM (<a href="#" data-toggle="modal" data-target="#mapModal">Xem bản đồ</a>)</li>
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
              <button type="submit" class="btn btn-default btn-block">Gửi</button>
            </div>
        </div>
        
      </form>
    </div>
  </div>

  <div id="mapModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Bản Đồ</h4>
      </div>
      <div class="modal-body">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31334.70573244468!2d106.86166148738599!3d10.975581380771981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174ddb876e4eac7%3A0xd3d5849e9c65a9da!2zSOG7kSBOYWksIHRwLiBCacOqbiBIw7JhLCDEkOG7k25nIE5haSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1449836956796"></iframe>                    
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<?php
  include 'template/footer.php';
?>
<script language="javascript" type="text/javascript">
  $(document).ready(function(e) {
    setActive(3);
  });
  
</script>
