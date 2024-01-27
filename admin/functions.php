<?php

if (isset($_POST['addAlumni'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $nama = $_POST['nama'];
    $province = $_POST['province'];
    $email = $_POST['email'];
    $school = $_POST['school'];
    $program = $_POST['program'];
    $degree = $_POST['degree'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    // $user_admin_login = mysqli_real_escape_string($conn, $_POST['user']);
    // $pass_admin_login = mysqli_real_escape_string($conn, $_POST['pass']);

    $cek = mysqli_query($conn, "SELECT * from alumni where id = '" . $id . "'");
    if (mysqli_num_rows($cek) == 0) {
        $alumni = mysqli_query($conn, "INSERT INTO alumni(id,nameAlumni,title,provinsiId,email) VALUES('" . $id . "','" . $nama . "','" . $title . "','" . $province . "', '" . $email . "')");
        $graduation = mysqli_query($conn, "INSERT INTO graduation(alumniId,schoolId,programId,degreeId,year,month) VALUES('" .  $id  . "','" . $school . "','" . $program . "','" . $degree . "', '" . $year . "', '" . $month . "')");
        if ($alumni && $graduation) {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Success';
            $_SESSION['status_icon'] = 'success';
            $_SESSION['status_text'] = 'Success';
            echo '<script>window.location="../alumni"</script>';
        } else {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Failed!!';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Failed';
            echo '<script>window.location="../alumni"</script>';
        }
    }else{
        $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Failed!!';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Failed Id Already In';
            echo '<script>window.location="../alumni"</script>';
    }
}


if (isset($_POST['editAlumni'])) {

    $name = $_POST['nama'];
    $title = $_POST['title'];
    $province = $_POST['province'];
    $email = $_POST['email'];

    $cekdegree = mysqli_query($conn, "SELECT * FROM graduation WHERE alumniId = '" . $_GET['ida'] . "' ORDER by year ASC ");
    $i = 0;
    if (mysqli_num_rows($cekdegree) > 0) {
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
                WHERE id = '" . $id . "'");
            $i++;
        }
    }
    $updateAlumni = mysqli_query($conn, "UPDATE alumni SET 
                            nameAlumni = '" . $name . "',
                            title = '" . $title . "',
                            provinsiId = '" . $province . "',
                            email= '" . $email . "'
                            WHERE id = '" . $_GET['ida'] . "' ");

    if ($updateAlumni && $updateDegree) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Update Data Success';
        echo '<script>window.location="../alumni"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Edit Failed';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Please Try Again';
        echo '<script>window.location="../alumni"</script>';
    }
}

if (isset($_POST['addSchool'])) {
    $school = $_POST['school'];

    $addSchool = mysqli_query($conn, "INSERT INTO school(School) VALUES('" . $school . "')");
    if ($addSchool) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../school"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../school"</script>';
    }
}



if (isset($_POST['editSchool'])) {
    $school = $_POST['school'];

    $editSchool = mysqli_query($conn, "UPDATE school SET School = '" . $school . "' WHERE id = '" . $_GET['ids'] . "' ");
    if ($editSchool) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../school"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../school"</script>';
    }
}


if (isset($_POST['addProgram'])) {
    $program = $_POST['program'];

    $addProgram = mysqli_query($conn, "INSERT INTO fieldofstudy(FieldOfStudy) VALUES('" . $program . "')");
    if ($addProgram) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../school"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../school"</script>';
    }
}



if (isset($_POST['editProgram'])) {
    $program = $_POST['program'];

    $editProgram = mysqli_query($conn, "UPDATE fieldofstudy SET FieldOfStudy = '" . $program . "' WHERE id = '" . $_GET['idp'] . "' ");
    if ($editProgram) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../program"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../program"</script>';
    }
}


if (isset($_POST['addDegree'])) {
    $degree = $_POST['degree'];

    $addProgram = mysqli_query($conn, "INSERT INTO degree(degree) VALUES('" . $degree . "')");
    if ($addProgram) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../degree"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../degree"</script>';
    }
}



if (isset($_POST['editDegree'])) {
    $degree = $_POST['degree'];

    $editProgram = mysqli_query($conn, "UPDATE degree SET degree = '" . $degree . "' WHERE id = '" . $_GET['idd'] . "' ");
    if ($editProgram) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../degree"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../degree"</script>';
    }
}


