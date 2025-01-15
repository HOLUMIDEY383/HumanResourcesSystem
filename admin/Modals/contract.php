<div class="modal fade contractmodal  " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="contractmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Contract</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee ID</label>
                        <input type="text" class="form-control" id="employeecontractid" aria-describedby="emailHelp" placeholder="Enter Employee Index number">
                        <small id="" class="form-text text-muted"><b id="employeelable"> </b></small>
                    </div>
                    <div class="form-group hide">
                        <label for="">Name</label>
                        <input type="text" class="form-control " id="employeecontractname" placeholder="Fullname" disabled>
                    </div>
                    <div class="form-group hide">
                        <label for="">Unit</label>
                        <input type="text" class="form-control " id="employeecontractunit" placeholder="Unit" disabled>
                    </div>
                    <div class="form-group hide">
                        <label for="">Contract Starting Date</label>
                        <input type="date" class="form-control " id="employeecontractS">
                    </div>
                    <div class="form-group hide">
                        <label for="">Contract Ending Date</label>
                        <input type="date" class="form-control " id="employeecontractE">
                    </div>
                    <div class="form-group hide">
                        <label for="">Contract Days</label>
                        <input type="text" class="form-control " id="employeecontractD" placeholder="Contract Days" disabled>
                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary hide" id="submitnewcontract">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade contractmodal  " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="vacancymodal">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Vacancy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">

                        <div class="form-group col-3">
                            <label for="">Vacancy Title</label>
                            <input type="text" class="form-control " id="vacancyTitle" name="">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Avaliable</label>
                            <input type="text" class="form-control " id="vacancyAva" name="">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Ending Date</label>
                            <input type="date" class="form-control " id="vacancyEnd"name="">
                        </div>
                        <div class="form-group col-12">
                            <label for="">Details</label>
                            <textarea title="Description" name="Vinformation"class="form-control" id="vacancyD"rows="10"> </textarea>
                        </div>
                    </div>
                </form>
               

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitnewvacancy">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade contractmodal  " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="editvacancymodal">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Vacancy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">

                        <div class="form-group col-3">
                            <label for="">Vacancy Title</label>
                            <input type="text" class="form-control " id="editvacancyTitle" name="Vtitle">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Avaliable</label>
                            <input type="text" class="form-control " id="editvacancyAva" name="Vavaliablity">
                        </div>
                        <div class="form-group col-3">
                            <label for="">Ending Date</label>
                            <input type="date" class="form-control " id="editvacancyEnd" name="VendD">
                        </div>
                        <div class="form-group col-12">
                            <label for="">Details</label>
                            <textarea title="Description" name="Vinformation"class="form-control" id="editvacancyD"rows="10"> </textarea>
                        </div>
                    </div>
                </form>
               

            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-primary" id="submitnewvacancy">Submit</button>-->
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>