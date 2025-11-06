<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Us - Arundhati Jewellers</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <link rel="shortcut icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Marcellus&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .notification {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
            display: none;
            animation: slideDown 0.3s ease;
        }

        .notification.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .notification.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-loading {
            opacity: 0.6;
            cursor: not-allowed;
            position: relative;
        }

        .btn-loading::after {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            right: 20px;
            margin-top: -8px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spinner 0.6s linear infinite;
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <svg viewBox="0 0 150 150" class="svg-hidden">
        <path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
    </svg>

    <?php include 'header.php'; ?>

    <div class="breadcumb-wrapper" data-bg-src="assets/img/hero/bbg.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact <span class="inner-text">Us</span></h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact <span class="inner-text">Enquiry</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="space">
        <div class="container">
            <div class="row gx-70">
                <div class="col-lg-6 mb-40 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center text-lg-start">
                        <h2 class="sec-title3 h1 text-uppercase mb-xxl-2 pb-xxl-1">Get in <span class="text-theme">Touch</span></h2>
                    </div>

                    <!-- Notification Area -->
                    <div id="notification" class="notification"></div>

                    <!-- Contact Form -->
                    <form id="contactForm" method="post">
                        <div class="form-inner">
                            <div class="input-field mb-3">
                                <input required type="text" name="name" id="name" placeholder="Type Name">
                                <span></span>
                            </div>
                            <div class="input-field mb-3">
                                <input required type="tel" name="phone" id="phone" placeholder="Type Phone Number" pattern="[0-9]{10}">
                                <span></span>
                            </div>
                            <div class="input-field mb-3">
                                <input required type="email" name="email" id="email" placeholder="Type email address">
                                <span></span>
                            </div>
                            <div class="input-field mb-3">
                                <textarea required name="message" id="message" placeholder="A brief Description here" rows="4"></textarea>
                                <span></span>
                            </div>
                        </div>

                        <button type="submit" id="submitBtn" class="submit" style="background-color:#000; color:#fff; border:none; padding:12px 30px; cursor:pointer; border-radius:5px;">
                            Submit Your Enquiry
                        </button>
                    </form>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14970.835620325171!2d85.84194487937836!3d20.27090388261874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a19a731adcb39a3%3A0x7e0cadbad99515b4!2sArundhati%20Jewellers%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1682572290107!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="contact-table">
                        <div class="tr">
                            <div class="tb-col">
                                <span class="th">Address :</span>
                                <span class="td">11/A, Janpath Rd, Satya Nagar, Bhubaneswar, Odisha 751014</span>
                            </div>
                        </div>
                        <div class="tr">
                            <div class="tb-col">
                                <span class="th">email :</span>
                                <span class="td"><a href="mailto:info@arundhatijewellers.com" class="text-inherit">info@arundhatijewellers.com</a></span>
                            </div>
                            <div class="tb-col">
                                <span class="th">time : </span>
                                <span class="td">10 : 00 a.m - 9 : 00 p.m</span>
                            </div>
                        </div>
                    </div>

                    <span class="h4">
                        <a href="tel:+911800 345 0018" class="text-inherit">
                            <i class="fal fa-headset me-3 text-theme"></i>1800 345 0018
                        </a>
                    </span>
                    <span class="h4">
                        <a href="https://api.whatsapp.com/send?phone=919078885541" target="_blank" class="text-inherit">
                            | <img src="assets/img/hero/wsp-icon.png" style="height:30px;"> 9078885541
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const submitBtn = document.getElementById('submitBtn');
            const notification = document.getElementById('notification');
            const formData = new FormData(form);

            // Disable submit button and show loading state
            submitBtn.disabled = true;
            submitBtn.classList.add('btn-loading');
            submitBtn.textContent = 'Sending...';

            // Hide previous notifications
            notification.style.display = 'none';

            // Send AJAX request
            fetch('submit-contact.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Show notification
                    notification.style.display = 'block';
                    notification.className = 'notification ' + (data.success ? 'success' : 'error');
                    notification.textContent = data.message;

                    // Reset form if successful
                    if (data.success) {
                        form.reset();
                    }

                    // Scroll to notification
                    notification.scrollIntoView({
                        behavior: 'smooth',
                        block: 'nearest'
                    });

                    // Hide notification after 5 seconds
                    setTimeout(() => {
                        notification.style.display = 'none';
                    }, 5000);
                })
                .catch(error => {
                    notification.style.display = 'block';
                    notification.className = 'notification error';
                    notification.textContent = 'An error occurred. Please try again.';
                    console.error('Error:', error);
                })
                .finally(() => {
                    // Re-enable submit button
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('btn-loading');
                    submitBtn.textContent = 'Submit Your Enquiry';
                });
        });
    </script>
</body>

</html>