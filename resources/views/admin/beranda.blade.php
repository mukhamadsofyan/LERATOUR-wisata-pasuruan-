<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/viatours-html/db-main.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:58:40 GMT -->
@include('layout.head')
<style>
    /* =========================
   MODERN CHART STYLE
========================= */
    .tabs__pane {
        min-height: 340px;
        padding-top: 10px;
    }

    .tabs__pane canvas {
        width: 100% !important;
        height: 300px !important;
    }

    .chart-container {
        position: relative;
    }

    /* Tooltip custom feel */
    .chartjs-tooltip {
        border-radius: 12px !important;
    }
</style>

<body>
    @include('layout.preloader')

    <main>

        <div class="dashboard -is-sidebar-visible js-dashboard">
            @include('layout.sidebar')

            <div class="dashboard__content">
                <div class="dashboard__content_header">
                    <div class="d-flex items-center">
                        <div class="mr-60">
                            <button class="d-flex js-toggle-db-sidebar">
                                <i class="icon-main-menu text-20"></i>
                            </button>
                        </div>

                        <div
                            class="dashboard__content_header_search d-flex items-center py-5 px-20 rounded-200 border-1 md:d-none">
                            <i class="icon-search text-18 mr-10"></i>
                            <input type="text" placeholder="Search">
                        </div>
                    </div>

                    <div>
                        <div>
                            <button>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.75 8.125C18.5842 8.125 18.4253 8.19085 18.3081 8.30806C18.1908 8.42527 18.125 8.58424 18.125 8.75V13.75C18.125 14.2473 17.9275 14.7242 17.5758 15.0758C17.2242 15.4275 16.7473 15.625 16.25 15.625H3.75C3.25272 15.625 2.77581 15.4275 2.42417 15.0758C2.07254 14.7242 1.875 14.2473 1.875 13.75V8.75C1.875 8.58424 1.80915 8.42527 1.69194 8.30806C1.57473 8.19085 1.41576 8.125 1.25 8.125C1.08424 8.125 0.925268 8.19085 0.808058 8.30806C0.690848 8.42527 0.625 8.58424 0.625 8.75V13.75C0.625 14.5788 0.95424 15.3737 1.54029 15.9597C1.83047 16.2499 2.17497 16.4801 2.55411 16.6371C2.93326 16.7942 3.33962 16.875 3.75 16.875H16.25C17.0788 16.875 17.8737 16.5458 18.4597 15.9597C19.0458 15.3737 19.375 14.5788 19.375 13.75V8.75C19.375 8.58424 19.3092 8.42527 19.1919 8.30806C19.0747 8.19085 18.9158 8.125 18.75 8.125Z"
                                        fill="#05073C" />
                                    <path
                                        d="M0.625 6.25C0.6251 6.37268 0.661304 6.49262 0.729099 6.59487C0.796894 6.69712 0.893282 6.77715 1.00625 6.825L7.7875 9.73125C8.48763 10.0313 9.24141 10.186 10.0031 10.186C10.7648 10.186 11.5186 10.0313 12.2188 9.73125L19 6.825C19.1118 6.77621 19.2069 6.69577 19.2735 6.59359C19.3401 6.49142 19.3754 6.37198 19.375 6.25C19.375 5.4212 19.0458 4.62634 18.4597 4.04029C17.8737 3.45424 17.0788 3.125 16.25 3.125H3.75C3.33962 3.125 2.93326 3.20583 2.55411 3.36288C2.17497 3.51992 1.83047 3.75011 1.54029 4.04029C0.95424 4.62634 0.625 5.4212 0.625 6.25ZM3.75 4.375H16.25C16.6786 4.37544 17.094 4.52268 17.4272 4.7922C17.7604 5.06172 17.9913 5.43725 18.0812 5.85625L11.725 8.58125C11.18 8.81509 10.5931 8.93568 10 8.93568C9.40692 8.93568 8.82003 8.81509 8.275 8.58125L1.91875 5.85625C2.00875 5.43725 2.23957 5.06172 2.57277 4.7922C2.90597 4.52268 3.32144 4.37544 3.75 4.375Z"
                                        fill="#05073C" />
                                </svg>
                            </button>
                        </div>

                        <div>
                            <button>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 3.75C9.655 3.75 9.375 3.47 9.375 3.125V2.5C9.375 2.155 9.655 1.875 10 1.875C10.345 1.875 10.625 2.155 10.625 2.5V3.125C10.625 3.47 10.345 3.75 10 3.75Z"
                                        fill="#05073C" />
                                    <path
                                        d="M15.455 9.20471C15.11 9.20471 14.83 8.92471 14.83 8.57971C14.83 6.03971 12.7675 3.87533 10.2325 3.75533C7.69434 3.63814 5.43152 5.59283 5.19246 8.11814C5.17809 8.26908 5.1709 8.42408 5.1709 8.57971C5.1709 8.92471 4.8909 9.20471 4.5459 9.20471C4.2009 9.20471 3.9209 8.92471 3.9209 8.57971C3.9209 8.38471 3.92996 8.18971 3.94809 8.00033C4.24902 4.82033 7.09809 2.35658 10.2915 2.50689C13.4834 2.65783 16.08 5.38221 16.08 8.57971C16.08 8.92502 15.8 9.20471 15.455 9.20471Z"
                                        fill="#05073C" />
                                    <path
                                        d="M16.6268 13.4675C16.4728 13.4675 16.3181 13.4106 16.1971 13.2966C15.3284 12.4741 14.83 11.3159 14.83 10.1194C14.83 9.77438 15.11 9.49438 15.455 9.49438C15.8 9.49438 16.08 9.77438 16.08 10.1194C16.08 10.9741 16.4359 11.8016 17.0565 12.3888C17.3071 12.6259 17.3181 13.0216 17.0809 13.2725C16.9581 13.4019 16.7925 13.4675 16.6268 13.4675Z"
                                        fill="#05073C" />
                                    <path
                                        d="M3.37297 13.4675C3.20703 13.4675 3.04172 13.4022 2.91891 13.2722C2.68172 13.0216 2.69266 12.6259 2.94328 12.3888C3.56391 11.8016 3.91985 10.9744 3.91985 10.1194C3.91985 9.77438 4.19985 9.49438 4.54485 9.49438C4.88985 9.49438 5.16985 9.77438 5.16985 10.1194C5.16985 11.3166 4.67141 12.4747 3.80266 13.2966C3.68141 13.4106 3.52703 13.4675 3.37297 13.4675Z"
                                        fill="#05073C" />
                                    <path
                                        d="M10 18.125C8.30625 18.125 6.875 16.6937 6.875 15C6.875 14.655 7.155 14.375 7.5 14.375C7.845 14.375 8.125 14.655 8.125 15C8.125 16.0163 8.98375 16.875 10 16.875C11.0163 16.875 11.875 16.0163 11.875 15C11.875 14.655 12.155 14.375 12.5 14.375C12.845 14.375 13.125 14.655 13.125 15C13.125 16.6937 11.6937 18.125 10 18.125Z"
                                        fill="#05073C" />
                                    <path
                                        d="M4.23328 15.625C3.47171 15.625 2.79421 15.1594 2.50703 14.4388C2.21953 13.7172 2.39109 12.9125 2.94421 12.3888C3.19484 12.1513 3.59015 12.1622 3.82796 12.4128C4.06515 12.6635 4.05453 13.0591 3.8039 13.2966C3.53015 13.556 3.63078 13.8825 3.66828 13.9763C3.70546 14.0694 3.8564 14.375 4.23328 14.375C4.57828 14.375 4.85828 14.655 4.85828 15C4.85828 15.345 4.57859 15.625 4.23328 15.625Z"
                                        fill="#05073C" />
                                    <path
                                        d="M15.7661 15.625C15.4211 15.625 15.1411 15.345 15.1411 15C15.1411 14.655 15.4211 14.375 15.7661 14.375C16.1433 14.375 16.2945 14.0681 16.332 13.9741C16.3692 13.8806 16.4695 13.5553 16.1958 13.2963C15.9452 13.0588 15.9342 12.6635 16.1714 12.4125C16.4089 12.1619 16.8042 12.151 17.0552 12.3881C17.6083 12.9119 17.7802 13.716 17.4933 14.4363C17.2058 15.1584 16.5277 15.625 15.7661 15.625Z"
                                        fill="#05073C" />
                                    <path
                                        d="M4.54541 10.7441C4.20041 10.7441 3.92041 10.4641 3.92041 10.1191V8.57971C3.92041 8.23471 4.20041 7.95471 4.54541 7.95471C4.89042 7.95471 5.17042 8.23471 5.17042 8.57971V10.1191C5.17042 10.4641 4.89073 10.7441 4.54541 10.7441Z"
                                        fill="#05073C" />
                                    <path
                                        d="M15.4536 10.7441C15.1086 10.7441 14.8286 10.4641 14.8286 10.1191V8.57971C14.8286 8.23471 15.1086 7.95471 15.4536 7.95471C15.7986 7.95471 16.0786 8.23471 16.0786 8.57971V10.1191C16.0786 10.4641 15.7986 10.7441 15.4536 10.7441Z"
                                        fill="#05073C" />
                                    <path
                                        d="M15.7673 15.625H4.23291C3.88791 15.625 3.60791 15.345 3.60791 15C3.60791 14.655 3.88791 14.375 4.23291 14.375H15.767C16.112 14.375 16.392 14.655 16.392 15C16.392 15.345 16.1123 15.625 15.7673 15.625Z"
                                        fill="#05073C" />
                                </svg>
                            </button>
                        </div>

                        <div>
                            <img src="{{ asset("template/img/dashboard/header/1.png") }}" alt="image">
                        </div>
                    </div>
                </div>

                <div class="dashboard__content_content">

                    <h1 class="text-30">Dashboard</h1>
                    <p class="">Halaman dashboard tentang LERATOUR</p>

                    <div class="row y-gap-30 pt-60 md:pt-30">

                        <div class="col-xl-3 col-sm-6">
                            <div class="rounded-12 bg-white shadow-2 px-30 py-30 h-full">
                                <div class="row y-gap-20 items-center justify-between">
                                    <div class="col-auto">
                                        <div>Total Pembelian Tiket</div>
                                        <div class="text-30 fw-700">{{ $totalPembelianTiket }}</div>

                                        <div>
                                            <span class="text-accent-1">Rp
                                                {{ number_format($pendapatanHariIni, 0, ',', '.') }}</span> Hari Ini
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="size-80 flex-center bg-accent-1-05 rounded-full">
                                            <i class="icon-wallet text-30 text-accent-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="rounded-12 bg-white shadow-2 px-30 py-30 h-full">
                                <div class="row y-gap-20 items-center justify-between">
                                    <div class="col-auto">
                                        <div>Total Wisata</div>
                                        <div class="text-30 fw-700">{{ $wisatatotal }}</div>

                                        <div>
                                            <span class="text-accent-1"></span> Per Hari Ini
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="size-80 flex-center bg-accent-1-05 rounded-full">
                                            <i class="icon-payment text-30 text-accent-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="rounded-12 bg-white shadow-2 px-30 py-30 h-full">
                                <div class="row y-gap-20 items-center justify-between">
                                    <div class="col-auto">
                                        <div>Total Kategori Wisata</div>
                                        <div class="text-30 fw-700">{{ $kategoritotal }}</div>

                                        <div>
                                            <span class="text-accent-1"></span> Per Hari Ini
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="size-80 flex-center bg-accent-1-05 rounded-full">
                                            <i class="icon-booking text-30 text-accent-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="rounded-12 bg-white shadow-2 px-30 py-30 h-full">
                                <div class="row y-gap-20 items-center justify-between">
                                    <div class="col-auto">
                                        <div>Total Testimoni</div>
                                        <div class="text-30 fw-700">{{ $testimonitotal }}</div>

                                        <div>
                                            <span class="text-accent-1"></span> Per Hari Ini
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="size-80 flex-center bg-accent-1-05 rounded-full">
                                            <i class="icon-heart text-30 text-accent-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row pt-30 y-gap-30">
                        <div class="col-xl-8 col-lg-12 col-md-6">
                            <div class="rounded-12 bg-white shadow-2 h-full">
                                <div class="pt-20 px-30">
                                    <div class="tabs -underline-2 js-tabs">
                                        <div class="d-flex items-center justify-between">
                                            <div class="text-18 fw-500">Grafik Pendapatan</div>

                                            <div
                                                class="tabs__controls row x-gap-20 y-gap-10 lg:x-gap-20 js-tabs-controls">

                                                <div class="col-auto">
                                                    <button
                                                        class="tabs__button fw-500 px-5 pb-5 lg:pb-0 js-tabs-button is-tab-el-active"
                                                        data-tab-target=".-tab-item-1">Hours</button>
                                                </div>

                                                <div class="col-auto">
                                                    <button
                                                        class="tabs__button fw-500 px-5 pb-5 lg:pb-0 js-tabs-button "
                                                        data-tab-target=".-tab-item-2">Weekly</button>
                                                </div>

                                                <div class="col-auto">
                                                    <button
                                                        class="tabs__button fw-500 px-5 pb-5 lg:pb-0 js-tabs-button "
                                                        data-tab-target=".-tab-item-3">Monthly</button>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tabs__pane -tab-item-1 is-tab-el-active">
                                            <canvas id="chart-harian"></canvas>
                                        </div>

                                        <div class="tabs__pane -tab-item-2">
                                            <canvas id="chart-mingguan"></canvas>
                                        </div>

                                        <div class="tabs__pane -tab-item-3">
                                            <canvas id="chart-bulanan"></canvas>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-12 col-md-6">
                            <div class="px-30 py-25 rounded-12 bg-white shadow-2">
                                <div class="d-flex items-center justify-between">
                                    <div class="text-18 fw-500">Recent Activities</div>
                                </div>

                                <div class="row y-gap-30 pt-30">

                                    <div class="col-12">
                                        <div class="d-flex items-center">
                                            <div class="flex-center size-40 bg-accent-1-05 rounded-full">
                                                <i class="icon-home text-16"></i>
                                            </div>

                                            <div class="lh-14 ml-10">
                                                Your listing House on the beverly hills has been approved
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex items-center">
                                            <div class="flex-center size-40 bg-accent-1-05 rounded-full">
                                                <i class="icon-review text-16"></i>
                                            </div>

                                            <div class="lh-14 ml-10">
                                                Dollie Horton left a review on House on the Northridge
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex items-center">
                                            <div class="flex-center size-40 bg-accent-1-05 rounded-full">
                                                <i class="icon-heart text-16"></i>
                                            </div>

                                            <div class="lh-14 ml-10">
                                                Someone favorites your Triple Story House for Rent listing
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex items-center">
                                            <div class="flex-center size-40 bg-accent-1-05 rounded-full">
                                                <i class="icon-heart text-16"></i>
                                            </div>

                                            <div class="lh-14 ml-10">
                                                Someone favorites your Triple Story House for Rent listing
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex items-center">
                                            <div class="flex-center size-40 bg-accent-1-05 rounded-full">
                                                <i class="icon-home text-16"></i>
                                            </div>

                                            <div class="lh-14 ml-10">
                                                Your listing House on the beverly hills has been approved
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex items-center">
                                            <div class="flex-center size-40 bg-accent-1-05 rounded-full">
                                                <i class="icon-review text-16"></i>
                                            </div>

                                            <div class="lh-14 ml-10">
                                                Dollie Horton left a review on House on the Northridge
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="pt-40">
                                    <button class="button -md -outline-accent-1 col-12 text-accent-1">
                                        View More
                                        <i class="icon-arrow-top-right text-16 ml-10"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center pt-30">
                        © Copyright LERATOUR 2025
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    @include('layout.js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            /* ===============================
               DATA DARI BACKEND (LARAVEL)
            =============================== */
            const harianLabelsRaw = @json($harian->pluck('label'));
            const harianDataRaw = @json($harian->pluck('total'));

            const mingguanLabelsRaw = @json($mingguan->pluck('label'));
            const mingguanDataRaw = @json($mingguan->pluck('total'));

            const bulananLabelsRaw = @json($bulanan->pluck('label'));
            const bulananDataRaw = @json($bulanan->pluck('total'));

            /* ===============================
               FORMAT LABEL
            =============================== */
            const harianLabels = harianLabelsRaw.map(j => j + ':00');
            const mingguanLabels = mingguanLabelsRaw.map(d =>
                new Date(d).toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'short'
                })
            );
            const bulananLabels = bulananLabelsRaw.map(b =>
                new Date(2025, b - 1).toLocaleDateString('id-ID', {
                    month: 'short'
                })
            );

            const harianData = harianDataRaw.map(Number);
            const mingguanData = mingguanDataRaw.map(Number);
            const bulananData = bulananDataRaw.map(Number);

            /* ===============================
               NORMALISASI (ANTI 1 TITIK)
            =============================== */
            function normalizeData(labels, data) {
                if (data.length < 2) {
                    return {
                        labels: ['06:00', '08:00', '10:00', '12:00', '14:00'],
                        data: [0, 0, data[0] ?? 0, 0, 0]
                    };
                }
                return {
                    labels,
                    data
                };
            }

            /* ===============================
               BASELINE PLUGIN
            =============================== */
            const baselinePlugin = {
                id: 'baseline',
                beforeDraw(chart) {
                    const {
                        ctx,
                        chartArea
                    } = chart;
                    ctx.save();
                    ctx.strokeStyle = 'rgba(79,70,229,0.3)';
                    ctx.setLineDash([6, 6]);
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(chartArea.left, chartArea.bottom);
                    ctx.lineTo(chartArea.right, chartArea.bottom);
                    ctx.stroke();
                    ctx.restore();
                }
            };

            /* ===============================
               CREATE CHART
            =============================== */
            function createLineChart(canvas, labels, data) {

                const ctx = canvas.getContext('2d');

                const gradient = ctx.createLinearGradient(0, 0, 0, 320);
                gradient.addColorStop(0, 'rgba(79,70,229,0.45)');
                gradient.addColorStop(1, 'rgba(79,70,229,0.05)');

                const maxVal = Math.max(...data, 1);

                return new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels,
                        datasets: [{
                            label: 'Pendapatan',
                            data,
                            borderColor: '#4F46E5',
                            backgroundColor: gradient,
                            fill: true,
                            borderWidth: 3,
                            tension: 0.45,
                            pointRadius: 4,
                            pointHoverRadius: 7,
                            pointBackgroundColor: '#ffffff',
                            pointBorderColor: '#4F46E5',
                            pointBorderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        animation: {
                            duration: 1200,
                            easing: 'easeOutQuart'
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: '#0f172a',
                                padding: 14,
                                cornerRadius: 10,
                                displayColors: false,
                                callbacks: {
                                    label: ctx =>
                                        'Rp ' + ctx.parsed.y.toLocaleString('id-ID')
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#64748b',
                                    font: {
                                        size: 12,
                                        weight: '500'
                                    }
                                }
                            },
                            y: {
                                min: 0,
                                max: maxVal * 1.3,
                                grid: {
                                    color: 'rgba(148,163,184,0.15)',
                                    drawBorder: false
                                },
                                ticks: {
                                    stepSize: Math.ceil(maxVal / 4) || 100000,
                                    color: '#64748b',
                                    callback: v => 'Rp ' + v.toLocaleString('id-ID')
                                }
                            }
                        }
                    },
                    plugins: [baselinePlugin]
                });
            }

            /* ===============================
               LOAD PER TAB (LAZY LOAD)
            =============================== */
            const charts = {};

            function loadChart(tabClass, labels, data) {
                if (charts[tabClass]) return;
                const canvas = document.querySelector(`${tabClass} canvas`);
                if (!canvas) return;
                const normalized = normalizeData(labels, data);
                charts[tabClass] = createLineChart(
                    canvas,
                    normalized.labels,
                    normalized.data
                );
            }

            // Default load
            loadChart('.-tab-item-1', harianLabels, harianData);

            document.querySelectorAll('.js-tabs-button').forEach(btn => {
                btn.addEventListener('click', function() {
                    const target = this.dataset.tabTarget;
                    if (target === '.-tab-item-1')
                        loadChart(target, harianLabels, harianData);
                    if (target === '.-tab-item-2')
                        loadChart(target, mingguanLabels, mingguanData);
                    if (target === '.-tab-item-3')
                        loadChart(target, bulananLabels, bulananData);
                });
            });

        });
    </script>




</body>


<!-- Mirrored from creativelayers.net/themes/viatours-html/db-main.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Dec 2025 17:58:46 GMT -->

</html>
