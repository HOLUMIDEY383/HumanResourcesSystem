<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Color</label>
                    <div class="col-sm-10">
                        <select name="color" class="form-control" id="color">
                            <option value="">Select color</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Navy Blue</option>
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoies</option>
                            <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
                            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                            <option style="color:#000;" value="#000">&#9724; Black</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="start" class="col-sm-2 control-label">Starting time</label>
                    <div class="col-sm-10">
                        <input type="text" name="start" class="form-control" id="start" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end" class="col-sm-2 control-label">Ending Time</label>
                    <div class="col-sm-10">
                        <input type="text" name="end" class="form-control" id="end">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="addevent">Save</button>
            </div>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="edittitle" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Color</label>
                    <div class="col-sm-10">
                        <select name="color" class="form-control" id="editcolor">
                            <option value="">Select Color</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Navy Blue</option>
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoies</option>
                            <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
                            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                            <option style="color:#000;" value="#000">&#9724; Black</option>
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="start" class="col-sm-2 control-label">Starting time</label>
                    <div class="col-sm-10">
                        <input type="text" name="start" class="form-control" id="editstart">
                    </div>
                </div>
                <div class="form-group">
                    <label for="end" class="col-sm-2 control-label">Ending Time</label>
                    <div class="col-sm-10">
                        <input type="text" name="end" class="form-control" id="editend">
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label class="text-danger"><input type="checkbox"  name="delete" id="delect"> Delete Event</label>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" class="form-control" id="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="editevent">Save</button>
            </div>
        </div>
    </div>
</div>
