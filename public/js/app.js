jQuery(() => {
    // jquery calls
});

function setEnrolmentFee(e, value) {
    const current_total_fee = $("#total_fee").val();
    let fee = Number(current_total_fee);
    if (e.checked) {
        fee += Number(value);
    } else {
        fee -= Number(value);
    }
    $("#total_fee").val(fee);
    $("#total_fee_span").html(`ugx ${fee.toLocaleString()}`);
}
