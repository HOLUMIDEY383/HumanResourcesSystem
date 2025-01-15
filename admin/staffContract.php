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
                            <h3 class="no-margin-bottom"><a href="Dashboard.php">Dashboard</a>/Staff-Contacts</h3>
                        </div>
                    </header>
                    <br><br>
                    <a href="#" class="btn btn-primary float-md-right" data-toggle="modal" data-target="#contractmodal"><i class="fa fa-plus"></i>New Contract</a>
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
                                        <table class="table table-striped display col"style="width: 100%; table-layout: auto;" class="flexible generaltable generalbox" cellspacing="0"id="staffcontract">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>S.N</th>
                                                                            <th>Name</th>
                                                                            <th>From</th>
                                                                            <th>To</th>
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