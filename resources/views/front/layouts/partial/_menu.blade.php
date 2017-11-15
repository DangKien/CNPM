<div class="menu-header" ng-controller="mainMenuCtrl">
	<div class="container fix-nav">
		<div id="nav-menu-icon">
			<button class="button-icon-nav"><i class="fa fa-bars icon" aria-hidden="true"></i></button>
			
		</div>
		<nav class="nav-bar-ul navbar navbar-default bg-nav">
			<ul>
			  	<li class="active-li"><a href="">Trang chủ</a></li>
			  	<li ng-repeat="(key, menu) in data.listMainMenu"><a href="">@{{ menu.name }}</a></li>
			</ul>
		</nav>
	</div>
</div>