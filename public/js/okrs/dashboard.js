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

var targetTable = $('#target-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: "GET",
            url: "/api/v1/user/targets/table?year=" + year.toString(),
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
                tdIdLevelBuffer = []
                kpiIdLevel = []
                json.data.forEach(element => {
                    targets.push(element['td_id'])
                    if (tdIdLevelBuffer[element['td_id']] === undefined) tdIdLevelBuffer[element['td_id']] = []
                    tdIdLevelBuffer[element['td_id']].push(element['level']);
                })
                loadResult(targets,json.input.year)
                $('.collapsed').on('click', function () {
                    $(this).toggleClass('fa-caret-right fa-caret-down')
                })
                $('input:radio[name=type]').change(function () {
                    $(this).parent().parent().find('.minus-container').toggleClass('hidden')
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
                $('#target-form')[0].reset();
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
$("#result-detail-form").submit(function (e) {
    e.preventDefault();
    page.show()
}).validate({
    rules: {
        number: {
            required: true,
            number: true,
            min:0,
            max:10
        },
    },
    messages: {
        number: {
            required: 'Bạn chưa nhập dữ liệu',
            number: 'Bạn chưa nhập dữ liệu',
            min:'Dữ liệu không hợp lệ',
            max:'Dữ liệu không hợp lệ'
        },
    },
    submitHandler: function (form) {
        page.show()
        var formData = new FormData(form);
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
                $('#result-detail-form')[0].reset();
                $('#result-date').datepicker('setDate', today)
                showDetailKpi(response)
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
}

function alDeleteResult(id) {
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
                    url: "/results/" + id,
                    success: function (res) {
                        if (!res.error) {
                            toastr.success('Thành công!');
                        }
                        $('#result-detail-col-' + id).remove();
                        showDetailKpi(res)
                        targetTable.ajax.reload();
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
}

var loadResult = function (kpi,year) {
    page.show()
    var kpiUrl = '';
    if (kpi.length > 0) {
        kpiUrl = '&kpis[]=' + kpi.join('&kpis[]=');
    }
    $.ajax({
        type: "get",
        url: "/api/v1/targets/kpis/table?year=" + year + kpiUrl,
        success: function (res) {
            $('.number-kpi-year').text('0');
            $('.total-kpi-month').text('0%');
            if (!res) {
                page.hide();
                return
            }
            res.data.forEach(element => {
                tdIdLevel[element.td_id] = tdIdLevelBuffer[element.td_id]
                $('#collapse-header-' + element['td_id']).after(genarateKpi(element))
            })
            var totalYear=0;
            var totalKpiYear=0;
            for (var month = 1; month <= kpiIdLevel.length; month++) {
                if (kpiIdLevel[month] === undefined) continue;
                //total level of tagert on month
                var totalLevelTg = 0

                //total number kpi of month
                var sumKpi = kpiIdLevel[month].reduce(function (total, accumulator, currentIndex) {
                    totalLevelTg = totalLevelTg + floatParse(tdIdLevel[currentIndex]);
                    return total + accumulator.length;
                }, 0)
                totalKpiYear=totalKpiYear+sumKpi;
                $('#number-kpi-month-' + month).text(sumKpi)
                var generalMonth = []
                for (var td_id = 1; td_id <= kpiIdLevel[month].length; td_id++) {
                    if (kpiIdLevel[month][td_id] === undefined) continue;
                    var sumLevelTd = kpiIdLevel[month][td_id].reduce(function (total, accumulator) {
                        return total + floatParse(accumulator[0]);
                    }, 0.00)
                    generalMonth[td_id] = kpiIdLevel[month][td_id].reduce(function (total, accumulator) {
                        return total + floatParse(accumulator[0]) * floatParse(accumulator[1]) / sumLevelTd;
                    }, 0.00)
                }
                var resultMonth = generalMonth.reduce(function (total, accumulator, currentIndex) {
                    return total + floatParse(tdIdLevel[currentIndex]) * floatParse(accumulator) / totalLevelTg;
                }, 0.00)
                totalYear=totalYear+floatParse(resultMonth);
                $('#total-kpi-month-' + month).text(floatParse(resultMonth) + '%')

            }
            totalYear=floatParse(totalYear)/floatParse(kpiIdLevel.length-1);
            $('#number-kpi-year-2021').text(totalKpiYear)
            $('#total-kpi-year-2021').text(totalYear+'%')

            page.hide()

        },
        error: function (xhr, ajaxOptions, thrownError) {
            page.hide()
            toastr.error(thrownError);
        }
    });
}

var generateTarget = function (element) {
    var months = []
    for (var i = 1; i <= date.getMonth() + 1; i++) {
        months[i] = `<span class="col kpi-month text-center">T` + i + `</span>`;
    }
    return `<div class="col-12 box-kpi">
            <div class="kpi-header row">
                <div class="col-10">
                    <i class="fa fa-caret-down collapsed" aria-hidden="true" data-toggle="collapse" data-target="#collapse-` + element['td_id'] + `"></i>
                    ` + element['name'] + ` - Mức độ quan trọng: <b>` + element['levelEdit'] + `</b>
                </div>
                <div class="col-2 text-right"><button type="button" class="btn btn-sm btn-link text-right" data-toggle="collapse" onclick="cancelKpi(` + element['id'] + `)" data-target="#collapse-action-` + element['id'] + `">Cấu hình <i class="fa fa-angle-down" aria-hidden="true"></i></button></div>

            </div>

            </div>
    </div>`;
}
var genarateKpi = function (element) {
    var results = []
    for (var i = 1; i <= date.getMonth() + 1; i++) {
        results[i] = `<span class="col kpi-month kpi-hover text-center kpi-hover-item-`
            + element['td_id'] + `" onclick="activeResult(` + element['id'] + `,` + i + `)">--</span>`;
    }
    if (element.results.length == 0) {
        tdIdLevel[element.td_id] = tdIdLevelBuffer[element.td_id]
    } else {
        element.results.forEach(ele => {
            if (kpiIdLevel[ele.month] === undefined) kpiIdLevel[ele.month] = []
            if (kpiIdLevel[ele.month][element.td_id] === undefined) kpiIdLevel[ele.month][element.td_id] = []
            kpiIdLevel[ele.month][element.td_id].push([element.level, ele.result]);
            results[ele.month] = `<span class="col kpi-month kpi-hover text-center kpi-hover-item-`
                + element['td_id'] + `" onclick="setResultMothKpi(` + ele['id'] + `)"
data-toggle="modal" data-target="#set-result-month-modal"
>` + ele['result'] + `</span>`
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
                ` + element['levelEdit'] + `
            </div>
        </div>
        <div class="col-1">` + element['type'] + `</div>
        <div class="col-6 row">` + results.join('') + `
        </div>
    </div>`;
}

function selectCheckboxKpi(id) {
    $('.kpi-hover-item-' + id).removeClass('kpi-hover')
    $('#add-kpi-' + id).removeClass('show')
    $('#cancel-kpi-' + id).addClass('show')
    // $('#remove-kpi-' + id).removeClass('show')
    $('#select-kpi-' + id).removeClass('show')
    $('#select-all-kpi-' + id).addClass('show')
    $('#un-select-all-kpi-' + id).addClass('show')
    $('.checkbox-kpi-' + id).addClass('show').prop('checked', false)
}

function cancelKpi(id, check = false) {
    $('.kpi-hover-item-' + id).addClass('kpi-hover')
    $('#add-kpi-' + id).addClass('show')
    $('#cancel-kpi-' + id).removeClass('show')
    $('#remove-kpi-' + id).removeClass('show')
    $('#select-kpi-' + id).addClass('show')
    $('#select-all-kpi-' + id).removeClass('show')
    $('#un-select-all-kpi-' + id).removeClass('show')
    $('.checkbox-kpi-' + id).removeClass('show').prop('checked', false)
    $('#add-kpi-container-' + id).addClass('hidden')
    if (check) $('#collapse-action-' + id).addClass('show')
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

function checkboxKpiChange(id) {
    if ($('.checkbox-kpi-' + id + ':checkbox:checked').length > 0) {
        $('#remove-kpi-' + id).addClass('show')
    } else {
        $('#remove-kpi-' + id).removeClass('show')
    }
}

function removeKpi(id) {
    page.show()
    $.ajax({
        url: '/kpis/create/?' + $('#target-kpi-form-' + id).serialize(),
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

function activeResult(idKpi, month) {
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
                        kpi_id: idKpi,
                        month: month,
                        year: $('#date').val(),
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
}


function floatParse(float, fractionDigits = 2) {
    return parseFloat(parseFloat(float).toFixed(fractionDigits));
}

function addKpi(id) {
    $('#minus-container-' + id).addClass('hidden')
    $('#kpis-form-' + id)[0].reset();
    $('#type-default' + id).attr('checked', true)
    $('#add-kpi-container-' + id).removeClass('hidden')
    $('#collapse-action-' + id).removeClass('show')
}

function setValidateFormKpi(id) {
    $("#kpis-form-" + id).submit(function (e) {
        e.preventDefault();
    }).validate({
        rules: {
            level: {
                required: true
            },
            name: {
                required: true
            },
            minus: {
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
            minus: {
                required: 'Bạn chưa nhập dữ liệu'
            },
        },
        submitHandler: function (form) {
            page.show()
            var formData = new FormData(form);
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
                    addKpi(id)
                    var results = []
                    for (var i = 1; i <= date.getMonth() + 1; i++) {
                        results[i] = `<span class="col kpi-month kpi-hover text-center kpi-hover-item-`
                            + response['td_id'] + `" onclick="activeResult(` + response['id'] + `,` + i + `)">--</span>`;
                    }
                    var html = `<div class="row kpi-detail" id="kpi-detail-` + response['id'] + `">

        <div class="col-5 row">
            <div class="col-10 title-kpi kpi-hover kpi-hover-item-` + response['td_id'] + `"
                 title="` + response['name'] + `">
                 <div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input checkbox-kpi checkbox-kpi-` + response['td_id'] + `" value="` + response['id'] + `" name="kpis[]" onchange="checkboxKpiChange(` + response['td_id'] + `)"> &nbsp;` + response['name'] + `
  </label>
</div>
                </div>
            <div class="col-2 text-center">
                ` + response['levelEdit'] + `
            </div>
        </div>
        <div class="col-1">` + response['typeEdit'] + `</div>
        <div class="col-6 row">` + results.join('') + `
        </div>
    </div>`;
                    $('#collapse-header-' + id).after(html)
                    // targetTable.ajax.reload()
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
    })
}

function submitKpi(id) {
    console.log(id)
    setValidateFormKpi(id)
    $('#kpis-form-' + id).submit();
}

function setResultMothKpi(id) {
    page.show()
    $.ajax({
        type: "GET",
        url: "/results/" + id,
        success: function (res) {
            showDetailKpi(res)
            $('#eid-krs').val(res.id)
            page.hide()
        },
        error: function (xhr, ajaxOptions, thrownError) {
            page.hide()
            toastr.error(thrownError);
        }
    });
}

$('#user_id').on('change', function () {
    targetTable.ajax.url("/api/v1/targets/table?user_id=" + $('#user_id').val() + "&year=" + $('#date').val()).load()
})
$('#date').on('change', function () {
    targetTable.ajax.url("/api/v1/targets/table?user_id=" + $('#user_id').val() + "&year=" + $('#date').val()).load()
})

function showDetailKpi(res) {
    $('#name-kpi').text(res.name)
    $('#detail-kpi-show').html(`<b for="name">Độ khó: </b>` + res.levelEdit +
        ` | <b for="name">Tháng: </b><span id="kpi-detail-month">` + res.month + `</span>` +
        ` | <b for="name">Loại: </b>` + res.typeEdit
    )
    $('#result-kpi-detail').val(res.result)
    if (res.type == 0) {
        $('#modal-set-width').css('max-width', '750px')
        $('#detail-container-modal').removeClass('col-4').addClass('col-12')
        $('#result-container-modal').hide()
        $('#result-kpi-detail').prop('disabled', false)
    } else {
        $('#modal-set-width').css('max-width', '1200px')
        $('#detail-container-modal').addClass('col-4').removeClass('col-12')
        $('#result-container-modal').show()
        $('#result-kpi-detail').prop('disabled', true)
        var html = '<thead><tr><th>ID</th><th>Ngày vi phạm</th><th>Mô tả</th><th>Số lần</th><th>Hành Động</th>' +
            '</tr></thead><tbody>';
        res.result_details.forEach(function (element,index) {
            html = html + `<tr id="result-detail-col-` + index + `" role="row" class="odd"><td>` + (index+1) + `</td><td>` + element.date + `</td><td>` + element.description + `</td><td>` + element.number + `</td><td>
<button type="button" class="btn btn-xs btn-danger" onclick="alDeleteResult(` + element.id + `)">
<i class="fa fa-trash" aria-hidden="true"></i></button>
</td></tr>`
        })
        html = html + '</tbody>';
        $('#results-table').html(html)

    }
}
function saveResult(){
    $.ajax({
        type: "POST",
        url: "/kpi/results",
        data: {
            id: $('#eid-krs').val(),
            result: $('#result-kpi-detail').val()
        },
        success: function (res) {
            if (!res.error) {
                toastr.success('Thay đổi thành công!');
            }
            $('#set-result-month-modal').modal('hide');
            targetTable.ajax.reload()
        },
        error: function (xhr, ajaxOptions, thrownError) {
            page.hide()
            toastr.error(thrownError);
        }
    })
}
function removeResult(){
    swal({
            title: "Bạn muốn xóa bỏ kết quả này?",
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
                    url: "/kpi/results/" + $('#eid-krs').val(),
                    success: function (res) {
                        if (!res.error) {
                            toastr.success('Thành công!');
                            $('#set-result-month-modal').modal('hide');
                            targetTable.ajax.reload()
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
}

