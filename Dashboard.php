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
                            <h2 class="no-margin-bottom">Dashboard</h2>
                        </div>
                    </header>
                    <section class="dashboard-counts no-padding-bottom">
                        <div class="container-fluid ">
                            <h3 class="hide" id="greets"><b>Welcome , </b><small id="UuserDas"> </small></h3><p id="greets2"class="hide"><script> document.write(new Date().toDateString());</script></p>
                        </div>
                    </section>
                    <!-- Dashboard Header Section    -->
                    <section class="dashboard-header">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- Statistics -->
                                <div class="statistics col-lg-3 col-12">
                                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                                        <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                                        <div class="text"><strong>234</strong><br><small>Applications</small></div>
                                    </div>
                                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                                        <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                                        <div class="text"><strong>152</strong><br><small>Interviews</small></div>
                                    </div>
                                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                                        <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                                        <div class="text"><strong>147</strong><br><small>Forwards</small></div>
                                    </div>
                                </div>
                                <!-- Line Chart            -->
                                <div class="chart col-lg-6 col-12">
                                    <div class="card bg-white has-shadow">
                                        <div class="card-body">

                                            <div id='Ucalendar'>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="chart col-lg-3 col-12">
<!--                             <section>-->
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="dash-title">Your Leave</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="time-list" style="">
                                                <div class="dash-stats-list">
                                                    <h4></h4>
                                                    <p>Leave Taken</p>
                                                </div>
                                                <div class="dash-stats-list">
                                                    <h4 id="remaingleave"></h4>
                                                    <p>Remaining</p>
                                                </div>
                                                <div class="dash-stats-list">
                                                    <h4 id="annualleave">12</h4>
                                                    <p >Annual</p>
                                                </div></div>
                                            <div class="request-btn">
                                                <a class="btn btn-primary" href="Uleave">Apply Leave</a>
                                            </div></div></div>
                                    <!--</section>-->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Projects Section-->
                    <section class="projects no-padding-top">
                        <div class="container-fluid">
                            <!-- Project-->
                            <div class="project">
                                <div class="row">
                                    <!-- Statistics -->
                                    <div class="statistics col-lg-3 col-12">
<!--                                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                                            <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                                            <div class="text"><strong>234</strong><br><small>Applications</small></div>
                                        </div>
                                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                                            <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                                            <div class="text"><strong>152</strong><br><small>Interviews</small></div>
                                        </div>
                                        <div class="statistic d-flex align-items-center bg-white has-shadow">
                                            <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                                            <div class="text"><strong>147</strong><br><small>Forwards</small></div>
                                        </div>-->
                                    </div>
                                    <!-- Line Chart            -->
                                    <div class="chart col-lg-6 col-12">
<!--                                        <div class="card bg-white has-shadow">
                                            <div class="card-body">
                                            </div>
                                        </div>-->

                                    </div>
                                    <div class="chart col-lg-3 col-12">
    <!--                             <section>-->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="dash-title">Upcoming Events</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="time-list">
                                                    <ul class="list-unstyled float-left" id="Uevent">
                                                   
                                                   
                                                   </ul>
                                                                                                         
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!--</section>-->
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