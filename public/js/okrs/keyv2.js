$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var date = new Date();
var today = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear()
var year = date.getFullYear()
var targets = []
var tdIdLevelBuffer = []
var tdIdLevel = []
var kpiIdLevel = []
$('#date').datepicker({
    startView: "years",
    minViewMode: "years",
    maxViewMode: "years",
    format: "yyyy",
    startDate: "2020",
    endDate: new Date(),
}).on('changeMonth', function (e) {
    $(e.currentTarget).data('datepicker').hide();
});

$('#date').datepicker('setDate', year.toString())

$('.collapsed').on('click', function () {
    $(this).toggleClass('fa-caret-right fa-caret-down')
})
var targetTable = $('#target-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: "GET",
            url: "/api/v1/targets/table?user_id=" + $('#user_id').val() + "&year=" + $('#date').val(),
            error: function (xhr, ajaxOptions, thrownError) {
                if (xhr != null) {
                    if (xhr.responseJSON != null) {
                        if (xhr.responseJSON.errors != null) {
                            if (xhr.responseJSON.errors.permission != null) {
                                location.reload();
                            }
                        }
                    }
                }
            }, dataSrc: function (json) {
                targets = []
                $('#target-table').css('width', '100%')
                var html = '';
                var targetHtml = ''
                json.data.forEach(element => {
                    html = html + `<div class="row">
                            <div class="col-10">` + element['name'] + `</div>
                            <div class="col-2">`;
                    if (element['user_id'] == $('#user_id').val()) {
                        targetHtml = targetHtml + generateTarget(element)
                        targets.push(element['td_id'])
                        if (tdIdLevelBuffer[element['td_id']]===undefined) tdIdLevelBuffer[element['td_id']]=[]
                        tdIdLevelBuffer[element['td_id']].push(element['level']);
                        html = html + `<input type="checkbox" name="data[]" class="form-check-input" value="` + element['id'] + `" checked></div>
            </div>`;
                    } else html = html + `<input type="checkbox" name="data[]" class="form-check-input" value="` + element['id'] + `"></div>
            </div>`;
                })
                $('#kpi-target').html(html)
                loadResult(targets)
                $('#kpi').html(targetHtml)
                $('.collapsed').on('click', function () {
                    $(this).toggleClass('fa-caret-right fa-caret-down')
                })
                return json.data;
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'levelEdit', name: 'levelEdit'},
            {data: 'action', name: 'action'},
        ],
        oLanguage: {
            "sProcessing": "Đang xử lý...",
            "sLengthMenu": "Xem _MENU_ mục",
            "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
            "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
            "sInfoFiltered": "(được lọc từ _MAX_ mục)",
            "sInfoPostFix": "",
            "sSearch": "Tìm Kiếm: ",
            "sUrl": "",
            "oPaginate": {
                "sFirst": " Đầu ",
                "sPrevious": " Trước ",
                "sNext": " Tiếp ",
                "sLast": " Cuối "
            }
        }

    })
;

$("#target-form").submit(function (e) {
    e.preventDefault();
    page.show()
}).validate({
    rules: {
        level: {
            required: true
        },
        name: {
            required: true
        },
    },
    messages: {
        level: {
            required: "Dữ liệu không hợp lệ"
        },
        name: {
            required: 'Bạn chưa nhập dữ liệu'
        },
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        formData.append('year', $('#date').val());
        $.ajax({
            url: form.action,
            type: form.method,
            data: formData,
            dataType: 'json',
            async: false,
            processData: false,
            contentType: false,
            success: function (response) {
                setTimeout(function () {
                    toastr.success('Thêm mới mục tiêu thành công!');
                }, 1000);
                targetTable.ajax.reload()
            }, error: function (xhr, ajaxOptions, thrownError) {
                page.hide()
                if (xhr != null) {
                    if (xhr.responseJSON != null) {
                        if (xhr.responseJSON.message != null) {
                            toastr.error(xhr.responseJSON.message);
                        }
                    }
                }

            },
        });
    }
});
$("#target-kpi-form").submit(function (e) {
    e.preventDefault();
    page.show()
}).validate({
    submitHandler: function (form) {
        var formData = new FormData(form);
        formData.append('year', $('#date').val());
        formData.append('user_id', $('#user_id').val());
        $.ajax({
            url: form.action,
            type: form.method,
            data: formData,
            dataType: 'json',
            async: false,
            processData: false,
            contentType: false,
            success: function (response) {
                targetTable.ajax.reload()
                setTimeout(function () {
                    toastr.success('Cập nhật danh sách mục tiêu thành công!');
                }, 1000);
                page.hide()
            }, error: function (xhr, ajaxOptions, thrownError) {
                page.hide()
                if (xhr != null) {
                    if (xhr.responseJSON != null) {
                        if (xhr.responseJSON.message != null) {
                            toastr.error(xhr.responseJSON.message);
                        }
                    }
                }

            },
        });
    }
});


