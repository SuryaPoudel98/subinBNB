<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simon & Peter AirBnb Business</title>
    <link rel="icon" href="images/icon.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style.css">

</head>

<body>

    <div class="main">

    <?php include('header.php'); ?>

   

        <div class="about">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6">
                        <h1>Contact</h1>
                        <div>
                            <div>
                                <p>Address:<br />1234 Sandy Beach Road Queenscliffe, New Zealand.<br />Contact:<br />Sally Sharp<br />(00)1234 1122</p>
                            </div>
                            <p>Cancellation policy:<br />Free if cancelled at least one week prior to stay. Receive a 50% refund after that.<br />No refund 48 hours before date of stay.</p>
                            </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="containers">
                            <form action="/action_page.php">
                              <label for="fname">First Name</label>
                              <input type="text" id="fname" name="firstname" placeholder="Your name..">
                          
                              <label for="lname">Last Name</label>
                              <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                          
                              <label for="country">Country</label>
                              <select id="country" name="country">
                                <option value="australia">Australia</option>
                                <option value="canada">Canada</option>
                                <option value="usa">USA</option>
                              </select>
                          
                              <label for="subject">Subject</label>
                              <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                          
                              <input type="submit" value="Submit">
                            </form>
                          </div>
                    </div>

                </div>
            </div>

        </div>

        <?php include('footer.php');?>


    </div>
</body>

</html>