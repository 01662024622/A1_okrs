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
            <h1 class="ng-binding">Bảng OKRs</h1>
            <div class="breadcrumb">
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
                    {{--                    <button class="btn btn-sm btn-info" type="button" data-toggle="collapse" href="#collapseTwo">Thêm--}}
                    {{--                        mới--}}
                    {{--                    </button>--}}
                    <a class="nav-link dropdown-toggle" href="#" id="add-action" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Quản lý
                        <!-- Counter - Messages -->
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow sub_coll"
                         aria-labelledby="add-action" style=" border-radius:0;overflow: auto;">

                        <a class="nav" type="button" data-toggle="collapse" href="#collapseTwo">Mục tiêu
                        </a>
                        <a class="nav" type="button" data-toggle="collapse" href="#collapseTwo">KPI
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row kpi-main-header">
        <div class="col-4 box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-right" aria-hidden="true"></i> Quản lý mục tiêu
            </div>
            <div class="target-body">
                <div class="row kpi-year">
                    <div class="row col-6">
                        <div class="col-10">Phát triển hệ thống</div>
                        <div class="col-2"><input type="checkbox" class="form-check-input" value=""></div>
                    </div>
                    <div class="row col-6">
                        <div class="col-10">Phát triển hệ thống</div>
                        <div class="col-2"><input type="checkbox" class="form-check-input" value=""></div>
                    </div>
                    <div class="row col-6">
                        <div class="col-10">Phát triển hệ thống</div>
                        <div class="col-2"><input type="checkbox" class="form-check-input" value=""></div>
                    </div>
                </div>
                <div class="text-right">
                    <a href="#">Lưu</a>
                </div>
            </div>
        </div>
        <div class="col-7 box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-right" aria-hidden="true"></i> KPI năm 2020 -Trần Thanh Huyền
            </div>

            <div class="kpi-body">
                <div class="row kpi-month">
                    <div class="col-6 row kpi-hover kpi-moth-detail">
                        <div class="col-3">
                            <div class="number-kpi-year">40</div>
                        </div>
                        <div class="col-6">Tháng 1</div>
                        <div class="col-3 text-right">96%</div>
                    </div>
                    <div class="col-6 row kpi-hover kpi-moth-detail">
                        <div class="col-3">
                            <div class="number-kpi-year">40</div>
                        </div>
                        <div class="col-6">Tháng 2</div>
                        <div class="col-3 text-right">98%</div>
                    </div>
                    <div class="col-6 row kpi-hover kpi-moth-detail">
                        <div class="col-3">
                            <div class="number-kpi-year">40</div>
                        </div>
                        <div class="col-6">Tháng 3</div>
                        <div class="col-3 text-right">97%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="row">
        <div class="col box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-right" aria-hidden="true"></i> Phát triển hệ thống - Mức độ quan trọng: <b>Bình Thường</b>
            </div>
            <div class="kpi-body">

                <div class="row kpi-detail kpi-header-title">
                    <div class="col-4 text-bold">
                        KPI
                    </div>
                    <div class="col-2 text-bold">Mức độ quan trọng</div>
                    <div class="col-1 text-bold">Loại</div>
                    <div class="col-5 text-right text-bold row">
                        <span class="col kpi-month">T1</span>
                        <span class="col kpi-month">T2</span>
                        <span class="col kpi-month">T3</span>
                        <span class="col kpi-month">T4</span>
                        <span class="col kpi-month">T5</span>
                        <span class="col kpi-month">T6</span>
                        <span class="col kpi-month">T7</span>
                        <span class="col kpi-month">T8</span>
                        <span class="col kpi-month">T9</span>
                        <span class="col kpi-month">T10</span>
                        <span class="col kpi-month">T11</span>
                        <span class="col kpi-month">T12</span>
                    </div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-4">
                        Xây dựng form kpi
                    </div>
                    <div class="col-2">Khá quan trọng</div>
                    <div class="col-1">% đạt</div>
                    <div class="col-5 text-right row">
                        <span class="col kpi-month">90</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">105</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">50</span>
                        <span class="col kpi-month">70</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">60</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">110</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">100</span>
                    </div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-4">
                        Xây dựng form kpi
                    </div>
                    <div class="col-2">Khá quan trọng</div>
                    <div class="col-1">% đạt</div>
                    <div class="col-5 text-right row">
                        <span class="col kpi-month">90</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">60</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">-</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-right" aria-hidden="true"></i> Phát triển hệ thống - Mức độ quan trọng: <b>Bình Thường</b>
            </div>
            <div class="kpi-body">

                <div class="row kpi-detail kpi-header-title">
                    <div class="col-7 text-bold">
                        KPI
                    </div>
                    <div class="col-2 text-bold">Mức độ quan trọng</div>
                    <div class="col-2 text-bold">Loại</div>
                    <div class="col-1 text-right text-bold">Đạt</div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-7">
                        Xây dựng form kpi
                    </div>
                    <div class="col-2">Khá quan trọng</div>
                    <div class="col-2">% đạt</div>
                    <div class="col-1 text-right">90%</div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-7">
                        Xây dựng form SMS
                    </div>
                    <div class="col-2">Khá quan trọng</div>
                    <div class="col-2">lỗi -10%</div>
                    <div class="col-1 text-right">90%</div>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion">
        <div class="card">
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <form id="add-form" action="{{asset('/objects')}}" method="POST">
                        <!-- Modal body -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Tên mục tiêu*</label>
                                <input type="text" class="form-control" name="name"
                                       placeholder="Nhập tiêu đề OKRs..." maxlength="150">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="name">Mức độ quan trọng*</label>
                                <select class="form-control" name="percent" id="percent" type="text"
                                       placeholder="Nhập mô tả..." maxlength="3">
                                    <option disabled selected value> -- Chọn -- </option>
                                    <option value="1">Bình thường</option>
                                    <option value="1">Bình thường</option>
                                    <option value="2">Khá quan trọng</option>
                                    <option value="3">Quan trọng</option>
                                    <option value="4">Rất quan trọng</option>
                                </select>
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
                                   placeholder="Nhậphệ số okrs..." maxlength="3">
                        </div>
                        <div class="form-group" id="sub-radio">
                            <label for="name">Cách tính*</label>
                            <br>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="type_0" class="form-check-input" name="type" value="0"
                                           checked>Phần trăm đạt
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="type_1" class="form-check-input" name="type" value="1">Trừ
                                    theo mỗi lỗi/sai
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

    <div class="modal" id="check-modal">
        <div class="modal-dialog" style="max-width: 700px;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đánh giá kết quả</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group type-check-0 add-key-button">
                        <h5>Hệ số trừ cho mỗi lỗi vi phạm là:<b id="minus-text"></b></h5>
                    </div>
                    <div class="btn-group ng-scope add-key-button">
                        <button class="btn btn-sm btn-info" type="button" data-toggle="collapse"
                                href="#collapseOne">Thêm
                            mới
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse form-group" data-parent="#accordion">

                        <form id="check-form-krs" action="{{asset('/results')}}" method="POST">
                            <label for="name">Ngày*</label>
                            <input type="text" class="form-control" name="date" id="date-result">
                            <label for="name">Mô tả*</label>
                            <input type="text" class="form-control" id="result-kr" name="result"
                                   placeholder="Nhập kết quả then chốt..." maxlength="150">
                            <label for="name">Số lần*</label>
                            <input type="text" class="form-control" id="number-kr" name="number"
                                   placeholder="Nhập số lần vi phạm..." maxlength="2">
                            <br>
                            <button type="submit" class="btn btn-info">Thêm</button>
                        </form>
                    </div>
                    <div class="container-fluid add-key-button" id="add-key-table">
                        <br>
                        <table class="table table-bordered" id="key-add-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ngày</th>
                                <th>Mô tả</th>
                                <th>Số lần</th>
                                <th>Hành Động</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <form id="check-result-krs" action="{{asset('/keys')}}" method="POST">
                        <div class="form-group type-check-0">
                            <label for="name">Thực đạt(%)*</label>
                            <input type="text" class="form-control" id="result-key" name="result"
                                   placeholder="Nhập kết quả then chốt..." maxlength="3">
                        </div>

                        <input type="hidden" name="id" id="id-key">
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
