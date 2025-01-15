<!DOCTYPE html>
<html>
    <?php include 'templates/headerfile.php'; ?>
    <body>
        <div class="page">
            <?php include 'templates/loaderanimation.php'; ?>
            <!-- Main Navbar-->
            <?php include 'templates/navfile.php'; ?>
            <div class="page-content d-flex align-items-stretch"> 
                <!-- Side Navbar -->
                <?php include 'templates/sidefile.php'; ?>
                <div class="content-inner">
                    <!-- Page Header-->
                    <header class="page-header">
                        <div class="container-fluid">
                            <h3 class="no-margin-bottom"><a href="Dashboard.php">Dashboard</a>/Settings</h3>
                        </div>
                    </header>
                    <!--list of staff table-->
                    <section class="dashboard-header">
                        <div class="container-fluid">
                            <!-- Project-->
                            <div class="project">
                                <section class="py-3">
                                    <div class="container light-style flex-grow-1 container-p-y">
                                        <div class="card overflow-hidden">
                                            <div class="row no-gutters row-bordered row-border-dark">
                                                <div class="col-md-2 pt-0">
                                                    <div class="list-group list-group-flush account-settings-links">
                                                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                                                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                                                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Email</a>
                                                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Company</a>
                                                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                                                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
                                                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-layout">Theme</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade active show" id="account-general">

                                                            <div class="card-body media align-items-center">
                                                                <img src=""  alt="image" class="hide" id="adminimg" style="height:237px;">
                                                                <div class="media-body ml-4 ">
                                                                    <label class="btn btn-outline-primary">
                                                                        Upload new photo
                                                                        <form method="post" action="" enctype="multipart/form-data" id="adminimge">
                                                                            <div>
                                                                                <input type="file" id="file" name="file" class="account-settings-fileinput hide"/>
                                                                            </div>
                                                                        </form>
                                                                    </label> &nbsp;
                                                                    <div class="text-dark small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                                                </div>
                                                            </div>
                                                            <hr class="border-light m-0">

                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-4 form-group">
                                                                        <label class="form-label">Username</label>
                                                                        <input type="text" class="form-control mb-1" name="username"id="Adminusername">
                                                                    </div>
                                                                    <div class="col-sm-4 form-group">
                                                                        <label class="form-label">Firstname</label>
                                                                        <input type="text" class="form-control" name="firstname"id="Adminfname">
                                                                    </div>
                                                                    <div class="col-sm-4 form-group">
                                                                        <label class="form-label">Lastname</label>
                                                                        <input type="text" class="form-control" name="lastname"id="Adminlname">
                                                                    </div>
                                                                    <div class="col-sm-4 form-group">
                                                                        <label class="form-label">E-mail</label>
                                                                        <input type="text" class="form-control mb-1 Adminemail"name="email">
                                                                    </div>
                                                                    <div class="col-sm-4 form-group">
                                                                        <label class="form-label">Contact</label>
                                                                        <input type="text" class="form-control" id="adminContact">
                                                                    </div>
                                                                </div>		
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="account-change-password">
                                                            <div class="card-body pb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Current password</label>
                                                                    <input type="password" id="currentpass"class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">New password</label>
                                                                    <input type="password" id="newpass"class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Repeat new password</label>
                                                                    <input type="password" id="newpass2"class="form-control">
                                                                </div>
                                                                <br>
                                                                <div class="text-right mt-3">
                                                                    <button type="button" class="btn btn-primary" id="changepassword">Change Password</button>&nbsp;
                                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="account-info">
                                                            <div class="card-body pb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Bio</label>
                                                                    <textarea class="form-control" rows="5" id="adminBio"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Birthday</label>
                                                                    <input type="date" class="form-control" id="adminDob">
                                                                </div>
                                                            </div>
                                                            <hr class="border-light m-0">
                                                            <div class="card-body pb-2">
<!--                                                                <h6 class="mb-4">Contacts</h6>
                                                                <div class="form-group">
                                                                    <label class="form-label">Phone</label>
                                                                    <input type="text" class="form-control" id="adminContact">
                                                                </div>-->
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade" id="account-social-links">
                                                            <div class="card-body pb-2">

                                                                <div class="form-group">
                                                                    <label class="form-label">Email Name</label>
                                                                    <input type="text" class="form-control" id="Schoolmailname">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Email Address</label>
                                                                    <input type="text" class="form-control" id="schoolmailaddress">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Password</label>
                                                                    <input type="password" class="form-control" id="schoolmailpass">
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
                                                                <select class="form-control" id="Asidebarcolor" name="side">
                                                                    <option value="">Select color</option>
                                                                    <option value="1">Blue</option>
                                                                    <option value="2">Green</option>
                                                                    <option value="3">Pink</option>
                                                                    <option value="4">Red</option>
                                                                    <option value="5">Sea</option>
                                                                    <option value="6">Violet</option>
                                                                </select>
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
                        </div>
                    </section>
                    <?php include 'templates/footerfile.php'; ?>  
                </div>
            </div>
        </div>

    </body>

</html>

