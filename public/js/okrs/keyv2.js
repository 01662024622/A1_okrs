var date = new Date();
var today = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear()
var year = date.getFullYear()
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
                page.hide()
                $('#target-table').css('width', '100%')
                var html = '';
                json.data.forEach(element => {
                    html = html + `<div class="row">
                            <div class="col-10">` + element['name'] + `</div>
                            <div class="col-2">`;
                    if (element['user_id'] == $('#user_id').val()) {
                        html = html + `<input type="checkbox" name="data[]" class="form-check-input" value="` + element['id'] + `" checked></div>
            </div>`;
                    } else html = html + `<input type="checkbox" name="data[]" class="form-check-input" value="` + element['id'] + `"></div>
            </div>`;
                })
                $('#kpi-target').html(html)
                return json.data;
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'level', name: 'level'},
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
                targetTable.ajax.reload()
                setTimeout(function () {
                    toastr.success('Thêm mới thành công!');
                }, 1000);
                page.hide()
                $('#target-form')[0].reset();
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
                    toastr.success('Thêm mới thành công!');
                }, 1000);
                page.hide()
                $('#target-form')[0].reset();
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
var loadResult = function () {
    page.show()
    $.ajax({
        type: "get",
        url: "/api/v1/targets/results/table?user_id=" + $('#user_id').val() + "&year=" + $('#date').val(),
        success: function (res) {
            page.hide()
            console.log(res)
            var full = '';
            res.data.forEach(element => {
                var data = '';
                element.kpis.forEach(ele => {
                    data = data + `                <div class="row kpi-detail kpi-hover">
                    <div class="col-5 row">
                        <div class="col-10 title-kpi"
                             title="Xây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpi">
                            ` + ele['name'] + `
                            <for></for>
                        </div>
                        <div class="col-2 text-center">
                            <i class="fa fa-square" style="color: green" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-1">% đạt</div>
                    <div class="col-6 row">
                        <span class="col kpi-month">90</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">105</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">50</span>
                        <span class="col kpi-month">70</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">60</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">110</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">100</span>
                    </div>
                </div>`
                })
                var html = `<div class="col-12 box-kpi">
            <div class="kpi-header row">
            <div class="col-10">
<i class="fa fa-caret-down collapsed" aria-hidden="true" data-toggle="collapse" data-target="#collapse-\`+element['id']+\`"></i>
                `+element['name']+` - Mức độ quan trọng: <b>`+element['level']+`</b>
</div>
<div class="col-2"><button class="btn btn-link">Thêm</button></div>

            </div>
            <div id="collapse-` + element['id'] + `" class="kpi-body collapse show">

                <div class="row kpi-detail kpi-header-title">
                    <div class="col-5 text-bold row">
                        <div class="col-10">KPI</div>
                        <div class="col-2">Độ khó</div>
                    </div>
                    <div class="col-1 text-bold">Loại</div>
                    <div class="col-6 text-bold row">
                        <span class="col kpi-month">T1</span>
                        <span class="col kpi-month">T2</span>
                        <span class="col kpi-month">T3</span>
                        <span class="col kpi-month">T4</span>
                        <span class="col kpi-month">T5</span>
                        <span class="col kpi-month">T6</span>
                        <span class="col kpi-month">T7</span>
                        <span class="col kpi-month">T8</span>
                        <span class="col kpi-month">T9</span>
                        <span class="col kpi-month">T10</span>
                        <span class="col kpi-month">T11</span>
                        <span class="col kpi-month">T12</span>
                    </div>
                </div>
        ` + data + `
            </div>
        </div>`;
                full = full + html;
            })
            $('#kpi').html(full)
            $('.collapsed').on('click', function () {
                $(this).toggleClass('fa-caret-right fa-caret-down')
            })
            if (!res.error) {
                toastr.success('Thành công!');
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            page.hide()
            toastr.error(thrownError);
        }
    });
}
loadResult()

