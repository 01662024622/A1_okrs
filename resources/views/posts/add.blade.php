@extends('layouts.app')
@section('css')
    <link href="/css/posts/add.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12"><h3>Thêm bài viết mới</h3></div>
        <br>
        <br>
        <div class="col-lg-10">
            <div class="item">
                <input type="text" class="form-control input-custom" id="title" placeholder="Nhập tiêu đề...">
            </div>
            <div class="item">
                <textarea class="ckeditor" name="editor1"></textarea>
            </div>
            <div class="item">
                <div class="header-item">
                    <p>Nhúng nội dung</p>
                </div>
                <div class="header-item">
                    <div class="row">
                        <div class="col-3" style="padding-left: 30px">
                            Nhúng website
                            <br>
                            Điền url ở đây nếu có...
                        </div>
                        <div class="col-9">
                            <textarea id="embed" cols="5" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="header-item">
                    <p>Phân quyền</p>
                </div>
                <div class="header-item">
                    <div class="form-group">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#apartment" id="apartment_toggle">Phòng
                                    ban</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#staff" id="staff_toggle">Nhân viên</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="apartment" class="container tab-pane active"><br>
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="text" name="apartment_find" id="apartment_find_text"
                                               style="width: 150px;" maxlength="30">
                                        <button id="apartment_find">Tìm kiếm</button>
                                        <br>
                                        <br>
                                        <p>Kết quả tìm kiếm:</p>
                                        <select multiple="multiple" id="multiple_apartment_select"
                                                style="height:160px; width: 210px;">

                                        </select>

                                        <button id="apartment_select">Chọn</button>
                                    </div>
                                    <div class="col col-6">
                                        <table style="width:100%" id="apartment_role_table">
                                            <tr>
                                                <th>Phòng ban</th>
                                                <th>Quyền hạn</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="staff" class="container tab-pane fade"><br>
                                <div class="row">
                                    <div class="col col-6">
                                        <input type="text" name="apartment_find" id="staff_find_text"
                                               style="width: 150px;" maxlength="30">
                                        <button id="staff_find">Tìm kiếm</button>
                                        <br>
                                        <p>Kết quả tìm kiếm:</p>
                                        <br>
                                        <select multiple="multiple" id="multiple_staff_select"
                                                style="height:160px; width: 210px;">

                                        </select>
                                        <button id="staff_select">Chọn</button>
                                    </div>
                                    <div class="col col-6">
                                        <table style="width:100%" id="staff_role_table">
                                            <tr>
                                                <th>Nhân viên</th>
                                                <th>Quyền hạn</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="item">
                <div class="header-item">
                    <p>Đăng</p>
                </div>
                <div class="header-item">
                    <div class="row" style="margin: 15px 0 15px 0">
                        <div class="col-6">
                            <span>Hiển thị:</span>
                            <span>
                                <select id="role" name="role">
                                    <option value="0">Công khai</option>
                                    <option value="2">Khóa</option>
                                </select>
                            </span>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-light">Xem thử</a>
                        </div>
                        <div class="col-12">
                            <br>
                            Ngày đăng:
                        </div>
                    </div>
                </div>
                <div class="header-item text-right header-body">
                    <button id="save-posts" class="btn btn-primary">Đăng</button>
                </div>
            </div>
            <div class="item">
                <div class="header-item">
                    <p>Tất cả chuyên mục</p>
                </div>
                <div class="header-item">
                    <div class="scroll">
                        <ul id="categorilist">
                            <li id="popular-category-135" class="popular-category">
                                <label class="selectit">
                                    @foreach($categories as $category)
                                        <input class="check-input" id="category-{{$category->id}}" type="checkbox" value="{{$category->id}}">{{$category->title}}
                                        <br>
                                    @endforeach
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="header-item">
                    <p>Ảnh đại diện</p>
                </div>
                <div class="header-item">
                    <div class="text-center">
                        <img src="" class="avatar img-circle img-thumbnail" alt="avatar" style="display: none">
                        <h6>Cập nhật ảnh địa diện...</h6>
                        <input type="file" id="avata" class="text-center center-block file-upload"
                               accept="image/png, image/jpeg, image/jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection

@section('js')
    <script src="{{ asset('js/posts/ckeditor.js') }}"></script>
    <script src="{{ asset('js/posts/add.js') }}"></script>
    <script>
        CKEDITOR.editorConfig = function (config) {
            // config.language = 'es';
            // config.uiColor = '#F7B42C';
            // config.height = 300;
            // config.toolbarCanCollapse = true;
            config.height = '800px';
        };

    </script>
@endsection
