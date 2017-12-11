@extends('back.layouts.default')
@section ('title', 'Thư viện')
@section ('myJs')
	<script src="{{ url('')}}/js/ctrl/backend/albumCtrl.js"></script>
	<script src="{{ url('')}}/js/ctrl/backend/imageCtrl.js"></script>
	<script src="{{ url('')}}/js/factory/services/backend/albumService.js"></script>
	<script src="{{ url('')}}/js/factory/services/backend/imageService.js"></script>
	<script src="{{ url('')}}/js/directives/modal/backend/albumModal.js"></script>
	<script src="{{ url('')}}/js/directives/modal/backend/uploadImageModal.js"></script>
	<script src="{{ url('')}}/js/directives/modal/backend/editImageModal.js"></script>
@endsection

@section('content')
	<div ng-view>
		
	</div>
@endsection