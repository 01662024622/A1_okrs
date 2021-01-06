
$().ready(function() {
  $("#add-form").submit(function(e) {
      e.preventDefault();
  }).validate({
    rules: {
      note: {
        maxlength: 500,
      },
      name: {
          required: true,
      },
        email: {
            email: true
        },
        phone: {
            required: true,
            minlength:10,
            number:true
        }
    },
    messages: {
      note: {
        maxlength: "Phản ánh của bạn quá dài",
      },
        name: {
            required: "Hãy nhập tên của bạn",
        },
        email: {
            email: "Email không đúng",
        },
        phone: {
            required: "Hãy nhập số điện của bạn",
            minlength:"Số điện thoại không đúng",
            number:"Số điện thoại không đúng"
        }

    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
