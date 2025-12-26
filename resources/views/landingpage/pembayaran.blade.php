<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Tiket</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>

<h2>🔐 Proses Pembayaran</h2>

<button onclick="bayar()" class="button -md -accent-1">
    Bayar Sekarang
</button>

<script>
    function bayar() {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                alert("Pembayaran berhasil!");
                window.location.href = "/tiket/sukses";
            },
            onPending: function(result){
                alert("Menunggu pembayaran");
            },
            onError: function(result){
                alert("Pembayaran gagal");
            }
        });
    }

    // 🔥 auto open payment
    bayar();
</script>

</body>
</html>
