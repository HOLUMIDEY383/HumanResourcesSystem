

 <?php include 'templates/headerfile.php'; ?>
<div class="container">
    <br>
    <div class="col-lg-12 well">
        <div class="row">
            <label class="form-label">Personal info</label>
            <form>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>First Name</label>
                            <input type="text" placeholder="Enter First Name Here.." class="form-control" id="addempFname">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Last Name</label>
                            <input type="text" id="addempLname"placeholder="Enter Last Name Here.." class="form-control">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Middle Name</label>
                            <input type="text" id="addempMname"placeholder="Enter Middle Name Here.." class="form-control">
                        </div>
                    </div>					

                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Date_of_Birth</label>
                            <input type="date" placeholder="DOB"  id="addempDob"class="form-control">
                        </div>	
                        <div class="col-sm-4 form-group">
                            <label>Gender</label>
                            <select class="form-control" id="addempGen">
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>		
                        </div>	
                        <div class="col-sm-4 form-group">
                            <label>Religion</label>
                            <select class="form-control" id="addempReli">
                                <option value="">Select Religion</option>
                                <option value="1">Musilm</option>
                                <option value="2">Christian</option>
                                <option value="3">Traditional</option>
                            </select>		
                        </div>	
                        <div class="col-sm-4 form-group">
                            <label>Marital Status</label>
                            <select class="form-control" id="addempMarital">
                                <option value="">Select Marital</option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                                <!--<option value="2">Traditional</option>-->
                            </select>		
                        </div>	
                        <div class="col-sm-4 form-group">
                            <label>Phone Number</label>
                            <input type="text" placeholder="Enter Phone Number Here.." id="addempContact"class="form-control">
                        </div>		
                        <div class="col-sm-4 form-group">
                            <label>Email Address</label>
                            <input type="text" placeholder="Enter Email Address Here.." id="addempEmail"class="form-control">
                        </div>	
                        <div class="col-sm-4 form-group">
                            <label>Place_of_Birth</label>
                            <input type="text" placeholder="Enter Place of Birth" id="addempPlaceofbirth"class="form-control">
                        </div>	
                        <div class="col-sm-4 form-group">
                            <label>Home Town</label>
                            <input type="text" placeholder="Enter Home Town Here.." id="addempHometown"class="form-control">
                        </div>	
                        <div class=" col-sm-4 form-group">
                            <label>Address</label>
                            <textarea placeholder="Enter Address Here.." rows="2"  class="form-control" id="addempAddress" ></textarea>
                        </div>	
                    </div>

                        <label class="form-label">Office info</label>
                    <div class="row">
                          <div class="col-sm-4 form-group">
                            <label>Staff Category</label>
                            <select class="form-control" id="addempcategory"> 
                                <option value="">Select staff-Category</option>
                                <option value="1">Academic</option>
                                <option value="2">Non Academic</option>
                                <option value="3">Both</option>
                            </select>	
                        </div>
                        <div class="col-sm-4 form-group hide" id="faculty">
                            <label>Faculty</label>
                            <select class="form-control" id="addempfaculty"> 
                            </select>	
                        </div>
                        <div class="col-sm-4 form-group hide" id="facultyDepartment">
                            <label>Faculty-Department</label>
                            <select class="form-control" id="empfacultyDepartment"> 
                            </select>	
                        </div>
                        
                        <div class="col-sm-4 form-group hide" id="department">
                            <label>Department</label>
                            <select class="form-control" id="addempDepartment">
                            </select>	
                        </div>	
                         <div class="col-sm-4 form-group">
                            <label></label>
                            <select class="form-control hide" id="addempPosition">
                                <option value="">Select position</option>
                                <option  value="1">Senior Members</option>
                                <option value="2">Senior Staff</option>
                                <option value="3">Junior staff</option>
                            </select>	
                        </div>	
                         <div class="col-sm-4 form-group">
                            <label></label>
                            <select class="form-control hide" id="addaccademicPosition">
                                <option value="">Select position</option>
                                <option  value="1">Senior Members</option>
                                <option value="2">Senior Staff</option>
                            </select>	
                        </div>	
                        <div class="col-sm-4 form-group hide"id="seniormemberM">
                            <label></label>
                            <select class="form-control " id="seniormember">
                                <option value="">Select Rank</option>
                                <option  value="1">Professor</option>
                                <option value="2">Associate Professor</option>
                                <option value="3">Senior lecturer</option>
                                <option value="4">Assistant lecturer</option>
                            </select>	
                        </div>	
                        <div class="col-sm-4 form-group hide" id="seniorstaffa">
                            <label></label>
                            <select class="form-control " id="seniorstaff">
                                <option value="">Select Rank</option>
                                <option  value="1">Chairman Research Assistant</option>
                                <option value="2">Principal Research Assistant</option>
                                <option value="3">Senior Research Assistant</option>
                                <option value="4">Research Assistant</option>
                            </select>	
                        </div>	
                         <div class="col-sm-4 form-group">
                            <label>Schedule</label>
                            <select class="form-control"id="addempSchedule">
                                <option value="">Select Schedule</option>
                                <option  value="1">Full Time </option>
                                <option value="2">Part Time</option>
                            </select>	
                        </div>	
                      
                        
                        
                        <div class="col-sm-4 form-group">
                            <label>Contract_Start</label>
                            <input type="date" placeholder="Contract_Start" id="addempContractS"class="form-control">
                        </div>		
                        <div class="col-sm-4 form-group">
                            <label>Contract_End</label>
                            <input type="date" placeholder="Contract_End" id="addempContractE" class="form-control">
                        </div>	
                        <div class="col-sm-4 form-group">
                            <label>Contract_Days</label>
                            <input type="text" placeholder="Contract_Days" id="empcontractdays" class="form-control" disabled="">
                        </div>	
                       

                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group"></div>
                        <div class="col-md-4 form-group">
                            <button type="button" class="btn btn-md btn-info " id="registeremp">Register</button>	
                            <!--<button type="button" class="btn btn-md btn-info hide " id="searchempadd">Search</button>-->	
                            <button type="button" class="btn btn-md btn-danger">Cancel</button>	
                        </div>
                        <div class="col-md-4 form-group"></div>
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div>
<!-- Modal files--> 

<!-- JavaScript files-->
<script src="vendor/jquery-3.5.1/popper.min.js" type="text/javascript"></script>
<script src="vendor/jquery-3.5.1/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="vendor/moment/min/moment.min.js" type="text/javascript"></script>
<script src="vendor/bootstrap-4.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="vendor/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="vendor/notify/notify.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="vendor/fullcalendar/dist/fullcalendar.min.js" type="text/javascript"></script>
<!--<script src="js/osmanli_calendar.js" type="text/javascript"></script>-->
<!--<script src="js/staff.js" type="text/javascript"></script>-->
<script src="js/addemployee.js" type="text/javascript"></script>
<!--<script src="vendor/fullcalendar/lib/locales-all.min.js" type="text/javascript"></script>-->
<!-- Sweetalert-->
<!--<script src="vendor/Alertify/alertify.min.js" type="text/javascript"></script>-->
<!--<script src="vendor/sweetalert2/dist/sweetalert2.all.min.js" type="text/javascript"></script>-->
<script src="vendor/sweetalert2/sweetalert2@10.js" type="text/javascript"></script>
