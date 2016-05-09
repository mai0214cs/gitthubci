<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('Admin/head');?>

  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">
              <form method="POST" action="">
              <h1><?=lang('page_login')?></h1>
              <div class="btn btn-danger"><?=  isset($this->data['message_info'])?$this->data['message_info']:''?></div>
              <div>
                  <input type="text" class="form-control" name="username" value="<?php echo set_value('username')?>" placeholder="<?=  lang('username')?>" required="" />
              </div>
              <div>
                  <input type="password" class="form-control" name="password" value="<?php echo set_value('username')?>" placeholder="<?=  lang('password')?>" required="" />
              </div>
              <div>
                  <button class="btn btn-default submit" type="submit" name="submit"><?= lang('button_login') ?></button>
              </div>
              <div class="clearfix"></div>
              </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>