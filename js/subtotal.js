function startCalcSubTotal() {
    interval = setInterval("calcSubTotal()", 1);
}

function calcSubTotal() {
    one = document.autoSubTotalForm.harga.value;
    two = document.autoSubTotalForm.jumlah.value;
    document.autoSubTotalForm.sub_total.value = (one * 1) * (two * 1);
}

function stopCalcSubTotal() {
    clearInterval(interval);
}