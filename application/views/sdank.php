<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat dan Ketentuan</title>
</head>
<style>
    /* CSS */
    body {
        font-family: Arial, sans-serif;
    }

    form {
        max-width: 600px;
        margin: auto;
        padding: 20px;
    }

    fieldset {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    input[type="checkbox"] {
        margin-right: 5px;
    }

    .button {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        width: 100%;
    }

    .button:hover {
        background-color: #0056b3;
    }

    /* Media Queries */
    @media (max-width: 600px) {
        fieldset {
            padding: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        button {
            width: 100%;
        }
    }
</style>

<body>
    <form action="process_order.php" method="post">

        <fieldset>
            <legend><h3>Syarat dan Ketentuan</h3></legend>
            <p>Pemesan diwajibkan untuk membaca dan memahami syarat dan ketentuan sebelum melakukan inden.</p>
            <ul>
                <li>Nama Lengkap: Diisi dengan nama lengkap pemesan.</li>
                <li>Alamat Email: Digunakan untuk konfirmasi dan komunikasi terkait inden.</li>
                <li>Nomor Telepon: Digunakan untuk menghubungi pemesan terkait jadwal kunjungan dan pengiriman.</li>
                <li>Tanggal Kunjungan: Pilih tanggal kunjungan yang diinginkan oleh pemesan (format: hh/bb/tttt).</li>
                <li>Detail Mobil</li>
                <ul>
                    <li>Nama Mobil: Diisi dengan model mobil yang dipesan (misalnya, Honda CIVIC).</li>
                    <li>Merk: Diisi dengan merk mobil (misalnya, Honda).</li>
                    <li>Kategori: Kategori mobil (misalnya, Sedan).</li>
                </ul>
                <li>Pemesan menyetujui bahwa informasi pribadi yang diberikan dapat digunakan oleh perusahaan untuk tujuan terkait inden dan komunikasi terkait.</li>
                <li>Persetujuan Syarat dan Ketentuan</li>
                <ul>
                    <li>Saya telah membaca dan menyetujui syarat dan ketentuan yang berlaku di situs web ini.</li>
                    <li>Pemesan diwajibkan untuk membaca dan memahami syarat dan ketentuan ini sebelum melakukan inden. Dengan menandai kotak persetujuan, pemesan menyatakan setuju untuk terikat oleh syarat dan ketentuan ini.</li>
                    <li>Semua informasi yang diberikan harus akurat dan benar.</li>
                </ul>
                <li>Pemesan menyetujui bahwa informasi pribadi yang diberikan dapat digunakan oleh perusahaan untuk tujuan terkait inden dan komunikasi terkait.</li>
                <li>Pembatalan dan Perubahan Inden</li>
                <ul>
                    <li>Pemesan dapat membatalkan inden maksimal 7 hari setelah konfirmasi.</li>
                    <li>Jika sudah lebih dari 7 hari dan sama sekali tidak ada kunjungan maka inden anda akan dibatalkan.</li>
                    <li>Inden bisa dibatalkan melalui contac admin atau kirim melalui email.</li>
                </ul>
                <li>Kewajiban Pembayaran</li>
                <ul>
                    <li>Pembayaran bisa dilakukan saat sudah deal dengan barang itu waktu kunjungan.</li>
                </ul>
                <li>Kebijakan Privasi</li>
                <ul>
                    <li>Semua informasi pribadi yang diberikan oleh pemesan akan dijaga kerahasiaannya dan hanya akan digunakan sesuai dengan kebijakan privasi perusahaan.</li>
                </ul>
            </ul>

            <label required>
                <input type="checkbox" id="terms" name="terms" required>
                Saya telah membaca dan menyetujui syarat dan ketentuan.
            </label>
        </fieldset>
        <a href="<?= base_url('pesan/kembali') ?>" type="button" class="button">Kembali</a>
    </form>

</body>

</html>