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
			  		<ul class="menu-c2">
			  		    <li><a href="{{ url('gioi-thieu/co-so-vat-chat') }}">Cơ sở vật chất</a></li>
			  		    <li><a href="{{ url('gioi-thieu/doi-ngu-giao-vien') }}">Đôi ngũ giáo viên</a></li>
			  		    <li><a href="{{ url('gioi-thieu/phuong-phap-day-hoc') }}">Phương pháp dạy học</a></li>
			  		</ul>
			  	</li>
			  	<li class="{{ request()->is('chuong-trinh-hoc') || request()->is('chuong-trinh-hoc/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('chuong-trinh-hoc/chuong-trinh') }}">Chương trình học</a>
			  		<ul class="menu-c2">
			  		    <li><a href="{{ url('chuong-trinh-hoc/chuong-trinh') }}">Chương trình học</a></li>
			  		    <li><a href="{{ url('chuong-trinh-hoc/thuc-don') }}">Thực đơn</a></li>
			  		    <li><a href="{{ url('chuong-trinh-hoc/ngay-cua-be') }}">Ngày học của bé</a></li>
			  		    <li><a href="{{ url('chuong-trinh-hoc/su-kien') }}">Sự kiện</a></li>
			  		    <li><a href="{{ url('chuong-trinh-hoc/hoat-dong-ngoai-khoa') }}">Ngoại khóa</a></li>
			  		</ul>
			  	</li>
			  	<li class="{{ request()->is('tin-tuc') || request()->is('tin-tuc/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('tin-tuc') }}">Tin tức</a>
			  	</li>
			  	<li class="{{ request()->is('thu-vien') || request()->is('thu-vien/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('thu-vien/thu-vien-anh') }}">Thư viện</a>
			  		<ul class="menu-c2">
			  		    <li><a href="{{ url('thu-vien/thu-vien-anh') }}">Thư viện ảnh</a></li>
			  		    <li><a href="{{ url('thu-vien/thu-vien-video') }}">Thư viện video</a></li>
			  		    <li><a href="{{ url('thu-vien/thu-vien-tai-lieu') }}">Thư viện tài liệu</a></li>
			  		</ul>
			  	</li>
			  	<li class="{{ request()->is('tuyen-sinh') || request()->is('tuyen-sinh/*') ? 'active-li' : ''}}">
			  		<a href="{{ url('tuyen-sinh/thong-tin-tuyen-sinh') }}">Tuyển sinh</a>
			  		<ul class="menu-c2">
			  		    <li><a href="{{ url('tuyen-sinh/thong-tin-tuyen-sinh') }}">Tuyển sinh</a></li>
			  		    <li><a href="{{ url('tuyen-sinh/huong-dan') }}">Hướng dẫn</a></li>
			  		    <li><a href="{{ url('tuyen-sinh/dang-ki-online') }}">Đăng kí Online</a></li>
			  		</ul>
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