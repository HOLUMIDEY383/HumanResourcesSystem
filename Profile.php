<html>
    <?php include 'Bars/header.php'; ?>
    <link href="css/profile.css" rel="stylesheet" type="text/css"/>
    <body>
        <?php include 'templates/loaderanimation.php'; ?>
        <?php include 'Bars/navbar.php'; ?>
        <div class="d-flex align-items-stretch">
            <?php include 'Bars/sidebar.php'; ?>

            <div class="page-holder w-100 d-flex flex-wrap">
                <div class="container-fluid px-xl-5">
                    <section class="py-5">
                        <div class="container light-style flex-grow-1 container-p-y">

                            <h4 class="font-weight-bold py-3 mb-4">
                                Account settings
                            </h4>

                            <div class="card overflow-hidden">
                                <div class="row no-gutters row-bordered row-border-dark">
                                    <div class="col-md-2 pt-0">
                                        <div class="list-group list-group-flush account-settings-links">
                                            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
                                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
                                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
                                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-layout">Layout</a>
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="account-general">
                                                <div class="row"style="border-bottom: 2px dashed #ccc;">
                                                    <div class="col-6 m-2">
                                                        <div class="card-body media mb-2 mr-2" >
                                                            <!--<div class="card-body media align-items-center mb-2 mr-2" style="border-right: 2px dashed #ccc;">-->
                                                                <!--<img src=""  alt="image" class=" rounded  d-block hide" id="userimg">-->
                                                            <img src=""  alt="image" class="rounded  d-block hide" id="userimg" style="height:150px;width: 12pc;">
                                                            <div class="media-body">
                                                                <label class="btn btn-outline-primary ">
                                                                    Upload new photo
                                                                    <form method="post" action="" enctype="multipart/form-data" id="userimge">
                                                                        <div>
                                                                            <input type="file" id="userFile" name="file" class="account-settings-fileinput"/>
                                                                        </div>
                                                                    </form>
                                                                </label>
                                                                <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                                                &nbsp;
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-5 m-2"style="border-left: 2px dashed #ccc;">
                                                        <ul class="personal-info list-group list-group-flush col-sm-12 float-left">
                                                            <li class="list-group-item">
                                                                <div class="title float-left mr-5">EmployeeID:</div>
                                                                <div class="text">
                                                                    <a href=""id="userId"class="text-center float-right"></a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="title float-left mr-5">Full-Name:</div>
                                                                <div class="text">
                                                                    <a href=""id="userFuname"class="text-center float-right"></a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="title float-left mr-5">Phone:</div>
                                                                <div class="text">
                                                                    <a href="" id="userContact"class="text-center float-right"></a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="title float-left mr-5">Email:</div>
                                                                <div class="text">
                                                                    <a href="" id="userEmail"class="text-center float-right"></a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="title float-left mr-5">Birthday:</div>
                                                                <div class="text">
                                                                    <a href=""id="userDob"class="text-center float-right"></a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="title float-left mr-5">Gender:</div>
                                                                <div class="text">
                                                                    <a href=""id="userGen" class="text-center float-right"></a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="title float-left mr-5">Marital-status:</div>
                                                                <div class="text">
                                                                    <a href=""class="text-center float-right"id="userMarital"></a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="title float-left mr-5">Religion:</div>
                                                                <div class="text">
                                                                    <a href=""class="text-center float-right"id="userReligion"></a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-5 m-2">
                                                        <div class="card-body" >
                                                            <h6 class="mb-2">Office Information</h6>
                                                            <ul class="personal-info list-group list-group-flush">
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-4">Staff-Type:</div>
                                                                    <div class="text">
                                                                        <a href="" id="userLabel"class="text-center float-right"></a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Staff-Category:</div>
                                                                    <div class="text">
                                                                        <a href="" id="userScate"class="text-center float-right"></a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item hide"id="departmentline">
                                                                    <div class="title float-left mr-5 ">Department:</div>
                                                                    <div class="text " id="Udepartment ">

                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item hide" id="facultyline">
                                                                    <div class="title float-left mr-5 ">Faculty:</div>
                                                                    <div class="text" id="Ufaculty">

                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Telephone:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right">9876543210</a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Nationality:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right">9876543210</a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Religion:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right">9876543210</a>
                                                                    </div>
                                                                </li>

                                                                <br><br>
                                                                <h6 class="mb-2">Office Information</h6>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Marital-status:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right">9876543210</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 m-2">
                                                        <div class="card-body" >
                                                            <h6 class="mb-2">Emergency Contact</h6>
                                                            <!--<small>Primary</small>-->
                                                            <ul class="personal-info list-group list-group-flush">
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-4">full-Name:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right"id="userKiname"></a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Contact:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right"id="userKicontact"></a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Email:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right"id="userKiemail"></a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Address:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right"id="userKiaddress"></a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Relationship:</div>
                                                                    <div class="text">
                                                                        <a href=""class="text-center float-right"id="userKirelation"></a>
                                                                    </div>
                                                                </li>
