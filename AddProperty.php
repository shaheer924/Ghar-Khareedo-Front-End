<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        h1 {
            text-align: center;
            font-family: Tahoma, Arial, sans-serif;
            color: black;
            margin: 80px 0;
        }

        .box {
            width: 40%;
            margin: 0 auto;
            background: rgba(0, 0, 0, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }

        .button {
            font-size: 1em;
            padding: 10px;
            color: #fff;
            border: 2px solid gray;
            border-radius: 20px/50px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .button:hover {
            background: black;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 1s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: rgb(0, 0, 0);
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: rgb(22, 21, 21);
        }

        .popup .close:hover {
            color: black;
        }

        .popup .content {
            max-height: 30%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }

        .dropbtn {
            background-color: #f7f7f7;
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #f7f7f7;
        }
    </style>
    <script type="text/javascript">
        var subcategory = {
            Karachi: ["Azizabad", "Gulshan", "DHA", "Gulzar E Hijri"],
            Islamabad: ["PECHS", "DHA", "Pakistan Secretariat", "Blue Area"]
        }

        function makeSubmenu(value) {
            if (value.length == 0) document.getElementById("categorySelect").innerHTML = "<option></option>";
            else {
                var citiesOptions = "";
                for (categoryId in subcategory[value]) {
                    citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
                }
                document.getElementById("categorySelect").innerHTML = citiesOptions;
            }
        }

        function displaySelected() {
            var country = document.getElementById("category").value;
            var city = document.getElementById("categorySelect").value;
            alert(country + "\n" + city);
        }
        //for floors/levels
        function resetSelection() {
            document.getElementById("category").selectedIndex = 0;
            document.getElementById("categorySelect").selectedIndex = 0;
        }

        var subcategorys = {
            Homes: ["0th", "1st", "2nd", "3rd", "4th", "5th", "6th"],
            Flat: [0, 1, 2, 3, 4, 5, 6]
        }

        function makeSubmenus(value) {
            if (value.length == 0) document.getElementById("categorySelects").innerHTML = "<option></option>";
            else {
                var citiesOptions = "";
                for (categoryId in subcategorys[value]) {
                    citiesOptions += "<option>" + subcategorys[value][categoryId] + "</option>";
                }
                document.getElementById("categorySelects").innerHTML = citiesOptions;
            }
        }

        function displaySelecteds() {
            var country = document.getElementById("categorys").value;
            var city = document.getElementById("categorySelects").value;
            alert(country + "\n" + city);
        }

        function resetSelections() {
            document.getElementById("categorys").selectedIndex = 0;
            document.getElementById("categorySelects").selectedIndex = 0;
        }
    </script>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="form">
    <header>
        <div class="container">
            <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
                <!-- logo -->
                <div id="logo">
                    <h1><a href="index_seller.php"><img class="image" src="./edit.jpeg"></a></h1>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5" style="font-family: Poppins;">
                    <nav>
                        <label for="drop" class="toggle" style="font-family: Poppins;">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="./index_seller.php" style="font-family: Poppins;">Home</a></li>
                            <li><a href="./AddProperty.php" style="font-family: Poppins;">Add a Property</a></li>
                            <li>
                                <div class="dropdown" style="font-family: 'Poppins';">
                                    <button class="dropbtn">
                                        <?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?>
                                    </button>
                                    <div class="dropdown-content">
                                        <a href="#popup2">Details</a>
                                        <a href="./Favourites.html">Favourites</a>
                                        <a href="./includes/logout.php">Log Out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>
    <div class="inner-banner-w3lss">
        <br />
        <div class=" container formeds" style="font-family: Poppins;">
            <h3>Add Property</h3>
            <p style="color: black;"><span class="from-specify">*</span>Required Fields.</p>
            <br />
            <h6 class="heading-form">Property Type And Location</h6>
            <br />
            <form action="includes/AddProperty.inc.php" method="post">
                <div class="container Property-type">
                    <br />
                    <div onload="resetSelection()">
                        <div class="row">
                            <label class="col-2">City<span class="from-specify">*</span>: </label>
                            <div class="col-4">
                                <div class="form-group">
                                    <select required="" id="category" size="1" onchange="makeSubmenu(this.value)" class="form-control" name="city">
                                        <option value="" disabled selected>Select City</option>
                                        <option>Karachi</option>
                                        <option>Islamabad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <label class="col-2">Location<span class="from-specify">*</span>: </label>
                            <div class="col-4">
                                <div class="form-group">
                                    <select required="" id="categorySelect" size="1" class="form-control" name="location">
                                        <option value="" disabled selected>Select Location</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div onload="resetSelections()">
                        <div class="row">
                            <label class="col-2">Property Type<span class="from-specify">*</span>: </label>
                            <div class="col-4">
                                <div class="form-group">
                                    <select id="categorys" size="1" onchange="makeSubmenus(this.value)" class="form-control">
                                        <option value="" disabled selected>Select Property Type</option>
                                        <option>Homes</option>
                                        <option>Flat</option>
                                        <option>Plot</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <label class="col-2">Floors/Levels<span class="from-specify">*</span>: </label>
                            <div class="col-4">
                                <div class="form-group">
                                    <select id="categorySelects" size="1" class="form-control">
                                        <option value="" disabled selected>Select Floors/Level</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <label class="col-2">Property Type<span class="from-specify">*</span>: </label>
                        <div class="col-4">
                            <div class="form-group">
                                <select required="" class="form-control" name="propertyType">
                                    <option value="0">Select Property Type</option>
                                    <option value="1"><span>Home</span></option>
                                    <option value="2">Plot</option>
                                    <option value="3">Flat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="row">
                        <label class="col-2">Apartment/Society Name: <span class="from-specify">*</span>:</label>
                        <div class="col-4">
                            <input required="" type="text" class="form-control" placeholder="Enter Name Here" name="jaga"></input>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <label class="col-2">House No: <span class="from-specify">*</span>:</label>
                        <div class="col-4">
                            <input required="" type="text" class="form-control" placeholder="Enter House/Plot/Flat Number" name="jaganum"></input>
                        </div>
                    </div>
                </div>
                <br />
                <div class="container Property-type">
                    <div class="row">
                        <label class="col-2">Description<span class="from-specify">*</span>:</label>
                        <div class="col-5">
                            <textarea required="" name="description" id="" cols="50" rows="3" class="form-control" placeholder="Enter Description about your property"></textarea>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <label class="col-2">All Inclusive (PKR)<span class="from-specify">*</span>:</label>
                        <div class="col-4">
                            <input required="" type="number" class="form-control" placeholder="Enter Amount Here" name="price">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <label class="col-2">Land Area<span class="from-specify">*</span>: </label>
                        <div class="col-4">
                            <input required="" type="number" class="form-control" placeholder="Select Area (SQFT)" name="size">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <label class="col-2">Rooms<span class="from-specify">*</span>: </label>
                        <div class="col-4">
                            <div class="form-group">
                                <select required="" class="form-control" name="rooms">
                                    <option value="">Select Number of Rooms</option>
                                    <option value="1">0</option>
                                    <option value="2">1</option>
                                    <option value="3">2</option>
                                    <option value="4">3</option>
                                    <option value="5">4</option>
                                    <option value="6">5</option>
                                    <option value="7">6</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                </div>
                <br />
                <div class="row">
                    <button type="submit" class="btn btn_apt" style="background-color: #343a40; margin-bottom: 10px; margin-left: 450px;" name="add">
                        <a style="color: white;">Add Property</a></button>
                </div>
            </form>
        </div>
    </div>
    <br />
    <div id="popup2" class="overlay">
        <div class="popup">
            <h2>Your Details</h2>
            <hr />
            <a class="close" href="#">&times;</a>
            <div class="content product_meta">
                <span class="posted_in">
                    <strong>User Name : </strong>
                    <span>
                        <?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?>
                    </span>
                    <br />
                    <strong>Email Address : </strong>
                    <span>
                        <?php echo $_SESSION['email'] ?>
                    </span>
                    <br />
                    <strong>CNIC Number : </strong>
                    <span>
                        <?php echo $_SESSION['cnic'] ?>
                    </span>
                    <br />
                    <strong>Phone Number : </strong>
                    <span>
                        <?php echo $_SESSION['phno'] ?>
                    </span>
                    <br />
                    <strong>Account Type : </strong>
                    <span>Seller</span>
                </span>
            </div>
        </div>
    </div>
    </div>
    <div class="copyright-w3ls py-4" style="font-family: Poppins;">
        <div class="container">
            <div class="row">
                <!-- copyright -->
                <p class="col-lg-8 copy-right-grids text-wh text-lg-left text-center mt-lg-2">© 2019 Ghar Khareedo.pk.
                    All
                    Rights Reserved | Design by
                    <a href="#" target="_blank">SHAHEER AHMED SAROOSH</a>
                </p>
                <!-- //copyright -->
                <!-- social icons -->
                <div class="col-lg-4 w3social-icons text-lg-right text-center mt-lg-0 mt-3">
                    <ul>
                        <li>
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="px-2">
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li class="pl-2">
                            <a href="#" class="rounded-circle">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- //social icons -->
            </div>
        </div>
    </div>

</body>

</html>