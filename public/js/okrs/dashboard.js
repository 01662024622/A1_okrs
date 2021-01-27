var date = new Date();
var month = (date.getMonth() + 1) + '/' + date.getFullYear()
var today = date.getDate() + '/' + month
$('#date').datepicker({
    startView: "months",
    minViewMode: "months",
    maxViewMode: "years",
    format: "mm/yyyy",
    startDate: "10/2020",
    endDate: new Date(),
}).on('changeMonth', function (e) {
    $(e.currentTarget).data('datepicker').hide();
});
$('#date-result').datepicker({
    format: "dd/mm/yyyy",
    startDate: "01/10/2020",
    endDate: new Date(),
})
$('#date').datepicker('setDate', month)
$('#date-result').datepicker('setDate', today)

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var idOb = 0;
var headers = [];
var data=[];
$('#date').on('change', function () {
    dataTable.ajax.url("/api/v1/okrs/user/table?&month_year=" + $('#date').val()).load(initDatatable);
})
//____________________________________________________________________________________________________
var dataTable = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    paging: false,
    ajax: {
        type: "GET",
        url: "/api/v1/okrs/user/table?&month_year=" + $('#date').val(),
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
        },
        dataSrc: function (json) {
            headers = [];
            idOb = 0;
            data=json.data;
            return json.data;
        }

    },
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'percent', name: 'percent'},
        {data: 'result', name: 'result'},
        {data: 'action', name: 'action'},
    ],
    rowCallback: function (row, data, index) {
        console.log(data['id_obu'])
        if (data['id'] == null || data['id'] == '' || data['id'] == 'null') {
            $(row).html(('<td colspan="6">' + data["header"] + '</td>'))
            $(row).addClass('dtrg-group dtrg-start dtrg-level-0')
            return
        }
        if (data['id_obu'] != idOb) {
            idOb = data['id_obu'];
            headers[data['id']] = data['header']
        }
    },
    initComplete: initDatatable,

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

});

function initDatatable(settings, json) {
    headers.forEach(function (value, index) {
        $('#data-' + index).before('<tr class="dtrg-group dtrg-start dtrg-level-0"><td colspan="6">' + value + '</td></tr>')
    })
    var result = 0;
    data.forEach(element=>{
        if (element.result!='_'){
            result=result+(element.result*element.percent*element.ob_percent/10000)
        }
    })
    $('#users-table>tbody').append('<tr class="dtrg-group total"><td colspan="6"><div class="container-fluid">\n' +
        '        <div id="ob-target-1" class="float-left" style="    font-size: 16px;">OKRs đạt được là:</div>\n' +
        '        <div class="float-right">'+result+'%</div>\n' +
        '    </div></td></tr>')
}

function getInfoOB(id, percent) {
    var html =
        '<input type="text" value="' + percent + '" name="percent" maxlength="2">' +
        '<input type="hidden" value="' + id + '" name="object_id">' +
        ' <button class="btn btn-sm btn-info" type="submit">Lưu</button>';
    $('#ob-target-' + id).html(html);
}

