@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                    Thêm mới
                </a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <form id="add-form" action="{{asset('/objects')}}" method="POST">
                        <!-- Modal body -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Tiêu đề*</label>
                                <input type="text" class="form-control" name="name"
                                       placeholder="Nhập tiêu đề OKRs..." maxlength="150">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="name">Mô tả*</label>
                                <input class="form-control" name="description"
                                       placeholder="Nhập mô tả..." maxlength="500">
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
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Mô tả</th>
            <th>Hành Động</th>
        </tr>
        </thead>
    </table>

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
