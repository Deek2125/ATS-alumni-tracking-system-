<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Alumni Tracking System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');

        :root {
            --green: #219150;
            --black: #10221b;
            --white: #fff;
            --light-bg: #eee;
            --orange: #00FFFF;
            --text-color-1: #444;
            --text-color-2: #666;
            --bg-color-1: #fff;
            --bg-color-2: #eee;
            --box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
        }

        * {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-transform: capitalize;
            outline: none;
            border: none;
            text-decoration: none;
            transition: all .2s linear;
        }

        *::selection {
            background: var(--orange);
            color: #fff;
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-padding-top: 6rem;
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg-color-2);
        }

        body.active {
            --text-color-1: #fff;
            --text-color-2: #eee;
            --bg-color-1: #333;
            --bg-color-2: #222;
            --box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .4);
        }

        section {
            padding: 2rem 9%;
        }

        .heading {
            text-align: center;
            padding: 2.5rem 0;
        }

        .heading span {
            font-size: 3.5rem;
            background: var(--black);
            color: var(--orange);
            border-radius: .5rem;
            padding: .2rem 1rem;
            display: inline-block;
        }

        .heading span.space {
            background: none;

        }


        .btn {
            display: inline-block;
            margin-top: 1rem;
            background: var(--bg-color-1);
            color: var(--text-color-1);
            padding: .8rem 3rem;
            border: var(--border);
            cursor: pointer;
            font-size: 1.7rem;
            padding: 1rem 3rem;


            &:hover {
                background: var(--black);
                color: var(--white);
            }
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #333;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 9%;
        }

        header .logo {
            font-size: 2.5rem;
            font-weight: bolder;
            color: #fff;
            text-transform: uppercase;
        }

        header .logo span {
            color: var(--orange);
        }

        header .navbar a {
            color: #fff;
            font-size: 2rem;
            margin: 0 .8rem;
        }

        header .navbar a:hover {
            color: var(--orange);
        }

        header .icons i {
            font-size: 2.5rem;
            color: #fff;
            cursor: pointer;
            margin-right: 2rem;
        }

        header .icons i:hover {
            color: var(--orange);
        }




        #menu-bar {
            color: #fff;
            border: .1rem solid #fff;
            border-radius: .5rem;
            font-size: 3rem;
            padding: .5rem 1.2rem;
            cursor: pointer;
            display: none;
        }

        .home {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column;
            position: relative;
            z-index: 0;
        }

        .home .content {
            text-align: center;
        }

        .home .content h3 {
            font-size: 4.5rem;
            color: #fff;
            text-transform: uppercase;
            text-shadow: 0.3rem .5rem rgba(0, 0, 0, .1);
        }

        .home .content p {
            font-size: 2.5rem;
            color: #fff;
            padding: .5rem 0;
        }

        .home .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .home .controls {
            padding: 1rem;
            border-radius: 5rem;
            background: rgba(0, 0, 0, .7);
            position: relative;
            top: 10rem;
        }

        .home .controls .vid-btn {
            height: 2rem;
            width: 2rem;
            display: inline-block;
            border-radius: 50%;
            background: #fff;
            cursor: pointer;
            margin: 0.5rem;
        }

        .home .controls .vid-btn.active {
            background: var(--orange);
        }

        .about {
            background: var(--light-bg);
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .about.image {
            flex: 1 1 42rem;
            padding-right: 5rem;
            padding-bottom: 5rem;
        }

        .about.image img {
            width: 100%;
            box-shadow: 4rem 4rem 0 rgba(0, 0, 0, .1);
        }


        .about.content {
            flex: 1 1 42rem;

            font-size: 3rem;
            color: var(--green);
        }

        .about.content p {
            font-size: 1.5rem;
            color: var(--black);
            padding: 1rem 0;
            line-height: 2;
        }



        .services .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .services .box-container .box {
            flex: 1 1 30rem;
            border-radius: .5rem;
            padding: 1rem;
            text-align: center;
        }

        .services .box-container .box i {
            padding: 1rem;
            font-size: 5rem;
            color: var(--orange);
        }

        .services .box-container .box h3 {
            font-size: 2.5rem;
            color: var(--text-color-2);

        }

        .services .box-container .box p {
            font-size: 1.5rem;
            color: var(--text-color-1);
            padding: 1rem 0;
        }

        .services .box-container .box:hover {
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
        }



        .reviews .reviews-slider {
            padding-bottom: 2rem;
        }

        .reviews .box {
            padding: 2rem;
            text-align: center;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
            border-radius: .5rem;
        }

        .reviews .box img {
            height: 13rem;
            width: 13rem;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .reviews .box h3 {
            color: var(--text-color-2);
            font-size: 2.5rem;
        }

        .reviews .box p {
            color: var(--text-color-1);
            font-size: 1.5rem;
            padding: 1rem 0;
        }

        .reviews .box .stars i {
            color: var(--orange);
            font-size: 1.7rem;
        }

        .contact .row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            align-items: center;
        }

        .contact .row .image {
            flex: 1 1 35rem;
        }

        .contact .row .image img {
            width: 100%;
        }


        .contact .row .form {
            flex: 1 1 50rem;
            padding: 2rem;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
            border-radius: .5rem;
        }

        .contact .row form .inputBox {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .contact .row form .inputBox input,
        .contact .row form textarea {
            width: 49%;
            margin: 1rem 0;
            padding: 1rem;
            font-size: 1.7rem;
            color: #333;
            background: #f7f7f7;
            text-transform: none;
        }

        .contact .row form textarea {
            height: 15rem;
            resize: none;
            width: 100%;

        }

        .faq {
            background-color: var(--bg-color-2);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }



        .faq-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .faq-item {
            padding: 20px;
            background-color: var(--bg-color-1);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            font-weight: bolder;
            color: var(--text-color-1);
            margin-bottom: 10px;
        }

        .faq-answer {
            color: var(--text-color-1);
            line-height: 1.4;
        }



        .footer {
            background: #333;
        }

        .footer .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .footer .box-container .box {
            padding: 2.5rem;
            flex: 1 1 25rem;
        }

        .footer .box-container .box h3 {
            font-size: 2.5rem;
            padding: 7rem 0;
            color: #fff;
        }

        .footer .box-container .box p {
            font-size: 1.5rem;
            padding: .7rem 0;
            color: #eee;
        }

        .footer .box-container .box a {
            display: block;
            font-size: 1.5rem;
            padding: .7rem 0;
            color: #eee;
        }

        .footer .box-container .box a:hover {
            color: var(--orange);
            text-decoration: underline;
        }

        .footer .credit {
            text-align: center;
            padding: 2rem 1rem;
            margin-top: 1rem;
            font-size: 2rem;
            font-weight: normal;
            color: #fff;
            border-top: .1rem solid rgba(255, 255, 255, .2);
        }

        .footer .credit span {
            color: var(--orange);
        }




        /* media queries */

        @media(max-width:1200px) {
            html {
                font-size: 55%;
            }
        }

        @media(max-width:991px) {
            header {
                padding: 2rem;
            }

            section {
                padding: 2rem;
            }
        }

        @media(max-width:768px) {
            #menu-bar {
                display: initial;
            }

            header .navbar {
                position: absolute;
                top: 100%;
                right: 0;
                left: 0;
                background: #333;
                border-top: .1rem solid rgba(255, 255, 255, .2);
                padding: 1rem 2rem;
                clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            }

            header .navbar.active {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }

            header .navbar a {
                display: block;
                border-radius: .5rem;
                padding: 1.5rem;
                margin: 1.5rem 0;
                background: #222;
            }
        }

        @media(max-width:450px) {
            html {
                font-size: 50%;
            }

            .heading span {
                font-size: 2.5rem;
            }

            .contact .row form .inputBox input {
                width: 100%;

            }








        }

        .btn {
            display: block;
            margin: 50px auto;
            width: fit-content;
            border: 1px solid #ff004f;
            padding: 14px 50px;
            border-radius: 6px;
            text-decoration: none;
            color: #fff;
            transition: background 0.5s;
        }

        .btn:hover {
            background: #ff004f;
        }

        .contact-left {
            flex-basis: 35%;

        }

        .contact-right {
            flex-basis: 60%;
        }

        .contact-left p {
            margin-top: 30px;
        }

        .contact-left p i {
            color: darkgoldenrod;
            margin-right: 15px;
            font-size: 25px;
        }

        .social-icons {
            margin-top: 30px;
        }

        .social-icons a {
            text-decoration: none;
            font-size: 30px;
            margin-right: 15px;
            color: hotpink;
            display: inline-block;
            transition: transform 0.5s;
        }

        .social-icons a:hover {
            color: #ff004f;
            transform: translateY(-5px);
        }

        .btn.btn2 {
            display: inline-block;
            background: #ff004f;
        }

        .contact-right form {
            width: 100%;
        }

        form input,
        form textarea {
            width: 100%;
            border: 0;
            outline: none;
            background: #262626;
            padding: 15px;
            margin: 15px 0;
            color: #fff;
            font-size: 18px;
            border-radius: 6px;
        }

        form .btn2 {
            padding: 14px 60px;
            font-size: 18px;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- header section starts-->

    <header>

        <div id="menu-bar" class="fa fa-bars"></div>

        <a href="#" class="logo"><span>A</span>lumni<span>E</span>dition<i class="fa fa-graduation-cap"></i></a>

        <nav class="navbar">
            <!-- <a href="index.php">home</a>
            <a href="index.php?page=about">about</a> -->

            <a href="#services">services</a>

            <a href="#reviews">reviews</a>
            <a href="#faq">fAQ</a>
            <a href="#contact">contact</a>


        </nav>
        <div class="icons">
            <i class="fas fa-sun" id="theme-btn"></i>

        </div>

    </header>

    <!-- header section ends-->



    <!-- home section starts -->

    <section class="home" id="home">
        <div class="content">
            <h3>Alumni Edition: Bridging Past and Future,</h3>
            <p>Where Memories Thrive and Networks Flourish!</p>
            <h3>
                <marquee width=" 100%" direction="right" behavior="alternate" text-color="black"><a href="index.php">
                        Checkout our main website...</a>
                </marquee>
            </h3>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="images/video-1.mp4"></span>
            <span class="vid-btn" data-src="images/video-2.mp4"></span>
            <span class="vid-btn" data-src="images/video-3.mp4"></span>
            <span class="vid-btn" data-src="images/video-4.mp4"></span>
            <span class="vid-btn" data-src="images/video-5.mp4"></span>
        </div>

        <div class="video-container">
            <video src="images/videos-1.mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>
    <!-- home section ends -->

    <!--book section starts here-->
    <!-- <section class="about" id="about">
        <h1 class="heading">
            <span>a</span>
            <span>b</span>
            <span>o</span>
            <span>u</span>
            <span>t</span>
            <span class="space"></span>
            <span>u</span>
            <span>s</span>
        </h1>

        <div class="image">
            <img src="images/appointment.png">
        </div>
        <div class="content">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. At dolores in fugit accusamus, rerum atque
                expedita dolorum quas fugiat perspiciatis magnam voluptate commodi suscipit facere unde, tempora sequi
                neque! Enim?</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt, ullam! Distinctio, assumenda?
                Cupiditate ipsa maiores et, iusto doloribus omnis? Ipsa pariatur rerum dolorem. Temporibus ad atque vel
                rerum impedit distinctio.</p>
            <a href="#" class="btn">read more</a>
        </div>
    </section> -->
    <!--book section ends here-->


    <!--services section starts here-->
    <section class="services" id="services">
        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>

        </h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-message"></i>
                <h3>Communication Tools</h3>
                <p>Facilitate communication between the institution and its alumni through emails, newsletters, and
                    announcements. Some systems may also integrate with social media platforms.</p>
            </div>

            <div class="box">
                <i class="fas fa-calendar-days"></i>
                <h3>Event Management</h3>
                <p>Organize and manage alumni events, reunions, and networking opportunities. This includes features for
                    event planning,</p>
            </div>

            <div class="box">
                <i class="fas fa-chart-simple"></i>
                <h3>Analytics and Reporting</h3>
                <p>Provide analytics tools to track engagement, measure the success of alumni programs, and generate
                    reports for institutional analysis.
                </p>
            </div>

            <div class="box">
                <i class="fas fa-folder-open"></i>
                <h3>Alumni Directory</h3>
                <p>Create a searchable directory of alumni profiles, making it easy for individuals to find and connect
                    with their former classmates or colleagues.
                </p>
            </div>

            <div class="box">
                <i class="fas fa-mobile-screen"></i>
                <h3>Mobile Accessibility:</h3>
                <p>A mobile-friendly platform to ensure alumni can access the system conveniently from their
                    smartphones.</p>
            </div>

            <div class="box">
                <i class="fas fa-chalkboard-user"></i>
                <h3>Mentorship Programs</h3>
                <p>Facilitate mentorship programs, allowing alumni to mentor current students or recent graduates.</p>
            </div>
    </section>
    <!--services section ends here-->




    <!--review section starts here-->

    <section class="reviews" id="reviews">
        <h1 class="heading">
            <span>r</span>
            <span>e</span>
            <span>v</span>
            <span>i</span>
            <span>e</span>
            <span>w</span>
            <span>s</span>

        </h1>
        <div class="swiper mySwiper reviews-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="box">
                        <img src="https://images.squarespace-cdn.com/content/v1/5264f7c9e4b0a3247c641860/1645676808475-MUFAINOYPRI5CDJZFZPZ/samyang-135mm-AF_07.jpg?format=1500w"
                            alt="">
                        <h3>Naomi Wu</h3>
                        <p>
                            This alumni tracking website is fantastic for reconnecting with classmates.
                            The user-friendly interface and networking features make staying in touch a breeze. Highly
                            recommended for a seamless alumni experience.
                        </p>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="https://english.cdn.zeenews.com/sites/default/files/2017/11/17/639329-indian-men.jpg"
                            alt="">
                        <h3>Vihaan Malhotra</h3>
                        <p>
                            Thrilled with this alumni tracking platform! It simplifies reconnecting with old friends,
                            and the event coordination features are superb. Kudos to the developers for creating a
                            fantastic tool for alumni connections.</p>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="https://images.unsplash.com/photo-1530785602389-07594beb8b73?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cG9ydHJhaXRzfGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                            alt="">
                        <h3>Jenna Stephen</h3>
                        <p>
                            The alumni tracking website is helpful but could be more robust. Improved search
                            functionality and enhanced engagement features would elevate the user experience. Overall,
                            useful for basic tracking but has room for improvement.</p>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="https://img.freepik.com/free-photo/cheerful-indian-businessman-smiling-closeup-portrait-jobs-career-campaign_53876-129416.jpg?size=626&ext=jpg&ga=GA1.1.1546980028.1703980800&semt=ais"
                            alt="">
                        <h3>Xavier Thompson</h3>
                        <p>
                            This alumni tracking website exceeded expectations. It not only reconnects me with
                            classmates but also provides valuable job and mentorship opportunities. An essential tool
                            to stay connected with my alma mater.
                        </p>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box">
                        <img src="https://images.unsplash.com/photo-1607346256330-dee7af15f7c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW5kaWFuJTIwbWFufGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                            alt="">
                        <h3>Aarav Kapoor</h3>
                        <p>
                            The alumni tracking website shows promise, but minor glitches in the interface need
                            attention. A bit more customization for profiles would enhance the user experience. Despite
                            this, it serves its purpose well.


                        </p>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="box">
                        <img src="https://cdn1.matadornetwork.com/blogs/1/2016/03/India4real.jpg" alt="">
                        <h3>Sanskriti Chauhan</h3>
                        <p>
                            The speed and convenience of this alumni tracking website stand out. Updating my profile and
                            finding fellow alumni is quick and easy. A time-saving solution for staying in the loop with
                            the alma mater community.</p>
                        <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--frequently asked questions starts here-->
    <section class="faq" id="faq">

        <h1 class="heading">
            <span>f</span>
            <span>a</span>
            <span>q</span>
        </h1>
        <!-- <div class="content-accordion">
            <div class="question-answer">
                <div class="question">
                    <h3 class="title-question">
                        What is alumni meet?

                    </h3>
                    <button class="question-btn">
                        <span class="up-icon">
                            <i class="fas fa-chevron-up"></i>
                        </span>
                        <span class="down-icon">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>
                </div>
                <div class="answer">
                    <p>An alumni meet website is an online platform that connects graduates of a particular school or
                        college. It provides information about upcoming events, facilitates registration, and offers
                        details about activities and speakers. The goal is to foster a sense of community, allowing
                        alumni to reconnect with their alma mater and each other.</p>
                </div>
            </div>
            <div class="question-answer">
                <div class="question">
                    <h3 class="title-question">
                        How can I register for the alumni meet?

                    </h3>
                    <button class="question-btn">
                        <span class="up-icon">
                            <i class="fas fa-chevron-up"></i>
                        </span>
                        <span class="down-icon">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>
                </div>
                <div class="answer">
                    <p> You can register by visiting the "Signup" page on our website. Follow the simple steps and
                        provide the required information to secure your spot.</p>
                </div>
            </div>
            <div class="question-answer">
                <div class="question">
                    <h3 class="title-question">
                        what is the advantage of alumni meet website?
                    </h3>
                    <button class="question-btn">
                        <span class="up-icon">
                            <i class="fas fa-chevron-up"></i>
                        </span>
                        <span class="down-icon">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </button>
                </div>
                <div class="answer">
                    <p> The alumni meet website streamlines event participation and communication, fostering
                        reconnections, networking, and easy access to valuable resources for the alumni community. It
                        serves as a centralized hub for seamless engagement and professional development.</p>
                </div>
            </div>

        </div>
        <div class="question-answer">
            <div class="question">
                <h3 class="title-question">
                    How do I stay updated on alumni news year-round?
                </h3>
                <button class="question-btn">
                    <span class="up-icon">
                        <i class="fas fa-chevron-up"></i>
                    </span>
                    <span class="down-icon">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </button>
            </div>
            <div class="answer">
                <p>We'll be updating the events in this website</p>
            </div>
        </div>

        </div>
    </section> -->

        <div class="faq-container">

            <div class="faq-list">
                <div class="faq-item">
                    <h3 class="faq-question">What is alumni meet?</h3>
                    <p class="faq-answer">An alumni meet website is an online platform that connects graduates of a
                        particular school or
                        college. It provides information about upcoming events, facilitates registration, and offers
                        details about activities and speakers. The goal is to foster a sense of community, allowing
                        alumni to reconnect with their alma mater and each other.</p>
                </div>
                <br>
                <div class="faq-item">
                    <h3 class="faq-question">Can I cancel my registration?</h3>
                    <p class="faq-answer">Yes, you can cancel your registration by contacting our support team
                        within 24 hours of registration.</p>
                </div><br>
                <div class="faq-item">
                    <h3 class="faq-question">How can I register for the alumni meet?</h3>
                    <p class="faq-answer">You will receive a confirmation email with your registration details upon
                        successful completion of the registration process.</p>
                </div><br>
                <div class="faq-item">
                    <h3 class="faq-question">what is the advantage of alumni meet website?</h3>
                    <p class="faq-answer">The alumni meet website streamlines event participation and communication,
                        fostering
                        reconnections, networking, and easy access to valuable resources for the alumni community.
                        It
                        serves as a centralized hub for seamless engagement and professional development.</p>
                </div><br>
                <div class="faq-item">
                    <h3 class="faq-question">How do I stay updated on alumni news year-round?</h3>
                    <p class="faq-answer">We'll be updating the events in this website</p>
                </div>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">

        <h1 class="heading">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>

        </h1>

        <div id="id">
            <div id="Contact">
                <div class="row">
                    <div class="col">
                        <div class="contact-left">
                            <h1 class="sub-title">Contact Me</h1>
                            <p><i class="fa-solid fa-envelopes-bulk"></i>contact@lalithdeekshitha25@gmail.com</p>
                            <p><i class="fa-solid fa-phone-volume"></i>8431818677</p>
                            <div class="social-icons">
                                <a href=""><i class="fa-brands fa-instagram"></i></a>
                                <a
                                    href="https://www.linkedin.com/in/deekshitha-lalith-00513424a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i
                                        class="fa-brands fa-linkedin"></i></a>
                                <a href="https://mail.google.com/mail/u/0/#inbox"><i
                                        class="fa-regular fa-envelope"></i></a>
                            </div>

                        </div>
                        <div class="contact-right">
                            <form name="submit-to-google-sheet">
                                <input type="text" name="Name" placeholder="Your Name" required>
                                <input type="email" name="email" placeholder="Your Email" required>
                                <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                                <button type="submit" class="btn btn2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </section>



    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>about us</h3>
                <p>Welcome to AlumniEdition, a dedicated platform designed to strengthen the bond between our
                    graduates
                    and the alma mater. This system serves as a dynamic hub, connecting alumni with the institution
                    and
                    each other. Through comprehensive profiles, users can explore the diverse achievements and
                    career
                    paths of fellow graduates. </p>
            </div>
            <div class="box">
                <h3>branch locations</h3>
                <a
                    href="https://www.google.co.in/maps/place/Mysuru,+Karnataka/@12.3106368,76.565649,12z/data=!4m15!1m8!3m7!1s0x3baf70381d572ef9:0x2b89ece8c0f8396d!2sMysuru,+Karnataka!3b1!8m2!3d12.2958104!4d76.6393805!16zL20vMGo2MDM!3m5!1s0x3baf70381d572ef9:0x2b89ece8c0f8396d!8m2!3d12.2958104!4d76.6393805!16zL20vMGo2MDM"><i
                        class="fa-solid fa-location-dot"></i> india</a>
                <a
                    href="https://www.google.co.in/maps/place/Brooklyn,+NY,+USA/@40.6451594,-74.0850822,11z/data=!3m1!4b1!4m15!1m8!3m7!1s0x89c24fa5d33f083b:0xc80b8f06e177fe62!2sNew+York,+NY,+USA!3b1!8m2!3d40.7127753!4d-74.0059728!16zL20vMDJfMjg2!3m5!1s0x89c24416947c2109:0x82765c7404007886!8m2!3d40.6781784!4d-73.9441579!16zL20vMGNyM2Q"><i
                        class="fa-solid fa-location-dot"></i> USA</a>
                <a
                    href="https://www.google.co.in/maps/place/Paris,+France/@48.8584985,2.0599506,11z/data=!4m15!1m8!3m7!1s0xd54a02933785731:0x6bfd3f96c747d9f7!2sFrance!3b1!8m2!3d46.227638!4d2.213749!16zL20vMGY4bDlj!3m5!1s0x47e66e1f06e2b70f:0x40b82c3688c9460!8m2!3d48.856614!4d2.3522219!16zL20vMDVxdGo"><i
                        class="fa-solid fa-location-dot"></i> france</a>
                <a
                    href="https://www.google.co.in/maps/place/Tokyo,+Japan/@35.6679029,139.4537667,11z/data=!3m1!4b1!4m15!1m8!3m7!1s0x34674e0fd77f192f:0xf54275d47c665244!2sJapan!3b1!8m2!3d36.204824!4d138.252924!16zL20vMDNfM2Q!3m5!1s0x60188b857628235d:0xcdd8aef709a2b520!8m2!3d35.6803997!4d139.7690174!16s%2Fg%2F11b6gnvfr8"><i
                        class="fa-solid fa-location-dot"></i> japan</a>
                <a
                    href="https://www.google.co.in/maps/place/Colombo,+Sri+Lanka/@6.9218335,79.7861647,12z/data=!3m1!4b1!4m15!1m8!3m7!1s0x3ae2593cf65a1e9d:0xe13da4b400e2d38c!2sSri+Lanka!3b1!8m2!3d7.873054!4d80.771797!16zL20vMDZtXzU!3m5!1s0x3ae253d10f7a7003:0x320b2e4d32d3838d!8m2!3d6.9270786!4d79.861243!16zL20vMGZuN3I"><i
                        class="fa-solid fa-location-dot"></i> sri lanka</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <!-- <a href="#home"><i class="fa-solid fa-link"></i>home</a>
                <a href="#book"><i class="fa-solid fa-link"></i>book</a>
                <a href="#packages"><i class="fa-solid fa-link"></i>packages</a> -->
                <a href="#services"><i class="fa-solid fa-link"></i>services</a>
                <!-- <a href="#gallery"><i class="fa-solid fa-link"></i>gallery</a> -->
                <a href="#reviews"><i class="fa-solid fa-link"></i>reviews</a>
                <a href="#contact"><i class="fa-solid fa-link"></i>contact</a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i>facebook</a>
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i>instagram</a>
                <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter"></i>twitter</a>
                <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin"></i>linkedin</a>

            </div>

        </div>

        <h1 class="credit">created by <span>Bit Loaders</span><br><br> <i class="fa-regular fa-copyright"></i>all
            rights
            reserved</h1>

    </section>

















    <!--footer section ends here-->



    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!--custom js file link -->
    <script>
        let menu = document.querySelector('#menu-bar');
        let navbar = document.querySelector('.navbar');
        let videoBtn = document.querySelectorAll('.vid-btn');


        window.onscroll = () => {
            menu.classList.remove('fa-times');
            navbar.classList.remove('active');
        }

        menu.addEventListener('click', () => {
            menu.classList.toggle('fa-times');
            navbar.classList.toggle('active');

        });
        let themeButton = document.querySelector('#theme-btn');
        themeButton.onclick = () => {
            themeButton.classList.toggle('fa-moon');
            themeButton.classList.toggle('fa-sun');

            if (themeButton.classList.contains('fa-moon')) {
                document.body.classList.add('active');
            } else {
                document.body.classList.remove('active');
            }
        };




        videoBtn.forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelector('.controls .active').classList.remove('active');
                btn.classList.add('active');
                let src = btn.getAttribute('data-src');
                document.querySelector('#video-slider').src = src;
            });
        });

        var swiper = new Swiper(".reviews-slider", {

            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3500,
                disbleOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                760: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }

        });
        const questions = document.querySelectorAll('.question-answer');


        const scriptURL = 'https://script.google.com/macros/s/AKfycbyyqEb7z1aXIZZ_guleBu-dknIlomdwEcuoBpD536C_HXtwrWTrsjsym8qJy3FH2D4/exec'
        const form = document.forms['submit-to-google-sheet']

        form.addEventListener('submit', e => {
            e.preventDefault()
            fetch(scriptURL, { method: 'POST', body: new FormData(form) })
                .then(response => console.log('Success!', response))
                .catch(error => console.error('Error!', error.message))
        })
    </script>