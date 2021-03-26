var type = 0;
var data=[];
function changeLv(lv){
    console.log(lv)
    type=lv;
    $('.container-action').addClass('hidden')
    $('.emoji-checked').addClass('hidden')
    $('.emoji').addClass('opacity-7')
    $('.emoji-'+lv).removeClass('opacity-7')
    $('.container-lv').addClass('hidden')
    $('.container-lv'+lv).removeClass('hidden')
    $('.check-emoji-'+lv).removeClass('hidden')
    $('#submit').addClass('opacity-7')
    // $('input[name="improve[]"]:checked').attr('checked',false)
}

//
//
//
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

$('input[type="radio"]').on('change', function(e) {
    console.log(e.type);
    if ($('input[name="valid"]:checked').val()==0) {
        $('.container-note').removeClass('hidden')
    }
    else $('.container-note').addClass('hidden')
});
$('.checkbox-container').on('click',function (){
    if ($(this).hasClass('checkbox-checked')){
        $('.checkbox-'+$(this).data('type')).removeClass('hidden')
    }else {
        $('.checkbox-'+$(this).data('type')).addClass('hidden')
        $(this).removeClass('hidden')
    }
    $(this).toggleClass('checkbox-checked')
    $(this).find('.fa').toggleClass('fa-square-o').toggleClass('fa-check-square-o')
    if ($(this).data('option')===1||$(this).data('option')===0){
        $('.checkbox-special').removeClass('hidden')
    }
})
