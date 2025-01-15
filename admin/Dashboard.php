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
                    <!-- Dashboard Counts Section-->
                    <section class="dashboard-counts no-padding-bottom">
                        <div class="container-fluid">
                            <div class="row bg-white has-shadow">
                                <!-- Item -->
                                <div class="col-xl-3 col-sm-6">
                                    <div class="item d-flex align-items-center">
                                        <div class="icon bg-violet"><i class="icon-user"></i></div>
                                        <div class="title"><span>Employees</span>
<!--                                            <div class="progress">
                                                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                            </div>-->
                                        </div>
                                        <div class="number"><strong id="temployee"></strong></div>
                                    </div>
                                </div>
                                <!-- Item -->  
                                <div class="col-xl-3 col-sm-6">
                                    <div class="item d-flex align-items-center">
                                        <div class="icon bg-red"><i class="icon-padnote"></i></div>
                                        <div class="title"><span>Training</span>
<!--                                            <div class="progress">
                                                <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                                            </div>-->
                                        </div>
                                        <div class="number"><strong>70</strong></div>
                                    </div>
                                </div>
                                <!-- Item -->
                                <div class="col-xl-3 col-sm-6">
                                    <div class="item d-flex align-items-center">
                                        <div class="icon bg-green"><i class="icon-bill"></i></div>
                                        <div class="title"><span>Leave</span>
<!--                                            <div class="progress">
                                                <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                                            </div>-->
                                        </div>
                                        <div class="number"><strong id="tleave"></strong></div>
                                    </div>
                                </div>
                                <!-- Item -->
                                <div class="col-xl-3 col-sm-6">
                                    <div class="item d-flex align-items-center">
                                        <div class="icon bg-orange"><i class="icon-check"></i></div>
                                        <div class="title"><span>Complains</span>
<!--                                            <div class="progress">
                                                <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                                            </div>-->
                                        </div>
                                        <div class="number"><strong id="unsolvedcomplain"></strong></div>
                                    </div>
                                </div>


                            </div>
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
                                        
                                    <div id='calendar'>
                                        
                                    </div>
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="chart col-lg-3 col-12">
                                   <div class="card">
                                    <div class="card-header">
                                        <h2 class="h6 text-uppercase mb-0">Online Users</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center flex-row">
                                            <ul class="list" id="usersonline">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Projects Section-->
                    <section class="projects no-padding-top">
                        <div class="container-fluid">
                            <!-- Project-->
                            <div class="project">
                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="h6 text-uppercase mb-0">Complains</h2>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-hover table-wrapper "style="width: 100%" id="complainT">
                                            <thead>
                                                <tr>
                                                    <!--<th>S.N</th>-->
                                                    <!--<th>ID</th>-->
                                                    <th>Name</th>
                                                    <th>Unit</th>
                                                    <th>Description</th>
                                                    <th>Sent on</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                        </table>
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