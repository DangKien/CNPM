@extends('back.layouts.default')
@section ('title', 'Thư viện')
@section ('myJs')
	<script src="{{ url('')}}/js/ctrl/albumCtrl.js"></script>
	<script src="{{ url('')}}/js/ctrl/imageCtrl.js"></script>
	<script src="{{ url('')}}/js/factory/services/albumService.js"></script>
	<script src="{{ url('')}}/js/factory/services/imageService.js"></script>
	<script src="{{ url('')}}/js/directives/modal/albumModal.js"></script>
	<script src="{{ url('')}}/js/directives/modal/uploadImageModal.js"></script>
@endsection

@section('content')
	<div ng-view>
		
	</div>
@endsection