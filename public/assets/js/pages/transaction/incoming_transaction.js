$(document).ready(function() {
    $("#incoming_transaction_table").DataTable();

    $("#add_incoming_transaction_table").DataTable({
        paging: false,
        info: false,
    });

    $("#add_product_transaction_table").DataTable();

    $(".payment-input").on("input", function (e) {
        let total = $("#total_incoming_transaction").val();
        let payment = $("#payment_incoming_transaction").val();

        let money_change = payment - total;

        $("#money_change").html("Rp. " + money_change + ",00");
        $("input[name=money_change]").val(money_change);
    });
})

