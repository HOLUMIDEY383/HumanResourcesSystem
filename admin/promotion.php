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
                            <h3 class="no-margin-bottom"><a href="Dashboard.php">Dashboard</a>/Promotion</h3>
                        </div>
                    </header>
                    <!--list of staff promotion -->
                    <section class="projects no-padding-buttom">
                        <div class="container-fluid">
                            <!-- Project-->
                            <div class="project">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped display col"style="width: 100%; table-layout: auto;" class="flexible generaltable generalbox" cellspacing="0"id="Astaffpromotion">
                                            <thead>
                                                <tr>
                                                    <th>Employee ID</th>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Promotion Title</th>
                                                    <th>Status</th>
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