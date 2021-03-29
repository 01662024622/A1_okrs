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
    <h1 style="text-align: center">Sơ đồ tổ chức nhân sự phòng marketing</h1>
    <div id="wrapper">
        <div class="label-entry row" style="padding-right: 0">
            <div class="col-12"><a href="/user-t1">Phó phòng marketing</a></div>
            <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                <div class="col-4" style="padding: 0">
                    <img src="/1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-8"
                style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                <p><i class="fa fa-user" aria-hidden="true"></i> Nguyễn Hải Đăng</p>
                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Brembo Hoàng Nguyễn</i></p>
                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên gia định hướng và PT Marketing</i></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> marketing@htauto.com.vn</p>
            </div>
        </div>
    </div>
    <div class="branch lv1">
        <div class="entry">
            <div class="label-entry row" style="padding-right: 0">
                <div class="col-12"><a href="/user-t1">Chuyên viên sáng tạo nội dung</a></div>
                <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                    <div class="col-4" style="padding: 0">
                        <img src="/0.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-8"
                    style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                    <p><i class="fa fa-user" aria-hidden="true"></i> Nguyễn Thị Lam Giang</p>
                    <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Linnea Giang Nguyễn</i></p>
                    <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Tổng biên tập nội dung Marketing</i></p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> giang.nguyen@htauto.vn</p>
                </div>
            </div>
        </div>
    </div>
    <div class="entry">
        <div class="label-entry row" style="padding-right: 0">
            <div class="col-12"><a href="/user-t1">Chuyên viên tư vấn dầu</a></div>
            <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                <div class="col-4" style="padding: 0">
                    <img src="/1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-8"
                style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                <p><i class="fa fa-user" aria-hidden="true"></i> Nguyễn Anh Quý</p>
                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Ray Quý Nguyễn</i></p>
                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên sản xuất media</i></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> quy.nguyen@htauto.vn</p>
            </div>
        </div>
    </div>
</div>
    <div class="entry">
        <div class="label-entry row" style="padding-right: 0">
            <div class="col-12"><a href="/user-t1">Chuyên viên Digital Marketing</a></div>
            <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                <div class="col-4" style="padding: 0">
                    <img src="/0.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-8"
                style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                <p><i class="fa fa-user" aria-hidden="true"></i> Nguyễn Thu Trang</p>
                <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Roy Trang Nguyễn</i></p>
                <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người hùng Digital</i></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> trang.nguyen@htauto.vn</p>
            </div>
        </div>
    </div>
</div>
<div class="entry">
    <div class="label-entry row" style="padding-right: 0">
        <div class="col-12"><a href="/user-t1">Chuyên viên Thiết kế Đồ họa</a></div>
        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
            <div class="col-4" style="padding: 0">
                <img src="/1.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-8"
            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
            <p><i class="fa fa-user" aria-hidden="true"></i> Đinh Bảo Trung</p>
            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Louis Trung Đinh</i></p>
            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên viên Tư vấn Dầu, Phụ gia, Nước mát</i></p>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> trung.dinh@htauto.vn</p>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
