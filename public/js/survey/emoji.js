var type = 0;
function changeLv(lv){
    type=lv;
    $('.container-action').addClass('hidden')
    $('.emoji-checked').addClass('hidden')
    $('.emoji').addClass('opacity-7')
    $('.emoji-'+lv).removeClass('opacity-7')
    $('.container-lv'+lv).removeClass('hidden')
    $('.check-emoji-'+lv).removeClass('hidden')
    if (lv>1){
        $('.container-note').removeClass('hidden')
    }
    $('#submit').addClass('opacity-7')
    $('#submit').prop('disabled',true)
    if (lv==2) {
        $('#submit').removeClass('opacity-7')
        $('#submit').prop('disabled',false)
    }
    $('#add-form')[0].reset()

    // $('input[name="improve[]"]:checked').attr('checked',false)
}
$('input[type="radio"]').on('change', function(e) {
    console.log(e.type);
    if ($('input[name="valid"]:checked').val()==0) {
        $('.container-note').removeClass('hidden')
    }
    else $('.container-note').addClass('hidden')
});



$(':input[type="checkbox"]').change(function () {
    if ($('input[name="improve[]"]:checked').length > 0) {
        $('#submit').removeClass('opacity-7')
        $('#submit').prop('disabled',false)
    } else {
        $('#submit').addClass('opacity-7')
        $('#submit').prop('disabled',true)
    }
});
$("#add-form").submit(function(e){
    e.preventDefault();
}).validate({
    rules: {

    },
    submitHandler: function(form) {
        var formData = new FormData(form);

        console.log(formData)
        $.ajax({
            url: form.action,
            type: form.method,
            data: formData,
            dataType:'json',
            async:false,
            processData: false,
            contentType: false,
            success: function(response) {
                setTimeout(function () {
                    toastr.success('has been added');
                },1000);
                $("#add-modal").modal('toggle');
                dataTable.ajax.reload();
            }, error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
            },
        });
    }
});
