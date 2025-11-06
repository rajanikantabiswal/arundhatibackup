<!doctype html>

<html class="no-js" lang="zxx">



<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Today's Gold Rate </title>

    <meta name="author" content="Arundhati Jewellers">

    <meta name="description" content="Today's Gold Rate in Bhubaneswar">

    <meta name="keywords" content="Arundhati Jewellers">

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

</head>



<body>



    <svg viewBox="0 0 150 150" class="svg-hidden">

        <path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>

    </svg>

    <?php include 'header.php'; ?>



    <div class="container-fluid">

        <img src="assets/img/hero/GOLD-RATE.jpg">

    </div>





    <section class="overflow-hidden space-top space-extra-bottom bg-gradient-2" style="margin-top:-100px;">

        <div class="container">

            <div class="row gx-60 flex-row-reverse">

                <h2 class="text-center">Arundhati's Gold Rate</h2>

            </div>

        </div>

    </section>



    <section>

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <img src="assets/img/hero/gold-rate-design.jpg">

                </div>

                <div class="col-md-6">

                    <table class="table">

                        <thead class="thead-dark">

                            <tr>

                                <th scope="col" colspan="4" class="table-active text-center" style="background-color:#9A0056;color:#fff;">Today's Gold Rate</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <th scope="row">24 KT</th>

                                <td>₹<span class="gold-rate-24k">--</span>/gm</td>

                            </tr>

                            <tr>

                                <th scope="row">22 KT(916)</th>

                                <td>₹<span class="gold-rate-22k">--</span>/gm</td>

                            </tr>

                            <tr>

                                <th scope="row">18 KT(750)</th>

                                <td>₹<span class="gold-rate-18k">--</span>/gm</td>

                            </tr>

                            <tr>

                                <th scope="row">Silver</th>

                                <td>₹<span class="silver-rate">--</span>/gm</td>

                            </tr>



                            <!--<tr>-->

                            <!--    <th scope="row">24 KT</th>-->

                            <!--    <td>₹9858/gm</td>-->

                            <!--</tr>-->

                            <!--<tr>-->

                            <!--    <th scope="row">22 KT(916)</th>-->

                            <!--    <td>₹9180/gm</td>-->

                            <!--</tr>-->

                            <!--<tr>-->

                            <!--    <th scope="row">18 KT(750)</th>-->

                            <!--    <td>₹7511/gm</td>-->

                            <!--</tr>-->

                            <!--<tr>-->

                            <!--    <th scope="row">Silver</th>-->

                            <!--    <td>₹120/gm</td>-->

                            <!--</tr>-->

                        </tbody>

                    </table>

                </div>



            </div>

        </div>

    </section>

    <br /><br />





    <?php include 'footer.php'; ?>



    <script>
        document.addEventListener("DOMContentLoaded", function() {

            fetch("https://www.arundhatijewellers.com/shop/wp-json/jewellery/v1/gold-rates")

                .then(response => response.json())

                .then(data => {

                    if (data.success) {

                        const rates = data.rates;

                        const gold_rate_22k = document.querySelectorAll(".gold-rate-22k");

                        const gold_rate_24k = document.querySelectorAll(".gold-rate-24k");

                        const gold_rate_18k = document.querySelectorAll(".gold-rate-18k");

                        const silver_rate = document.querySelectorAll(".silver-rate");

                        gold_rate_22k.forEach(element => {

                            element.textContent = rates['22k'];

                        });

                        gold_rate_24k.forEach(element => {

                            element.textContent = rates['24k'];

                        });

                        gold_rate_18k.forEach(element => {

                            element.textContent = rates['18k'];

                        });

                        silver_rate.forEach(element => {

                            element.textContent = rates['silver'];

                        });

                    } else {

                        console.error("Error fetching gold rates.");

                    }

                })

                .catch(error => {

                    console.error("Fetch error:", error);

                });

        });
    </script>