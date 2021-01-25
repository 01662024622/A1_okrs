@extends('layouts.app')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">
    <link rel="stylesheet" href="/public/css/okrs/key.css">
    <link rel="stylesheet" href="{{asset('/vendor/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendor/css/rowGroup.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="content-customer page-list">
        <div class="content-header header-height">
            <h1 class="ng-binding">Bảng OKRs</h1>
            <div class="breadcrumb">
                <button type="button" ng-click="getDataLetters(0)" class="btn btn-default btn-sm"><i
                        class="fa fa-refresh"></i> Tải lại
                </button>
                <div style="width: 430px;" class="btn-group search-date divFilterDate">
                    <div class="input-group" id="reportrange">
                        <div class="input-group-addon addon-right"><i class="fa fa-user"></i></div>
                        <select id="user_id" type="text" value="" readonly="" class="form-control input-sm">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" name="date" id="date">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>

                <!-- ngIf: activeTab == '' -->
                <div class="btn-group ng-scope" ng-if="activeTab == ''">
                    <button class="btn btn-sm btn-info" type="button" data-toggle="collapse" href="#collapseTwo">Thêm
                        mới
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <form id="add-form" action="{{asset('/okrs')}}" method="POST">
                        <!-- Modal body -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Mục tiêu*</label>
                                <select class="form-control" id="object_id" name="object_id">
                                    <option value="0" disabled selected>-- Chọn --</option>
                                    @foreach($objects as $object)
                                        <option value="{{$object->id}}">{{$object->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="name">Hệ số(đv %)*</label>
                                <input class="form-control" name="percent" id="percent" type="text"
                                       placeholder="Nhập mô tả..." maxlength="3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Thêm mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br><br>
    <form action="/okrs" method="post" id="edit_ob">
        <table class="table table-bordered" id="users-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Hệ số KRs</th>
                <th>Kết qủa</th>
                <th>Hành Động</th>
            </tr>
            </thead>
        </table>
    </form>
    <!-- The Modal -->
    <div class="modal" id="add-modal">
        <div class="modal-dialog" style="max-width: 700px;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="add-form-krs" action="{{asset('/keys')}}" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Kết quả then chốt*</label>
                            <input type="text" class="form-control" id="name-kr" name="name"
                                   placeholder="Nhập kết quả then chốt..." maxlength="150">
                        </div>
                        <div class="form-group">
                            <label for="name">Hệ số KRs(%)*</label>
                            <input type="text" class="form-control" id="percent-kr" name="percent"
                                   placeholder="Nhậphệ số okrs..." maxlength="2">
                        </div>
                        <div class="form-group" id="sub-radio">
                            <label for="name">Cách tính*</label>
                            <br>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="type_0" class="form-check-input" name="type" value="0" checked>Phần trăm đạt
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="type_1" class="form-check-input" name="type" value="1">Trừ theo mỗi lỗi/sai
                                </label>
                            </div>
                            <div class="form-group hidden" id="minus-container">
                                <br>
                                <label for="name">Phần trăm bị trừ(%)*</label>
                                <input type="text" class="form-control" id="minus" name="minus"
                                       placeholder="Nhậphệ số okrs..." maxlength="2">
                            </div>
                        </div>
                        <input type="hidden" name="id" id="eid-krs">

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<input type="hidden" id="ob-id-hide">


@endsection

@section('js')


    <script src="{{ asset('js/okrs/key.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.rowGroup.min.js') }}"></script>

@endsection
