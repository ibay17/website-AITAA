<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['status_login'] == true) {
    $alumni = mysqli_query($conn, "
                        SELECT *
                        FROM alumni
                        INNER JOIN user
                        ON alumni.id = user.alumniId 
                        WHERE user.id = '" . $_SESSION['id'] . "'");
    $a = mysqli_fetch_object($alumni);

    $province = mysqli_query($conn, "SELECT * FROM  t_provinsi WHERE id = '" .  $a->provinsiId . "'");
    $p = mysqli_fetch_object($province);

    $data = mysqli_query($conn, "
                        SELECT *
                        FROM alumni
                        INNER JOIN user
                        ON alumni.id = user.alumniId 
                        INNER JOIN graduation
                        ON alumni.id = graduation.alumniId 
                        INNER JOIN school
                        ON graduation.schoolId = school.id
                        INNER JOIN fieldofstudy
                        ON graduation.programId = fieldofstudy.id
                        INNER JOIN degree
                        ON graduation.degreeId = degree.id
                        WHERE user.id = '" . $_SESSION['id'] . "'
                        ORDER BY graduation.year ASC
                        ");
}

// login
if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    // $user_admin_login = mysqli_real_escape_string($conn, $_POST['user']);
    // $pass_admin_login = mysqli_real_escape_string($conn, $_POST['pass']);

    $cek = mysqli_query($conn, "SELECT * FROM  user WHERE username = '" . $username . "' AND password = '" . $password . "' ");

    if (mysqli_num_rows($cek) > 0) {
        $id = mysqli_fetch_object($cek);
        if ($id->status == "Active") {
            if ($id->roleId == 1) {
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $id;
                $_SESSION['id'] = $id->id;
                $_SESSION['role_id'] = $id->roleId;
                $_SESSION['alert'] = 2;
                $_SESSION['status'] = '';
                $_SESSION['status_icon'] = '';
                $_SESSION['status_text'] = '';
                echo '<script>window.location="../admin/home"</script>';
            } else {
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $id;
                $_SESSION['id'] = $id->id;
                $_SESSION['role_id'] = $id->roleId;
                $_SESSION['alert'] = 2;
                $_SESSION['status'] = '';
                $_SESSION['status_icon'] = '';
                $_SESSION['status_text'] = '';
                echo '<script>window.location="../home"</script>';
            }
        } else {
            $_SESSION['alert'] = 2;
            $_SESSION['status'] = 'Your Account Not Actived';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Please Contact Admin To Active Account';
        }
    } else {
        $_SESSION['alert'] = 2;
        $_SESSION['status'] = 'Username Or Password is Wrong';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Please Try Again!!!';
    }
}

if (isset($_POST['register'])) {
    $id = $_POST['alumniid'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $year = $_POST['year'];
    $school = $_POST['school'];
    $program = $_POST['program'];
    $degree = $_POST['degree'];
    $email = $_POST['email'];
    $username = $_POST['user'];
    $password = $_POST['password'];
    // $user_admin_login = mysqli_real_escape_string($conn, $_POST['user']);
    // $pass_admin_login = mysqli_real_escape_string($conn, $_POST['pass']);

    $cekId = mysqli_query($conn, "SELECT * FROM  user WHERE alumniId = '" . $id . "'");
    if (mysqli_num_rows($cekId) > 0) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Your ID Already Taken';
        echo '<script>window.location="../auth"</script>';
    } else {
        $cekUsername = mysqli_query($conn, "SELECT * FROM  user WHERE username = '" . $username . "'");
        if (mysqli_num_rows($cekUsername) > 0) {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Failed!!';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Username Already Taken';
            echo '<script>window.location="../auth"</script>';
        } else {
            $insertAlumni = mysqli_query($conn, "INSERT INTO alumni(id,nameAlumni,email,gender) VALUES('" . $id . "','" . $name . "', '" . $email . "', '" . $gender . "' )");
            $insertGraduation = mysqli_query($conn, "INSERT INTO graduation(alumniId,schoolId,programId,degreeId,year) VALUES('" . $id . "','" . $school . "','" . $program . "','" . $degree . "', '" . $year . "')");
            $insertUser = mysqli_query($conn, "INSERT INTO user(alumniId,roleId,username,password,status) VALUES('" . $id . "', 2 , '" . $username . "', '" . $password . "', 'Inactive')");
            if ($insertUser and $insertAlumni and $insertGraduation) {
                $_SESSION['alert'] = 1;
                $_SESSION['status'] = 'Success';
                $_SESSION['status_icon'] = 'success';
                $_SESSION['status_text'] = 'Create Account Success';
                echo '<script>window.location="../auth"</script>';
            } else {
                $_SESSION['alert'] = 1;
                $_SESSION['status'] = 'Failed!!';
                $_SESSION['status_icon'] = 'error';
                $_SESSION['status_text'] = 'Failed To Create Account';
                echo '<script>window.location="../auth"</script>';
            }
        }
    }
}


if (isset($_POST['addDegree'])) {
    $school = $_POST['addschool'];
    $program = $_POST['addprogram'];
    $degree = $_POST['adddegree'];
    $year = $_POST['addyear'];
    $month = $_POST['addmonth'];
    // $user_admin_login = mysqli_real_escape_string($conn, $_POST['user']);
    // $pass_admin_login = mysqli_real_escape_string($conn, $_POST['pass']);


    $addDegree = mysqli_query($conn, "INSERT INTO graduation(alumniId,schoolId,programId,degreeId,year,month) VALUES('" . $a->alumniId . "','" . $school . "','" . $program . "','" . $degree . "', '" . $year . "', '" . $month . "')");
    if ($addDegree) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../user"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../user"</script>';
    }
}


