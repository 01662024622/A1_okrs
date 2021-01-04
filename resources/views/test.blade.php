<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Croppie - a simple javascript image cropper - Foliotek</title>

    <meta name="description" content="Croppie is an easy to use javascript image cropper.">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="Croppie - a javascript image cropper">
    <meta property="og:type" content="website">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="Stylesheet" type="text/css" href="/css/image/croppie.css"/>
</head>
<body>
<div class="container">
    <h2>Stacked form</h2>
    <form action="/action_page.php">
        <div class="form-group">
            <div id="image-preview"></div>
        </div>
        <div class="form-group">
            <input type="file" name="upload-image" id="upload-image">
        </div>
        <button id="crop_image" class="btn btn-primary">Submit</button>
        <div id="crop-image-div"></div>
    </form>
</div>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="/js/image/croppie.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var image= $('#image-preview').croppie({
        enableExif: true,
        viewport:{
            width:200,
            height:200,
            type:'circle'
        },
        boundary:{
            width: 300,
            height: 300
        }
    });
    $('#upload-image').change(function () {
        var reader = new FileReader();
        reader.onload=function (even){
            image.croppie('bind',{
                url:even.target.result
            }).then(function () {
                console.log('bind complier')
            });
        }
        reader.readAsDataURL(this.files[0])
    });
    $('#crop_image').click(function (e){
        e.preventDefault()
        // page.show();
        image.croppie('result',{
            type: 'canvas',
            size:'viewport'
        }).then(function (response) {
            console.log(response)
        })
    })
</script>
</body>
</html>
