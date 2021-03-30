<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{asset('/css/vendor/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
        *, *:before, *:after {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            min-width: 1200px;
            margin: 0;
            padding: 50px;
            color: #eee9dc;
            font: 16px Verdana, sans-serif;
            background: #2e6ba7;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        #wrapper {
            position: relative;

        }

        .branch {
            position: relative;
            margin-left: 450px;
        }
        .branch:before {
            content: "";
            width: 65px;
            border-top: 2px solid #eee9dc;
            position: absolute;
            left: -115px;
            top: 50%;
            margin-top: 1px;
        }

        .entry {
            position: relative;
            min-height: 160px;
        }
        .entry:before {
            content: "";
            height: 100%;
            border-left: 2px solid #eee9dc;
            position: absolute;
            left: -50px;
        }
        .entry:after {
            content: "";
            width: 50px;
            border-top: 2px solid #eee9dc;
            position: absolute;
            left: -50px;
            top: 50%;
            margin-top: 1px;
        }
        .entry:first-child:before {
            width: 10px;
            height: 50%;
            top: 50%;
            margin-top: 2px;
            border-radius: 10px 0 0 0;
        }
        .entry:first-child:after {
            height: 10px;
            border-radius: 10px 0 0 0;
        }
        .entry:last-child:before {
            width: 10px;
            height: 50%;
            border-radius: 0 0 0 10px;
        }
        .entry:last-child:after {
            height: 10px;
            border-top: none;
            border-bottom: 2px solid #eee9dc;
            border-radius: 0 0 0 10px;
            margin-top: -9px;
        }
        .entry.sole:before {
            display: none;
        }
        .entry.sole:after {
            width: 50px;
            height: 0;
            margin-top: 1px;
            border-radius: 0;
        }

        .label {
            display: block;
            width: 350px;
            padding: 5px 10px;
            line-height: 20px;
            text-align: center;
            border: 2px solid #eee9dc;
            border-radius: 5px;
            position: absolute;
            left: 0;
            top: calc(50% - 55px);
            margin-top: -15px;
        }

        .label-entry {
            display: block;
            width: 350px;
            padding: 5px 10px;
            line-height: 20px;
            text-align: center;
            border: 2px solid #eee9dc;
            border-radius: 5px;
            position: absolute;
            left: 14px;
            top: calc(50% - 55px);
            margin-top: -15px;
        }
        p{
            margin-bottom: 0.5rem
        }
        .lv2{    margin-left: 462px;}
        a{
            color: white;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Sơ đồ tổ chức nhân sự phòng tư vấn phụ tùng</h1>
    <div class=""><a href="/organization" style="text-decoration: underline"><i class="fa fa-hand-o-left" aria-hidden="true"></i> Trở lại</a></div>
    <div id="wrapper">
        <div class="label-entry row" style="padding-right: 0">
            <div class="col-12"><a href="/user-t1">Trưởng phòng tư vấn phụ tùng</a></div>
            <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                <div class="col-4" style="padding: 0">
                    <img src="/0.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-8" style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                    <p><i class="fa fa-user" aria-hidden="true"></i> Hoàng Thị Hường</p>
                    <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px"> Maris Hường Hoàng</i></p>
                    <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người lãnh đạo nội chính</i></p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> huong.hoang@htauto.com.vn</p>
                </div>
            </div>
        </div>
        <div class="branch lv1">
            <div class="entry">
                <div class="label-entry row" style="padding-right: 0">
                    <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
                    <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                        <div class="col-4" style="padding: 0">
                            <img src="/0.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-8"
                        style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Hoàng Thị Hòa</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Jessica Hòa Hoàng</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> hoa.hoang@htauto.vn</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="entry">
            <div class="label-entry row" style="padding-right: 0">
                <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
                <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                    <div class="col-4" style="padding: 0">
                        <img src="/0.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-8"
                    style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                    <p><i class="fa fa-user" aria-hidden="true"></i> Đặng Quỳnh Nga</p>
                    <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Alice Nga Đặng</i></p>
                    <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên gia Tư vấn PT, Phụ gia, Nước mát</i></p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> nga.dang@htauto.vn</p>
                </div>
            </div>
        </div>
    </div>
    <div class="entry">
        <div class="label-entry row" style="padding-right: 0">
            <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
            <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                <div class="col-4" style="padding: 0">
                    <img src="/0.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-8"
                style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                <p><i class="fa fa-user" aria-hidden="true"></i> Đoàn Thị Thu</p>
                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Ruby Thu Đoàn</i></p>
                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> thu.doan@htauto.vn</p>
            </div>
        </div>
    </div>
</div>
<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Vũ Thị Phượng</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Victoria Phượng Vũ</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> phuong.vu@htauto.vn</p>
        </div>
    </div>
</div>
</div>
<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Đinh Thúy Quỳnh</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Quinn Quỳnh Đinh</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> quynh.dinh@htauto.vn</p>
        </div>
    </div>
</div>
</div>
<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Trần Văn Bình</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Henry Bình Trần</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> binh.tran@htauto.vn</p>
        </div>
    </div>
</div>
</div>

<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Ngô Tùng Dương</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Leonard Dương Ngô</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> duong.ngo@htauto.vn</p>
        </div>
    </div>
</div>
</div>

<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Đặng Quốc Huy</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Pause Huy Đặng</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> huy.dang@htauto.vn</p>
        </div>
    </div>
</div>
</div>

<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Nguyễn Minh Thúy</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Gigi Thúy Nguyễn</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> thuy.nguyen@htauto.vn</p>
        </div>
    </div>
</div>
</div>

<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Bùi Thị Hường</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Helen Hường Bùi</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> huong.bui@htauto.vn</p>
        </div>
    </div>
</div>
</div>
<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Ngô Hiền Minh</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Mee Minh Ngô</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> minh.ngo@htauto.vn</p>
        </div>
    </div>
</div>
</div>
<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Nguyễn Thị Tám</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Lucky Tam Nguyễn</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> tam.nguyen@htauto.vn</p>
        </div>
    </div>
</div>
</div>
<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn phụ tùng</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Nguyễn Thu Trang</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Similac Trang Nguyễn</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Phụ tùng</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> trang.nguyen@htauto.vn</p>
        </div>
    </div>
</div>
</div>
<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Trợ Lý Phòng Tư Vấn</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/0.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Trần Thanh Huyền</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Mun Huyền Trần</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người Trợ lý chuyên nghiệp</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> support@purestore.vn</p>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
