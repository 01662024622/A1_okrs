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
    <h1 style="text-align: center">Sơ đồ tổ chức nhân sự phòng kế toán</h1>
    <div id="wrapper">
        <div class="label-entry row" style="padding-right: 0">
            <div class="col-12"><a href="/user-t1">Kế toán trưởng</a></div>
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
            <div class="entry sole">
                <div class="label-entry row" style="padding-right: 0">
                    <div class="col-12"><a href="/user-t1"></a>Phó phòng Kế Toán</div>
                    <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                        <div class="col-4" style="padding: 0">
                            <img src="/0.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-8"
                        style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Đào Thị Khuyên</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Valerie Khuyên Đào</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Chuyên gia Quản lý Tiền và Tài sản</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> khuyen.dao@htauto.vn</p>
                    </div>
                </div>
            </div>
            <div class="branch lv2">
                <div class="entry">
                    <div class="label-entry row" style="padding-right: 0">
                        <div class="col-12"><a href="/user-t1"></a>Chuyên viên Kế toán Thuế</div>
                        <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                            <div class="col-4" style="padding: 0">
                                <img src="/0.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-8"
                            style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                            <p><i class="fa fa-user" aria-hidden="true"></i> Vũ Thị Hạnh</p>
                            <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Helen Hạnh Vũ</i></p>
                            <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người Yêu số liệu Kế toán</i></p>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i> ketoan@htauto.com.vn</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="entry">
                <div class="label-entry row" style="padding-right: 0">
                    <div class="col-12"><a href="/user-t1"></a>Chuyên viên Kế toán Thuế</div>
                    <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                        <div class="col-4" style="padding: 0">
                            <img src="/0.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-8"
                        style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Hà Thị Bình</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Marie Bình Hà</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người Yêu số liệu Kế toán</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> ketoan@aspgroup.vn</p>
                    </div>
                </div>
            </div>
        </div>
            <div class="entry">
                <div class="label-entry row" style="padding-right: 0">
                    <div class="col-12"><a href="/user-t1"></a>Thủ Quỹ</div>
                    <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                        <div class="col-4" style="padding: 0">
                            <img src="/0.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-8"
                        style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Hoàng Thị Kim Loan</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Margaret Loan Hoàng</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người bảo tồn Kho báu</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> ketoan2@htauto.com.vn</p>
                    </div>
                </div>
            </div>
        </div>
            <div class="entry">
                <div class="label-entry row" style="padding-right: 0">
                    <div class="col-12"><a href="/user-t1"></a>Chuyên viên Kế toán Ngân hàng</div>
                    <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                        <div class="col-4" style="padding: 0">
                            <img src="/0.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-8"
                        style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Trần Thùy Linh</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Elie Linh Trần</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người giao dịch Tài chính</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> linh.tran@htauto.vn</p>
                    </div>
                </div>
            </div>
        </div>
            <div class="entry">
                <div class="label-entry row" style="padding-right: 0">
                    <div class="col-12"><a href="/user-t1"></a>Chuyên viên Kế toán CN & Chi phí</div>
                    <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                        <div class="col-4" style="padding: 0">
                            <img src="/0.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-8"
                        style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Phạm Thị Tú</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Vivian Tú Phạm</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người tầm soát Chi tiêu</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> ketoan2@htauto.com.vn</p>
                    </div>
                </div>
            </div>
        </div>
            <div class="entry">
                <div class="label-entry row" style="padding-right: 0">
                    <div class="col-12"><a href="/user-t1"></a>Chuyên viên Kế toán Thanh toán</div>
                    <div class="col-12 row" style="margin-right: 0;padding-right: 0">
                        <div class="col-4" style="padding: 0">
                            <img src="/0.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-8"
                        style="font-size: 10px;text-align: left;padding-right: 0;margin-right: 0px">
                        <p><i class="fa fa-user" aria-hidden="true"></i> Phạm Minh Trang</p>
                        <p><i class="fa fa-user-plus" aria-hidden="true"></i> <i style="font-size: 8px">Moana Trang Phạm</i></p>
                        <p style="font-size: 8px;"><i class="fa fa-rss" aria-hidden="true"></i> <i>Người tầm soát Chi tiêu</i></p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> ketoantt@htauto.com.vn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
