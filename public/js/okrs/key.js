$(document).ready(function () {
    var date = new Date();
    var month = (date.getMonth() + 1) + '/' + date.getFullYear()
    console.log(month)
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
    $('#date').datepicker('setDate', month)
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//____________________________________________________________________________________________________
var dataTable = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        type: "GET",
        url: "/api/v1/objects/table",
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
        }
    },
    rowCallback: function( row, data, index ) {
        if (data['name'] == null||data['name'] == ''||data['name'] == 'null') {
            console.log(data);
            $(row).hide();
        }
    },
    rowGroup: {
        dataSrc: 1
    },
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'description', name: 'description'},
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
        formData.append('user_id',$('#user_id').val())
        formData.append('month_year',$('#date').val())
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
                dataTable.ajax.reload(null, false);
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
        url: "/objects/" + id,
        success: function (response) {
            page.hide()
            $('#name').val(response.name);
            $('#description').val(response.description);
            $('#eid').val(response.id);
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
            title: "Bạn muốn xóa bỏ người dùng?",
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
                    url: "/objects/" + id,
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


function clearForm() {
    $('#add-form')[0].reset();
    $('#eid').val('');
}
