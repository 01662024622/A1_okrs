@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/okrs/index.css')}}">
@endsection
@section('content')
    <div class="row kpi-main-header">
        <div class="col-4 box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-right" aria-hidden="true"></i> Tổng số KPI năm
            </div>
            <div class="kpi-body">
                <div class="row kpi-year kpi-hover">
                    <div class="col-3">
                        <div class="number-kpi-year">40</div>
                    </div>
                    <div class="col-6">Năm 2020</div>
                    <div class="col-3 text-right">90%</div>
                </div>
                <div class="row kpi-year kpi-hover">
                    <div class="col-3">
                        <div class="number-kpi-year">43</div>
                    </div>
                    <div class="col-6">Năm 2021</div>
                    <div class="col-3 text-right">99%</div>
                </div>
            </div>
        </div>
        <div class="col-7 box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-right" aria-hidden="true"></i> KPI năm 2020
            </div>

            <div class="kpi-body">
                <div class="row kpi-month">
                    <div class="col-6 row kpi-hover kpi-moth-detail kpi-active-month">
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
                    <div class="col-6">
                        KPI
                    </div>
                    <div class="col-3">Mức độ quan trọng</div>
                    <div class="col-3 text-right">Mức độ hoàn thành</div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-6">
                        Xây dựng form kpi
                    </div>
                    <div class="col-3">Khá quan trọng</div>
                    <div class="col-3 text-right">90%</div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-6">
                        Xây dựng form SMS
                    </div>
                    <div class="col-3">Rất quan trọng</div>
                    <div class="col-3 text-right">99%</div>
                </div>
            </div>
        </div>

    <br><br>


    <!-- The Modal -->
    <div class="modal" id="add-modal">
        <div class="modal-dialog" style="max-width: 700px;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="edit-form" action="{{asset('/objects')}}" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tiêu đề*</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Nhập tiêu đề okrs..." maxlength="150">
                        </div>
                        <div class="form-group">
                            <label for="name">Mô tả*</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                      placeholder="Nhập mô tả..." maxlength="500"></textarea>
                        </div>
                        <input type="hidden" name="id" id="eid">
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


    <script src="{{ asset('js/okrs/index.js') }}"></script>

@endsection
