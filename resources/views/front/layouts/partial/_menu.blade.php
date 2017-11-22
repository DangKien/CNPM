<div class="menu-header">
	<div class="container fix-nav">
		<div id="nav-menu-icon">
			<button class="button-icon-nav"><i class="fa fa-bars icon" aria-hidden="true"></i></button>
		</div>
		<nav class="nav-bar-ul navbar navbar-default bg-nav">
			<ul>
			  	<li class="{{ request()->is('/*') ? 'active-li' : ''}}  ">
			  		<a href="{{ route('home') }}">Trang chủ</a>
			  	</li>
			  	<li class="{{ request()->is('gioi-thieu') || request()->is('gioi-thieu/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('gioi-thieu/gioi-thieu-chung') }}">Giới thiệu</a>
			  	</li>
			  	<li class="{{ request()->is('chuong-trinh-hoc') || request()->is('chuong-trinh-hoc/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('chuong-trinh-hoc/chuong-trinh') }}">Chương trình học</a>
			  	</li>
			  	<li class="{{ request()->is('tin-tuc') || request()->is('tin-tuc/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('tin-tuc') }}">Tin tức</a>
			  	</li>
			  	<li class="{{ request()->is('thu-vien') || request()->is('thu-vien/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('thu-vien/thu-vien-anh') }}">Thư viện</a>
			  	</li>
			  	<li class="{{ request()->is('tuyen-sinh') || request()->is('tuyen-sinh/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('tuyen-sinh/thong-tin-tuyen-sinh') }}">Tuyển sinh</a>
			  	</li>
			  	<li class="{{ request()->is('thong-bao') || request()->is('thong-bao/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('thong-bao') }}">Thông báo</a>
			  	</li>
			  	<li class="{{ request()->is('lien-he') ||  request()->is('lien-he/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('lien-he') }}">Liên hệ</a>
			  	</li>
			</ul>
		</nav>
	</div>
</div>