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
        <div class="col-4">
            <div class="box-kpi">
                <div class="kpi-header">
                    <i class="fa fa-caret-right" aria-hidden="true"></i> Quản lý mục tiêu
                </div>
                <form id="target-kpi-form" method="POST" action="/targetkpi">
                <div class="target-body">
                    <div class="kpi-target" id="kpi-target">
                    </div>
                    <div class="text-right">
                        <a href="#" data-toggle="modal" onclick="getTarget()" data-target="#manageTarget">Quản lý</a>
                        &nbsp; &nbsp;
                        <button type="submit" class="btn btn-link">Lưu</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="box-kpi">
                <div class="kpi-header">
                    <i class="fa fa-caret-right" aria-hidden="true"></i> KPI năm 2020 -Trần Thanh Huyền
                </div>

                <div class="kpi-body">
                    <div class="row kpi-month">
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 1</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 2</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 3</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 4</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 5</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 6</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 7</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 8</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 9</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 10</div>
                            <div class="col-3 text-right">96%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 12</div>
                            <div class="col-3 text-right">98%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div class="number-kpi-year">40</div>
                            </div>
                            <div class="col-6">Tháng 12</div>
                            <div class="col-3 text-right">97%</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <span>Ghi chú mức độ quan trọng:</span>
        <span>Bình thường(<i class="fa fa-square" style="color: green" aria-hidden="true"></i>)--</span>
        <span>Cố gắng(<i class="fa fa-square" style="color:yellow" aria-hidden="true"></i>)--</span>
        <span>Trọng tâm(<i class="fa fa-square" style="color:orange" aria-hidden="true"></i>)--</span>
        <span>Thách thức(<i class="fa fa-square" style="color:red" aria-hidden="true"></i>)</span>
        <br>
        <br>
    </div>


    <div class="row" id="kpi">
        <div class="col-12 box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-down collapsed" aria-hidden="true" data-toggle="collapse" data-target="#demo"></i>
                Phát triển hệ thống - Mức độ quan trọng: <b>Bình
                    Thường</b>
            </div>
            <div id="demo" class="kpi-body collapse show">

                <div class="row kpi-detail kpi-header-title">
                    <div class="col-5 text-bold row">
                        <div class="col-10">KPI</div>
                        <div class="col-2">Độ khó</div>
                    </div>
                    <div class="col-1 text-bold">Loại</div>
                    <div class="col-6 text-bold row">
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
                    <div class="col-5 row">
                        <div class="col-10 title-kpi"
                             title="Xây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpi">
                            Xây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpi
                            <for></for>
                        </div>
                        <div class="col-2 text-center">
                            <i class="fa fa-square" style="color: green" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-1">% đạt</div>
                    <div class="col-6 row">
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
                    <div class="col-5 row">
                        <div class="col-10 title-kpi">
                            Xây dựng form kpi
                        </div>
                        <div class="col-2 text-center">
                            <i class="fa fa-square" style="color: red" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-1">% đạt</div>
                    <div class="col-6 row">
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
    <!-- The Modal manager Target-->
    <div class="modal" id="manageTarget">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Quản lý mục tiêu</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="target-form" method="POST" action="/targets">
                    <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm" name="name" placeholder="Tên mục tiêu">
                            </div>
                            <div class="col-3">
                                <select id="level" class="form-control form-control-sm" name="level">
                                    <option disabled selected value="">-- Độ khó --</option>
                                    <option value="2">Bình thường</option>
                                    <option value="4">Cố gắng</option>
                                    <option value="6">Trọng tâm</option>
                                    <option value="8">Thách thức</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <button type="submit" class="btn btn-link">Thêm</button>
                            </div>
                    </div>
                    </form>
                    <br>
                    <div class="row">
                        <span>Ghi chú mức độ quan trọng:</span>
                        <span>Bình thường(<i class="fa fa-square" style="color: green" aria-hidden="true"></i>)--</span>
                        <span>Cố gắng(<i class="fa fa-square" style="color:yellow" aria-hidden="true"></i>)--</span>
                        <span>Trọng tâm(<i class="fa fa-square" style="color:orange" aria-hidden="true"></i>)--</span>
                        <span>Thách thức(<i class="fa fa-square" style="color:red" aria-hidden="true"></i>)</span>
                        <br>
                        <br>
                    </div>
                    <br>
                    <table class="table table-bordered" id="target-table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên mục tiêu</th>
                            <th>Độ khó</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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


@endsection

@section('js')
{{--    <script src="{{ asset('js/okrs/key.js') }}"></script>--}}
    <script src="{{ asset('js/okrs/keyv2.js') }}"></script>

@endsection
