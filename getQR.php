<!DOCTYPE html>
<html lang="en" >
<head>
	<title>QR Code Generator</title>
    <link rel="stylesheet" href="./style/homePage.css">
    <link rel="stylesheet" href="./style/qr.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	
</head>
<body>
<div class="container">
    <nav>
        <input type="checkbox" id="check">
        <label for="check">
            <i class='bx bx-menu' id="btn"></i>
            <i class='bx bx-x' id="cancle"></i>
        </label>
        <label class="logo"><a href="" >Pet<i class='bx bxs-dog'></i>Safty</a></label>
        <ul>
            <li><a href="/getQR.php">Get QR</a></li>
            <li><a href="/index.html#steps">About</a></li>
            <li><a href="/index.html#footer">Contact</a></li>
        </ul>
    </nav> 
    <section>
        <div class="form_container">
            <div class="form_field">
                <h3 style="    color: rgb(219, 13, 13);
                font-size: 20px;">Get QR For FREE</h3>
                <h3 style="font-size: 16px;
                font-weight: 600;">QR Information</h3>
                <?php
                $petname = "";
                $type = "";
                $name = "";
                $address = "";
                $Phone = "";
                $email = "";
                

                if (isset($_POST["btnsubmit"])) {
                        $petname = $_POST["petname"];
                        $type = $_POST["type"];
                        $name = $_POST["name"];
                        $address = $_POST["address"];
                        $phone = $_POST["Phone"];
                        $email = $_POST["email"];

                        /*echo "<pre>";
                        var_dump($_POST);
                        echo "</pre>";*/
                }
                ?>
                <form autocomplete="off"  role="form" action="index.php" method="post">
                    <div class="form_element">
                        <label for="petname">Pet Name</label>
                        <input type="text" id="petname" name="petname" value="<?php echo $petname;?>" placeholder="Enter Pet Name">
                    </div>

                    <div class="form_element">
                        <label for="type">Animal Type</label>
                        <input type="text" id="type" name="type" value="<?php echo $type;?>" placeholder="Enter Type of Animal">
                    </div>

                    <div class="form_element">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name"  value="<?php echo $name;?>"placeholder="Enter Your Name">
                    </div>

                    <div class="form_element">
                        <label for="address">Your Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $address;?>" placeholder="Enter Your Address">
                    </div>

                    <div class="form_element">
                        <label for="address">Phone Number</label>
                        <input type="text" id="phone" name="Phone" value="<?php echo $Phone;?>" placeholder="Phone Number">
                    </div>

                    <div class="form_element">
                        <label for="address">E-mail</label>
                        <input type="text" id="email" name="email"  value="<?php echo $email;?>"placeholder="Enter Email">
                    </div>

                    <button type="submit" name="btnsubmit">Get QR</button>
                </form>
                <?php
 									include "phpqrcode/qrlib.php";
 									$PNG_TEMP_DIR = 'temp/';
 									if (!file_exists($PNG_TEMP_DIR))
									    mkdir($PNG_TEMP_DIR);

									$filename = $PNG_TEMP_DIR . 'test.png';

									if (isset($_POST["btnsubmit"])) {
                                    
									$codeString = "Pet Name : ";
									$codeString = $_POST["petname"] . "\n Animal Type : ";
									$codeString = $_POST["type"] . "\n Parent Name : ";
									$codeString .= $_POST["name"] . "\n Address : ";
									$codeString .= $_POST["address"] . "\n Phone Number : ";
									$codeString .= $_POST["Phone"] . "\n Email : ";
									$codeString .= $_POST["email"] . "\n Please Help ME to rich my Home";

									$filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';

									QRcode::png($codeString, $filename);

									echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><hr/>';
									echo '<a href="' . $PNG_TEMP_DIR . basename($filename) . '" download>download QR </a><hr/>';
								}

								?>
            </div>
        </div>
    </section>
</div>
</body>
</html>