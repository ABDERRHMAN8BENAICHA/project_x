<?php $pageis = "Contact" ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>CONTACT</title>
</head>

<body id="page-contact">
    <?php include "./includes/nav-bar.php" ?>
    <section class="lets-talk">
        <h1 style="font-size: 40px;">#let's_talk</h1>
        <p style="font-size: 20px;">LEAVE A MESSAGE. We love to hear from you!</p>
    </section>
    <div class="info-and-map">
        <div class="info-and-map container">
            <div class="info-contact">
                <ul>
                    <li>GET IN TOUCH</li>
                    <li>
                        <h1>Visit one of our agency locations <br>
                            or contact us today</h1>
                    </li>
                    <li><b>Head Office</b></li>
                    <li><i class="fa-regular fa-map"></i><span>56 Glassford Street Glasgow GI IL.IL New York</span></li>
                    <li><i class="fa-regular fa-envelope"></i><span>contact@example.com</span></li>
                    <li><i class="fa-solid fa-phone"></i><span>contact@example.com</span></li>
                    <li><i class="fa-solid fa-clock"></i><span>Monday to Saturday: 9 OOam to 16 pm</span></li>
                </ul>
            </div>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d8884.32589993786!2d6.892311476280086!3d33.47894405367244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2sdz!4v1696798391014!5m2!1sar!2sdz"
                    width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box-contact">
            <div class="input">
                <div>
                    <p>EAVEAMESSAGE</p>
                    <h1>We love to hear from you</h1>
                </div>
                <div>
                    <input type="text" placeholder="Your Name">
                </div>
                <div>
                    <input type="email" placeholder="E-mail">
                </div>
                <div>
                    <input type="text" placeholder="Subject">
                </div>
                <div>
                    <textarea placeholder="Your Message">

                    </textarea>
                </div>
                <button type="submit">submit</button>
            </div>

            <div class="mempurs">
                <div class="box-mempurs">
                    <img src="/img/people/1.png" alt="">
                    <ul>
                        <li>
                            <h1>John Doe</h1>
                        </li>
                        <li>Sentor Marketing Manager</li>
                        <li>Phone: + OOO 123 OOO 77 88</li>
                        <li>contact@example.com</li>
                    </ul>
                </div>
                <div class="box-mempurs">
                    <img src="/img/people/2.png" alt="">
                    <ul>
                        <li>
                            <h1>William Smith</h1>
                        </li>
                        <li>Sentor Marketing Manager</li>
                        <li>Phone: + OOO 123 OOO 77 88</li>
                        <li>contact@example.com</li>
                    </ul>
                </div>
                <div class="box-mempurs">
                    <img src="/img/people/3.png" alt="">
                    <ul>
                        <li>
                            <h1>Emma Stone</h1>
                        </li>
                        <li>Sentor Marketing Manager</li>
                        <li>Phone: + OOO 123 OOO 77 88</li>
                        <li>contact@example.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?php include "./includes/subscription.php" ?>
    <?php include "./includes/footer.php" ?>
</body>

</html>