<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('Admin/head', $this->data); ?>
    <body class="nav-md">
        <div class="container body">
          <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <?php $this->load->view('Admin/logobanner'); ?>
                    <?php $this->load->view('Admin/menu'); ?>
                    <?php $this->load->view('Admin/buttonmenufooter'); ?>
                </div>
            </div>
            <?php $this->load->view('Admin/topnavigation'); ?> 
            <div class="right_col" role="main">  
                <?php $this->load->view($temp, $this->data); ?>    
            </div>
            <?php $this->load->view('Admin/footer'); ?>    
          </div>
        </div>
        <?php $this->load->view('Admin/foot_js', $this->data); ?>
    </body>
</html>