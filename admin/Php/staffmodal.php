<style>
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>  
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-right" id="emppro"> </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container rounded bg-white mb-5">

                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" id="empimage" style="height: 10pc;">
                                <span class="font-weight-bold" id="empusername"> </span><span class="text-black-50" id="empemail">Email</span><span class="text-black-50" id="empcontact"> Contact</span> <span class="text-black-50" id="empmaritalstatus"></span></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" id="empsurname" disabled></div>
                                    <div class="col-md-6"><label class="labels">Lastname</label><input type="text" class="form-control" value="" id="emplastname" disabled></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Date of Birth</label><input type="text" class="form-control"  value=""id="empdob" disabled></div>
                                    <div class="col-md-5"><label class="labels">Gender</label><input type="text" class="form-control" value="" id="empgender" disabled></div>
                                    <div class="col-md-6"><label class="labels">Position</label><input type="text" class="form-control"  value="" disabled id="empposition"></div>
                                    <div class="col-md-6"><label class="labels">Place of Birth</label><input type="text" class="form-control" value="" id="empplaceofbirth" disabled></div>
                                    <div class="col-md-6"><label class="labels">HomeTown</label><input type="text" class="form-control" value="" id="emphometown" disabled></div>
                                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control"  value="" disabled id="empcountry"></div>
                                    <div class="col-md-6"><label class="labels">Contract-Start</label><input type="text" class="form-control"  value="" disabled id="empcontratstart"></div>
                                    <div class="col-md-6"><label class="labels">Contract-End</label><input type="text" class="form-control"  value="" disabled id="empcontratend"></div>
                                    <div class="col-md-12"><label class="labels">Contact Address/Permanent Address</label><textarea type="text" class="form-control" value="" rows="6" cols="12" id="empaddress" disabled> </textarea></div>
                                    <div class="col-md-12"><label class="labels">Education and Qualification</label></div><br><a href="" class="" id="empeducationlevel" > </a>
                                    <div class="col-md-12"><label class="labels">Curriculum Vitae</label><br><a href="" class="" id="empcv" > </a></div>

                                </div>
                                <!--                <div class="row mt-3">
                                                   
                                                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" ></div>
                                                </div>-->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!--<h5>  Next-of-Kin</h5>-->
                            <div class="p-3 py-5">
                                <div class="col-md-12"><label class="labels text-bold">Next-of-Kin Details</label></div>
                                <div class="col-md-12"><label class="labels">Full-Name</label><input type="text" class="form-control" value="" id="empnextofkinname" disabled></div>
                                <div class="col-md-12"><label class="labels">Address</label><textarea type="text" class="form-control" value="" rows="4" cols="12" id="empnextofkinaddress" disabled> </textarea></div>
                                <div class="col-md-12"><label class="labels">Contact</label><input type="text" class="form-control"  value="" id="empnextofkincontact" disabled></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>


    </div>
