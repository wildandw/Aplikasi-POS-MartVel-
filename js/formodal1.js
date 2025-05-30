// Event listener for Profile link to open the modal
const btnTambahProduk = document.querySelector(".add-main-produk");
const modal1TambahProduk = document.getElementById("modal1TambahProduk");
const btnSimpan = document.getElementById("btnSimpan");
const btnReset = document.getElementById("btnReset");

btnTambahProduk.addEventListener('click', function() {
  modal1TambahProduk.style.display = 'flex';
  setTimeout(function() {
    modal1TambahProduk.querySelector('.modal1-content').classList.add('show');
  }, 10);
});

// Event listener for closing the modal when clicked outside
window.addEventListener('click', function(event) {
  if (event.target === modal1TambahProduk) {
    modal1TambahProduk.querySelector('.modal1-content').classList.remove('show');
    setTimeout(function() {
      modal1TambahProduk.style.display = 'none';
    }, 200);
  }
});

// Sembunyikan modal1 saat tombol "Simpan" ditekan
btnSimpan.addEventListener("click", function () {
  modal1TambahProduk.style.display = "none";
  // Lakukan tindakan simpan data produk jika diperlukan
});

// Reset formulir saat tombol "Reset" ditekan
btnReset.addEventListener("click", function () {
  document.getElementById("formTambahProduk").reset();
});




