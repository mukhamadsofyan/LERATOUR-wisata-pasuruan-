<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Menunggu Pembayaran</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        /* ================= RESET ================= */
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }

        body {
            margin: 0;
            background: #f1f5f9;
            color: #0f172a;
        }

        /* ================= LAYOUT ================= */
        .pending-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .pending-card {
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.3s ease;
        }

        /* ================= HEADER ================= */
        .pending-icon {
            font-size: 52px;
            text-align: center;
            margin-bottom: 10px;
        }

        .pending-title {
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .pending-desc {
            text-align: center;
            font-size: 14px;
            color: #64748b;
            margin-bottom: 20px;
        }

        /* ================= INFO ================= */
        .pending-info {
            background: #f8fafc;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .pending-info div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .pending-info div:last-child {
            margin-bottom: 0;
        }

        .status-pending {
            color: #f59e0b;
            font-weight: 600;
        }

        /* ================= BUTTON ================= */
        .btn {
            display: block;
            width: 100%;
            text-align: center;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            border: none;
            margin-bottom: 10px;
        }

        .btn-primary {
            background: #2563eb;
            color: #fff;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #0f172a;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        /* ================= FOOTER ================= */
        .pending-footer {
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            margin-top: 10px;
        }

        /* ================= ANIMATION ================= */
        @keyframes fadeIn {
            from {
                transform: translateY(10px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="pending-wrapper">
        <div class="pending-card">

            <div class="pending-icon">⏳</div>

            <div class="pending-title">Menunggu Pembayaran</div>

            <div class="pending-desc">
                Transaksi berhasil dibuat, namun pembayaran belum diterima.
                Silakan selesaikan pembayaran sesuai metode yang Anda pilih.
            </div>

            <div class="pending-info">
                <div>
                    <span>Order ID</span>
                    <b id="orderId">{{ $order_id }}</b>
                </div>
                <div>
                    <span>Total Bayar</span>
                    <b>Rp {{ number_format($transaksi->total_bayar) }}</b>
                </div>
                <div>
                    <span>Status</span>
                    <b class="status-pending">PENDING</b>
                </div>
            </div>

            <button class="btn btn-primary" onclick="lanjutkanPembayaran()">
                Lanjutkan Pembayaran
            </button>
            <a href="{{ route('payment.check', $order_id) }}" class="btn btn-secondary">
                Cek Status Pembayaran
            </a>

            <div class="pending-footer">
                Halaman ini aman untuk ditutup atau direfresh
            </div>

        </div>
    </div>

    <script>
        function checkStatus() {
            location.reload();
        }
    </script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script>
        function lanjutkanPembayaran() {
            fetch("{{ route('tiket.bayarUlang') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        order_id: "{{ $order_id }}"
                    })
                })
                .then(res => res.json())
                .then(data => {

                    snap.pay(data.snap_token, {

                        onSuccess: function(result) {
                            // 🔥 INI YANG WAJIB
                            window.location.href =
                                "{{ route('payment.finish') }}" +
                                "?order_id=" + result.order_id;
                        },

                        onPending: function(result) {
                            window.location.href =
                                "{{ route('payment.pending') }}" +
                                "?order_id=" + result.order_id;
                        },

                        onError: function() {
                            alert('Pembayaran gagal');
                        }
                    });

                });
        }
    </script>
    <script>
        const orderId = "{{ $order_id }}";

        setInterval(() => {
            fetch(`/payment/poll/${orderId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'settlement') {
                        window.location.href = data.redirect;
                    }
                });
        }, 5000); // cek tiap 5 detik
    </script>




</body>

</html>
