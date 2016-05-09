<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?=lang('ListNews_searchdata')?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><?=lang('ListNews_searchcount')?></label>
                        <input type="number" min="10" max="300" value="25" class="form-control" name="PageCount">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><?=lang('ListNews_searchkey')?></label>
                        <input style="width: 100%;" type="text" class="form-control" name="PageKey" value="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                      <label><?=lang('ListNews_searchcategory')?></label>
                      <select style="width: 100%;" name="PageCategory" class="form-control">
                          <option value="0"><?=lang('ListNews_searchcategoryall')?></option>
                          <option value="358">Chính sách</option><option value="359">Thông tin chung</option></select>
                    </div>
                </div>
            </div>
            <div class="row">   
                <div class="col-sm-4">
                    <div class="form-group">
                      <label><?=lang('ListNews_searchorder')?></label>
                      <select name="PageOrder" class="form-control" onchange="LoadListProductFind()">
                          <option selected="selected" value="0"><?=lang('ListNews_searchordernew')?></option>
                          <option value="1"><?=lang('ListNews_searchorderold')?></option>
                          <option value="2"><?=lang('ListNews_searchorderaz')?></option>
                          <option value="3"><?=lang('ListNews_searchorderza')?></option>
                      </select>
                    </div>
                </div>
                <div class="col-sm-4"><br>
                    <button class="btn bottom" onclick="TimkiemTintuc()"><?=lang('ListNews_searchsubmit')?></button>
                </div>
            </div>
        </div>
    </div>
</div>    





<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Danh sách tin tức</h2>
            <div class="pull-right">
                <a onclick="XoaCheckAll('/Admin/NewsList/DeleteAll.html', '<?=lang('ListNews_buttondeletecheckconfirm')?>')" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i> <?=lang('ListNews_buttondeletecheck')?></a>
                <a href="/Admin/NewsList/Update.html" class="btn btn-primary"><?=lang('ListNews_buttonadd')?></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><input type="checkbox" onclick="togglecheckboxes(this)"></th>
                        <th><?=lang('ListNews_title')?></th>
                        <th><?=lang('ListNews_image')?></th>
                        <th><?=lang('ListNews_url')?></th>
                        <th><?=lang('ListNews_status')?></th>
                        <th><?=lang('ListNews_order')?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $key => $item) { ?>
                    <tr>
                        <th scope="row"><?=($key+1)?></th>
                        <td><input type="checkbox" class="CheckAll" rel="<?=$item->id?>"></td>
                        <td><a href="/Admin/NewsList/Update/<?=$item->id?>" target="_blink"><?=strip_tags($item->title)?></a></td>
                        <td><img style="width:75px;" src="<?=  ImageError($item->avatar)?>" alt="<?=strip_tags($item->title)?>"></td>
                        <td><a href="<?=$item->url?>" target="_blink"><?=$item->url?></a></td>
                        <td style="text-align:center;"><input onclick="CheckUpdate(<?=$item->id?>,this.checked?1:0,0)" type="checkbox"></td>
                        <td><input style="text-align:right; max-width: 75px;" class="form-control" onblur="CheckUpdate(<?=$item->id?>,$(this).val(),1)" type="number" value="0"></td>
                        <td>
                            <a href="/Admin/NewsList/<?=$item->id?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa tin tức này không')" href="/Admin/NewsList/Delete/<?=$item->id?>"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>    
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="pull-left"><?=$listpage?></div>
    </div>
</div>

<script>
function CheckUpdate(id, val, type){
    $.post('/Admin/NewsList/CheckUpdate.html',{id:id, val:val, type:type},function(rs){
        ResultUpdate(rs); 
    });
}
function TimkiemTintuc(){
    var count, keyx, categoryx, pagex, orderx;
    count = $('[name="PageCount"]').val();
    keyx = $('[name="PageKey"]').val();
    categoryx = $('[name="PageCategory"]').val();
    pagex = $('[name="PageView"]').val();
    orderx = $('[name="PageOrder"]').val();
    location.href = "/Admin/NewsList.html?count="+count+"&keyx="+keyx+"&categoryx="+categoryx+"&pagex="+pagex+"&orderx="+orderx;
}
</script>                <div class="clearfix"></div>
                
