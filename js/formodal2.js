// Event listener for Profile link to open the modal
const btnEditProduk = document.querySelector(".edit-btn");
const modal2EditProduk = document.getElementById("modal2EditProduk");
const btnEditSimpan = document.getElementById("btnSimpan");
const btnEditReset = document.getElementById("btnReset");

btnEditProduk.addEventListener('click', function() {
  modal2EditProduk.style.display = 'flex';
  setTimeout(function() {
    modal2EditProduk.querySelector('.modal2-content').classList.add('show');
  }, 10);
});

// Event listener for closing the modal when clicked outside
window.addEventListener('click', function(event) {
  if (event.target === modal2EditProduk) {
    modal2EditProduk.querySelector('.modal2-content').classList.remove('show');
    setTimeout(function() {
      modal2EditProduk.style.display = 'none';
    }, 200);
  }
});

// Sembunyikan modal saat tombol "Simpan" ditekan
btnEditSimpan.addEventListener("click", function () {
  modal2EditProduk.style.display = "none";
  // Lakukan tindakan simpan data produk jika diperlukan
});

// Reset formulir saat tombol "Reset" ditekan
btnEditReset.addEventListener("click", function () {
  document.getElementById("formEditProduk").reset();
});
