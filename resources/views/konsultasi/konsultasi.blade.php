<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tombol WhatsApp</title>
<style>
  /* Styling untuk tombol WhatsApp */
  .wa-button {
    display: inline-block;
    background-color: #25d366; /* Warna default WhatsApp */
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-family: Arial, sans-serif;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }
</style>
</head>
<body>

<!-- Tombol WhatsApp -->
<a href="javascript:void(0);" class="wa-button" id="waButton">Hubungi Kami via WhatsApp</a>

<script>
// Fungsi untuk membuka WhatsApp ketika tombol diklik
function openWhatsApp() {
  // Nomor WhatsApp tujuan
  var phoneNumber = "MASUKKAN_NOMOR_WA_DISINI";

  // Pesan yang akan dikirimkan (opsional)
  var message = "Halo, saya ingin bertanya tentang...";

  // Membangun URL WhatsApp dengan nomor dan pesan
  var url = "https://api.whatsapp.com/send?phone=" + phoneNumber + "&text=" + encodeURIComponent(message);

  // Buka URL WhatsApp dalam jendela baru
  window.open(url, '_blank');
}

// Event listener untuk tombol WhatsApp
document.getElementById("waButton").addEventListener("click", openWhatsApp);
</script>

</body>
</html>
