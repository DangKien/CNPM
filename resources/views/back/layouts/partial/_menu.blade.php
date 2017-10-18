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

						<li class="@if (isset($active) && $active == 'user') {{ 'active active-sub' }}  @endif">
							<a href="{{ route('user') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title"> Nhân viên trường</span>
							</a>
						</li>

						<li class="
								@if (isset($active) )
									@if ( $active == 'new' || $active == 'newCate') 
										{{ 'active active-sub' }} 
									@endif 
								@endif"
						>
							<a href="#">
								<i class="fa fa-newspaper-o"></i>
								<span class="menu-title"> Quản lí tin tức</span>
								<i class="arrow"></i>
							</a>
						
							<!--Submenu-->
							<ul class="collapse">
								<li class="
								@if (isset($active) && $active == 'newCate' ) 
									{{ 'active-link' }}  
								@endif" 
								>
								<a href="{{ route('cate-new') }}"><i class="fa fa-address-card-o"></i> Loại tin</a></li>

								<li class="
								@if (isset($active) && $active == 'new' ) 
									{{ 'active-link' }}  
								@endif"
								><a href="{{ route('new') }}"><i class="fa fa-map-o"></i> Tin tức</a></li>
							</ul>
						</li>

						<li class="
								@if (isset($active) )
									@if ( $active == 'file' || $active == 'file-image' ||$active == 'file-music' || $active == 'file-video') 
										{{ 'active active-sub' }} 
									@endif 
								@endif">
							<a href="#">
								<i class="fa fa-file"></i>
								<span class="menu-title"> Thư viện</span>
								<i class="arrow"></i>
							</a>
						
							<!--Submenu-->
							<ul class="collapse">
								<li class="
								@if (isset($active) && $active == 'file-image' ) 
									{{ 'active-link' }}  
								@endif">
									<a href="{{ route('file-image') }}"><i class="fa fa-picture-o"></i> Thư viện ảnh</a>
								</li>
								<li class="
								@if (isset($active) && $active == 'file-video' ) 
									{{ 'active-link' }}  
								@endif">
									<a href="{{ route('file-video') }}"><i class="fa fa-video-camera"></i> Thứ viện video</a>
								</li >
								<li class="
								@if (isset($active) && $active == 'file-music' ) 
									{{ 'active-link' }}  
								@endif">
									<a href="{{ route('file-music') }}"><i class="fa fa-music"></i> Thư viện nhạc</a>
								</li>
								<li class="
								@if (isset($active) && $active == 'file' ) 
									{{ 'active-link' }}  
								@endif">
									<a href="{{ route('file') }}"><i class="fa fa-file-text-o"></i> Thư viện tài liệu</a>
								</li>
							</ul>
						</li>

						<li class="
							@if (isset($active) )
								@if ( $active == 'dishes' || $active == 'menu') 
									{{ 'active active-sub' }} 
								@endif 
							@endif"
						>
							<a href="#">
								<i class="fa fa-list-alt"></i>
								<span class="menu-title"> Thực đơn</span>
								<i class="arrow"></i>
							</a>
						
							<!--Submenu-->
							<ul class="collapse">
								<li class="
								@if (isset($active) && $active == 'dishes' ) 
									{{ 'active-link' }}  
								@endif"
								><a href="{{ route('dishes') }}"><i class="fa fa-cutlery"></i> Món ăn</a>
								</li>

								<li class="
								@if (isset($active) && $active == 'menu' ) 
									{{ 'active-link' }}  
								@endif">
								<a href="{{ route('menu') }}"><i class="fa fa-check-square-o"></i> Thực đơn ngày</a></li>
							</ul>
						</li>

						<li class="@if (isset($active) )
								@if ( $active == 'addmission' || $active == 'class') 
									{{ 'active active-sub' }} 
								@endif 
							@endif">
							<a href="#">
								<i class="fa fa-address-book-o"></i>
								<span class="menu-title"> Đăng kí học</span>
								<i class="arrow"></i>
							</a>
						
							<!--Submenu-->
							<ul class="collapse">
								<li class="
								@if (isset($active) && $active == 'class' ) 
									{{ 'active-link' }}  
								@endif"
								><a href="{{ route('class') }}"><i class="fa fa-users"></i> Lớp học</a>
								</li>
								<li class="
								@if (isset($active) && $active == 'addmission' ) 
									{{ 'active-link' }}  
								@endif">
								<a href="{{ route('addmission') }}"><i class="fa fa-suitcase"></i> Đăng kí học Online</a></li>
							</ul>
						</li>

						<li class="@if (isset($active) && $active == 'slide') {{ 'active active-sub' }}  @endif">
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