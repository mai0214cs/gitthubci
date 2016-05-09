<div class="navbar nav_title" style="border: 0;">
    <a href="/" class="site_title"><i class="fa fa-paw"></i> <span><?=lang('name_website')?></span></a>
</div>
<div class="clearfix"></div>
<div class="profile">
    <div class="profile_pic">
        <img src="<?=urlfull()?>production/images/img.jpg" alt="Admin" class="img-circle profile_img" />
    </div>
    <div class="profile_info">
        <span><?=lang('hello_admin')?></span>
        <h2><?=$this->session->userdata('admin')['fullname']?></h2>
    </div>
</div>
<br />