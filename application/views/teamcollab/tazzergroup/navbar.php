<link rel="stylesheet" href="<?=base_url()?>assets/css/teamcollab/home/menu.css">
<?php
    $type = $this->session->userdata('usertype');
    $userId = $this->session->userdata('id');
?>

<?php
    if ($this->session->userdata('user_select_language') == '') {
        if ($default_language_select['tag'] == 'ltr' || $default_language_select['tag'] == '') {

        } elseif ($default_language_select['tag'] == 'rtl') {
            echo'<link href="' . base_url() . 'assets/css/bootstrap-rtl.min.css" media="screen" rel="stylesheet" type="text/css" />';
            echo'<link href="' . base_url() . 'assets/css/app-rtl.css" rel="stylesheet" />';
        }
    } else {
        if ($this->session->userdata('tag') == 'ltr' || $this->session->userdata('tag') == '') {
            
        } elseif ($this->session->userdata('tag') == 'rtl') {

            echo'<link href="' . base_url() . 'assets/css/bootstrap-rtl.min.css" media="screen" rel="stylesheet" type="text/css" />';
            echo'<link href="' . base_url() . 'assets/css/app-rtl.css" rel="stylesheet" />';
        }
    }

    $headerClass = "";
    if ($module == TEMPLATE_THEME && $page == "home") {
        $headerClass = "home";    
    } 
    else {
        $headerClass = "page";
    }

    if ($this->session->userdata('id')) { 
        if ($this->session->userdata('usertype') == 'user') {
            $user_details = $this->db->where('id', $this->session->userdata('id'))->get('users')->row_array();
        } elseif ($this->session->userdata('usertype') == 'provider') {
            $user_details = $this->db->where('id', $this->session->userdata('id'))->get('providers')->row_array();
        }
    }
    
?>

