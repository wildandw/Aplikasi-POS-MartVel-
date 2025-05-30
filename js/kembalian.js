function startCalcKembalian() {
    interval = setInterval("calcKembalian()", 2);
}

function calcKembalian() {
    one = document.autoKembalianForm.total_bayar.value;
    two = document.autoKembalianForm.jumlah_bayar.value;
    document.autoKembalianForm.kembalian.value = (two * 1) - (one * 1);
}

function stopCalcKembalian() {
    clearInterval(interval);
}