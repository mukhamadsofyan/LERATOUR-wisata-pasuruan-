<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/viatours-html/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:59:45 GMT -->
@include('layout.head')

<body>
    @include('layout.preloader')

    <div class="tourPagesSidebar" data-x="tourPagesSidebar" data-x-toggle="-is-active">
        <div class="tourPagesSidebar__overlay"></div>
        <div class="tourPagesSidebar__content">
            <div class="tourPagesSidebar__header d-flex items-center justify-between">
                <div class="text-20 fw-500">All filters</div>

                <button class="button -dark-1 size-40 rounded-full bg-light-1" data-x-click="tourPagesSidebar">
                    <i class="icon-cross text-10"></i>
                </button>
            </div>


        </div>
    </div>

    <button class="toTopButton js-top-button">
        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_83_4004)">
                <path
                    d="M17.8783 0H4.12177C3.59388 0 3.16602 0.42786 3.16602 0.955755C3.16602 1.48365 3.59388 1.91151 4.12177 1.91151H17.8783C18.4062 1.91151 18.834 1.48365 18.834 0.955755C18.834 0.42786 18.4062 0 17.8783 0Z" />
                <path
                    d="M11.6759 4.67546C11.3026 4.30219 10.6975 4.30219 10.3242 4.67546L6.04107 8.95863C5.66779 9.3319 5.66779 9.937 6.04107 10.3103C6.41434 10.6837 7.01955 10.6836 7.39272 10.3103L10.0444 7.6587V21.0443C10.0444 21.5722 10.4723 22 11.0002 22C11.5281 22 11.9559 21.5722 11.9559 21.0443V7.65859L14.6076 10.3102C14.7942 10.4969 15.0389 10.5901 15.2834 10.5901C15.528 10.5901 15.7726 10.4968 15.9593 10.3102C16.3325 9.9369 16.3325 9.3318 15.9593 8.95852L11.6759 4.67546Z" />
            </g>
            <defs>
                <clipPath id="clip0_83_4004">
                    <rect width="22" height="22" fill="white" />
                </clipPath>
            </defs>
        </svg>
    </button>

    <main>

        <section class="layout-pt-lg layout-pb-lg bg-accent-1-05">
            <div class="container">
                <div class="row justify-center">
                    <div class="col-xl-10 col-lg-11">
                        <div class="d-flex justify-end">
                            <a href="{{ route('landingpage.home') }}"><button
                                    class="button -md -dark-1 bg-accent-1 text-white">
                                    Kembali Ke Beranda
                                    <i class="icon-download text-20 ml-10"></i>
                                </button></a>
                            <button class="button -md -dark-1 bg-accent-1 text-white"
                                onclick="openInvoiceDownloadModal()">
                                Download Invoice
                                <i class="icon-download text-20 ml-10"></i>
                            </button>
                        </div>

                        <div class="bg-white rounded-4 mt-50">
                            <div class="layout-pt-lg layout-pb-lg px-50 md:px-20">

                                {{-- HEADER --}}
                                <div class="invoice-header">
                                    <div class="invoice-header-inner">

                                        <!-- LOGO SVG FIX -->
                                        <div class="brand-svg">
                                            <svg viewBox="0 0 260 56" xmlns="http://www.w3.org/2000/svg"
                                                preserveAspectRatio="xMinYMid meet" aria-label="TERATOUR Logo">
                                                <!-- ICON -->
                                                <path
                                                    d="M28 0C15.3 0 5 10.3 5 23s10.3 23 23 23 23-10.3 23-23S40.7 0 28 0Z"
                                                    fill="#EB662B" />
                                                <path d="M16 26l8-8 8 8 8-8 6 6-14 14L10 32z" fill="#fff" />

                                                <!-- TEXT -->
                                                <text x="70" y="36" font-size="28" font-weight="800"
                                                    font-family="Inter, Arial, sans-serif" fill="#EB662B"
                                                    letter-spacing="1">
                                                    LERATOUR
                                                </text>
                                            </svg>
                                        </div>

                                        <!-- INVOICE META -->
                                        <div class="invoice-meta">
                                            <div class="title">Invoice #</div>
                                            <div class="number">{{ $transaksi->order_id }}</div>
                                        </div>

                                    </div>
                                </div>


                                {{-- TANGGAL --}}
                                <div class="row justify-between pt-40">
                                    <div class="col-auto">
                                        <div class="text-15">Invoice date:</div>
                                        <div class="text-15 fw-500 lh-15">
                                            {{ $transaksi->created_at->format('d/m/Y') }}
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="text-15">Status Pembayaran:</div>
                                        <div class="text-15 fw-500 lh-15 text-capitalize">
                                            {{ $transaksi->payment_status }}
                                        </div>
                                    </div>
                                </div>

                                {{-- SUPPLIER & CUSTOMER --}}
                                <div class="row justify-between pt-50">
                                    <div class="col-auto">
                                        <div class="text-20 fw-500">Penyedia Wisata</div>
                                        <div class="text-15 fw-500 mt-20">LERATOUR</div>
                                        <div class="text-15 mt-10">
                                            Platform Wisata Terpercaya<br>
                                            Indonesia
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="text-20 fw-500">Customer</div>
                                        <div class="text-15 fw-500 mt-20">
                                            {{ $transaksi->nama_pemesan }}
                                        </div>
                                        <div class="text-15 mt-10">
                                            {{ $transaksi->email }}
                                        </div>
                                    </div>
                                </div>

                                {{-- TABLE --}}
                                <div class="row pt-50">
                                    <div class="col-12">
                                        <table class="table col-12">
                                            <thead class="bg-light-1">
                                                <tr>
                                                    <th class="fw-500">Deskripsi</th>
                                                    <th class="fw-500">Harga Tiket</th>
                                                    <th class="fw-500">Jumlah</th>
                                                    <th class="fw-500">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>{{ $transaksi->nama_wisata }}</td>
                                                    <td>Rp {{ number_format($transaksi->harga_tiket, 0, ',', '.') }}
                                                    </td>
                                                    <td>{{ $transaksi->jumlah_tiket }}</td>
                                                    <td>
                                                        Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-18 fw-500">Total Pembayaran</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-18 fw-500">
                                                        Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            {{-- FOOTER --}}
                            <div class="border-1-top py-40">
                                <div class="row x-gap-60 y-gap-10 justify-center">
                                    <div class="col-auto">
                                        <span class="text-14">www.leratour.id</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="text-14">support@leratour.id</span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="text-14">+62 812-xxxx-xxxx</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="invoiceDownloadModal" class="ticket-modal">
                        <div class="ticket-modal__content invoice-download">

                            <span class="ticket-modal__close" onclick="closeInvoiceDownloadModal()">&times;</span>

                            <!-- AREA INVOICE -->
                            <div id="invoicePrintArea">

                                <h3 class="text-center mb-5">
                                    {{ $transaksi->nama_wisata }}
                                </h3>
                                <p class="text-center text-muted mb-15">
                                    Invoice / E-Ticket Wisata
                                </p>

                                <div class="invoice-info">
                                    <p><b>Order ID:</b> {{ $transaksi->order_id }}</p>
                                    <p><b>Nama:</b> {{ $transaksi->nama_pemesan }}</p>
                                    <p><b>Email:</b> {{ $transaksi->email }}</p>
                                    <p><b>Jumlah Tiket:</b> {{ $transaksi->jumlah_tiket }}</p>
                                    <p><b>Tanggal:</b> {{ $transaksi->created_at->format('d M Y') }}</p>
                                </div>

                                <div class="qr-center">
                                    <div id="qrInvoice"></div>
                                </div>

                                <p class="text-center text-muted">
                                    Tunjukkan QR Code ini di pintu masuk
                                </p>

                            </div>

                            <button class="button -md -accent-1 bg-dark-1 text-white w-100 mt-15"
                                onclick="downloadInvoice()">
                                ⬇️ Download Invoice (PDF)
                            </button>

                        </div>
                    </div>



                </div>
            </div>
        </section>

    </main>

    <!-- JavaScript -->
    @include('layout.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    <script>
        let invoiceQrReady = false;

        function openInvoiceDownloadModal() {
            const modal = document.getElementById('invoiceDownloadModal');
            modal.style.display = 'flex';

            if (!invoiceQrReady) {
                const qrBox = document.getElementById('qrInvoice');
                qrBox.innerHTML = '';

                new QRCode(qrBox, {
                    text: JSON.stringify({
                        order_id: "{{ $transaksi->order_id }}",
                        jumlah_tiket: "{{ $transaksi->jumlah_tiket }}",
                        nama: "{{ $transaksi->nama_pemesan }}"
                    }),
                    width: 180,
                    height: 180
                });

                invoiceQrReady = true;
            }
        }

        function closeInvoiceDownloadModal() {
            document.getElementById('invoiceDownloadModal').style.display = 'none';
        }

        /* =============================
           🔥 AUTO DOWNLOAD PDF (FIX)
        ============================= */
        function downloadInvoice() {

            const element = document.getElementById('invoicePrintArea');

            const opt = {
                margin: 10,
                filename: 'Invoice-{{ $transaksi->order_id }}.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };

            // 🔥 LANGSUNG DOWNLOAD PDF (TANPA PRINT DIALOG)
            html2pdf()
                .set(opt)
                .from(element)
                .save();
        }
    </script>
</body>


<!-- Mirrored from creativelayers.net/themes/viatours-html/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:59:45 GMT -->

</html>
