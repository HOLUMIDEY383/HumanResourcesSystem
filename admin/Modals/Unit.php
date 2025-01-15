<!-- The Modal -->
  <div class="modal fade" id="newunitmodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Unit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="px-3 form-control" >
                <div class="form-group">
                    <input class="form-control mb-6" id="unitname" placeholder="Enter Unit Name" required>
                    <br>
                    <input class="form-control mb-6" id="unitshortname" placeholder="Enter Short Unit Name" required>
                </div>
                <div class="form-group">
                    <input type="button" value="Submit" class="btn btn-primary btn-block" id="Submitunit"> 
                </div>
                </form>
            
        </div>
        
        
      </div>
    </div>
  </div>

 
<!-- The Modal -->
  <div class="modal fade" id="editunitmodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Unit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="px-3 form-control" >
                <div class="form-group">
                    <input class="form-control mb-6" id="editunitname" placeholder="Enter Unit Name" required>
                    <br>
                    <input class="form-control mb-6" id="editunitshortname" placeholder="Enter Short Unit Name" required>
                </div>
                <div class="form-group">
                    <input type="button" value="Edit" class="btn btn-primary btn-block" id="submiteditunit"> 
                </div>
                </form>
            
        </div>
        
        
      </div>
    </div>
  </div>

<!-- The Modal -->
  <div class="modal fade" id="delectunitmodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Unit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form class="px-3 form-control">
                <p> You are about to delete this unit</p>
                <div class="form-group float-right">
                    <input type="button" value="Delete" class="btn btn-danger" id="deleteunit"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            
        </div>
        
        
      </div>
    </div>
  </div>

 