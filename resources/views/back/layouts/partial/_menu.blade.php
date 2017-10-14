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
						<li 
							@if (isset($active) && $active == 'user')
								class="active-link active"
							@else
								class=""';
							@endif
						>
							<a href="{{ url('') }}">
								<i class="fa fa-user-circle"></i>
								<span class="menu-title">
									<strong>Quản lí người dùng</strong>
								</span>
							</a>
						</li>
						<li 
							@if (isset($active) && $active == 'department')
								class="active-link active"
							@else
								class=""';
							@endif
						>
							<a href="{{ url('') }}/department">
								<i class="fa fa-ambulance"></i>
								<span class="menu-title">
									<strong>Quản lí cơ sở ý tế</strong>
								</span>
							</a>
						</li>
						<li 
							@if (isset($active) && $active == 'service')
								class="active-link active"
							@else
								class=""';
							@endif
						>
							<a href="{{ url('') }}/service">
								<i class="fa fa-server"></i>
								<span class="menu-title">
									<strong>Quản lí dịch vụ</strong>
								</span>
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