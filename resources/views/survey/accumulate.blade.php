@extends('layouts.app')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">
    <link rel="stylesheet" href="/public/css/okrs/key.css">
    <link rel="stylesheet" href="/public/css/okrs/index.css">
    <link rel="stylesheet" href="{{asset('/vendor/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/rowGroup.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="content-customer page-list">
        <div class="content-header header-height">
            <h1 class="ng-binding">Khách hàng thân thiết</h1>
            <div class="breadcrumb">
                <div style="width: 730px;" class="btn-group search-date divFilterDate">
                    <div class="input-group row" id="reportrange">
                        <div class="col-2"><b>Tổng</b> <span class="platinum-number">1000</span></div>
                        <div class="col-2"><b>Platinum</b> <span class="platinum-number">1000</span></div>
                        <div class="col-2"><b>Gold</b> <span class="platinum-number">1000</span></div>
                        <div class="col-2"><b>Titan</b> <span class="platinum-number">1000</span></div>
                        <div class="col-2"><b>Silver</b> <span class="platinum-number">1000</span></div>
                        <div class="col-2"><b>HT</b> <span class="platinum-number">1000</span></div>
                    </div>
                </div>

                <!-- ngIf: activeTab == '' -->
                <div class="btn-group ng-scope" ng-if="activeTab == ''">
                    {{--                    <button class="btn btn-sm btn-info" type="button" data-toggle="collapse" href="#collapseTwo">Thêm--}}
                    {{--                        mới--}}
                    {{--                    </button>--}}
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#analytics">
                        Tổng hợp
                        <!-- Counter - Messages -->
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã KH</th>
            <th>Tên KH</th>
            <th>SĐT</th>
            <th>Tổng điểm</th>
            <th>Đã dùng</th>
            <th>Khả dụng</th>
            <th>Hạng</th>
            <th>Tiến độ</th>
            <th>Hành Động</th>
        </tr>
        </thead>
    </table>

    <!-- The Modal manager Target-->
    <div class="modal" id="manageGift">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết đổi thưởng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <table class="table table-bordered" id="gift-table">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã</th>
                            <th>Tên quà</th>
                            <th>Điểm</th>
                            <th>Ngày đổi</th>
                        </tr>
                        </thead>
                        <tbody id="gift-body">

                        </tbody>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>



    <!-- Set rusult months -->
    <div class="modal" id="analytics">
        <div class="modal-dialog" id="modal-set-width" style="max-width: 1200px;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tổng hợp</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <input type="text" class="hidden" id="copy-link-hidden">

@endsection

@section('js')
    {{--    <script src="{{ asset('js/okrs/key.js') }}"></script>--}}
    <script src="{{ asset('/js/survey/accumulate.js') }}"></script>
@endsection
