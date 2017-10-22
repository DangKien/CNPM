@extends('back.layouts.default')
@section ('title', 'Nhân viên')
@section ('myJs')
    <script src="{{ url('')}}/js/directives/modal/userModal.js"></script>
    <script src="{{ url('')}}/js/ctrl/userCtrl.js"></script>
    <script src="{{ url('')}}/js/factory/services/userService.js"></script>
@endsection
@section('content')
<div id="content-container" ng-controller="userCtrl">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">@if(isset($title) ) {{ $title }} @endif</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <!-- searchbox -->
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
                <button type="button" class="btn btn-primary pull-right" data-target="#demo-panel-collapse-default"
                        data-toggle="collapse">Tìm kiếm nâng cao
                </button>
            </div>
        </div>
        <!-- end searchbox 	-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <!--Panel body-->
                    <div id="demo-panel-collapse-default" class="collapse">
                        <form ng-enter = "actions.listUser()">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Họ tên: </label>
                                            <input ng-model = "data.filter.name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Email: </label>
                                            <input ng-model = "data.filter.email" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Số điện thoại</label>
                                            <input ng-model = "data.filter.phone" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Trạng thái: </label>
                                            <br>
                                            <select id="statusFilter" class="form-control" data-width="100%">
                                                <option value="1">Hoạt động</option>
                                                <option value="2">Không hoạt động</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="panel-footer text-right">
                                <button ng-click="actions.listUser()" class="btn btn-info" type="submit">
                                    <i class="fa fa-search"> Tìm kiếm</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content  -->
        <div class="col-md-6 col-lg-3" ng-repeat="(key, data) in data.listUsers">
            <div class="panel text-center">
                <div class="panel-body">
                    <img alt="Avatar" class="img-md img-circle img-border mar-btm" src="{{ url('Nifty/')}}/img/av6.png">
                    <h4 class="mar-no">@{{ data.name }}</h4>
                    <p>@{{ data.job }}</p>
                </div>
                <div class="pad-all">
                    <p class="text-left font14">
                        <i class="fa fa-envelope"> &nbsp; &nbsp; @{{ data.email }}</i>
                    </p>
                    <p class="text-left font14">
                        <i class="fa fa-phone"> &nbsp; &nbsp; @{{ data.phone }}</i>
                    </p>
                    <p class="text-left font14">
                        <i class="fa fa-address-card"> &nbsp; &nbsp; @{{ data.address }}</i>
                    </p>
                    <br>
                    <div class="pad-btm">
                        <button  ng-click="actions.showModal(data.id)"
                                 class="btn btn-default btn-icon btn-circle icon-lg fa fa-edit"></button>
                        <button ng-click="actions.resetPassword(data.id)" class="btn btn-default btn-icon btn-circle icon-lg fa fa-refresh"></button>
                        <button ng-click="actions.deleteUser(data.id)" class="btn btn-danger btn-icon btn-circle icon-lg fa fa-trash"></button>
                    </div>
                </div>
            </div>
            <!--===================================================-->
        </div>
        <!-- end content -->
    </div>
    <!--===================================================-->
    <!--End page content-->

    <button 
        class="btn btn-primary btn-icon btn-circle icon-lg fa fa-plus pull-right"
        style="position: fixed; right: 15px; bottom: 20px; z-index: 500;"
        ng-click="actions.showModal()"
        >
    </button>

    <user-modal data = "data" user-save = "actions.saveUser(data, conf)"> </user-modal>

</div>
@endsection