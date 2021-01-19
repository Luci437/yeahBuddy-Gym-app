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
                            <table class="bmiTable" cellspacing="10">
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

                    <div class="textMainBox">
                        <?php
                            if(isset($_SESSION['user_id'])){
                                echo '<h1>WELCOME TO "YEAHBUDDY"</h1>
                                <h3>The best personalized fitness training Social media platform.  </h3>';
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