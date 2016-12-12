<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
				<li>
					<div class="banner-1"></div>
				</li>
				<li>
					<div class="banner-2"></div>
				</li>
				<li>
					<div class="banner-3"></div>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	<!--lider-Starts-Here-->
				<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
	<!--End-slider-script-->
	<!--start-banner-bottom--> 
	<div class="banner-bottom">
		<div class="container">
			<div class="col-md-3">
	            <p><span class="glyphicon glyphicon-bed"></span>	Giao hàng toàn quốc</p>
	        </div>
			<div class="col-md-3">
	            <p><span class="glyphicon glyphicon-home"></span>	Mở cửa 09:00 AM - 09:00 PM</p>
	        </div>
			<div class="col-md-3">
	            <p><span class="glyphicon glyphicon-usd"></span>	Thanh toán khi nhận hàng</p>
	        </div>
	        <div class="col-md-3">
	            <p><span class="glyphicon glyphicon-phone-alt"></span>	HOT LINE: 0987 654 321</p>
	        </div> <br>
		</div>
	</div>
	<!--end-banner-bottom--> 