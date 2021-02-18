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
                                <div id="number-kpi-month-1" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 1</div>
                            <div id="total-kpi-month-1" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-2" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 2</div>
                            <div id="total-kpi-month-2" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-3" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 3</div>
                            <div id="total-kpi-month-3" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-4" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 4</div>
                            <div id="total-kpi-month-4" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-5" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 5</div>
                            <div id="total-kpi-month-5" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-6" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 6</div>
                            <div id="total-kpi-month-6" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-7" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 7</div>
                            <div id="total-kpi-month-7" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-8" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 8</div>
                            <div id="total-kpi-month-8" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-9" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 9</div>
                            <div id="total-kpi-month-9" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-10" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 10</div>
                            <div id="total-kpi-month-10" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div id="number-kpi-month-11" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 11</div>
                            <div id="total-kpi-month-11" class="col-3 text-right">0%</div>
                        </div>
                        <div class="col-4 row kpi-moth-detail">
                            <div class="col-3">
                                <div  id="number-kpi-month-12" class="number-kpi-year">0</div>
                            </div>
                            <div class="col-6">Tháng 12</div>
                            <div id="total-kpi-month-12" class="col-3 text-right">0%</div>
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



    <!-- Set rusult months -->
    <div class="modal" id="set-result-month-modal">
        <div class="modal-dialog" style="max-width: 1200px;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="add-form-krs" action="{{asset('/keys')}}" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <b for="name">Tên Kpi</b>
                                    <p id="name-kpi" class="kpi-detail-show">Kpi A</p>
                                </div>
                                <div class="">
                                    <p id="detail-kpi-show" class="kpi-detail-show">
                                        <b for="name">Độ khó: </b>
                                        <i class="fa fa-square" style="color: green" aria-hidden="true"></i>--Bình thường
                                        <b for="name">Tháng: </b><span id="kpi-detail-month">1</span>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="name"><b>Kết quả</b></label>
                                    <input id="result-kpi-detail" type="text" class="form-control form-control-sm" pattern="^\d{0,3}(\.\d{0,2})?$" name="result" placeholder="Kết quả Kpi">
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="form-group">
                                    <label for="name"><b>Kết quả</b></label>
                                    <input id="result-kpi-detail" type="text" class="form-control form-control-sm" pattern="^\d{0,3}(\.\d{0,2})?$" name="result" placeholder="Kết quả Kpi">
                                </div>
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

    <!-- The Modal manager Target-->
    <div class="modal" id="add-modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Quản lý Kpis</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="kpis-form" method="POST" action="/kpis">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control form-control-sm" name="name" placeholder="Tên kpi...">
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
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type-default" value="0" checked>
                            <label class="form-check-label" for="inlineRadio1">%đạt</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="type-custom" value="1">
                            <label class="form-check-label" for="inlineRadio2">trừ theo lỗi</label>
                        </div>
                        <div class="form-check form-check-inline hidden" id="minus-container">
                            <input class="form-check-input form-control-sm" type="text" name="minus" id="minus" pattern="^\d{0,2}$">
                            <label class="form-check-label" for="inlineRadio2">%</label>
                        </div>
                        <input type="hidden" id="td-id" name="td_id">
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
                    <table class="table table-bordered" id="kpis-table">
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

@endsection

@section('js')
{{--    <script src="{{ asset('js/okrs/key.js') }}"></script>--}}
    <script src="{{ asset('js/okrs/keyv2.js') }}"></script>
    <script src="{{ asset('js/okrs/key.js') }}"></script>

@endsection
