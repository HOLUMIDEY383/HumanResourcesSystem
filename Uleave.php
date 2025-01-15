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
                            <h3 class="no-margin-bottom"><a href="Dashboard.php">Dashboard</a>/Leave</h3>
                        </div>
                    </header>
                    <br><br>
                    <a href="#" class="btn btn-primary float-md-right" data-toggle="modal" id="Uaddleave"data-target="#Uleavemodal"><i class="fa fa-plus"></i> Add Leave</a>
                    <br><br>
                    <section class="projects no-padding-top">
                        <div class="container-fluid">
                            <!-- Project-->
                            <div class="project">
                                <div class="card">
                                    <div class="card-body">
                                       <table class="table table-striped display col"style="width: 100%; table-layout: auto;" class="flexible generaltable generalbox" cellspacing="0" id="UleaveT">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Leave Type</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>No of days</th>
                                                            <th>Description/Purpose</th>
                                                            <th>Status</th>
                                                            <th>Approved BY</th>
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