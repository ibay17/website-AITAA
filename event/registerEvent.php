<?php
require_once('../include/header.php');
?>
<section id="alumniProfile">
    <div class="container">
        <div class="row  text-center align-items-start">
            <div class="col-md-12">
                <div class="imgEvent">
                    <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="">
                </div>
                <div class="eventTitle">
                    <h1>Event Title</h1>
                    <p>dd/mm/yyyy</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-9">
                <div class="formRegister backgroundColor p-3">
                    <h4>Form Register</h4>
                    <div class="container">
                        <div class="row">
                            <h5>Id Alumni</h5>
                            <div class="col">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Id Alumni" aria-label="Id Alumni" aria-describedby="basic-addon1">
                                </div>
                                <span class="span">Id Alumni</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <h5>Your Name</h5>
                            </div>
                        </div>
                        <div class="row mt-0">
                            <div class="col-md-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Prefix</option>
                                    <option value="1">Mr.</option>
                                    <option value="2">Mrs.</option>
                                    <option value="3">Miss</option>
                                </select>
                                <span class="span">prefix</span>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon1">
                                </div>
                                <span class="span">first name</span>
                            </div>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon1">
                                </div>
                                <span class="span">last name</span>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <h5>Email</h5>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder=Please enter a valid phone number.">
                                </div>
                                <span class="span">example@example.com</span>
                            </div>
                            <div class="col-lg-6">
                                <h5>phone</h5>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">+62</span>
                                    <input type="number" class="form-control" placeholder="phone" aria-label="phone" aria-describedby="addon-wrapping">
                                </div>
                                <span class="span">Please enter a valid phone number.</span>
                            </div>
                        </div>
                        <div class="row text-center">
                            <a href="" class="btn-submit mt-5" >Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once('../include/footer.php');
?>