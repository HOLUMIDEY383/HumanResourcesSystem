<!-- The Modal -->
  <div class="modal fade" id="newfacultymodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Faculty</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                <div class="form-group">
                    <input class="form-control mb-6" id="facultyname" name="Fname" placeholder="Enter Faculty Name" required>
                </div>
                <div class="form-group">
                    <input class="form-control mb-6" id="facultyshortname"name="Fsname" placeholder="Enter Short Faculty Name" required>
                </div>
                <div class="form-group">
                    <input type="button" value="Submit" class="btn btn-primary btn-block" id="Submitfaculty"> 
                </div>
            
        </div>
        
        
      </div>
    </div>
  </div>

 
<!-- The Modal -->
  <div class="modal fade" id="editfacultymodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Faculty</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                <div class="form-group">
                    <input class="form-control mb-6" id="editfacultyname" name="Fname"placeholder="Enter Unit Name" required>
                </div>
                <div class="form-group">
                    <input class="form-control mb-6" id="editfacultyshortname"name="Fsname" placeholder="Enter Short Unit Name" required>
                </div>
<!--                <div class="form-group">
                    <input type="button" value="Edit" class="btn btn-primary btn-block" id="submitfacultyunit"> 
                </div>-->
            
        </div>
        
        
      </div>
    </div>
  </div>

<!-- The Modal -->
  <div class="modal fade" id="delectfacultymodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Faculty</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                <p> You are about to delete this Faculty</p>
                <div class="form-group float-right">
                    <input type="button" value="Delete" class="btn btn-danger" id="deletefaculty"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            
        </div>
        
        
      </div>
    </div>
  </div>

 