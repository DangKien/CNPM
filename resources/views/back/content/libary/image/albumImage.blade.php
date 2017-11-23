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
					<button type="button" class="btn btn-primary pull-right" ng-click="actions.removeAlbum()" >Xóa Album</button>
					<button type="button" class="btn btn-primary pull-right" ng-click="actions.showModalAlbum(data.idAlbum)" style="margin-right: 10px;">Chỉnh sửa Album</button>
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
	                <div id="links" class="row">
	                    <div class="col-md-3 col-sm-6 image-lib" ng-repeat="(key, listImage) in data.listImage">
	                    	<a href="{{ url('storage/images/album/lib_images') }}/@{{ listImage.url_image }}"
	                    	   title="" data-gallery>
                    	       <div class="thumbnail fix-thumbnail">
	                    	   	    <img class="img-responsive" 
	                    	         ng-src="{{ url('storage/images/album/title_images') }}/@{{ listImage.url_image }}"
	                    	         alt="">
	                    	    </div>
	                    	</a>
	                    	<button style="z-index: 10000;" ng-click="actions.removeImage(listImage.id)" class="remove-images btn btn-default btn-icon btn-circle icon-lg fa fa-times">
                    	    </button>
	                    </div>
	                </div>
			    </div>
			</div>	
			<div class="row text-center">
			   <div class="page-oum">
			       <div paging
			           page="page"
			           page-size = "data.pageImage.per_page"
			           total="data.pageImage.total"
			           paging-action="actions.changePage(page)">
			       </div>
			   </div>
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
	<button 
	class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
	style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
	ng-click="actions.showModalUpload()"
	>
	</button>
	<album-modal dom-album-modal="domAlbumModal" dom-album-form="domAlbumForm" data="data" album-save="actions.saveModalAlbum(data)"> </album-modal>
	<upload-image-modal dom-image-modal="domImageModal"  id-album-image="data.idAlbum" upload-save="actions.saveModalUploadImg(data)" data="data" dom-image-form="domImageForm"> </upload-image-modal>
</div>