$("#edit_ob").submit(function (e) {
    e.preventDefault();
    page.show()
}).validate({
    name: {
        percent: {
            number: true,
            min: 1,
            max: 100,
        },
    },
    messages: {
        percent: {
            number: "Dữ liệu không hợp lệ",
            min: "Lựa chọn của bạn chưa đúng",
            max: "Lựa chọn của bạn chưa đúng"
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        formData.append('user_id', $('#user_id').val());
        formData.append('month_year', $('#date').val());
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
                    toastr.success('Thêm mới thành công!');
                }, 1000);
                page.hide()
                clearForm();
                dataTable.ajax.reload(initDatatable);
            }, error: function (xhr, ajaxOptions, thrownError) {
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

$("#add-form").submit(function (e) {
    e.preventDefault();
    page.show()
}).validate({
    name: {
        object_id: {
            number: true,
            min: 1
        },
        percent: {
            number: true,
            min: 1
        }
    },
    messages: {
        object_id: {
            number: "Dữ liệu không hợp lệ",
            min: "Chọn lựa chọn của bạn"
        },
        percent: {
            number: "Dữ liệu không hợp lệ",
            min: "Chọn lựa chọn của bạn"
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        formData.append('user_id', $('#user_id').val())
        formData.append('month_year', $('#date').val())
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
                    toastr.success('Thêm mới thành công!');
                }, 1000);
                page.hide()
                clearForm();
                dataTable.ajax.reload(initDatatable);
            }, error: function (xhr, ajaxOptions, thrownError) {
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
$("#add-form-krs").submit(function (e) {
    e.preventDefault();
    page.show()
}).validate({
    name: {
        name: {
            require: true
        },
        percent: {
            require: true,
            number: true,
            min: 1
        }
    },
    messages: {
        name: {
            require: "Dữ liệu không hợp lệ"
        },
        percent: {
            require: "Dữ liệu không hợp lệ",
            number: "Dữ liệu không hợp lệ",
            min: "Chọn lựa chọn của bạn"
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        if ($('#ob-id-hide').val() != "") {
            formData.append('ou_id', $('#ob-id-hide').val())
        }
        if ($('input[name=type]:checked', '#add-form-krs').val() == 0) {
            formData.delete('minus')
        }
        if ($('#eid-krs').val() == "") {
            formData.delete('id')
        }
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
                    toastr.success('Thêm mới thành công!');
                }, 1000);
                page.hide()
                $('#add-modal').modal('hide')
                clearForm();
                dataTable.ajax.reload(initDatatable);
            }, error: function (xhr, ajaxOptions, thrownError) {
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
$("#check-form-krs").submit(function (e) {
    e.preventDefault();
    page.show()
}).validate({
    name: {
        number: {
            require: true,
            number: true,
            min: 1
        }
    },
    number: {
        percent: {
            require: "Dữ liệu không hợp lệ",
            number: "Dữ liệu không hợp lệ",
            min: "Chọn lựa chọn của bạn"
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        formData.append('key_id', $('#eid-krs').val())
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
                    toastr.success('Thêm mới thành công!');
                }, 1000);
                page.hide()
                checkResult($('#eid-krs').val())
                dataTable.ajax.reload(initDatatable);
            }, error: function (xhr, ajaxOptions, thrownError) {
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
$("#check-result-krs").submit(function (e) {
    e.preventDefault();
    page.show()
}).validate({
    name: {
        result: {
            require: true,
            number: true,
            min: 0
        }
    },
    number: {
        percent: {
            require: "Dữ liệu không hợp lệ",
            number: "Dữ liệu không hợp lệ",
            min: "Chọn lựa chọn của bạn"
        }
    },
    submitHandler: function (form) {
        var formData = new FormData(form);
        formData.append('id', $('#eid-krs').val())
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
                    toastr.success('Thêm mới thành công!');
                }, 1000);
                page.hide()
                checkResult($('#eid-krs').val())
                dataTable.ajax.reload(initDatatable);
            }, error: function (xhr, ajaxOptions, thrownError) {
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

// get data for form update
function getInfo(id) {
    page.show()
    console.log(id);
    // $('#editPost').modal('show');
    $.ajax({
        type: "GET",
        url: "/keys/" + id,
        success: function (response) {
            page.hide()
            $('#name-kr').val(response.name);
            $('#percent-kr').val(response.percent);
            if (response.type == 0) {
                $('#minus-container').hide()
                $('#type_0').prop("checked", true);
            } else {
                $('#type_1').prop("checked", true);
                $('#minus').val(response.minus)
                $('#minus-container').show()
            }
            $('#eid-krs').val(response.id);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
        }
    });
}// get data for form update
function checkResult(id) {
    page.show()
    // $('#editPost').modal('show');
    $.ajax({
        type: "GET",
        url: "/keys/" + id,
        success: function (response) {
            page.hide()
            $('#result-key').val(response.result)
            $('.btn.btn-sm.btn-info.collapsed').removeClass('collapsed')
            $('.form-group.collapse.show').removeClass('show')
            if (response.type == 0) {
                $('#result-key').prop("disabled", false);
                $('.add-key-button').hide();
            } else {
                $('#result-key').prop("disabled", true);
                $('.add-key-button').show();
                $('#minus-text').text(response.minus+'%');
                var html = '<thead><tr><th>ID</th><th>Ngày</th><th>Mô tả</th><th>Số lần</th><th>Hành Động</th></tr></thead>';
                response.results.forEach(function (value, index) {
                    html = html + `<tr id="results-` + value['id'] + `" role="row" class="odd"><td class="sorting_1">` + (index + 1) + `</td><td>` + value['date'] + `</td><td>` + value['description'] + `</td><td>` + value['number'] + `</td><td>
                    <button type="button" class="btn btn-xs btn-danger" onclick="alDeleteResult(` + value['id'] + `)">
                            <i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td></tr>`;
                });
                $('#key-add-table').html(html)
            }
            $('#eid-krs').val(response.id);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
        }
    });
}


//____________________________________________________________________________________________________

//____________________________________________________________________________________________________
// Update function
// Delete function
function alDelete(id) {
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
                    url: "/keys/" + id,
                    success: function (res) {
                        if (!res.error) {
                            toastr.success('Thành công!');
                            $('#data-' + id).remove();
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        toastr.error(thrownError);
                    }
                });
            } else {
                toastr.error("Hủy bỏ thao tác!");
            }
        });
};

function alDeleteResult(id) {
    swal({
            title: "Bạn muốn xóa bỏ lỗi/vi phạm này?",
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
                            $('#results-' + id).remove();
                            checkResult($('#eid-krs').val())
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        toastr.error(thrownError);
                    }
                });
            } else {
                toastr.error("Hủy bỏ thao tác!");
            }
        });
};

function alDeleteOB(id) {
    swal({
            title: "Bạn muốn xóa bỏ mục tiêu này?",
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
                    url: "/okrs/" + id,
                    success: function (res) {
                        if (!res.error) {
                            toastr.success('Thành công!');
                            $('#data-' + id).remove();
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        toastr.error(thrownError);
                    }
                });
            } else {
                toastr.error("Hủy bỏ thao tác!");
            }
        });
}

$('.form-check-input').on('click', function () {
    if ($(this).val() == 0) {
        $('#minus-container').hide()
    } else $('#minus-container').show()
})

function addKRs(id) {
    $('#ob-id-hide').val(id);
    clearFormKRs()
}

function clearFormKRs() {
    $('#add-form-krs')[0].reset();
    // $('#ob-id-hide').val('');
}

function clearForm() {
    $('#add-form')[0].reset();
    $('#eid').val('');
}
