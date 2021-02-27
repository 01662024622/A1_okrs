<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HTAuto</title>
    <link rel="shortcut icon" href="../../../public/crop-logo.png">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"
          rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/css/review360/intergration.css">
    <link rel="stylesheet" type="text/css" href="/css/survey/index.css">
</head>
<body>
<form action="/customer/feedback/report" method="post" id="add-form">
    @csrf
    <main class="page payment-page">
        <section class="payment-form dark">

            <div class="container-form" style="border-top: 0px!important;">
                <div class="header-logo" style="height: 40px;line-height: 40px">
                    <img src="../../../public/htautoz.png" style="height: 35px;width: auto">
                </div>
                <div class="card-details">
                    <p style="font-size: 1.1rem">
                        Nhằm cải thiện và nâng cao chất lượng dịch vụ. HTAUTO mong muốn được lắng nghe các ý kiến được
                        phản hồi từ khách hàng. Rất mong Quý khách đánh giá trải nghiệm mua hàng tại HTAuto Việt Nam
                        (nhấn chọn biểu tượng cảm xúc để đánh giá). Trân trọng!
                    </p>
                    <div class="row">
                        <div class="col-4 text-center" onclick="changeLv(3)">
                            <div class="emoji opacity-7 emoji-3">
                                <div class="emoji-checked hidden check-emoji-3">&#9989;</div>
                                &#128543;
                            </div>
                            <div class="text-emoji">Không hài Lòng</div>
                        </div>
                        <div class="col-4 text-center" onclick="changeLv(2)">
                            <div class="emoji opacity-7 emoji-2">
                                <div class="emoji-checked hidden check-emoji-2">&#9989;</div>
                                &#128529;
                            </div>
                            <div class="text-emoji">Bình thường</div>
                        </div>
                        <div class="col-4 text-center" onclick="changeLv(1)">
                            <div class="emoji opacity-7 emoji-1">
                                <div class="emoji-checked hidden check-emoji-1">&#9989;</div>
                                &#128522;
                            </div>
                            <div class="text-emoji">Hài lòng</div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row container-action hidden container-lv1">
                        <div class="col-12">
                            Quý khách có trải nghiệm đặc biệt thú vị cho lần mua sắm này không?
                            <br>
                            <br>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="valid" id="inlineRadio1"
                                       value="0" onchange="checkNote()">
                                <label class="form-check-label" for="inlineRadio1">Có</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="valid" id="inlineRadio2"
                                       value="1">
                                <label class="form-check-label" for="inlineRadio2">Không</label>
                            </div>
                        </div>
                    </div>
                    <div class="row container-action hidden container-lv3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Thái độ nhân viên bán hàng HTAuto
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Kiến thức tư vấn của nhân viên bán hàng
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Thời gian giao hàng
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Giá sản phẩm
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Mức độ đa dạng đủ của hàng hóa và đầy
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row container-action hidden container-lv2">
                        <div class="col-12">
                            Quý khách có thể đóng góp thêm ý kiến để chúng tôi cải thiện trải nghiệm mua hàng tuyệt vời
                            hơn?
                        </div>
                    </div>
                    <div class="row container-action hidden container-note">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="comment">Góp ý:</label>
                                <textarea class="form-control" rows="3" id="comment"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </section>
    </main>
</form>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
<!-- Page level plugins -->

<!-- Page level custom scripts -->
<script src="{{asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script src="{{ asset('/js/survey/emoji.js') }}"></script>

</body>
</html>
