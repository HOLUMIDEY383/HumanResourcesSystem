<!-- The Modal -->
<div class="modal fade" id="departmentmodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Department</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Department Name</label>
                    <input class="form-control mb-6" id="departmentname" placeholder="Enter Department Name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Department short name</label>
                    <input class="form-control mb-6" id="departmentshortname" placeholder="Enter Short Department Name" required>
                </div>
<!--                <div class="form-group">
                    <label class="form-label">Head of Department ID</label>
                    <input class="form-control mb-6" id="HDepartment" placeholder="Enter Head of department ID" required>
                </div>-->
                <div class="form-group">
                    <label class="form-label">Faculty</label>
                    <select class="form-control" id="Dfaculty"> 
                    </select>	

                </div>
                <div class="form-group">
                    <input type="button" value="Submit" class="btn btn-primary btn-block" id="Submitdepartment">
                    
                </div>

            </div>


        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="editdepartmentmodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Unit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Department Name</label>
                    <input class="form-control mb-6" id="editNdepartment" name="Dname"placeholder="Enter Departtment Name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Department short name</label>
                    <input class="form-control mb-6" id="editSDepartment" name="Dsname"placeholder="Enter Short Departtment Name" required>
                </div>
<!--                <div class="form-group">
                    <label class="form-label">Head of Department ID</label>
                    <input class="form-control mb-6" id="editHDepartment" name="Hod"placeholder="Enter Head of department ID" required>
                </div>-->
                <!--                <div class="form-group">
                                    <input type="button" value="Edit" class="btn btn-primary btn-block" id="submiteditdepartment"> 
                                </div>-->
            </div>


        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="delectdepartmentmodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete Department</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                    <p> You are about to delete this Department</p>
                    <div class="form-group float-right">
                        <input type="button" value="Delete" class="btn btn-danger delect" id=""> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

            </div>


        </div>
    </div>
</div>

