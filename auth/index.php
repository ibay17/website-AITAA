<?php
require_once('../include/header.php');
?>

<style>
    .formBox {
        background: #fff;
    }


    .button-box {
        background-color: var(--color3);
        width: 220px;
        margin: 35px auto;
        position: relative;
        border-radius: 30px;
    }

    .toggle-btn {
        color: white;
        padding: 10px 30px;
        background: transparent;
        font-size: 13px;
        border: 0;
        outline: none;
        position: relative;
        font-weight: 600;
    }


    .input-group {
        padding-inline: 15px;
        transition: .5s;
    }

    .form-select:focus {
        box-shadow: none;
        outline: none;
    }

    .submid-btn {
        width: 75%;
        padding: 10px 30px;
        cursor: pointer;
        display: block;
        margin: 0px;
        background: var(--primarycolor);
        color: white;
        font-weight: 600;
        text-decoration: none;
        justify-content: center;
        border: 0;
        outline: none;
        border-radius: 30px !important;
    }

    .check-box {
        margin: 30px 10px 30px 0px;
    }

    .check-box span {
        color: #777;
        font-size: 12px;
        margin-left: 5px;
    }

    .footer {
        margin-top: 0px;
    }

    #formLogin {
        position: relative;
        animation-name: formLogin;
        animation-duration: .5s;
    }

    @keyframes formLogin {
        0% {
            width: 1200px;
            left: 1000px;
        }

        50% {
            width: 425px;
        }

        100% {

            left: 0px;
        }
    }

    #formRegister {
        position: relative;
        animation-name: formRegister;
        animation-duration: .5s;
    }

    @keyframes formRegister {
        0% {
            width: 425px;
            left: -1000px;
        }

        50% {
            width: 1200px;
        }

        100% {

            left: 0px;
        }
    }
</style>
<section class="loginBackground">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="formBox">
                    <div class="button-box justify-content-center">
                        <div id="btn"></div>
                        <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                        <button type="button" class="toggle-btn" onclick="register()">Register</button>
                    </div>
                    <div class="container text-center">
                        <div class="row mb-3 align-items-start ">
                            <div class="col-md" id="formLogin">
                                <form method="POST" class="input-group">
                                    <div class="form">
                                        <div class="login">
                                            <input type="text" name="user" class="input-field" placeholder="Username" required>
                                            <input type="password" name="pass" class="input-field" placeholder="Enter password" required>
                                            <div class="check-box d-flex align-items-center">
                                                <input type="checkbox"><span>Remember Password</span>
                                            </div>

                                            <div class="container no-margin text-center">
                                                <div class="row justify-content-center mt-4">
                                                    <button type="submit" name="login" class="submid-btn">Log in</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md" id="formRegister">
                                <div class="form">
                                    <div class="register">
                                        <form method="POST" class="input-group">
                                            <div class="container mt-0">
                                                <div class="row align-items-start">
                                                    <div class="col-md-6 mb-3 text-start">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="input-field" name="alumniid" placeholder="Alumni Id" aria-label="Username" aria-describedby="basic-addon1" required>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <input type="text" class="input-field" name="name" placeholder="Full Name" aria-label="Full Name" aria-describedby="basic-addon2" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="basic-url" class="form-label ms-3">Gender</label>
                                                            <div class="input-group">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                                                    <label class="form-check-label" for="inlineRadio2">Famale</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="input-group mb-3">
                                                            <input type="text" class="input-field" name="year" placeholder="Graduation Year" aria-label="Graduation Year">
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select data-placeholder="Choose a School..." name="school" class="my_select_box" tabindex="2" required>
                                                                <option value="">Chose a School...</option>
                                                                <?php
                                                                $school = mysqli_query($conn, "SELECT * FROM school");
                                                                while ($s = mysqli_fetch_array($school)) {
                                                                ?>
                                                                    <option value="<?php echo $s['id'] ?>"><?php echo $s['School'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select data-placeholder="Choose a Program..." name="program" class="my_select_box" tabindex="2" required>
                                                                <option value="">Chose a Program...</option>
                                                                <?php
                                                                $fieldofstudy = mysqli_query($conn, "SELECT * FROM fieldofstudy ");
                                                                while ($f = mysqli_fetch_array($fieldofstudy)) {
                                                                ?>
                                                                    <option value="<?php echo $f['id'] ?>"><?php echo $f['FieldOfStudy'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <select data-placeholder="Choose a Degree..." name="degree" class="my_select_box" tabindex="2" required>
                                                                <option value="">Chose a Degree...</option>
                                                                <?php
                                                                $degree = mysqli_query($conn, "SELECT * FROM degree");
                                                                while ($d = mysqli_fetch_array($degree)) {
                                                                ?>
                                                                    <option value="<?php echo $d['id'] ?>"><?php echo $d['degree'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 px-4">
                                                        <div class="input-group">
                                                            <input type="email" name="email" class="input-field" placeholder="Email" required>
                                                            <input type="text" name="user" class="input-field" placeholder="Username" required>
                                                            <input type="password" name="password" class="input-field" placeholder="Password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container text-center no-margin">
                                                <div class="row">
                                                    <div class="col-md-12 d-flex justify-content-center">
                                                        <button type="submit" name="register" class="submid-btn">Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<script>
    var z = document.getElementById("btn");

    document.getElementById("formRegister").style.display = "none";

    function register() {
        z.style.left = "110px";
        document.getElementById("formLogin").style.display = "none";
        document.getElementById("formRegister").style.transition = "0.5s";
        document.getElementById("formRegister").style.display = "block";
    }

    function login() {
        z.style.left = "0px";
        document.getElementById("formRegister").style.display = "none";
        document.getElementById("formLogin").style.transition = "";
        document.getElementById("formLogin").style.display = "block";
    }
</script>
<?php
require_once('../include/footer.php');
?>