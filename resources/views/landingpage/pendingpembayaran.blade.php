<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Payment Pending</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
:root{
  --bg:#ffffff;
  --soft:#f8fafc;
  --border:#e5e7eb;

  --text:#020617;
  --muted:#64748b;

  --primary:#2563eb;
  --warning:#f59e0b;

  --radius:20px;
}

*{box-sizing:border-box}

body{
  margin:0;
  background:var(--bg);
  color:var(--text);
  font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;
}

/* ===== PAGE ===== */
.page{
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  padding:48px 20px;
}

/* ===== CONTAINER ===== */
.container{
  width:100%;
  max-width:900px;
  background:var(--bg);
}

/* ===== HERO CARD ===== */
.hero{
  display:grid;
  grid-template-columns: 1.2fr 1fr;
  border-radius:var(--radius);
  border:1px solid var(--border);
  overflow:hidden;
}

/* LEFT */
.hero-left{
  padding:48px;
}

.badge{
  display:inline-flex;
  align-items:center;
  gap:8px;
  padding:8px 14px;
  font-size:13px;
  font-weight:600;
  border-radius:999px;
  background:#fff7ed;
  color:#92400e;
}

.hero-left h1{
  margin:20px 0 12px;
  font-size:34px;
  font-weight:800;
  letter-spacing:-.6px;
}

.hero-left p{
  font-size:16px;
  color:var(--muted);
  line-height:1.7;
  max-width:420px;
}

/* RIGHT */
.hero-right{
  background:var(--soft);
  padding:40px;
  display:flex;
  flex-direction:column;
  justify-content:center;
}

/* INFO BOX */
.info{
  background:white;
  border:1px solid var(--border);
  border-radius:16px;
  padding:20px;
  margin-bottom:14px;
}

.info-row{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:12px 0;
}

.info-row:not(:last-child){
  border-bottom:1px dashed var(--border);
}

.info span{
  font-size:14px;
  color:var(--muted);
}

.info strong{
  font-size:15px;
  font-weight:700;
}

/* ORDER */
.order{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-top:12px;
  padding:14px 16px;
  border-radius:12px;
  background:#f1f5f9;
  font-size:14px;
  font-weight:600;
}

.order button{
  border:none;
  background:none;
  color:var(--primary);
  font-weight:700;
  cursor:pointer;
}

/* ACTIONS */
.actions{
  display:grid;
  gap:14px;
  margin-top:22px;
}

.btn-primary{
  background:linear-gradient(135deg,#2563eb,#1d4ed8);
  color:white;
  border:none;
  padding:16px;
  font-size:15px;
  font-weight:700;
  border-radius:14px;
  cursor:pointer;
}

.btn-primary:hover{
  filter:brightness(1.05);
}

.btn-secondary{
  background:white;
  border:1px solid var(--border);
  padding:16px;
  font-size:15px;
  font-weight:600;
  border-radius:14px;
  cursor:pointer;
}

/* FOOTNOTE */
.note{
  margin-top:18px;
  font-size:13px;
  color:var(--muted);
  text-align:center;
}

/* MOBILE */
@media(max-width:900px){
  .hero{
    grid-template-columns:1fr;
  }

  .hero-left{
    padding:36px;
  }

  .hero-right{
    padding:32px;
  }

  .hero-left h1{
    font-size:28px;
  }
}
</style>
</head>

<body>

<div class="page">
  <div class="container">

    <div class="hero">

      <!-- LEFT SIDE -->
      <div class="hero-left">
        <div class="badge">⏳ Payment Pending</div>

        <h1>Menunggu Pembayaran Anda</h1>

        <p>
          Kami telah membuat transaksi untuk pesanan Anda.
          Silakan lanjutkan pembayaran untuk menyelesaikan proses.
        </p>
      </div>

      <!-- RIGHT SIDE -->
      <div class="hero-right">

        <div class="info">
          <div class="info-row">
            <span>Total Pembayaran</span>
            <strong>Rp {{ number_format($transaksi->total_bayar) }}</strong>
          </div>

          <div class="info-row">
            <span>Status</span>
            <strong style="color:#92400e">PENDING</strong>
          </div>

          <div class="order">
            <span id="orderId">{{ $order_id }}</span>
            <button onclick="copyOrder()">Salin</button>
          </div>
        </div>

        <div class="actions">
          <button class="btn-primary" onclick="lanjutkanPembayaran()">
            Lanjutkan Pembayaran
          </button>
          <button class="btn-secondary"><a href="{{ route('landingpage.home') }}" style="text-decoration:none; color:inherit;">
            Kembali Ke Homepage
          </button>

          {{-- <a href="{{ route('payment.check', $order_id) }}" class="btn-secondary">
            Cek Status
          </a> --}}
        </div>

        <div class="note">
          Halaman ini aman untuk ditutup. Status akan diperbarui otomatis.
        </div>

      </div>
    </div>

  </div>
</div>

<!-- MIDTRANS -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
const orderId = "{{ $order_id }}";

function copyOrder(){
  navigator.clipboard.writeText(orderId);
}

function lanjutkanPembayaran(){
  fetch("{{ route('tiket.bayarUlang') }}",{
    method:"POST",
    headers:{
      "X-CSRF-TOKEN":"{{ csrf_token() }}",
      "Content-Type":"application/json",
      "Accept":"application/json"
    },
    body:JSON.stringify({order_id:orderId})
  })
  .then(r=>r.json())
  .then(d=>{
    if(!d.snap_token) return;
    snap.pay(d.snap_token,{
      onSuccess:r=>location.href="{{ route('payment.finish') }}?order_id="+r.order_id,
      onPending:r=>location.href="{{ route('payment.pending') }}?order_id="+r.order_id,
      onError:()=>alert("Pembayaran gagal")
    });
  });
}
</script>

</body>
</html>
