<div class="modal fade leavemodal  " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="leavemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Employee ID<span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control" id="employeeidL"type="text"></div>
                    </div>
                    <div class="form-group">
                        <label>Employee-Name<span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control" type="text" id="employeeLname"disabled></div>
                    </div>
                    <div class="form-group">
                        <label>Employee-Contact<span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control" type="text" id="employeeLcontact"></div>
                    </div>
                    <div class="form-group"><label>Annual Leaves <span class="text-danger">*</span></label>
                        <input class="form-control" readonly="" type="text" id="employeeLA">
                    </div>
                    <div class="form-group">
                        <label>Leave Type <span class="text-danger">*</span></label>
                        <select class="form-control" id="empleavetype" name="leave">
                            <option value="">Select Leave type</option>
                            <option value="1">Annual Leave</option>
                            <option value="2">Study Leave With Pay</option>
                            <option value="3">Study Leave Without Pay</option>
                            <option value="4">Deferment of Annual Leave</option>
                            <option value="5">Sabbatical Leave</option>
                            <option value="6">Part-Time study leave</option>
                            <option value="7">Leave of absence</option>
                            <option value="8">Sick Leave</option>
                            <option value="9">Maternity Leave</option>
                            <option value="10">Special</option>
                        </select>	
                    </div>
                    <div class="form-group">
                        <label>From <span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control"id="employeeLS" type="date"></div>
                    </div>
                    <div class="form-group">
                        <label>To <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input class="form-control" type="date" id="employeeLE">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Number of days <span class="text-danger">*</span></label>
                        <input class="form-control" readonly="" type="text" id="employeeLD">
                    </div>

                    <div class="form-group">
                        <label>Leave Reason <span class="text-danger">*</span></label>
                        <textarea rows="4" class="form-control" id="leavereason"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitnewleave">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade Uleavemodal  " tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="Uleavemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request-Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Employee ID<span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control" id="UemployeeidL"type="text"disabled></div>
                    </div>
                    <div class="form-group">
                        <label>Employee-Name<span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control" type="text" id="UemployeeLname"disabled></div>
                    </div>
                      <div class="form-group"><label>Annual Leaves <span class="text-danger">*</span></label>
                        <input class="form-control" readonly="" type="text" id="UemployeeLA">
                    </div>
                    <div class="form-group">
                        <label>Employee-Contact<span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control" type="text" id="UemployeeLcontact"></div>
                    </div>
                  
                    <div class="form-group">
                        <label>Leave Type <span class="text-danger">*</span></label>
                        <select class="form-control" id="Uempleavetype" name="leave">
                            <option value="">Select Leave type</option>
                            <option value="1">Annual Leave</option>
                            <option value="2">Study Leave With Pay</option>
                            <option value="3">Study Leave Without Pay</option>
                            <option value="4">Deferment of Annual Leave</option>
                            <option value="5">Sabbatical Leave</option>
                            <option value="6">Part-Time study leave</option>
                            <option value="7">Leave of absence</option>
                            <option value="8">Sick Leave</option>
                            <option value="9">Maternity Leave</option>
                            <option value="10">Special</option>
                        </select>	
                    </div>
                    <div class="form-group">
                        <label>From <span class="text-danger">*</span></label>
                        <div class="cal-icon"><input class="form-control"id="UemployeeLS" type="date"></div>
                    </div>
                    <div class="form-group">
                        <label>To <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input class="form-control" type="date" id="UemployeeLE">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Number of days <span class="text-danger">*</span></label>
                        <input class="form-control" readonly="" type="text" id="UemployeeLD">
                    </div>

                    <div class="form-group">
                        <label>Leave Reason <span class="text-danger">*</span></label>
                        <textarea rows="4" class="form-control" id="Uleavereason"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="Usubmitnewleave">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>