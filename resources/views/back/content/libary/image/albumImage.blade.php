<div id="content-container">
		
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow">@if(isset($title) ) {{ $title }} @endif</h1>
			<!--Searchbox-->
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->

		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="searchbox">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Tìm kiếm..">
							<span class="input-group-btn">
								<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-5 pull-right search-nc">
					<button type="button" class="btn btn-primary pull-right" >Xóa Album</button>
					<button type="button" class="btn btn-primary pull-right" ng-click="actions.showModal(data.idAlbum)" style="margin-right: 10px;">Chỉnh sửa Album</button>
				</div>
			</div>
			<div class="row pad-top mar-top">
			    <div class="col-md-12">
				   <div id="blueimp-gallery" class="blueimp-gallery">
	                    <!-- The container for the modal slides -->
	                    <div class="slides"></div>
	                    <!-- Controls for the borderless lightbox -->
	                    <h3 class="title"></h3>
	                    <a class="prev">‹</a>
	                    <a class="next">›</a>
	                    <a class="close">×</a>
	                    <a class="play-pause"></a>
	                    <ol class="indicator"></ol>
	                    <!-- The modal dialog, which will be used to wrap the lightbox content -->
	                    
	                </div>
	                <!-- Anh image slide ng-reapet -->
	                <div id="links">
	                    <div class="col-md-3">
	                    	<a href="http://cnpm.com/Nifty/img/123.jpg"
	                    	   title="anh 2" data-gallery>
	                    	       <div class="thumbnail fix-thumbnail">
	                    	   	    <img class="img-responsive" 
	                    	         src="http://cnpm.com/Nifty/img/123.jpg"
	                    	         alt="Apple">
	                    	       </div>
	                    	    
	                    	</a>
	                    </div>
	                    <div class="col-md-3">
	                    	<a href="http://cnpm.com/Nifty/img/123.jpg"
	                    	   title="anh 1" data-gallery>
	                    	       <div class="thumbnail fix-thumbnail">
	                    	   	    <img class="img-responsive" 
	                    	         src="http://cnpm.com/Nifty/img/123.jpg"
	                    	         alt="Apple">
	                    	       </div>
	                    	    
	                    	</a>
	                    </div>
	                </div>
			    </div>
			</div>	
		</div>
		<!--===================================================-->
		<!--End page content-->
	<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	>
	</button>
	<album-modal data="data" album-save="actions.saveModalAlbum(data)"> </album-modal>
</div>