<div class="main-wrapper">
  
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id = "navbar-top">
        <a class="navbar-brand" href="<?= base_url();?>teamcollab" style = "color: #575656;font-weight: 700;font-size: 25px;">TeamCollab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Features
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    
                        <div class="container">
                            <div class="row">
                                <div class="sub-menu-block">
                                    
                                    <ul class="nav flex-column">
                                    <li class="nav-item">
                                    <a class="nav-link active" href="#">TIME MANAGEMENT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                            <div class = "sub-menu-image">
                                                <img src="assets/img/teamcollab/menu/clock.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 11px; color: #2998FF; padding-left: 5px;">
                                                Employee Timeclock
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                simple&reliable employee time tracking
                                            </p> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_scheduling">
                                            <div class = "sub-menu-image" style = "">
                                                <img src="assets/img/teamcollab/menu/calendar.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 12px; color: #9B29FF; padding-left: 5px;">
                                                Employee Scheduling
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                simple&reliable employee time tracking
                                            </p> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-md-2  -->
                            <div class="sub-menu-block">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">DAILY OPERATIONS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>teamcollab_digital_form">
                                            <div class = "sub-menu-image" style = " ">
                                                <img src="assets/img/teamcollab/menu/files.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 11px; color: #FF7229; padding-left: 5px;">
                                                Digital Forms & Checklists
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                Mobile field reports and automated workflows
                                            </p> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>teamcollab_task_management">
                                            <div class = "sub-menu-image">
                                                <img src="assets/img/teamcollab/menu/to-do-list.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 12px; color: #29DAFF; padding-left: 5px;">
                                                Task Management
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                Quick& effortless from planning to distribution
                                            </p> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.col-md-2  -->
                            <div class="sub-menu-block">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">INTERNAL COMMUNICATIONS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_communication">
                                            <div class = "sub-menu-image" style = " ">
                                                <img src="assets/img/teamcollab/menu/group.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 11px; color: #35D235; padding-left: 5px;">
                                                Employee Communication
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                Designed for deskless teams
                                            </p> 
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- /.col-md-2  -->
                            <div class="sub-menu-block">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">EXTERNAL COMMUNICATION</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <div class = "sub-menu-image" style = " ">
                                                <img src="assets/img/teamcollab/menu/chat.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 12px; color: #033EFF; padding-left: 5px;">
                                               Chat
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                Best Chat with team
                                            </p> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <div class = "sub-menu-image" style = " ">
                                                <img src="assets/img/teamcollab/menu/video-camera.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 12px; color: #FF03CD; padding-left: 5px;">
                                                Video
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                On time Video call with team
                                            </p> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <div class = "sub-menu-image" style = " ">
                                                <img src="assets/img/teamcollab/menu/speaker.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 12px; color: #742971; padding-left: 5px;">
                                                Audio
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                Audio call by app
                                            </p> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <div class = "sub-menu-image" style = " ">
                                                <img src="assets/img/teamcollab/menu/align-left.png" width="20" alt="" >
                                            </div>
                                            
                                            <span style = "font-size: 12px; color: #068E64; padding-left: 5px;">
                                                Text
                                            </span> 
                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                Text messages
                                            </p> 
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- /.col-md-2  -->
                            <div class="sub-menu-block">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">EDCATION & ONBOARDING</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <div class = "sub-menu-image" style = " ">
                                                <img src="assets/img/teamcollab/menu/employees.png" width="20" alt="" >
                                            </div>

                                            <span style = "font-size: 12px; color: #F2BB3B; padding-left: 5px;">
                                                Employee Training
                                            </span>

                                            <p style = "font-size:12px; color:grey;padding-left:20px">
                                                Easy & customizable mobile training courses
                                            </p> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--  /.container  -->
                
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Solutions
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               
                        <div class="container">
                            <div class="row solution-row">
                                <div class="solution-menu-block ">
                                    
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <span class="nav-link active" style = "color:#949494">
                                                INDUSTRIES
                                            </span>  
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_solution_cleaning">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/cleaning-mop.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Cleaning
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/construction-crane.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Construction
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/location-svgrepo.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Field Service 
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/healthcare-svgrepo.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Healthcare
                                                </span> 
                                               
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-md-3  -->
                                <div class="solution-menu-block">

                                    
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <span class="nav-link active" style = "color:white">
                                                INDUSTRIES
                                            </span>  
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/hospital-svgrepo.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Hospitality
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/truck-svgrepo.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Logistics
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/factory-svgrepo.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Manufacturing
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/shop-svgrepo.png" width="20" alt="" >
                                                </div>
                                                
                                                <span>
                                                    Retail
                                                </span> 
                                               
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                                <!-- /.col-md-3  -->
                                <div class="solution-menu-block">
                                    
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <span class="nav-link active" style = "color:white">
                                               INDUSTRIES
                                            </span>  
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/security-svgrepo.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Security
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/user-svgrepo.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Staffing
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/more-svgrepo-com.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    More Industries
                                                </span> 
                                               
                                            </a>
                                        </li>
                                       
                                </div>
                                
                                <!-- /.col-md-2  -->
                                <div class="solution-menu-block ">
                                    
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <span class="nav-link active" style = "color:#949494">
                                                CONNECTEAM FOR
                                            </span>  
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_employee_time_clock">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/more-svgrepo-com.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Enterprise
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        
                                       
                                        
                                    </ul>
                                </div>
                             

                                
                            </div>
                        </div>
                    <!--  /.container  -->
                    </div>
                </li>
                                            
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>teamcollab_pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>teamcollab_customers">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>teamcollab_client_management">Client's Management</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Resource
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               
                        <div class="container">
                            <div class="row solution-row">
                                <div class="solution-menu-block ">
                                    
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_blog">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/cleaning-mop.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Blog
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_template_directory">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/construction-crane.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Template Directory
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <!-- /.col-md-3  -->
                                <div class="solution-menu-block ">
                                    
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_case_study">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/cleaning-mop.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Case Studies
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_help_center">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/construction-crane.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Help Center
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                
                                <!-- /.col-md-3  -->
                                <div class="solution-menu-block ">
                                    
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_contact_us">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/cleaning-mop.png" width="20" alt="" >
                                                </div>
                                                
                                                <span >
                                                    Contact Us
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url(); ?>teamcollab_about_us">
                                                <div class = "solution-menu-image">
                                                    <img src="assets/img/teamcollab/menu/construction-crane.png" width="20" alt="" >
                                                </div>
                                                
                                                <span>
                                                    About Us
                                                </span> 
                                               
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                
                                <!-- /.col-md-2  -->
                                

                                
                            </div>
                        </div>
                    <!--  /.container  -->
                    </div>
                </li>
            </ul>
        <div>
            
        <a class="nav-link v-btn header-login" href="<?=base_url().$loginUrl?>">
            <img src="<?php echo base_url();?>assets/img/teamcollab/ic_person.png" class="mr-2"> Login
        </a>      


        <a class="nav-link v-btn header-join" href="<?=base_url().$signupUrl?>">
            Start for free
        </a>
                            
        </div>
        
        
    
    </div>


    </nav>
</div>

<script type="text/javascript">
    
</script>

<script src="<?=base_url()?>assets/js/<?=TEMPLATE_THEME?>/navbar.js"></script>
