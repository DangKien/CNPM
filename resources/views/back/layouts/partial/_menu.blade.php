<nav id="mainnav-container">
	<div id="mainnav">
		<!--Shortcut buttons-->
		<!--================================-->
		<div id="mainnav-shortcut">
			
		</div>
		<!--================================-->
		<!--End shortcut buttons-->


		<!--Menu-->
		<!--================================-->
		<div id="mainnav-menu-wrap">
			<div class="nano">
				<div class="nano-content">
					<ul id="mainnav-menu" class="list-group">
						<!--Menu list item-->
						<li>
							<a>
								<span class="menu-title"></span>
							</a>
						</li>

						<li class="{{ request()->is('/backend/') || request()->is('backend/user') ? 'active active-link' : '' }}">
							<a href="{{ route('user') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title"> Nhân viên trường</span>
							</a>
						</li>

						<li class="{{ request()->is('backend/cate-new') || request()->is('backend/new') ? 'active active-sub' : '' }}">
							<a href="#">
								<i class="fa fa-newspaper-o"></i>
								<span class="menu-title"> Quản lí tin tức</span>
								<i class="arrow"></i>
							</a>
						
							<!--Submenu-->
							<ul class="collapse">
								<li class="{{ request()->is('backend/cate-new') ? 'active active-link' : '' }}">
								<a href="{{ route('cate-new') }}"><i class="fa fa-address-card-o"></i> Loại tin</a></li>

								<li class="{{ request()->is('backend/new') ? 'active active-link' : '' }}">
									<a href="{{ route('new') }}"><i class="fa fa-map-o"></i> Tin tức</a>
								</li>
							</ul>
						</li>

						<li class=" {{ request()->is('backend/file') || request()->is('backend/file-image') || request()->is('backend/file-music') || request()->is('backend/file-video') ? 'active active-sub' : '' }} ">
							<a href="#">
								<i class="fa fa-file"></i>
								<span class="menu-title"> Thư viện</span>
								<i class="arrow"></i>
							</a>
						
							<!--Submenu-->
							<ul class="collapse">
								<li class="{{ request()->is('backend/file-image') ? 'active active-link' : '' }}">
									<a href="{{ route('file-image') }}"><i class="fa fa-picture-o"></i> Thư viện ảnh</a>
								</li>
								<li class="{{ request()->is('backend/file-video') ? 'active active-link' : '' }}">
									<a href="{{ route('file-video') }}"><i class="fa fa-video-camera"></i> Thứ viện video</a>
								</li >
								<li class="{{ request()->is('backend/file-music') ? 'active active-link' : '' }}">
									<a href="{{ route('file-music') }}"><i class="fa fa-music"></i> Thư viện nhạc</a>
								</li>
								<li class="{{ request()->is('backend/file') ? 'active active-link' : '' }}">
									<a href="{{ route('file') }}"><i class="fa fa-file-text-o"></i> Thư viện tài liệu</a>
								</li>
							</ul>
						</li>

						<li class="{{ request()->is('backend/menu') ? 'active active-link' : '' }}">
							<a href="{{ route('menu') }}">
								<i class="fa fa-list-alt"></i>
								<span class="menu-title"> Thực đơn</span>
							</a>
						</li>

						<li class="{{ request()->is('backend/class') || request()->is('backend/addmission')? 'active active-link' : '' }}">
							<a href="#">
								<i class="fa fa-address-book-o"></i>
								<span class="menu-title"> Đăng kí học</span>
								<i class="arrow"></i>
							</a>
						
							<!--Submenu-->
							<ul class="collapse">
								<li class="{{ request()->is('backend/class') ? 'active active-link' : '' }}"
								><a href="{{ route('class') }}"><i class="fa fa-users"></i> Lớp học</a>
								</li>
								<li class="{{ request()->is('backend/addmission') ? 'active active-link' : '' }}">
								<a href="{{ route('addmission') }}"><i class="fa fa-suitcase"></i> Đăng kí học Online</a></li>
							</ul>
						</li>

						<li class="{{ request()->is('backend/slide') ? 'active active-link' : '' }}">
							<a href="{{ route('slide') }}">
								<i class="fa fa-sliders"></i>
								<span class="menu-title"> Slide Ảnh</span>
							</a>				
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--================================-->
		<!--End menu-->

	</div>
</nav>