</div>
<div class="modal fade bd-example-modal-md editmodal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="myModal2">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-right" id="empdeteal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="col-lg-12 well">
                        <div class="row">
                            <label class="form-label">Personal info</label>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>First Name</label>
                                        <input type="text" placeholder="Enter First Name Here.."name="firstname" class="form-control" id="editempFname" >
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Last Name</label>
                                        <input type="text" id="editempLname"placeholder="Enter Last Name Here.."name="lastname" class="form-control">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Middle Name</label>
                                        <input type="text" id="editempMname"placeholder="Enter Middle Name Here.."name="middlename" class="form-control">
                                    </div>
                                </div>					

                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>Date_of_Birth</label>
                                        <input type="date" placeholder="DOB"  id="editempDob"name="dob"class="form-control">
                                    </div>	
                                    <div class="col-sm-4 form-group">
                                        <label>Gender</label>
                                        <select class="form-control" id="editempGen"name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>		
                                    </div>	
                                    <div class="col-sm-4 form-group">
                                        <label>Religion</label>
                                        <select class="form-control" id="editempReli" name="relgion">
                                            <option value="">Select Religion</option>
                                            <option value="1">Musilm</option>
                                            <option value="2">Christian</option>
                                            <option value="3">Traditional</option>
                                        </select>		
                                    </div>	
                                    <div class="col-sm-4 form-group">
                                        <label>Marital Status</label>
                                        <select class="form-control" id="editempMarital" name="marital_status">
                                            <option value="">Select Marital</option>
                                            <option value="1">Single</option>
                                            <option value="2">Married</option>
                                        </select>		
                                    </div>	
                                    <div class="col-sm-4 form-group">
                                        <label>Phone Number</label>
                                        <input type="text" placeholder="Enter Phone Number Here.."name="contact" id="editempContact"class="form-control">
                                    </div>		
                                    <div class="col-sm-4 form-group">
                                        <label>Email Address</label>
                                        <input type="text" placeholder="Enter Email Address Here.." name="email"id="editempEmail"class="form-control">
                                    </div>	
                                    <div class="col-sm-4 form-group">
                                        <label>Place_of_Birth</label>
                                        <input type="text" placeholder="Enter Place of Birth" name="place_of_birth"id="editempPlaceofbirth"class="form-control">
                                    </div>	
                                    <div class="col-sm-4 form-group">
                                        <label>Home Town</label>
                                        <input type="text" placeholder="Enter Home Town Here.."name="Hometown" id="editempHometown"class="form-control">
                                    </div>	
                                    <div class="col-sm-4  form-group">
                                        <label>Address</label>
                                        <textarea placeholder="Enter Address Here.." rows="3" name="address"class="form-control" id="editempAddress"></textarea>
                                    </div>	
                                </div>
                                <label class="form-label">Office info</label>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>Staff-Category</label>
                                        <select class="form-control" id="editempcategory" name="staff_categ"> 
                                            <option value="">Select staff-Category</option>
                                            <option value="1">Academic</option>
                                            <option value="2">Non Academic</option>
                                            <option value="3">Both</option>
                                        </select>	
                                    </div>	
                                    <div class="col-sm-4 form-group hide" id="editfaculty">
                                        <label>Faculty</label>
                                        <select class="form-control" id="editempFaculty" name="Fid"> 
                                        </select>	
                                    </div>	
                                    <div class="col-sm-4 form-group hide"id="editdepartment">
                                        <label>Department</label>
                                        <select class="form-control" id="editempDepartmenta" name="Did">
                                        </select>	
                                    </div>	
                                    <div class="col-sm-4 form-group hide"id="editunit">
                                        <label>Unit</label>
                                        <select class="form-control" id="editempunita" name="unit_id">
                                        </select>	
                                    </div>	
                                    <div class="col-sm-4 form-group hide" id="editnonemppostionline">
                                        <label>Position</label>
                                        <select class="form-control" id="editempPosition" name="staff_position">
                                            <option value="">Select position</option>
                                            <option  value="1">Senior Members</option>
                                            <option value="2">Senior Staff</option>
                                            <option value="3">Junior staff</option>
                                        </select>	
                                    </div>	
                                    <div class="col-sm-4 form-group hide" id="editaccemppostionline">
                                        <label>Position</label>
                                        <select class="form-control" id="editempPositiona" name="staff_position">
                                            <option value="">Select position</option>
                                            <option  value="1">Senior Members</option>
                                            <option value="2">Senior Staff</option>
                                        </select>	
                                    </div>	
                                    <div class="col-sm-4 form-group hide"id="seniormemberRank">
                                        <label>Academic Staff Rank</label>
                                        <select class="form-control " id="seniormember" required name="rank">
                                            <option value="">Select Rank</option>
                                            <option  value="1">Professor</option>
                                            <option value="2">Associate Professor</option>
                                            <option value="3">Senior lecturer</option>
                                            <option value="4">Assistant lecturer</option>
                                        </select>	
                                    </div>
                                    <div class="col-sm-4 form-group hide" id="seniorstaffRank">
                                        <label>Academic Staff Rank</label>
                                        <select class="form-control" id="seniorstaff"required name="rank"> 
                                            <option value="">Select Rank</option>
                                            <option  value="1">Chairman Research Assistant</option>
                                            <option value="2">Principal Research Assistant</option>
                                            <option value="3">Senior Research Assistant</option>
                                            <option value="4">Research Assistant</option>
                                        </select>	
                                    </div>

                                    <div class="col-sm-4 form-group">
                                        <label>Schedule</label>
                                        <select class="form-control"id="editempSchedulea" name="staff_schedule">
                                            <option value="">Select Schedule</option>
                                            <option  value="1">full</option>
                                            <option value="2">Half</option>
                                        </select>	
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger float-lg-right" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

