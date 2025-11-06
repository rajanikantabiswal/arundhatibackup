<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <title>Arundhati Jewellers | Trusted Jewellery Store in Odisha</title>
    <meta name="author" content="Arundhati Jewellers">
    <meta name="description" content="Arundhati jewellers is a Top rated Gold & Diamond Jewellery Store in Bhubaneswar , Odisha. We are Odisha's Largest Jewellery Brand Presence In Nine Cities across Odisha.">

    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="canonical" href="https://www.arundhatijewellers.com/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        :root {
            --primary-gold: #ED1D24;
            --dark-gold: #f83b42ff;
            --light-gold: #fc8185ff;
            --dark-bg: #1a1a1a;
            --card-bg: #ffffff;
        }

        .search-section {
            background: white;
            padding: 2.5rem 0;
            position: relative;
            z-index: 10;
            margin-top: -20px;
            border-radius: 20px 20px 0 0;
        }

        .search-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .search-input {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .search-input:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
            background: white;
        }

        .btn-location {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border: 1px solid var(--primary-gold);
            border-radius: 15px;
            padding: 15px 25px;
            color: var(--primary-gold);
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
        }

        .btn-location svg {
            width: 24px;
            height: 24px;
        }

        .btn-location:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
            background: linear-gradient(135deg, var(--dark-gold), var(--primary-gold));
            color: white;
        }

        .store-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(212, 175, 55, 0.1);
            margin-bottom: 2rem;
        }

        .store-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .store-image {
            height: 250px;
            background: linear-gradient(135deg, var(--light-gold), var(--primary-gold));
            position: relative;
            overflow: hidden;
        }

        .store-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .store-card:hover .store-image img {
            transform: scale(1.05);
        }

        .store-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(26, 26, 26, 0.9);
            color: var(--primary-gold);
            padding: 8px 15px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .store-info {
            padding: 2rem;
        }

        .store-name {
            color: var(--dark-bg);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .store-address {
            color: #6c757d;
            font-size: 1rem;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .store-contact {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark-bg);
            font-size: 0.95rem;
        }

        .contact-item i {
            color: var(--primary-gold);
            width: 18px;
        }

        .btn-directions {}

        .btn-directions:hover {}

        .map-container {
            height: 200px;
            background: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
            margin-top: 1rem;
            position: relative;
        }

        .filter-tabs {
            background: white;
            border-radius: 15px;
            padding: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .filter-btn {
            background: transparent;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            padding: 10px 20px;
            margin: 0.25rem;
            color: #6c757d;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, var(--primary-gold), var(--dark-gold));
            border-color: var(--primary-gold);
            color: white;
        }

        .filter-btn:hover {
            border-color: var(--primary-gold);
            color: var(--primary-gold);
        }

        .loading {
            text-align: center;
            padding: 3rem 0;
            color: var(--primary-gold);
        }

        .no-results {
            text-align: center;
            padding: 3rem 0;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .search-card {
                padding: 1.5rem;
            }

            .store-info {
                padding: 1.5rem;
            }

            .store-contact {
                flex-direction: column;
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script type='text/javascript'>
        window.smartlook || (function(d) {
            var o = smartlook = function() {
                    o.api.push(arguments)
                },
                h = d.getElementsByTagName('head')[0];
            var c = d.createElement('script');
            o.api = new Array();
            c.async = true;
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.src = 'https://web-sdk.smartlook.com/recorder.js';
            h.appendChild(c);
        })(document);
        smartlook('init', '9bbc300e4df7b13c9cb35cc07af9ef213f2ad5c6', {
            region: 'eu'
        });
    </script>
</head>

<body class="home-4">
    <?php include 'header.php'; ?>

    <div class="search-section">
        <div class="container">
            <div class="search-card">
                <div class="row g-3">
                    <div class="col-md-4">
                        <button class="btn btn-location w-100" onclick="getCurrentLocation()">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path fill="currentColor" d="M288-16c17.7 0 32 14.3 32 32l0 18.3c98.1 14 175.7 91.6 189.7 189.7l18.3 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-18.3 0c-14 98.1-91.6 175.7-189.7 189.7l0 18.3c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-18.3C157.9 463.7 80.3 386.1 66.3 288L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l18.3 0C80.3 125.9 157.9 48.3 256 34.3L256 16c0-17.7 14.3-32 32-32zM128 256a160 160 0 1 0 320 0 160 160 0 1 0 -320 0zm160-96a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                            </svg>
                            Use Current Location
                        </button>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control search-input" id="searchInput" placeholder="Search by city, district or pincode...">
                    </div>
                    <div class="col-md-3">
                        <select class="form-control search-input" id="cityDropdown">
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">

        <div id="storeResults" class="row">
            <!-- Stores will be populated here -->
        </div>

        <div id="loading" class="loading" style="display: none;">
            <i class="fas fa-spinner fa-spin fa-2x"></i>
            <p class="mt-3">Finding nearest stores...</p>
        </div>

        <div id="noResults" class="no-results" style="display: none;">
            <i class="fas fa-search fa-3x mb-3"></i>
            <h4>No stores found</h4>
            <p>Try adjusting your search criteria or location</p>
        </div>
    </div>
    <?php include 'footer.php'; ?>



    <script>
        // Sample store data for Odisha
        const stores = [{
                id: 1,
                name: "Arundhati Jewellers - Bhubaneswar",
                address: "11/A, Janpath Rd, Satya Nagar, Bhubaneswar, Odisha 751014",
                city: "Bhubaneswar",
                district: "Khordha",
                pincode: "751014",
                phone: "18003450018",
                email: "info@arundhatijewellers.com",
                lat: 20.280290528554996,
                lng: 85.84415083975297,
                locationUrl: "https://maps.app.goo.gl/GTmbfhK2P8CMcYVu5",
                image: "bhubaneswar.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 2,
                name: "Arundhati Jewellers - Cuttack",
                address: "Cantonment Rd, Maachhua Bazar, Near waris motors, Buxi Bazaar, Cuttack, Odisha 753001",
                city: "Cuttack",
                district: "Cuttack",
                pincode: "753001",
                phone: "09124629822",
                email: "info@arundhatijewellers.com",
                lat: 20.477575388594257,
                lng: 85.88078211534068,
                locationUrl: "https://maps.app.goo.gl/BSEoytCfoZzUbxRJ6",
                image: "cuttack.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 3,
                name: "Arundhati Jewellers - Puri",
                address: "Patitapaban Complex, Grand Rd, opp. Bagala VIP Suites, Balagandi, Puri, Odisha 752001",
                city: "Puri",
                district: "Puri",
                pincode: "752001",
                phone: "09124629838",
                email: "info@arundhatijewellers.com",
                lat: 19.8135,
                lng: 85.8312,
                locationUrl: "https://maps.app.goo.gl/2JK1A4Eu8RDkMKWR8",
                image: "puri.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 4,
                name: "Arundhati Jewellers - Berhampur",
                address: "Shankar Plaza, 526, Sano Bazar, Triveni Nagar, Brahmapur, Odisha 760002",
                city: "Berhampur",
                district: "Ganjam",
                pincode: "760002",
                phone: "18003450018",
                email: "info@arundhatijewellers.com",
                lat: 19.316195829937538,
                lng: 84.78060740905035,
                locationUrl: "https://maps.app.goo.gl/f4m1zjoQwQH6Q4yB9",
                image: "berhampur.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 5,
                name: "Arundhati Jewellers - Sambalpur",
                address: "Lilabati Complex, Budharaja, Sambalpur, Odisha 768004",
                city: "Sambalpur",
                district: "Sambalpur",
                pincode: "768004",
                phone: "09078885542",
                email: "info@arundhatijewellers.com",
                lat: 21.480379571589044,
                lng: 83.97859156861638,
                locationUrl: "https://maps.app.goo.gl/zykwTftRGiLt9HQp9",
                image: "sambalpur.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 6,
                name: "Arundhati Jewellers - Rourkela",
                address: "Bisra Rd, near Central Park, Udit Nagar, Rourkela, Odisha 769001",
                city: "Rourkela",
                district: "Sundargarh",
                pincode: "769001",
                phone: "18003450018",
                email: "info@arundhatijewellers.com",
                lat: 22.225428672803904,
                lng: 84.86282426863472,
                locationUrl: "https://maps.app.goo.gl/wSbKuYZMzPnmJaak8",
                image: "rourkela.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 7,
                name: "Arundhati Jewellers - Bhawanipatna",
                address: "near Maa Manikeshwari Temple, Bazarpada, Bhawanipatna, Odisha Bhawanipatna 766001",
                city: "Bhawanipatna",
                district: "Bhawanipatna",
                pincode: "766001",
                phone: "07682845512",
                email: "info@arundhatijewellers.com",
                lat: 19.906400223498796,
                lng: 83.16888478454689,
                locationUrl: "https://maps.app.goo.gl/7Eo6oL99aeUR8Tu9A",
                image: "bhawanipatna.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 8,
                name: "Arundhati Jewellers - Balangir",
                address: "Sonepur Road, near Patneswari Mandir, Balangir, Odisha 767001",
                city: "Balangir",
                district: "Balangir",
                pincode: "767001",
                phone: "18003450018",
                email: "info@arundhatijewellers.com",
                lat: 20.7077706972238,
                lng: 83.49130663981107,
                locationUrl: "https://maps.app.goo.gl/SofbGnGAwBFz5795A",
                image: "balangir.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 9,
                name: "Arundhati Jewellers - Bargarh",
                address: "Bargarh Rd, Bargarh, Odisha 768028",
                city: "Bargarh",
                district: "Bargarh",
                pincode: "768028",
                phone: "18003450018",
                email: "info@arundhatijewellers.com",
                lat: 21.335761937416944,
                lng: 83.61979450069107,
                locationUrl: "https://maps.app.goo.gl/MHfyYJDgvs3sLcgN8",
                image: "bargarh.jpg",
                hours: "10:00 AM - 9:00 PM"
            },
            {
                id: 10,
                name: "Arundhati Jewellers - Angul",
                address: "Plot No-24/1554, Sankar Cinema road, Angul, Odisha 759122",
                city: "Angul",
                district: "Angul",
                pincode: "759122",
                phone: "07682861553",
                email: "info@arundhatijewellers.com",
                lat: 20.837549608697906,
                lng: 85.08915488921532,
                locationUrl: "https://maps.app.goo.gl/NKoAgPHdLty4tRzy7",
                image: "angul.jpg",
                hours: "10:00 AM - 9:00 PM"
            }
        ];

        let filteredStores = stores;
        let userLocation = null;

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            populateCityDropdown();
            displayStores(stores);

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', handleSearch);
            document.getElementById('cityDropdown').addEventListener('change', handleCityFilter);
        });

        function populateCityDropdown() {
            const cityDropdown = document.getElementById('cityDropdown');
            const cities = [...new Set(stores.map(store => store.city))].sort();

            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                cityDropdown.appendChild(option);
            });
        }

        function displayStores(storesToShow) {
            const resultsContainer = document.getElementById('storeResults');
            const noResults = document.getElementById('noResults');

            if (storesToShow.length === 0) {
                resultsContainer.innerHTML = '';
                noResults.style.display = 'block';
                return;
            }

            noResults.style.display = 'none';

            // Sort by distance if user location is available
            if (userLocation) {
                storesToShow = storesToShow.sort((a, b) => {
                    const distA = calculateDistance(userLocation.lat, userLocation.lng, a.lat, a.lng);
                    const distB = calculateDistance(userLocation.lat, userLocation.lng, b.lat, b.lng);
                    return distA - distB;
                });
            }

            resultsContainer.innerHTML = storesToShow.map(store => createStoreCard(store)).join('');
        }

        function createStoreCard(store) {
            const distance = userLocation ?
                calculateDistance(userLocation.lat, userLocation.lng, store.lat, store.lng) : null;

            return `
                <div class="col-md-6 col-lg-4">
                    <div class="store-card fade-in">
                        <div class="store-image">
                            <img src="./assets/img/stores/${store.image}" alt="${store.name}" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22400%22 height=%22250%22><rect width=%22100%%22 height=%22100%%22 fill=%22%23D4AF37%22/><text x=%2250%%22 y=%2250%%22 font-family=%22Arial%22 font-size=%2218%22 fill=%22white%22 text-anchor=%22middle%22 dy=%22.3em%22>Store Image</text></svg>'">
                        </div>
                        <div class="store-info">
                            <h3 class="store-name">${store.name}</h3>
                            <p class="store-address">
                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                ${store.address}
                            </p>
                            
                            <div class="store-contact">
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <span>${store.phone}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-clock"></i>
                                    <span>${store.hours}</span>
                                </div>
                                ${distance ? `
                                <div class="contact-item">
                                    <i class="fas fa-route"></i>
                                    <span>${distance.toFixed(1)} km away</span>
                                </div>
                                ` : ''}
                            </div>
                            
                            <div class="d-flex justify-content-start  align-items-center">
                                <a href="${store.locationUrl}" 
                                   target="_blank" 
                                   class="btn-directions btn btn-outline-danger bg-danger text-white btn-md me-2">
                                    <i class="fas fa-directions"></i>
                                    Get Directions
                                </a>
                                <button class="btn btn-outline-danger btn-md d-sm-none" onclick="callStore('${store.phone}')">
                                    <i class="fas fa-phone"></i>
                                </button>
                                
                                <button class="btn btn-outline-danger btn-md d-none d-sm-inline-block" onclick="sendOnWhatsApp('${store.phone}')">
                                    <i class="fab fa-whatsapp"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function getCurrentLocation() {
            const loading = document.getElementById('loading');
            loading.style.display = 'block';

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        // Find nearest stores
                        const nearestStores = stores.map(store => ({
                            ...store,
                            distance: calculateDistance(userLocation.lat, userLocation.lng, store.lat, store.lng)
                        })).sort((a, b) => a.distance - b.distance);

                        loading.style.display = 'none';
                        displayStores(nearestStores);

                        // Show success message
                        showToast('Location found! Showing nearest stores.', 'success');
                    },
                    function(error) {
                        loading.style.display = 'none';
                        showToast('Unable to get your location. Showing all stores.', 'warning');
                        displayStores(stores);
                    }
                );
            } else {
                loading.style.display = 'none';
                showToast('Geolocation is not supported by this browser.', 'error');
            }
        }

        function handleSearch() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const cityFilter = document.getElementById('cityDropdown').value;

            let filtered = stores;

            if (searchTerm) {
                filtered = filtered.filter(store =>
                    store.name.toLowerCase().includes(searchTerm) ||
                    store.city.toLowerCase().includes(searchTerm) ||
                    store.district.toLowerCase().includes(searchTerm) ||
                    store.address.toLowerCase().includes(searchTerm) ||
                    store.pincode.includes(searchTerm)
                );
            }

            if (cityFilter) {
                filtered = filtered.filter(store => store.city === cityFilter);
            }

            filteredStores = filtered;
            displayStores(filtered);
        }

        function handleCityFilter() {
            handleSearch(); // Reuse search logic
        }

        function calculateDistance(lat1, lng1, lat2, lng2) {
            const R = 6371; // Radius of the Earth in kilometers
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLng = (lng2 - lng1) * Math.PI / 180;
            const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLng / 2) * Math.sin(dLng / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c;
        }

        function callStore(phone) {
            window.location.href = `tel:${phone}`;
        }

        function sendOnWhatsApp(phone) {
            window.open('https://api.whatsapp.com/send/?phone=919078885541&text=Hi%2C+I%E2%80%99m+interested+in+exploring+your+wedding+collection.+Could+you+please+share+the+latest+designs+and+booking+details%3F&type=phone_number&app_absent=0', '_blank');
        }

        function showToast(message, type) {
            // Simple toast notification (you can enhance this)
            const toast = document.createElement('div');
            toast.className = `alert alert-${type === 'success' ? 'success' : type === 'warning' ? 'warning' : 'danger'} position-fixed`;
            toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            toast.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'exclamation-triangle' : 'times-circle'} me-2"></i>
                ${message}
            `;

            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    </script>
</body>

</html>