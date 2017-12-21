<footer>
	<div id="footer" class="col-md-12 image-footer" ng-controller="mainMenuCtrl">
		<div class="container">
			<div class="department col-md-4 col-sm-4 text-left">
				<h3>Trường mần non Color House</h3>
				<p><span>Địa chỉ:
				 </span> Số 20 - Khu đô thị Long Biên - Phường Việt Hưng - Quận Long Biên - TP. Hà Nội</p>
			</div>
			<div class="menu-footer col-md-4 col-sm-4 col-xs-6 text-left">
				<h3>Danh mục</h3>
				<ul>
				  	<li class="{{ request()->is('/*') ? 'active-li-footer' : ''}}  ">
				  		<a href="{{ route('home') }}">Trang chủ</a>
				  	</li>
				  	<li class="{{ request()->is('gioi-thieu') || request()->is('gioi-thieu/*') ? 'active-li-footer' : ''}}">
				  		<a href="{{ url('gioi-thieu/gioi-thieu-chung') }}">Giới thiệu</a>
				  	</li>
				  	<li class="{{ request()->is('chuong-trinh-hoc') || request()->is('chuong-trinh-hoc/*') ? 'active-li-footer' : ''}}">
				  		<a href="{{ url('chuong-trinh-hoc/chuong-trinh') }}">Chương trình học</a>
				  	</li>
				  	<li class="{{ request()->is('tin-tuc') || request()->is('tin-tuc/*') ? 'active-li-footer' : ''}}">
				  		<a href="{{ url('tin-tuc') }}">Tin tức</a>
				  	</li>
				  	<li class="{{ request()->is('thu-vien') || request()->is('thu-vien/*') ? 'active-li-footer' : ''}}">
				  		<a href="{{ url('thu-vien/thu-vien-anh') }}">Thư viện</a>
				  	</li>
				  	<li class="{{ request()->is('tuyen-sinh') || request()->is('tuyen-sinh/*') ? 'active-li-footer' : ''}}">
				  		<a href="{{ url('tuyen-sinh/thong-tin-tuyen-sinh') }}">Tuyển sinh</a>
				  	</li>
				  	<li class="{{ request()->is('thong-bao') || request()->is('thong-bao/*') ? 'active-li-footer' : ''}}">
				  		<a href="{{ url('thong-bao') }}">Thông báo</a>
				  	</li>
				  	<li class="{{ request()->is('lien-he') ||  request()->is('lien-he/*') ? 'active-li-footer' : ''}}">
				  		<a href="{{ url('lien-he') }}">Liên hệ</a>
				  	</li>
				</ul>
			</div>
			<div class="hotline col-md-4 col-sm-4 col-xs-6 text-left">
				<h3>Kênh hỗ trợ</h3>
				<p><span><i class="fa fa-phone" aria-hidden="true"></i> Hotline:</span> 01659901941</p>
				<p><span><i class="fa fa-envelope-o" aria-hidden="true"></i> Email: </span>  dangtrungkien96@gmail.com</p>
				<p><a style="color: #fff;" href="https://www.facebook.com/KienDang.2112"><span><i class="fa fa-facebook-square" aria-hidden="true"></i></span></a>
				&nbsp &nbsp
				<a style="color: #fff;" href="https://www.youtube.com/channel/UCKkT3-X31PfhdNq3YhVbi4g?view_as=subscriber"><span><i class="fa fa-youtube-play" aria-hidden="true"></i></span></a>
				</p>
				
			</div>
		</div>
	</div>
</footer>

<div class="go-up" style="display: block;">
		<a href="#"><i class="fa fa-chevron-up"></i></a>    
</div>