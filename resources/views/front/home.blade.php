<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>لابراتوار تخصصی دندان</title>


    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:tahoma;
        }


        body{
            background:#f8fafb;
            color:#333;
        }


        header{

            background:white;
            height:85px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 8%;
            box-shadow:0 2px 15px rgba(0,0,0,.08);

        }


        .logo{

            font-size:28px;
            font-weight:bold;
            color:#b08d57;

        }


        nav a{

            text-decoration:none;
            color:#444;
            margin-right:25px;
            transition:.3s;

        }


        nav a:hover{

            color:#b08d57;

        }



        .hero{

            min-height:600px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:60px 8%;
            background:linear-gradient(
                120deg,
                #ffffff,
                #eef7f8
            );

        }



        .hero-text{

            width:50%;

        }


        .hero-text h1{

            font-size:45px;
            line-height:1.7;
            color:#222;

        }


        .hero-text p{

            margin-top:20px;
            line-height:2;
            color:#666;
            font-size:18px;

        }



        .button{

            display:inline-block;
            margin-top:30px;
            padding:14px 35px;
            background:#b08d57;
            color:white;
            text-decoration:none;
            border-radius:30px;

        }



        .hero-image{

            width:40%;
            height:350px;
            background:#ddd;
            border-radius:30px;
            display:flex;
            justify-content:center;
            align-items:center;
            color:#777;

        }




        section{

            padding:80px 8%;

        }



        .title{

            text-align:center;
            font-size:35px;
            margin-bottom:50px;

        }




        .cards{

            display:flex;
            gap:30px;

        }



        .card{

            background:white;
            flex:1;
            padding:35px;
            border-radius:25px;
            text-align:center;
            box-shadow:0 5px 20px rgba(0,0,0,.08);

        }



        .card h3{

            color:#b08d57;
            margin-bottom:15px;

        }




        .about{

            background:white;
            text-align:center;

        }


        .about p{

            max-width:850px;
            margin:auto;
            line-height:2;
            color:#666;

        }




        .portfolio{

            background:#f2f6f7;

        }



        .portfolio-grid{

            display:flex;
            gap:25px;

        }



        .portfolio-item{

            flex:1;
            height:250px;
            background:#ddd;
            border-radius:20px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#777;

        }




        .contact{

            text-align:center;

        }



        footer{

            background:#222;
            color:white;
            padding:35px;
            text-align:center;

        }




        @media(max-width:900px){


            nav{
                display:none;
            }


            .hero{

                flex-direction:column;

            }


            .hero-text,
            .hero-image{

                width:100%;
                margin-bottom:30px;

            }


            .cards,
            .portfolio-grid{

                flex-direction:column;

            }


        }



    </style>


</head>



<body>



<header>
    <div class="logo">
        Dental Lab
    </div>



    <nav>

        <a href="#">
            خانه
        </a>

        <a href="#">
            خدمات
        </a>

        <a href="#">
            نمونه کارها
        </a>

        <a href="#">
            مقالات
        </a>

        <a href="#">
            تماس با ما
        </a>

    </nav>


</header>





<section class="hero">


    <div class="hero-text">


        <h1>
            لابراتوار تخصصی ساخت لمینت و روکش دندان
        </h1>



        <p>

            ارائه خدمات تخصصی دندان با کیفیت بالا،
            طراحی دقیق و استفاده از جدیدترین تکنولوژی‌های روز دنیا.

        </p>



        <a href="#" class="button">
            مشاهده خدمات
        </a>


    </div>



    <div class="hero-image">

        تصویر اصلی سایت

    </div>


</section>






<section>


<h2 class="title">
    خدمات ما
</h2>



<div class="cards">


    <div class="card">

        <h3>
            لمینت دندان
        </h3>

        <p>
            ساخت لمینت‌های طبیعی و زیبا با دقت بالا.
        </p>

    </div>




    <div class="card">

        <h3>
            روکش دندان
        </h3>

        <p>
            تولید روکش‌های مقاوم و استاندارد.
        </p>

    </div>




    <div class="card">

        <h3>
            طراحی دیجیتال
        </h3>

        <p>
            استفاده از تکنولوژی‌های جدید طراحی دندان.
        </p>

    </div>



</div>


</section>







<section class="about">


<h2 class="title">
    درباره ما
</h2>



<p>

ما با بهره‌گیری از تجربه و دانش تخصصی،
در زمینه ساخت انواع لمینت، روکش و ترمیم‌های دندانی فعالیت می‌کنیم
و هدف ما ارائه بالاترین کیفیت به مشتریان است.

</p>


</section>







<section class="portfolio">


<h2 class="title">
    نمونه کارها
</h2>



<div class="portfolio-grid">


    <div class="portfolio-item">
        تصویر نمونه کار
    </div>


    <div class="portfolio-item">
        تصویر نمونه کار
    </div>


    <div class="portfolio-item">
        تصویر نمونه کار
    </div>


</div>



</section>







<section class="contact">


<h2 class="title">
    ارتباط با ما
</h2>


<p>
برای دریافت مشاوره با ما تماس بگیرید.
</p>


<a href="#" class="button">
    تماس با ما
</a>


</section>







<footer>

    لابراتوار تخصصی دندان | تمامی حقوق محفوظ است

</footer>



</body>

</html>