<!--                                                                <small>Secondary</small>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-4">Name:</div>
                                                                    <div class="text">
                                                                        <a href="">9876543210</a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Contact:</div>
                                                                    <div class="text">
                                                                        <a href="">9876543210</a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Email:</div>
                                                                    <div class="text">
                                                                        <a href="">9876543210</a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Address:</div>
                                                                    <div class="text">
                                                                        <a href="">9876543210</a>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="title float-left mr-5">Relationship:</div>
                                                                    <div class="text">
                                                                        <a href="">9876543210</a>
                                                                    </div>
                                                                </li>-->



                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--                                                <div class="row">
                                                                                                    <div class="col-4"></div>
                                                                                                    <div class="col-4"></div>
                                                                                                    <div class="col-4">
                                                                                                        <div class="text-right mt-3">
                                                                                                            <button type="submit" class="btn btn-primary" id="submit-all">Save changes</button>&nbsp;
                                                                                                            <button type="button" class="btn btn-danger">Cancel</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>-->
                                            </div>

                                            <div class="tab-pane fade" id="account-change-password">
                                                <div class="card-body pb-2">

                                                    <div class="form-group">
                                                        <label class="form-label">Current password</label>
                                                        <input type="password" id="currentUpass"class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">New password</label>
                                                        <input type="password" id="Unewpass"class="form-control" name="pass_word">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label">Repeat new password</label>
                                                        <input type="password" id="Unewpass2"class="form-control" name="pass_word">
                                                    </div>
                                                    <br>
                                                    <div class="text-right mt-3">
                                                        <button type="button" class="btn btn-primary" id="changeUpassword">Change Password</button>&nbsp;
                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-info">
                                                <div class="card-body pb-2">

                                                    <div class="form-group">
                                                        <label class="form-label">Bio</label>
                                                        <textarea class="form-control" rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Birthday</label>
                                                        <input type="text" class="form-control" id="Udob">
                                                    </div>


                                                </div>
                                                <hr class="border-light m-0">
                                                <div class="card-body pb-2">

                                                    <h6 class="mb-4">Contacts</h6>
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="usercontact">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control" id="useremail">
                                                    </div>
                                                    <br>
                                                    <div class="text-right mt-3">
                                                        <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="account-social-links">
                                                <div class="card-body pb-2">

                                                    <div class="form-group">
                                                        <label class="form-label">Twitter</label>
                                                        <input type="text" class="form-control" value="https://twitter.com/user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Facebook</label>
                                                        <input type="text" class="form-control" value="https://www.facebook.com/user">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Google+</label>
                                                        <input type="text" class="form-control" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">LinkedIn</label>
                                                        <input type="text" class="form-control" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Instagram</label>
                                                        <input type="text" class="form-control" value="https://www.instagram.com/user">
                                                    </div>
                                                    <br>
                                                    <div class="text-right mt-3">
                                                        <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-connections">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
                                                </div>
                                                <hr class="border-light m-0">
                                                <div class="card-body">
                                                    <h5 class="mb-2">
                                                        <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                                                        <i class="ion ion-logo-google text-google"></i>
                                                        You are connected to Google:
                                                    </h5>
                                                    nmaxwell@mail.com
                                                </div>
                                                <hr class="border-light m-0">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
                                                </div>
                                                <hr class="border-light m-0">
                                                <div class="card-body">
                                                    <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
                                                </div>
                                                <br>
                                                <div class="text-right mt-3">
                                                    <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-layout">
                                                <div class="card-body">
                                                    <h5>Change SideBar Color</h5>
                                                    <div class="foo blue" id="blue"></div>
                                                    <div class="foo green"></div>
                                                    <div class="foo red"></div>
                                                    <div class="foo sea"></div>
                                                    <div class="foo violet"></div>
                                                    <div class="foo pink"></div>

                                                </div>
                                                <hr class="border-light m-0">
                                                <div class="card-body">
                                                    <h5>Switch to Dark Mode</h5>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="darkSwitch">
                                                        <label class="custom-control-label" for="darkSwitch">Dark Mode </label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-notifications">
                                                <div class="card-body pb-2">

                                                    <h6 class="mb-4">Activity</h6>

                                                    <div class="form-group">
                                                        <label class="switcher">
                                                            <input type="checkbox" class="switcher-input" checked="">
                                                            <span class="switcher-indicator">
                                                                <span class="switcher-yes"></span>
                                                                <span class="switcher-no"></span>
                                                            </span>
                                                            <span class="switcher-label">Email me when someone comments on my article</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="switcher">
                                                            <input type="checkbox" class="switcher-input" checked="">
                                                            <span class="switcher-indicator">
                                                                <span class="switcher-yes"></span>
                                                                <span class="switcher-no"></span>
                                                            </span>
                                                            <span class="switcher-label">Email me when someone answers on my forum thread</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="switcher">
                                                            <input type="checkbox" class="switcher-input">
                                                            <span class="switcher-indicator">
                                                                <span class="switcher-yes"></span>
                                                                <span class="switcher-no"></span>
                                                            </span>
                                                            <span class="switcher-label">Email me when someone follows me</span>
                                                        </label>
                                                    </div>

                                                </div>
                                                <hr class="border-light m-0">
                                                <div class="card-body pb-2">

                                                    <h6 class="mb-4">Application</h6>

                                                    <div class="form-group">
                                                        <label class="switcher">
                                                            <input type="checkbox" class="switcher-input" checked="">
                                                            <span class="switcher-indicator">
                                                                <span class="switcher-yes"></span>
                                                                <span class="switcher-no"></span>
                                                            </span>
                                                            <span class="switcher-label">News and announcements</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="switcher">
                                                            <input type="checkbox" class="switcher-input">
                                                            <span class="switcher-indicator">
                                                                <span class="switcher-yes"></span>
                                                                <span class="switcher-no"></span>
                                                            </span>
                                                            <span class="switcher-label">Weekly product updates</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="switcher">
                                                            <input type="checkbox" class="switcher-input" checked="">
                                                            <span class="switcher-indicator">
                                                                <span class="switcher-yes"></span>
                                                                <span class="switcher-no"></span>
                                                            </span>
                                                            <span class="switcher-label">Weekly blog digest</span>
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="text-right mt-3">
                                                        <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php include 'Bars/footer.php'; ?>

            </div>
        </div>



    </body>
</html>
