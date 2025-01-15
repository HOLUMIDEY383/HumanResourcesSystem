<!-- Side Navbar -->
<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="" alt="..." style="max-width: 2.5rem;" id="ima" class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4" id="userN"></h1>
            <p id="postion"></p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="Dashboard.php"> <i class="icon-home"></i>Dashboard </a></li>
        <li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Apps</a>
            <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                <li><a href="#">Chats</a></li>
                <li><a href="#">Email</a></li>
                <li><a href="filemanager.php">File Manager</a></li>
                <!--<li><a href="#">Page</a></li>-->
            </ul>
        </li>
        <span class="heading">HR</span>
        <li><a href="attendance"> <i class="icon-grid"></i>Attendance </a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa-fa-cubes"></i>Leave</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="leave.php">Leave</a></li>
                <li><a href="manageleave.php">Leave-History</a></li>
                <li><a href="leavesetting.php">Leave-Settings</a></li>
            </ul>
        </li>
        <li><a href="#employeesDrop" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Employees</a>
            <ul id="employeesDrop" class="collapse list-unstyled ">
                <li><a href="staff.php">All Employees</a></li>
                <li><a href="AddEmployee.php">Add Employee</a></li>
                <!--<li><a href="staffContract.php">Add Employee</a></li>-->
                <li><a href="staffContract.php">Contracts</a></li>
                <li><a href="permisson.php">Role/permission</a></li>
            </ul>
        </li>
        <span class="heading">Performance</span>
        <li><a href="staffappraisal.php"> <i class="fa fa-graduation-cap"></i>Performance </a></li>
        <li><a href="forms.html"> <i class="icon-padnote"></i>Training </a></li>
        <li><a href="Vacancy.html"> <i class="fas fa-bullhorn "></i>Vacancy </a></li>
        <li><a href="promotion.php"> <i class="icon-bullhorn"></i>Promotion </a></li>
        <li><a href="login.html"> <i class="fa fa-sign-out"></i>Resignation </a></li>
        <li><a href="login.html"> <i class="fa fa-times-circle"></i>Termination </a></li>
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li> <a href="newDepartment.php"> <i class="o-imac-screen"></i>Department</a></li>
        <li> <a href="newFaculty.php"> <i class="o-imac-screen"></i>Faculty</a></li>
        <li> <a href="#"> <i class="fa fa-sign-out"></i>Map</a></li>
        <li> <a href="settings.php"> <i class="fa fa-cog mr-3"></i>Settings</a></li>
    </ul>
</nav>