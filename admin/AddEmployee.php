<!DOCTYPE html>
<html>
    <?php include 'templates/headerfile.php'; ?>

    <body>
        <?php include 'templates/loaderanimation.php'; ?>
        <div class="page">
            <!-- Main Navbar-->
            <?php include 'templates/navfile.php'; ?>

            <div class="page-content d-flex align-items-stretch"> 
                <!-- Side Navbar -->
                <?php include 'templates/sidefile.php'; ?>
                <div class="content-inner">
                    <!-- Page Header-->
                    <header class="page-header">
                        <div class="container-fluid">
                            <h3 class="no-margin-bottom"><a href="Dashboard.php">Dashboard</a>/Add Staff</h3>
                        </div>
                    </header>
                    <!--list of staff table-->
                    <section class="projects bg-white">
                        <div class="container-fluid ">
                            <!-- Project-->
                            <div class="project">
                                <div class="container bg-white">
                                    <div class="col-lg-12 well">
                                        <div class="row">
                                            <label class="form-label">Personal info</label>
                                                <div class="col-sm-12">
                                                    <div class="row">

                                                        <div class="col-sm-4 form-group">
                                                            <label>First Name</label>
                                                            <input type="text" placeholder="Enter First Name Here.." class="form-control" id="empFname">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" id="empLname"placeholder="Enter Last Name Here.." class="form-control">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label>Middle Name</label>
                                                            <input type="text" id="empMname"placeholder="Enter Middle Name Here.." class="form-control">
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label>Date_of_Birth</label>
                                                            <input type="date" placeholder="DOB"  id="empDob"class="form-control">
                                                        </div>	
                                                        <div class="col-sm-4 form-group">
                                                            <label>Gender</label>
                                                            <select class="form-control" id="empGender"required>
                                                                <option value="">Select Gender</option>
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                            </select>		
                                                        </div>	
                                                        <div class="col-sm-4 form-group">
                                                            <label>Religion</label>
                                                            <select class="form-control" id="empreligion"required>
                                                                <option value="">Select Religion</option>
                                                                <option value="1">Muslim</option>
                                                                <option value="2">Christian</option>
                                                                <option value="3">Traditional</option>
                                                            </select>		
                                                        </div>	
                                                        <div class="col-sm-4 form-group">
                                                            <label>Marital Status</label>
                                                            <select class="form-control" id="empmarital"required>
                                                                <option value="">Select Marital</option>
                                                                <option value="1">Single</option>
                                                                <option value="2">Married</option>
                                                            </select>		
                                                        </div>	
                                                        <div class="col-sm-4 form-group">
                                                            <label>Phone Number</label>
                                                            <input type="text" placeholder="Enter Phone Number Here.." id="empContact"class="form-control">
                                                        </div>		
                                                        <div class="col-sm-4 form-group">
                                                            <label>Email Address</label>
                                                            <input type="text" placeholder="Enter Email Address Here.." id="empEmail"class="form-control">
                                                        </div>	
                                                        <div class="col-sm-4 form-group">
                                                            <label>Place_of_Birth</label>
                                                            <input type="text" placeholder="Enter Place of Birth" id="empPlaceofbirth"class="form-control">
                                                        </div>	
                                                        <div class="col-sm-4 form-group">
                                                            <label>Home Town</label>
                                                            <input type="text" placeholder="Enter Home Town Here.." id="empHometown"class="form-control">
                                                        </div>	
                                                        <div class=" col-sm-4 form-group">
                                                            <label>Address</label>
                                                            <textarea placeholder="Enter Address Here.." rows="2"  class="form-control" id="empaddress" ></textarea>
                                                        </div>	
                                                    </div>

                                                    <label class="form-label">Office info</label>
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label>Staff Category</label>
                                                            <select class="form-control" id="empcategorie" required> 
                                                                <option value="">Select staff-Category</option>
                                                                <option value="1">Academic</option>
                                                                <option value="2">Non Academic</option>
                                                                <option value="3">Both</option>
                                                            </select>	
                                                        </div>
                                                        <div class="col-sm-4 form-group hide" id="deparunit">
                                                            <label>Department/Unit</label>
                                                            <select class="form-control " id="depaunit"required>
                                                                <option value="">Select Department/Unit</option>
                                                                <option  value="1">Department</option>
                                                                <option value="2">Unit</option>
                                                            </select>	
                                                        </div>
                                                        <div class="col-sm-4 form-group hide" id="faculty">
                                                            <label>Faculty</label>
                                                            <select class="form-control" id="empFaculty"required> 
                                                            </select>	
                                                        </div>
                                                        <!--                                                        <div class="col-sm-4 form-group hide" id="facultyDepartment"required>
                                                                                                                    <label>Faculty-Department</label>
                                                                                                                    <select class="form-control" id="empfacultyDepartment"required> 
                                                                                                                    </select>	
                                                                                                                </div>-->

                                                        <div class="col-sm-4 form-group hide" id="department"required>
                                                            <label>Department</label>
                                                            <select class="form-control" id="empDepartment"required>
                                                            </select>	
                                                        </div>	
                                                        <div class="col-sm-4 form-group hide" id="unit"required>
                                                            <label>Unit</label>
                                                            <select class="form-control" id="empUnit"required>
                                                            </select>	
                                                        </div>	

                                                        <div class="col-sm-4 form-group hide" id="empnonaccposition">
                                                            <label>Staff Position</label>
                                                            <select class="form-control " id="addempPosition"required>
                                                                <option value="">Select position</option>
                                                                <option  value="1">Senior Members</option>
                                                                <option value="2">Senior Staff</option>
                                                                <option value="3">Junior staff</option>
                                                            </select>	
                                                        </div>	
                                                        <div class="col-sm-4 form-group hide" id="empaccposition">
                                                            <label>Academic Staff Position</label>
                                                            <select class="form-control" id="addaccademicPosition"required>
                                                                <option value="">Select position</option>
                                                                <option  value="1">Senior Members</option>
                                                                <option value="2">Senior Staff</option>
                                                            </select>	
                                                        </div>	
                                                        <div class="col-sm-4 form-group hide"id="seniormemberRank">
                                                            <label>Academic Staff Rank</label>
                                                            <select class="form-control " id="seniormember" required>
                                                                <option value="">Select Rank</option>
                                                                <option  value="1">Professor</option>
                                                                <option value="2">Associate Professor</option>
                                                                <option value="3">Senior lecturer</option>
                                                                <option value="4">Assistant lecturer</option>
                                                            </select>	
                                                        </div>

                                                        <div class="col-sm-4 form-group hide" id="seniorstaffRank">
                                                            <label>Academic Staff Rank</label>
                                                            <select class="form-control" id="seniorstaff"required>
                                                                <option value="">Select Rank</option>
                                                                <option  value="1">Chairman Research Assistant</option>
                                                                <option value="2">Principal Research Assistant</option>
                                                                <option value="3">Senior Research Assistant</option>
                                                                <option value="4">Research Assistant</option>
                                                            </select>	
                                                        </div>	
                                                        <div class="col-sm-4 form-group hide" id="empschedule">
                                                            <label>Staff Schedule</label>
                                                            <select class="form-control"id="addempSchedule"required>
                                                                <option value="">Select Schedule</option>
                                                                <option  value="1">full</option>
                                                                <option value="2">Half</option>
                                                            </select>	
                                                        </div>	



<!--                                                        <div class="col-sm-4 form-group hide">
                                                            <label>Contract_Start</label>
                                                            <input type="date" placeholder="Contract_Start" id="empContractS"class="form-control">
                                                        </div>		
                                                        <div class="col-sm-4 form-group hide">
                                                            <label>Contract_End</label>
                                                            <input type="date" placeholder="Contract_End" id="empContractE" class="form-control">
                                                        </div>	
                                                        <div class="col-sm-4 form-group hide">
                                                            <label>Contract_Days</label>
                                                            <input type="text" placeholder="Contract_Days" id="empContractday" class="form-control" disabled="">
                                                        </div>	-->


                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4 form-group"></div>
                                                        <div class="col-md-4 form-group"id="submitButton">
                                                            <button type='button' class='btn btn-md btn-info' id='addnewemp'>Register</button>
                                                            <button type="button" class="btn btn-md btn-danger">Cancel</button>	
                                                        </div>
                                                        <div class="col-md-4 form-group"></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php include 'templates/footerfile.php'; ?>  
                </div>
            </div>
        </div>

    </body>

</html>