// Delete function
function alDeleteTarget(id) {
    swal({
            title: "Bạn muốn xóa bỏ KRs này?",
            // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonText: "Không",
            confirmButtonText: "Có",
            // closeOnConfirm: false,
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "delete",
                    url: "/targets/" + id,
                    success: function (res) {
                        if (!res.error) {
                            toastr.success('Thành công!');
                            $('#target-' + id).remove();
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        page.hide()
                        toastr.error(thrownError);
                    }
                });
            } else {
                toastr.error("Hủy bỏ thao tác!");
            }
        });
};
var loadResult = function (kpi) {
    page.show()
    var kpiUrl = '';
    if (kpi.length > 0) {
        kpiUrl = '&kpis[]=' + kpi.join('&kpis[]=');
    }
    $.ajax({
        type: "get",
        url: "/api/v1/targets/kpis/table?user_id=" + $('#user_id').val() + "&year=" + $('#date').val() + kpiUrl,
        success: function (res) {
            res.data.forEach(element => {
                tdIdLevel[element.td_id]=tdIdLevelBuffer[element.td_id]
                $('#collapse-header-' + element['td_id']).after(genarateKpi(element))
            })
            for (var month =1; month<=kpiIdLevel.length;month++){
                if (kpiIdLevel[month]===undefined) continue;
                //total level of tagert on month
                var totalLevelTg=0

                //total number kpi of month
                var sumKpi=kpiIdLevel[month].reduce(function(total,accumulator,currentIndex) {
                    totalLevelTg=totalLevelTg+floatParse(tdIdLevel[currentIndex]);
                    return total + accumulator.length;
                },0)
                $('#number-kpi-month-'+month).text(sumKpi)
                var generalMonth=[]
                for (var td_id =1; td_id<=kpiIdLevel[month].length;td_id++){
                    if (kpiIdLevel[month][td_id]===undefined) continue;
                    var sumLevelTd=kpiIdLevel[month][td_id].reduce(function(total,accumulator) {
                        return total + floatParse(accumulator[0]);
                    },0.00)
                    generalMonth[td_id]=kpiIdLevel[month][td_id].reduce(function(total,accumulator) {
                        console.log(total)
                        return total + floatParse(accumulator[0])*floatParse(accumulator[1])/sumLevelTd;
                    },0.00)
                }
                var resultMonth = generalMonth.reduce(function(total,accumulator,currentIndex) {
                    return total + floatParse(tdIdLevel[currentIndex])*floatParse(accumulator)/totalLevelTg;
                },0.00)
                $('#total-kpi-month-'+month).text(floatParse(resultMonth)+'%')

            }
            page.hide()

        },
        error: function (xhr, ajaxOptions, thrownError) {
            page.hide()
            toastr.error(thrownError);
        }
    });
}

