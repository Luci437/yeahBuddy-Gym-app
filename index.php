<?php
    include('commonPartTop.php');
?>

<div class="mainRightSideBox">
    <!-- image slider box -->
    <div class="mainSliderBox">
        <div class="imageInSlider">
            <!-- BMI card -->
            <?php
                    if(isset($_SESSION['user_id'])) {
                        echo '
                        <div class="bmiCard">
                            <table class="bmiTable">
                                <tr>
                                    <td rowspan="2">
                                        <i class="fas fa-notes-medical userWeightIcon"></i>
                                    </td>
                                    <td>
                                        <h2 style="color: #fff;">BMI</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 id="bmiResult">We are the idiots</h5>
                                    </td>
                                </tr>
                            </table>
                            <button class="close-bmi" onclick="closeBmi()"><i class="fas fa-times"></i></button>
                    </div>
                        ';
                    }
                    ?>

            <?php
                    if(isset($_SESSION['user_id'])) {
                        $uid = $_SESSION['user_id'];
                        $currentMonth = date("M");
                        $currentYear = date("Y");
                        $fullMonth = date('F', strtotime(date('Y/m/d')));
    
                        require "includes/db.inc.php";
    
                        $sql = "select u.firstName,u.id,u.email,u.profile_pic from usertable u where u.role='user' and u.id in (SELECT f.user_id from fees f where f.feeMonth='$currentMonth' AND f.feeYear=$currentYear AND f.user_id='$uid')";
    
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_num_rows($result);
                        if($row == 0) {
                            echo '
                            <div class="payFeesBox">
                            <a href="includes/payFees.php" class="payButton"><i class="fas fa-arrow-circle-right"></i></a>
                            <p class="payTitle1 payTitles">Pay Fees</p>
                            <p class="payTitle2 payTitles">'.$fullMonth.'</p>
                            <p class="payTitle3 payTitles">Total pay</p>
                            <p class="payTitle4 payTitles"><i class="fas fa-rupee-sign" style="font-size: 14px;"></i> 500</p>
                        </div>
                            ';
                        }
                    }
                    ?>



            <div class="textMainBox">
                <?php
                            if(isset($_SESSION['user_id'])){
                                echo '<h1>WELCOME TO "YEAHBUDDY"</h1>
                                <h3>The best personalized fitness training Social media platform.  </h3>
                                ';

                                $sql = "SELECT * FROM feesAlert WHERE user_id='$uid' AND active=1;";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_num_rows($result);

                                if($row > 0) {
                                    $sql2 = "select u.firstName,u.id,u.email,u.profile_pic from usertable u where u.role='user' and u.id in (SELECT f.user_id from fees f where f.feeMonth='$currentMonth' AND f.feeYear=$currentYear AND f.user_id='$uid')";
                                    $result2 = mysqli_num_rows(mysqli_query($conn, $sql2));
                                    if($result2 == 0) {
                                        echo '
                                        <div class="alertBox">
                                        
                                        <h2> It\'s time to pay fees</h2>
                                        <button onclick="clearAlert()">Ok</button>
                                        </div>
                                        ';
                                    }

                                }



                            }else {
                                echo '<h1>JOIN OUR FAMILY NOW \'YEAHBUDDY\'</h1>
                                <h3>The best personalized fitness training Social media platform.  </h3>';
                            }
                        ?>
            </div>
        </div>
        <div class="sliderButtonBox">
            <button class="left-arrow-button" onclick="changeImage(-1);"><i
                    class="fas fa-arrow-circle-left arrowButtonIcon"></i></button>
            <button class="right-arrow-button" onclick="changeImage(1);"><i
                    class="fas fa-arrow-circle-right arrowButtonIcon"></i></button>
        </div>
    </div>
    <?php
                if(!isset($_SESSION['user_id'])) {
                    echo '            <!-- login signup box -->
                    <div class="loginAndSignupBox">
                        <form action="includes/login.inc.php" method="post" class="insideLASBox">
                            <h2>Login</h2>
                            <div class="inputMainBox">
                                <input type="email" required name="email" id="loginEmail" class="inputInput">
                                <label for="loginEmail" class="inputLabel">Email</label>
                            </div>
                            <div class="inputMainBox">
                                <input type="password" required name="password" id="loginPassword" class="inputInput">
                                <label for="loginPassword" class="inputLabel">Password</label>
                            </div>
                    ';
                                if(isset($_GET['invalidLoginCredentials'])) {
                                    echo '<h5 class="errorLogin" id="loginError">Invalid Username or password</h3>';
                                }
                            echo '
                            <button class="submitButton" name="submitLogin">Login</button>
                        </form>
                        <h4 class="or-symbol">or you can</h4>
                        <form action="includes/reg.inc.php" method="post" class="insideLASBox">
                            <h2>Create account</h2>
                            <div class="inputMainBox">
                                <input type="text" required name="first" id="regFirst" class="inputInput">
                                <label for="regFirst" class="inputLabel">First Name</label>
                            </div>
                            <div class="inputMainBox">
                                <input type="text" required name="last" id="regLast" class="inputInput">
                                <label for="regLast" class="inputLabel">Last Name</label>
                            </div>
                            <div class="inputMainBox">
                                <input type="text" required name="phone" id="phone" class="inputInput">
                                <label for="phone" class="inputLabel">Phone</label>
                            </div>
                            <div class="inputMainBox">
                                <input type="email" required name="email" id="regEmail" class="inputInput">
                                <label for="regEmail" class="inputLabel">Email</label>
                            </div>
                            <div class="inputMainBox">
                                <input type="password" required name="password" id="regPassword" class="inputInput">
                                <label for="regPassword" class="inputLabel">Password</label>
                            </div>
                            ';
                                if(isset($_GET['emailTaken'])) {
                                    echo '<h5 class="errorLogin" id="regError">Email already registered</h3>';
                                }
                                echo '
                            <button class="submitButton" name="submitReg">Create Now</button>
                        </form>
                    </div>';
                }
            ?>

</div>
<?php
    include('commonPartBottom.php');
?>