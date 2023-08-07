$(document).ready(function() {
    $("#outgoing_transaction_table").DataTable();

    $("#add_outgoing_transaction_table").DataTable({
        paging: false,
        info: false,
    });

    $("#add_product_transaction_table").DataTable();

    $(".payment-input").each(function () {
        $(this).prop("required", true);
    });

    $(".payment-input").on("input", function (e) {
        let total = $("#total_outgoing_transaction").val();
        let payment = $("#payment_outgoing_transaction").val();

        let money_change = payment - total;

        $("#money_change").html("Rp. " + money_change + ",00");
        $("input[name=money_change]").val(money_change);
    });
})
