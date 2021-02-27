function changeLv(lv){
    $('.container-action').addClass('hidden')
    $('.emoji-checked').addClass('hidden')
    $('.emoji').addClass('opacity-7')
    $('.emoji-'+lv).removeClass('opacity-7')
    $('.container-lv'+lv).removeClass('hidden')
    $('.check-emoji-'+lv).removeClass('hidden')
    if (lv>1){
        $('.container-note').removeClass('hidden')
    }
}
$('input[type="radio"]').on('change', function(e) {
    console.log(e.type);
    if ($('input[name="valid"]:checked').val()==0) $('.container-note').removeClass('hidden')
    else $('.container-note').addClass('hidden')
});