if (isset($_POST['addUser'])) {
    $alumniId = $_POST['alumniId'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $cekId = mysqli_query($conn, "SELECT * from user WHERE alumniId = '" . $alumniId . "'");
    if (mysqli_num_rows($cekId) > 0) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'This Alumni Already Have Account';
        echo '<script>window.location="../user"</script>';
    } else {
        $cekUsername = mysqli_query($conn, "SELECT * from user WHERE username = '" . $username . "'");
        if (mysqli_num_rows($cekUsername) > 0) {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Failed!!';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Username Already Taken';
            echo '<script>window.location="../user"</script>';
        } else {
            $addUser = mysqli_query($conn, "INSERT INTO user(alumniId, roleId,username, password,status) VALUES('" . $alumniId . "','" . $role . "','" . $username . "','" . $password . "','" . $status . "')");
            if ($addUser) {
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
    }
}



if (isset($_POST['editUser'])) {
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $user = mysqli_query($conn, "SELECT * from user WHERE Id = '" . $_GET['idu'] . "'");
    $u = mysqli_fetch_object($user);

    $cekUsername = mysqli_query($conn, "SELECT * from user WHERE username = '" . $username . "' AND alumniId != '" . $u->alumniId . "'");
    if (mysqli_num_rows($cekUsername) > 0) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Username Already Taken';
        echo '<script>window.location="../user"</script>';
    } else {
        $editUser = mysqli_query($conn, "UPDATE user SET 
                                        roleId = '" . $role . "' ,
                                        username = '" . $username . "' ,
                                        password = '" . $password . "' ,
                                        status = '" . $status . "' 
                                        WHERE id = '" . $_GET['idu'] . "'");
        if ($editUser) {
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
}



if (isset($_POST['addEvent'])) {

    $title = $_POST['title'];
    $shortDeskripsi = $_POST['shortDeskripsi'];
    $deskripsi = $_POST['deskripsi'];
    $date = $_POST['date'];

    // menampung data gambar yang baru
    $filename = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];


    // jika admin ganti gambar
    if ($filename != '') {
        $type1 = explode('.', $filename);
        $type2 = $type1[1];

        $newname = 'event' . time() . '.' . $type2;
        // menampung data format file yang diizinkan
        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');
        // validasi format file

        if (!in_array($type2, $tipe_diizinkan)) {
            $_SESSION['alert'] = 1;
            $_SESSION['status'] = 'Format IMG Is Wrong';
            $_SESSION['status_icon'] = 'error';
            $_SESSION['status_text'] = 'Only png, jpg, jpeg, and gif format !!!';
            echo '<script>window.location="../event"</script>';
        } else {
            move_uploaded_file($tmp_name, '../../assets/event/' . $newname);
            $namagambar = $newname;
        }
    }
    $addEvent = mysqli_query($conn, "INSERT INTO event(ImageEvent,TitleEvent,shortDescription,Description,date) VALUES('" . $newname . "','" . $title . "','" . $shortDeskripsi . "','" . $deskripsi . "','" . $date . "')");
    if ($addEvent) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../event"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../event"</script>';
    }
}




if (isset($_POST['editEvent'])) {

    $img = $_POST['oldImg'];

    $title = $_POST['title'];
    $shortDeskripsi = $_POST['shortDeskripsi'];
    $deskripsi = $_POST['deskripsi'];
    $date = $_POST['date'];


    // menampung data gambar yang baru
    $filename = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];


    // jika admin ganti gambar
    if ($filename != '') {
        $type1 = explode('.', $filename);
        $type2 = $type1[1];

        $newname = 'event' . time() . '.' . $type2;
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
            unlink('../../assets/event/' . $img);
            move_uploaded_file($tmp_name, '../../assets/event/' . $newname);
            $namagambar = $newname;
        }
    } else {
        $namagambar = $img;
    }

    $addEvent = mysqli_query($conn, "UPDATE event SET 
                                    ImageEvent = '" . $namagambar . "' ,
                                    TitleEvent = '" . $title . "' ,
                                    shortDescription = '" . $shortDeskripsi . "' ,
                                    Description = '" . $deskripsi . "' ,
                                    date = '" . $date . "' 
                                    WHERE id = '" . $_GET['ide'] . "'");
    if ($addEvent) {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Success';
        $_SESSION['status_icon'] = 'success';
        $_SESSION['status_text'] = 'Success';
        echo '<script>window.location="../event"</script>';
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Failed';
        echo '<script>window.location="../event"</script>';
    }
}