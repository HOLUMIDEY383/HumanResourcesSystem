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
                            <h3 class="no-margin-bottom"><a href="Dashboard.php">Dashboard</a>/Department</h3>
                        </div>
                    </header>
                    <br><br>
                    <a href="#" class="btn btn-primary float-md-right" data-toggle="modal" data-target="#departmentmodal"><i class="fa fa-plus"></i>Add New</a>
                    <br><br>
                    <section class="projects no-padding-top">
                        <div class="container-fluid">
                            <!-- Project-->
                            <div class="project">
                                <div class="card">
<!--                                    <div class="card-header">
                                        <h2 class="h6 text-uppercase mb-0">Complains</h2>
                                    </div>-->
                                    <div class="card-body">
                                           <table class="table table-striped"style="width: 100%" id="departmentT">
                                                        <thead>
                                                            <tr>
                                                                <th>Department Name</th>
                                                                <th>Department Short Name</th>
                                                                <th>Head of Department</th>
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