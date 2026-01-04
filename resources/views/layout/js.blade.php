    <!-- JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
    <script src="../../../unpkg.com/%40googlemaps/markerclusterer%402.6.2/dist/index.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script src="{{ asset('template/js/vendors.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
    @flasher_render
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        const defaultLat = -7.983908; // Malang
        const defaultLng = 112.621391;

        const map = L.map('map').setView([defaultLat, defaultLng], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([defaultLat, defaultLng], {
            draggable: true
        }).addTo(map);

        function setLatLng(lat, lng) {
            marker.setLatLng([lat, lng]);
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
            map.setView([lat, lng], 15);
        }

        map.on('click', e => setLatLng(e.latlng.lat, e.latlng.lng));

        marker.on('dragend', e => {
            const p = e.target.getLatLng();
            setLatLng(p.lat, p.lng);
        });

        // Autocomplete search
        let timer;
        document.getElementById('search-location').addEventListener('input', function() {
            clearTimeout(timer);
            if (this.value.length < 3) return;

            timer = setTimeout(() => {
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${this.value}`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.length > 0) {
                            setLatLng(data[0].lat, data[0].lon);
                        }
                    });
            }, 600);
        });
    </script>
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    @if (session('warning'))
        <script>
            toastr.warning("{{ session('warning') }}");
        </script>
    @endif
