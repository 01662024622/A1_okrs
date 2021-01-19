$(document).ready(function () {
    var date = new Date();
    var month = (date.getMonth()+1)+'/'+date.getFullYear()
    console.log(month)
    $('#date').datepicker({
        startView: "months",
        minViewMode: "months",
        maxViewMode: "years",
        format: "mm/yyyy",
        startDate: "10/2020",
        endDate: new Date(),
    }).on('changeMonth', function(e) {
        $(e.currentTarget).data('datepicker').hide();
    });
    $('#date').datepicker('setDate',month)
});
