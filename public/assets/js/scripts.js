$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).on("click", ".delete-data", function (e) {
    e.preventDefault();

    var form = $(this).closest("form");

    Swal.fire({
        html: "Yakin untuk menghapus data ??",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: "Cancel",
        customClass: {
            confirmButton: "btn btn-danger",
            cancelButton: "btn btn-secondary",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

$(".addQuantity").click(function (e) {
    e.preventDefault();

    var product_id = $(this).closest(".product-data").find(".product-id").val();
    var product_qty = $(this).closest(".product-data").find(".qty-input").val();

    var split = product_qty.split(" ");
    var product_qty = parseInt(split[0]);

    var product_qty = product_qty + 1;

    var data = {
        product_id: product_id,
        product_qty: product_qty,
    };

    $.ajax({
        method: "POST",
        url: "update-product",
        data: data,
        success: function (response) {
            window.location.reload();
        },
    });
});

$(".lessQuantity").click(function (e) {
    e.preventDefault();

    var product_id = $(this).closest(".product-data").find(".product-id").val();
    var product_qty = $(this).closest(".product-data").find(".qty-input").val();

    var split = product_qty.split(" ");
    var product_qty = parseInt(split[0]);

    var product_qty = product_qty - 1;

    var data = {
        product_id: product_id,
        product_qty: product_qty,
    };

    $.ajax({
        method: "POST",
        url: "update-product",
        data: data,
        success: function (response) {
            window.location.reload();
        },
    });
});

$(".delete-data-cart").click(function (e) {
    e.preventDefault();

    var product_id = $(this).closest(".product-data").find(".product-id").val();

    $.ajax({
        method: "POST",
        url: "delete-product",
        data: {
            product_id: product_id,
        },
        success: function (response) {
            location.reload();
        },
    });
});

$(".date-input").flatpickr();
