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
                <div style="width: 430px;" class="btn-group search-date divFilterDate">
                    <div class="input-group" id="reportrange">
                        <div class="input-group-addon addon-right"><i class="fa fa-user"></i></div>
                        <input type="text" class="form-control" name="date" id="date">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>

                <!-- ngIf: activeTab == '' -->
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
                <th>Thực đạt</th>
                <th>Hành Động</th>
            </tr>
            </thead>
        </table>
    </form>




@endsection

@section('js')


    <script src="{{ asset('js/okrs/dashboard.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/dataTables.rowGroup.min.js') }}"></script>

@endsection
