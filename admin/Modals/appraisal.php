
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="appraisal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-right">Performance Appraisal</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form data-select2-id="14">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Employee ID</label>
                                <input class="form-control" id="employeeaidL">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Employee Name<span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control" id="employeeaLname" disabled>
                                </div></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date of first Appointment <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control" id="employeeFapp" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date of Birth<span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control"id="employeedob" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Date of Appraisal <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Employee Status<span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <select name="customer_experience" class="form-control">
                                        <option value="true">None</option>
                                        <option value="1"> Active </option>
                                        <option value="2"> Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Employee Assessment<span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <select name="customer_experience" class="form-control">
                                        <option value="true">None</option>
                                        <option value="1"> Annual Assessment</option>
                                        <option value="2"> Probation Assessment</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-box">
                                        <div class="row user-tabs">
                                            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                <ul class="nav nav-tabs nav-tabs-solid">
                                                    <li class="nav-item">
                                                        <a href="#appr_technical" data-toggle="tab" class="nav-link active">Job Performance</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#appr_organizational" data-toggle="tab" class="nav-link ">Attitude</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#comment" data-toggle="tab" class="nav-link ">Comments</a>
                                                    </li>
                                                </ul>
                                            </div></div></div>

                                    <div class="tab-content">
                                        <div id="appr_technical" class="pro-overview tab-pane active">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="bg-white">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5">Job Performance      <b>[Far Exceeds = 5][Exceeds = 4][Meet = 3][Needs Improvement = 2][Fails to Meet = 1]</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th colspan="2">Indicator</th>
                                                                    <th colspan="2">Measures</th>
                                                                    <th>Set Value</th>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Job Specific Knowledge and skills</td>
                                                                    <td colspan="2">Workshops,Conference and training attended and<br> skills application on the job</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control" id="">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Quality</td>
                                                                    <td colspan="2">Accuracy of reports,innovation<br> and quality of contributions</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td></tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Acceptance of Responsibility</td>
                                                                    <td colspan="2">Level of commitment<br> and responsibility</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Collaboration and team work</td>
                                                                    <td colspan="2">Team player</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Commitment to the value of the Department and university</td>
                                                                    <td colspan="2">Demonstration of understanding of values</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td></tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Foresight and initiative</td>
                                                                    <td colspan="2">Problem solving skills</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td></tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Board/Committees Serviced</td>
                                                                    <td colspan="2">Minutes Circulated</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td></tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Leadership & Management</td>
                                                                    <td colspan="2">Leadership qualities</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td></tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Works within Deadline</td>
                                                                    <td colspan="2">Ability to meet deadlines</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td></tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Average Score for job performance</td>
                                                                    <td colspan="2"></td>
                                                                    <td>
                                                                        <input class="form-group" id="jobaveragescore">
                                                                    </td></tr>
                                                            </tbody>
                                                        </table>
                                                    </div></div></div></div>
                                        <div class="tab-pane fade" id="appr_organizational">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="bg-white">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="5">Attitude       <b>[Far Exceeds = 5][Exceeds = 4][Meet = 3][Needs Improvement = 2][Fails to Meet = 1]</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th colspan="2">Indicator</th>
                                                                    <th colspan="2">Expected Value</th>
                                                                    <th>Set Value</th>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Relation with Public and students</td>
                                                                    <td colspan="2">Relationship with staff and student</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Punctuality</td>
                                                                    <td colspan="2">Staff work attendance report</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td></tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Availability</td>
                                                                    <td colspan="2">Available during office hours</td>
                                                                    <td>
                                                                        <select name="customer_experience" class="form-control">
                                                                            <option value="true">None</option>
                                                                            <option value="1"> Fail to meet</option>
                                                                            <option value="2"> Needs improvement</option>
                                                                            <option value="3"> Meets</option>
                                                                            <option value="4"> Exceeds</option>
                                                                            <option value="5"> Far Exceeds</option>
                                                                        </select>
                                                                    </td></tr>
                                                                <tr>
                                                                    <td scope="row" colspan="2">Average Score for job performance</td>
                                                                    <td colspan="2"></td>
                                                                    <td>
                                                                        <input class="form-group" id="attitudeaveragescore">
                                                                    </td></tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="comment">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="bg-white">
                                                        <label>Comments</label>
                                                        <textarea class="form-control" placeholder="Enter comment of the employee">
                                                            
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-primary submit-btn">Submit</button>
            </div>        
        </div>
    </div>
</div>
