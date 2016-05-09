<?php $confirm = $item->id>0; ?>
<form onsubmit="return UpdateFormCategoryNews()" action="/Admin/CateNews/Update/<?= $item->id ?>" id="FormCategoryNews" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post">
<div class="page-title">
    <div class="title_left">
        <h3><?= $ID>0?lang('CateNews_titlepageedit'):lang('CateNews_titlepageadd'); ?></h3>
        
        <div class="ResultData"><?=$this->session->flashdata("message");?></div>
    </div>
    <div class="pull-right">
        <a href="/Admin/CateNews" class="btn btn-primary"><?= lang('CateNews_reset') ?></a>
        <button type="submit" class="btn btn-success"><?= lang('CateNews_update') ?></button>
    </div>
</div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= lang('CateNews_infocommon') ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <input type="hidden" name="idpage" value="<?= $item->id ?>" />
                    
                    <div class="form-group">
                        <label for="title"><?=  lang('CateNews_title')?></label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= strip_tags($confirm?$item->title:set_value('username'))?>" />
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><?= lang('CateNews_image') ?></label>
                        <div class="uploadhinhanhavatar"><img src="<?= ImageError($confirm?$item->avatar:set_value('avatar')) ?>" alt="Avatar" style="width:100px;" /></div>
                        <br/><input onclick="BrowseServer('avatar')" type="button" value="<?= lang('CateNews_selectimage') ?>" /><input type="hidden" name="avatar" value="<?= strip_tags($confirm?$item->avatar:set_value('avatar'))?>" />
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><?= lang('CateNews_parent') ?></label>
                        <select class="form-control" name="idparent">
                            <?php $idcate = $confirm?$item->id_page:set_value('idparent'); ?>
                            <option <?=$idcate==0?'selected="selected"':''?> value="0"><?= lang('CateNews_root') ?></option>
                            <?php 
                            foreach ($list as $value) {
                                echo '<option '.($idcate==$value->idpage?'selected="selected"':'').' value="'.$value->idpage.'">'.strip_tags($value->title).'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="url"><?=  lang('CateNews_url')?></label>
                        <input type="text" class="form-control" id="url" name="url" value="<?= strip_tags($confirm?$item->url:set_value('url'))?>" />
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label"><?= lang('CateNews_description') ?></label>
                        <textarea name="description" class="form-control"><?=$confirm?$item->description:set_value('description')?></textarea>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= lang('CateNews_infoseo') ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label for="seotitle"><?=  lang('SEO_title')?></label>
                        <input type="text" class="form-control" id="seotitle" name="seotitle" value="<?= strip_tags($confirm?$item->seo_title:set_value('seotitle'))?>" />
                    </div>
                    <div class="form-group">
                        <label for="seodescription"><?=  lang('SEO_description')?></label>
                        <input type="text" class="form-control" id="seodescription" name="seodescription" value="<?= strip_tags($confirm?$item->seo_description:set_value('seodescription'))?>" />
                    </div>
                    <div class="form-group">
                        <label for="seokeyword"><?=  lang('SEO_keyword')?></label>
                        <input type="text" class="form-control" id="seokeyword" name="seokeyword" value="<?= strip_tags($confirm?$item->seo_keyword:set_value('seokeyword'))?>" />
                    </div>
                </div>
            </div>
            
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= lang('CateNews_infoview') ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label"><?= lang('CateNews_status') ?></label><br/>
                        <select class="form-control" name="status">
                            <?php $status = $confirm?$item->status:set_value('status'); ?>
                            <option <?=$status==1?'selected="selected"':''?> value="1"><?= lang('CateNews_statusview') ?></option>
                            <option <?=$status==0?'selected="selected"':''?> value="0"><?= lang('CateNews_statushide') ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orderby"><?=  lang('CateNews_orderby')?></label>
                        <input type="number" class="form-control" id="orderby" name="orderby" value="<?= strip_tags($confirm?$item->order:set_value('orderby'))?>" />
                    </div>
                    
                </div>
            </div>
        </div>
    </div>   
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group"><div class="x_panel"><div class="x_content">
                <label class="control-label"><?= lang('CateNews_detail') ?></label>
                <textarea name="detail" class="form-control"><?=$confirm?$item->detail:set_value('detail')?></textarea>
                <script>CKEDITOR.replace('detail');</script>
            </div></div></div>
        </div>
    </div>
</form>
<!--<script src="jquery.tagsinput.min.js"></script>-->
<script>  
function BrowseServer(field){
    var finder = new CKFinder();
    finder.basePath = '/';
    finder.selectActionFunction = function(url){
        $('[name="'+field+'"]').val(url);
        $('.uploadhinhanh'+field).html('<img src="'+url+'" alt="Hình ảnh" style="width:100px;" />');
    };
    finder.popup();
}
/*
            function onAddTag(tag) { alert("Thêm 1 tags: " + tag); }
            function onRemoveTag(tag) { alert("Xóa 1 tags: " + tag);  }
            function onChangeTag(input, tag) { alert("Thay đổi 1 tags: " + tag); }
            $(function () { $('[name="seo_keyword"]').tagsInput({ width: 'auto' }); });*/
</script>