var generateTarget = function (element) {
    var months=[]
    for (var i = 1; i<=date.getMonth()+1;i++){
        months[i]=`<span class="col kpi-month text-center">T`+i+`</span>`;
    }
    return `<div class="col-12 box-kpi">
<form action="GET" method="/kpis/create" id="target-kpi-form-`+element['id']+`">
            <div class="kpi-header row">
            <div class="col-10">
<i class="fa fa-caret-down collapsed" aria-hidden="true" data-toggle="collapse" data-target="#collapse-` + element['td_id'] + `"></i>
                ` + element['name'] + ` - Mức độ quan trọng: <b>` + element['levelEdit'] + `</b>
</div>
<div class="col-2 text-right"><button type="button" class="btn btn-sm btn-link text-right" data-toggle="collapse" on onclick="cancelKpi(` + element['id'] + `)" data-target="#collapse-action-` + element['id'] + `">Cấu hình <i class="fa fa-angle-down" aria-hidden="true"></i></button></div>

            </div>
            <div id="collapse-` + element['td_id'] + `" class="kpi-body collapse show">
                <div id="collapse-action-` + element['id'] + `" class="collapse">
                    <button type="button" class="btn btn-sm btn-link btn-kpi-action show" onclick="addKpi(` + element['td_id'] + `)" id="add-kpi-` + element['td_id'] + `" data-toggle="modal" data-target="#add-modal">Thêm mới</button>
                    <button type="button" class="btn btn-sm btn-link btn-kpi-action show" onclick="selectCheckboxKpi(` + element['td_id'] + `)" id="select-kpi-` + element['td_id'] + `">Chọn</button>
                    <button type="button" class="btn btn-sm btn-link btn-kpi-action" onclick="selectAllCheckboxKpi(` + element['td_id'] + `)" id="select-all-kpi-` + element['td_id'] + `">Chọn Tất cả</button>
                    <button type="button" class="btn btn-sm btn-link btn-kpi-action" onclick="unSelectAllCheckboxKpi(` + element['td_id'] + `)" id="un-select-all-kpi-` + element['td_id'] + `">Bỏ chọn Tất cả</button>
                    <button type="button" class="btn btn-sm btn-link btn-kpi-action" onclick="removeKpi(` + element['td_id'] + `)" id="remove-kpi-` + element['td_id'] + `">Xóa</button>
                    <button type="button" class="btn btn-sm btn-link btn-kpi-action" onclick="cancelKpi(` + element['td_id'] + `)" id="cancel-kpi-` + element['td_id'] + `">Hủy </button>
                </div>
                <div id="collapse-header-` + element['td_id'] + `"class="row kpi-detail kpi-header-title">
                    <div class="col-5 text-bold row">
                        <div class="col-10">KPI</div>
                        <div class="col-2">Độ khó</div>
                    </div>
                    <div class="col-1 text-bold">Loại</div>
                    <div class="col-6 text-bold row">
                        `+months.join('')+`
                    </div>
                </div>
            </div>
            </form>
        </div>`;
}
var genarateKpi = function (element) {
    var results=[]
    for (var i = 1; i<=date.getMonth()+1;i++){
        results[i]=`<span class="col kpi-month kpi-hover text-center kpi-hover-item-`
            + element['td_id'] + `" onclick="activeResult(` + element['id'] + `,`+i+`)">--</span>`;
    }
    if (element.results.length==0){
        tdIdLevel[element.td_id]=tdIdLevelBuffer[element.td_id]
    }
    else {
    element.results.forEach(ele=>{
        if (kpiIdLevel[ele.month]===undefined) kpiIdLevel[ele.month]=[]
        if (kpiIdLevel[ele.month][element.td_id]===undefined) kpiIdLevel[ele.month][element.td_id]=[]
        kpiIdLevel[ele.month][element.td_id].push([element.level,ele.result]);
        results[ele.month]=`<span class="col kpi-month kpi-hover text-center kpi-hover-item-`
            + element['td_id'] + `" onclick="setResultMothKpi(` + ele['id'] +`"
data-toggle="modal" data-target="#set-result-month-modal"
>`+ele['result']+`</span>`
    })
    }
    return `<div class="row kpi-detail" id="kpi-detail-` + element['id'] + `">

        <div class="col-5 row">
            <div class="col-10 title-kpi kpi-hover kpi-hover-item-` + element['td_id'] + `"
                 title="` + element['name'] + `">
                 <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input checkbox-kpi checkbox-kpi-` + element['td_id'] + `" value="` + element['id'] + `" name="kpis[]" onchange="checkboxKpiChange(` + element['td_id'] + `)"> &nbsp;` + element['name'] + `
  </label>
</div>
                </div>
            <div class="col-2 text-center">
                `+element['levelEdit']+`
            </div>
        </div>
        <div class="col-1">` + element['type'] + `</div>
        <div class="col-6 row">`+results.join('')+`
        </div>
    </div>`;
}

function selectCheckboxKpi(id) {
    $('.kpi-hover-item-'+id).removeClass('kpi-hover')
    $('#add-kpi-' + id).removeClass('show')
    $('#cancel-kpi-' + id).addClass('show')
    // $('#remove-kpi-' + id).removeClass('show')
    $('#select-kpi-' + id).removeClass('show')
    $('#select-all-kpi-' + id).addClass('show')
    $('#un-select-all-kpi-' + id).addClass('show')
    $('.checkbox-kpi-' + id).addClass('show').prop('checked', false)
}
function cancelKpi(id){
    $('.kpi-hover-item-'+id).addClass('kpi-hover')
    $('#add-kpi-' + id).addClass('show')
    $('#cancel-kpi-' + id).removeClass('show')
    $('#remove-kpi-' + id).removeClass('show')
    $('#select-kpi-' + id).addClass('show')
    $('#select-all-kpi-' + id).removeClass('show')
    $('#un-select-all-kpi-' + id).removeClass('show')
    $('.checkbox-kpi-' + id).removeClass('show').prop('checked', false)
}
function addKpi(id){
}

// select-kpi-
// select-all-kpi-

function selectAllCheckboxKpi(id) {
    $('.checkbox-kpi-' + id).prop('checked', true)
    checkboxKpiChange(id)
}

function unSelectAllCheckboxKpi(id) {
    $('.checkbox-kpi-' + id).prop('checked', false)
    checkboxKpiChange(id)
}

