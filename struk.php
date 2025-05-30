<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/struk.css"> <!-- Pastikan Anda mengatur path CSS yang sesuai -->
    <title>Struk Transaksi</title>
    <link rel="icon" type="image/x-icon" href="img/icon.png" />
</head>

<center>
    <!-- digunakan untuk mencetak struk -->

    <body onload="window.print(); window.onafterprint = window.close;  ">
        <div class="struk-container">
            <div class="header">
                <h1>Struk Transaksi Martvel</h1>
            </div>
            <div class="content">
                <div class="detail">
                    <!-- menampilkan tanggal -->
                    <p>Tanggal: <?php echo date("d F Y"); ?></p>
                </div>
                <hr>
                <table class="produk-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';

                        $query = mysqli_query($conn, "SELECT * FROM keranjang");
                        $totalBayar = 0;
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($query)) {
                            $subtotal = $row['harga'] * $row['jumlah'];
                            $totalBayar += $subtotal;
                            // menambahkan item harga dan jumlah item dari transaksi dan disimpan ke total bayar untuk ditampilkan
                            echo "<tr>
                    <td>$no</td>
                    <td>{$row['namaproduk']}</td>
                    <td>{$row['harga']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>{$subtotal}</td>
                  </tr>";

                            $no++;
                        }

                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
                <hr>
                <div class="total">
                    <p>Total Bayar: <?php echo $totalBayar; ?></p>
                    <!-- tampil total bayar -->
                </div>
            </div>
            <hr>
            <div class="footer">
                <p>Terima kasih telah berbelanja di Martvel</p>
            </div>
        </div>
    </body>
</center>

</html>