if (isset($_POST['changePass'])) {
    $old = $_POST['oldPass'];
    $new = $_POST['newPass'];
    $confirm = $_POST['confirmPass'];
    // $user_admin_login = mysqli_real_escape_string($conn, $_POST['user']);
    // $pass_admin_login = mysqli_real_escape_string($conn, $_POST['pass']);

    $cek = mysqli_query($conn, "SELECT * FROM  user WHERE id = '" . $_SESSION['id'] . "' ");
    $c = mysqli_fetch_object($cek);
    if ($old == $c->password) {
        if ($new == $confirm) {
            $update = mysqli_query($conn, "UPDATE user SET password = '" . $new . "' WHERE id = '" . $_SESSION['id'] . "' ");
            if ($update) {
                $_SESSION['alert'] = 1;
                $_SESSION['status'] = 'Success';
                $_SESSION['status_icon'] = 'success';
                $_SESSION['status_text'] = 'Change Password Success';
                echo '<script>window.location="../user"</script>';
            } else {
                $_SESSION['alert'] = 1;
                $_SESSION['status'] = 'Failed!!';
                $_SESSION['status_icon'] = 'error';
                $_SESSION['status_text'] = 'Failed To Change Password';
                echo '<script>window.location="../user"</script>';
            }
        } else {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Update Password Failed';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Confirm Password not Right ';
            echo '<script>window.location="../user"</script>';
        }
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Password Incorrect';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Please Try Again!!!';
        echo '<script>window.location="../user"</script>';
    }
}


if (isset($_POST['updateInfo'])) {

    $img = $_POST['foto'];

    $name = $_POST['name'];
    $title = $_POST['title'];

    $date = $_POST['date'];
    $province = $_POST['province'];
    $address = $_POST['address'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];

    $addressO = $_POST['addressOffice'];
    $telpO = $_POST['telpOffice'];
    $emailO = $_POST['emailOffice'];
    $faxO = $_POST['faxOffice'];

    // menampung data gambar yang baru
    $filename = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];


    // jika admin ganti gambar
    if ($filename != '') {
        $type1 = explode('.', $filename);
        $type2 = $type1[1];

        $newname = $filename;
        // menampung data format file yang diizinkan
        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
        // validasi format file

        if (!in_array($type2, $tipe_diizinkan)) {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Format IMG Is Wrong';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Only png, jpg, jpeg, and gif format !!!';
            echo '<script>window.location="../user"</script>';
        } else {
            unlink('../assets/imgAlumni/' . $img);
            move_uploaded_file($tmp_name, '../assets/imgAlumni/' . $newname);
            $namagambar = $newname;
        }
    } else {
        $namagambar = $img;
    }
    $cekdegree = mysqli_query($conn, "SELECT * FROM graduation WHERE alumniId = '" . $a->alumniId . "' ORDER by year ASC ");
    $i = 0;
    if (mysqli_num_rows($cekdegree) > $no) {
        while ($d = mysqli_fetch_array($cekdegree)) {
            $id = $d['id'];
            $school = $_POST['school' . $i];
            $program = $_POST['program' . $i];
            $degree = $_POST['degree' . $i];
            $year = $_POST['year' . $i];
            $month = $_POST['month' . $i];


            $updateDegree = mysqli_query($conn, "UPDATE graduation SET 
                SchoolId = '" . $school . "',
                programId = '" . $program . "', 
                degreeId = '" . $degree . "', 
                year = '" . $year . "', 
                month = '" . $month . "' 
                WHERE id = '" . $id . "' ");
            $i++;
        }
    }
    $updateAlumni = mysqli_query($conn, "UPDATE alumni SET 
                            nameAlumni = '" . $name . "',
                            title = '" . $title . "',
                            photo = '" . $namagambar . "',
                            provinsiId = '" . $province . "',
                            birthday = '" . $date . "',
                            address = '" . $address . "',
                            telp = '" . $telp . "',
                            email= '" . $email  . "'
                            WHERE id = '" . $a->alumniId . "' ");

    if ($updateAlumni) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Update Data Success';
        echo '<script>window.location="../user"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Edit Failed';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Please Try Again';
        echo '<script>window.location="../user"</script>';
    }
}


if (isset($_POST['registerEvent'])) {
    $eventId = $_GET['ide'];
    $alumniId = $a->alumniId;


    $participant = mysqli_query($conn, "SELECT * from participant WHERE alumniId = '" . $alumniId . "' AND eventId = '" . $eventId . "' ");
    if (mysqli_num_rows($participant) > 0) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Your Already Registered';
        echo '<script>window.location="../event"</script>';
    } else {
        $insertParticipant = mysqli_query($conn, "INSERT INTO 
                                                 participant(alumniId,eventId) 
                                                 VALUES('" . $alumniId . "','" . $eventId . "')");
        if ($insertParticipant) {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Success';
            $_SESSION['status_icon'] = 'success';
            $_SESSION['status_text'] = 'Register Success';
            echo '<script>window.location="../event"</script>';
        } else {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Edit Failed';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Please Try Again';
            echo '<script>window.location="../event"</script>';
        }
    }
}
