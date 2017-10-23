<header id="navbar">
			
			<div id="navbar-container" class="boxed">

				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a class="navbar-brand">
						<img src="{{ url('') }}/Nifty/img/logo.png" alt="Nifty Logo" class="brand-icon">
						<div class="brand-title">
							<span class="brand-text">ROYAL</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<!--End brand logo & name-->


				<!--Navbar Dropdown-->
				<!--================================-->
				<div class="navbar-content clearfix">
					<ul class="nav navbar-top-links pull-left">

						<!--Navigation toogle button-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="tgl-menu-btn">
							<a class="mainnav-toggle" href="#">
								<i class="fa fa-navicon fa-lg"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-top-links pull-right">

						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="pull-right">
									<img class="img-circle img-user media-object" src="{{ url('') }}/Nifty/img/av1.png" alt="Profile Picture">
								</span>
								<div class="username hidden-xs"> Đặng Trung Kiên<!-- @if (Auth::check()){{ Auth::user()->name }} @endif --></div>
							</a>


							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

								<!-- User dropdown menu -->
								<ul class="head-list">
								<!-- Dropdown footer -->
								<div class="pad-all text-right">
									<a href="{{ route('logout') }}" class="btn btn-primary">
										<i class="fa fa-sign-out fa-fw"></i> Đăng Xuất
									</a>
								</div>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End user dropdown-->
					</ul>
					
				</div>
				<!--================================-->
				<!--End Navbar Dropdown-->

			</div>
</header>