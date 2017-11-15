<footer>
	<div id="footer" class="col-md-12 image-footer" ng-controller="mainMenuCtrl">
		<div class="container">
			<div class="department col-md-4 col-sm-4 text-left">
				<h3>Trường mần non acb Kid</h3>
				<p><span>Địa chỉ:
				 </span> Số 20 - Khu đô thị Long Biên - Phường Việt Hưng - Quận Long Biên - TP. Hà Nội</p>
			</div>
			<div class="menu-footer col-md-4 col-sm-4 col-xs-6 text-left">
				<h3>Danh mục</h3>
				<ul>
				    <li><a href="">Trang chủ</a></li>
				    <li ng-repeat="(key, menu) in data.listMainMenu"><a href="">@{{ menu.name }}</a></li>
				</ul>
			</div>
			<div class="hotline col-md-4 col-sm-4 col-xs-6 text-left">
				<h3>Kênh hỗ trợ</h3>
				<p><span>Hotline:</span> 01659901941</p>
				<p><span>Email: </span>  dangtrungkien96@gmail.com</p>
				<p><span>FanPgae:</span> fb.com/kiendang</p>
			</div>
		</div>
	</div>
</footer>

<div class="go-up" style="display: block;">
		<a href="#"><i class="fa fa-chevron-up"></i></a>    
</div>