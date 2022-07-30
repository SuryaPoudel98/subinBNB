<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simon & Peter AirBnb Business</title>
    <link rel="icon" href="images/icon.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style.css">

</head>

<body>

    <div class="mainbody">

        <?php include('header.php'); ?>
        <div class="banner-display">


            <div class="container">
                <div class="mySlides">

                    <img src="images/banner.jpg" style="width:100%">
                </div>

                <div class="mySlides">

                    <img src="images/b3.png" style="width:100%">
                </div>

                <div class="mySlides">

                    <img src="images/b5.png" style="width:100%">
                </div>

                <div class="mySlides">

                    <img src="images/b4.png" style="width:100%">
                </div>


                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>




            </div>

            <script>
                let slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("demo");
                    let captionText = document.getElementById("caption");
                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                    captionText.innerHTML = dots[slideIndex - 1].alt;
                }
            </script>
        </div>


        <div class="about">
            <div class="container">
                <div class="row">

                    <div style="background-color: white; padding: 15px;" class="col-sm-4">
                        <h1>Vacation rentals in Ongaonga</h1>
                        <div>
                            <form action="/action_page.php">
                            <label for="country">Location</label>
                                <input type="text" id="location" name="location" placeholder="Ongaonga, New Zealand" required>

                                
                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-8">

                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/ScdUB2Q5Yh8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                </div>
            </div>

        </div>
        <div class="maincontent">
            <div class="container">
                <div class="row">
                    <div class="mt-4">
                        <h1>Things to do
                            on your trip</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="images/b1.png" style="border-radius: 20px;" height="400px">
                    </div>
                    <div class="col-sm-6">
                        <img src="images/b2.png" style="border-radius: 20px;" height="400px">
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col-sm-6">
                        <img src="images/b3.png" style="border-radius: 20px;" width="550px" height="400px">
                    </div>
                    <div class="col-sm-6">
                        <img src="images/b4.png" style="border-radius: 20px;" width="600px" height="400px">
                    </div>
                </div>
            </div>
        </div>



        <?php include('footer.php'); ?>


    </div>
</body>

</html>