<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= lang('page_catenews') ?></h2>
            <div class="pull-right">
                <a href="<?=  urlfull('Admin/')?>CateNews/Update" class="btn btn-primary"><?= lang('CateNews_add') ?></a>
            </div>
            <div class="clearfix"></div>
            <div id="ResultData"><?=$this->session->flashdata("message");?></div>
        </div>
        <div class="x_content">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?= lang('CateNews_title') ?></th>
                        <th><?= lang('CateNews_image') ?></th>
                        <th><?= lang('CateNews_url') ?></th>
                        <th><?= lang('CateNews_status') ?></th>
                        <th><?= lang('CateNews_orderby') ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $k=0; foreach ($this->data['list'] as $v) {$k++;  ?>
                    <tr>
                        <th scope="row"><?=$k?></th>
                        <td><a href="<?=  urlfull('Admin/')?>CateNews/Update/<?= $v->idpage ?>" target="_blink"><?= strip_tags($v->title) ?></a></td>
                        <td><img style="width:75px;" src="<?= ImageError($v->avatar) ?>" alt="<?= strip_tags($v->title) ?>" /></td>
                        <td><a href="/<?= urlfull('Admin/').$v->url ?>" target="_blink">/<?= $v->url ?></a></td>
                        <td style="text-align:center;"><input onclick="CheckUpdate(<?= $v->idpage ?>,this.checked?1:0)" type="checkbox" <?= $v->status==1?'checked="checked"':'' ?> /></td>
                        <td><?= $v->order ?></td>
                        <td>
                            <a href="<?=  urlfull('Admin/')?>CateNews/Update/<?= $v->idpage ?>"><i class="fa fa-pencil"></i></a>
                            <a onclick="HideOptionCategory(<?= $v->idpage ?>)" id="fancyBoxLink" href="#FANCYBOX"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="FANCYBOX" style="display:none;">
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?= lang('CateNews_convert') ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <select name="CategoryNewsNew" class="form-control" size="10">
                    <option value="0"><?=lang('CateNews_deleteall')?></option>
                    <?php 
                    foreach ($this->data['list'] as $v){ echo '<option id="Option'.$v->idpage.'" value="'.$v->idpage.'">'.$v->title.'</option>';}
                    ?>
                </select>
                <input type="hidden" name="idpagedelete" value="0" />
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <button onclick="DeleteCategoryNews();" type="type" class="btn btn-success"><?= lang('CateNews_confirmdelete') ?></button>
                </div>
            </div>
        </div>
    </div>    
</div>
<script>
function CheckUpdate(id, val){
    $.post('<?=  urlfull('Admin/')?>CateNews/CheckUpdate/'+id,{val:val},function(rs){
        UpdatePage(rs);
    });
}



function DeleteCategoryNews(){
    var idnew, idold;
    idold = $('[name="idpagedelete"]').val();
    idnew = $('[name="CategoryNewsNew"]').val();
    $.post('<?=  urlfull('Admin/')?>/CateNews/Delete',{idold:idold, idnew:idnew},function(rs){ 
        location.reload(); 
    });
    
}
function HideOptionCategory(id){
    $('[name="CategoryNewsNew"]>option').show();
    $('[name="idpagedelete"]').val(id);
    $('#Option'+id).hide();
}
</script>
<script>
$("a#fancyBoxLink").fancybox({
    'href'   : '#FANCYBOX',
    'titleShow'  : false,
    'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic'
});

function UpdatePage(rs){
    $('#ResultData').html(rs);
    $('#ResultData').show().delay(1000).slideUp(500);
}
UpdatePage($('#ResultData').html());
</script>
