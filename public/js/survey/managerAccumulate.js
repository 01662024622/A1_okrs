$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var dataTable = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        type: "GET",
        url: "/api/v1/manager/accumulate/table?role_pt="+role,
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
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'code', name: 'code'},
        {data: 'name', name: 'name'},
        {data: 'phone', name: 'phone'},
        {data: 'birthday', name: 'birthday'},
        {data: 'level', name: 'level'},
        {data: 'wb', name: 'wb'},
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
function wb(id){
    page.show()
    $.ajax({
        type: "GET",
        url: "/api/status/HT50/accumulate/"+id,
        success: function(response)
        {
            dataTable.ajax.reload(null, false);
            page.hide()
        },
        error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
            page.hide()
        }
    });
}
function show(code){
    page.show()
    $.ajax({
        type: "GET",
        url: "/HT50/manager/new/customer/"+code,
        success: function(response)
        {
            $('#code').val(response.code)
            $('#name_gara').val(response.name_gara)
            $('#name').val(response.name)
            $('#birthday').val(response.birthday)
            $('#email').val(response.email)
            $('#phone').val(response.phone)
            $('#name_sale').val(response.name_sale)
            $('#phone_sale').val(response.phone_sale)
            $('#name_accountant').val(response.name_accountant)
            $('#phone_accountant').val(response.phone_accountant)
            $('#address').val(response.address)
            $('#province').val(response.province)
            page.hide()
        },
        error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
            page.hide()
        }
    });

}

$("#gift-form").submit(function(e){
    e.preventDefault();
}).validate({
    rules: {
        code: {
            required: true,
        },
        gift: {
            required: true,
        },
    },
    messages: {
        code: {
            required: 'Câu trả lời của bạn không hợp lệ?',
        },
        gift: {
            required: 'Câu trả lời của bạn không hợp lệ?',
        },
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
                getGift($('#customer_code').val())
                dataTable.ajax.reload(null, false);
            }, error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
            },
        });
    }
});
