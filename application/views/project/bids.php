<style type="text/css">
.page-data {
    background-color: #f3f3f3;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  margin-bottom: 0px;
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.card-body {
    padding-top: 0px;
}
.content-right {
    display: flex;
    justify-content: flex-end;
}
.pro-title-font {
    font-size: 1.17rem;
}
.three-line-ellipsis {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    /*white-space: pre-line;*/
}
.bids-table {
    border-collapse: collapse !important;
    width: 100%;
    color: #4d525b;
}
.body-row {
    border-top: 1px solid #dedede;
    padding: 8px 16px;
}
.action {
    outline: none;
    cursor: pointer;
}
.table-header {
    padding-bottom: 3%;
}
.table-content {
    padding-top: 1%;
    padding-bottom: 1%;
}

</style>
<div class="content">
    <div class="container">
        <div class="row">
            <?php $this->load->view($theme.'/home/'.$theme.'_sidemenu');?>
            <div class="col-xl-9 col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="widget-title">Projects</h4>
                    </div>
                    <div class="col-md-6 content-right">
                        <a href="<?php echo base_url().$theme ?>-project-post" class="btn btn-primary" style="height:37px !important;">Post a Project</a>
                    </div>
                </div>
                
                <ul class="nav nav-tabs menu-tabs">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo base_url().$theme ?>-project">Projects</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().$theme ?>-project-bids">Bids</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url().$theme ?>-project-currentwork/">Current Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url().$theme ?>-project-pastwork/">Past Work</a>
                    </li>
                </ul>
                <div class="row page-data">                    
                    <div class="col-md-12 mt-4 mb-4">                        
                        <div class="card">
                            <div class="card-header">
                                <table class="bids-table">
                                    <thead>
                                        <tr data-border="true" data-expandable-body-compact="true">
                                            <th class="table-header">Project Name</th>
                                            <th class="table-header">Total Bids</th>
                                            <th class="table-header">My Bid</th>
                                            <th class="table-header">Bid Placed</th>
                                            <th class="table-header">Jobs</th>
                                            <th class="table-header">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody style="display: table-row-group">
                                    <?php
                                        $this->session->flashdata('success_message');
                                        if (!empty($project_list)) {
                                            foreach ($project_list as $row) {                            
                                    ?>
                                        <tr class="body-row">
                                            <td class="table-content">
                                                <a href="<?php echo base_url().$theme ?>-project-detail/<?=$row['id']?>" class="pro-title-font"><?php echo $row['name']; ?></a> 
                                            </td>
                                            <td class="table-content">5 Bids</td>
                                            
                                            <td class="table-content">
                                                <?php echo $row['currency_sign']; ?>
                                                <?php echo $row['price_from']; ?> - <?php echo $row['price_to']; ?>
                                                <?php echo $row['currency_code']; ?>
                                            </td>
                                            <td class="table-content"><?php echo $row['created_at'] ?> </td>
                                            <td class="table-content"><?php echo $row['state'] ?> </td>
                                            <td class="table-content">
                                                <a style="padding-left:0" class="dropdown-item text-danger" onclick="return confirm('Are you sure?')" href="<?php echo $base_url; ?>employee-project-bids-remove?id=<?php echo $row['id']; ?>"><i class="bx bxs-trash mr-2"></i> Remove</a>
                                            </td>
                                        </tr>
                                     <?php 
                                            }
                                        } 
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Pagination Links -->
                        <?php
                            if (!empty($project_list)) {
                                echo $this->ajax_pagination->create_links();
                            }
                        ?>
                        <!-- ==================================== dataList End ===================================== -->
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/functions.js"></script>
<script type="text/javascript">
    function remove(id) {
        console.log('here-----', id)
        $.ajax({
            url: base_url+"employee-project-bids-remove",
            data:{'id': id},
            type:"POST",
            // async:false,
            success(data){
                console.log('ok');
            
            }
        });
    }

</script>