function checkboxKpiChange(id){
    if ($('.checkbox-kpi-' + id + ':checkbox:checked').length > 0) {
        $('#remove-kpi-' + id).addClass('show')
    } else {
        $('#remove-kpi-' + id).removeClass('show')
    }
}
function removeKpi(id){
    page.show()
    $.ajax({
        url: '/kpis/create/?'+$('#target-kpi-form-'+id).serialize(),
        type: 'GET',
        success: function (response) {
            targetTable.ajax.reload()
            setTimeout(function () {
                toastr.success('Xóa thành công!');
            }, 1000);
        }, error: function (xhr, ajaxOptions, thrownError) {
            page.hide()
            if (xhr != null) {
                if (xhr.responseJSON != null) {
                    if (xhr.responseJSON.message != null) {
                        toastr.error(xhr.responseJSON.message);
                    }
                }
            }

        },
    });
}
function activeResult(idKpi,month){
        swal({
                title: "Bạn chắc chắn muốn kích hoạt kpi?",
                // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Không",
                confirmButtonText: "Có",
                // closeOnConfirm: false,
            },
            function (isConfirm) {
                if (isConfirm) {
                    page.show()
                    $.ajax({
                        type: "POST",
                        url: "/kpi/results",
                        data: {
                            kpi_id : idKpi,
                            month : month,
                            year : $('#date').val(),
                        },
                        success: function (res) {
                            if (!res.error) {
                                toastr.success('Kích hoạt hành công!');
                            }
                            targetTable.ajax.reload()
                            // page.hide()
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            page.hide()
                            toastr.error(thrownError);
                        }
                    });
                } else {
                    toastr.error("Hủy bỏ thao tác!");
                }
            });
    // $.ajax({
    //     type: "get",
    //     url: "/kpi/results/create?kpi_id="+idKpi+"&month="+month+"&year="+$('#date').val(),
    //     success: function (res) {
    //         var level ='';
    //         if (res.level == 2) level= 'Bình thường(<i class="fa fa-square" style="color: green" aria-hidden="true"></i>)';
    //         else if (res.level == 4) level= 'Cố gắng(<i class="fa fa-square" style="color: yellow" aria-hidden="true"></i>)';
    //         else if (res.level == 6) level= 'Trọng tâm(<i class="fa fa-square" style="color: orange" aria-hidden="true"></i>)';
    //     else level= 'Thách thức(<i class="fa fa-square" style="color: red" aria-hidden="true"></i>)';
    //         $('#detail-kpi-show').html(`<b for="name">Độ khó: </b>
    //                             `+level+`
    //                             <b for="name">Tháng: </b><span id="kpi-detail-month">`+month+`</span>`)
    //         $('#name-kpi').text(res.name)
    //         if (res.type==0){
    //             $('#result-kpi-detail').prop('disabled', false);
    //         }else $('#result-kpi-detail').prop('disabled', true);
    //         page.hide()
    //     },
    //     error: function (xhr, ajaxOptions, thrownError) {
    //         page.hide()
    //         toastr.error(thrownError);
    //     }
    // });
}
function setResultMothKpi(idResult){
    // $.ajax({
    //     type: "get",
    //     url: "/kpi/results/create?kpi_id="+idKpi+"&month="+month+"&year="+$('#date').val(),
    //     success: function (res) {
    //         var level ='';
    //         if (res.level == 2) level= 'Bình thường(<i class="fa fa-square" style="color: green" aria-hidden="true"></i>)';
    //         else if (res.level == 4) level= 'Cố gắng(<i class="fa fa-square" style="color: yellow" aria-hidden="true"></i>)';
    //         else if (res.level == 6) level= 'Trọng tâm(<i class="fa fa-square" style="color: orange" aria-hidden="true"></i>)';
    //     else level= 'Thách thức(<i class="fa fa-square" style="color: red" aria-hidden="true"></i>)';
    //         $('#detail-kpi-show').html(`<b for="name">Độ khó: </b>
    //                             `+level+`
    //                             <b for="name">Tháng: </b><span id="kpi-detail-month">`+month+`</span>`)
    //         $('#name-kpi').text(res.name)
    //         if (res.type==0){
    //             $('#result-kpi-detail').prop('disabled', false);
    //         }else $('#result-kpi-detail').prop('disabled', true);
    //         page.hide()
    //     },
    //     error: function (xhr, ajaxOptions, thrownError) {
    //         page.hide()
    //         toastr.error(thrownError);
    //     }
    // });
}
$(document).on('keydown', 'input[pattern]', function(e){
    var input = $(this);
    var oldVal = input.val();
    var regex = new RegExp(input.attr('pattern'), 'g');

    setTimeout(function(){
        var newVal = input.val();
        if(!regex.test(newVal)){
            input.val(oldVal);
        }
    }, 0);
});

function floatParse(float,fractionDigits=2){
    return parseFloat(parseFloat(float).toFixed(fractionDigits));
}
