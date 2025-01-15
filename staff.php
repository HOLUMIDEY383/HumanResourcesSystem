<!DOCTYPE html>
<html>
    <?php 
        $pagename = "staff";
        include 'templates/headerfile.php'; 
       ?>
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
                            <h3 class="no-margin-bottom"><a href="Dashboard.php">Dashboard</a>/Staffs(admin)</h3>
                        </div>
                    </header>
                <!--list of staff table-->
                    <section class="projects no-padding-buttom">
                        <div class="container-fluid">
                            <!-- Project-->
                            <div class="project">
                                <div class="card">
<!--                                    <div class="card-header">
                                        <h2 class="h6 text-uppercase mb-0">Complains</h2>
                                    </div>-->
                                    <div class="card-body">
                                        <table class="table table-striped"style="width: 100%" class="flexible generaltable generalbox" cellspacing="0" id="staffT">
                                                        <thead>
                                                            <tr>
                                                                <th>S.N</th>
                                                                <th>Name</th>
                                                                <th>Gender</th>
                                                                 <th>Rank</th>
                                                                <th>Contact</th>
                                                                <th>Email</th>
                                                                <th>Preview</th>
                                                            </tr>
                                                        </thead>
                                                    </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                    include 'templates/footerfile.php'; 
                    include 'js/pageaccesscheck.php';
                    ?>  
                <script src="js/staff.js" type="text/javascript"></script>
                </div>
            </div>
        </div>

    </body>

</html>