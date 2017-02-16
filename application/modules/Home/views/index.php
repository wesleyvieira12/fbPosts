<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form class="formSchedule">
                <div class="box box-solid wrap-box-post">
                    <div class="box-header with-border">
                        <i class="fa fa-paper-plane text-blue"></i>
                        <h3 class="box-title"><?=l('slug-schedule-posts')?></h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="callout callout-danger list-errors">
                                </div>
                            </div>
                        </div>
                        <div class="tabbable wrap-stacked-post">
                            <ul class="nav nav-pills nav-stacked stacked-post  col-md-2 col-sm-4">
                                <li class="active first"><a href="#post-text" data-toggle="tab"><i class="fa fa-file-text"></i> <?=l('slug-text-post')?> <input type="radio" name="type_post" value="text" checked="true" /></a></li>
                                <li><a href="#post-link" data-toggle="tab"><i class="fa fa-link"></i> <?=l('slug-link')?>  <input type="radio" name="type_post" value="link" /></a></li>
                                <li><a href="#post-image" data-toggle="tab"><i class="fa fa-picture-o"></i> <?=l('slug-image')?>  <input type="radio" name="type_post" value="image" /></a></li>
                                <li><a href="#post-video" data-toggle="tab"><i class="fa fa-video-camera"></i> <?=l('slug-video')?>  <input type="radio" name="type_post" value="video" /></a></li>
                            </ul>
                            <div class="col-md-10 content-post pr0 pl0">
                                <div class="col-md-6 pr0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="post-text">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-message')?></label>
                                                        <textarea class="form-control" rows="3" name="post_message"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="tab-pane" id="post-link">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-link-url')?></label>
                                                        <input type="text" class="form-control" name="link_url"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-message')?></label>
                                                        <textarea class="form-control" rows="3" name="link_message"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-link-title')?></label>
                                                        <input type="text" class="form-control" name="link_title"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-link-description')?></label>
                                                        <textarea class="form-control" rows="3" name="link_description"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-link-caption')?></label>
                                                        <input type="text" class="form-control" name="link_caption"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-picture-url')?></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="link_picture">
                                                            <span class="input-group-btn">
                                                              <button class="btn btn-success btn-flat dialog-upload" type="button"><i class="fa fa-cloud-upload"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="post-image">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-image-description')?></label>
                                                        <textarea class="form-control" rows="3" name="image_description"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-image-url')?></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="image_url">
                                                            <span class="input-group-btn">
                                                              <button class="btn btn-success btn-flat dialog-upload" type="button"><i class="fa fa-cloud-upload"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="post-video">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-video-title')?></label>
                                                        <input type="text" class="form-control" name="video_title"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-video-description')?></label>
                                                        <textarea class="form-control" rows="3" name="video_description"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="head-title"><?=l('slug-video-url')?></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="video_url">
                                                            <span class="input-group-btn">
                                                              <button class="btn btn-success btn-flat dialog-upload" type="button"><i class="fa fa-cloud-upload"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="head-title col-md-12 text-left p0 fix-height-label"><i class="fa fa-clock-o"></i> <?=l('slug-time-post')?></label>
                                            <input type="text" class="form-control date_range" readonly="true" name="time_post"/>
                                        </div>
                                        

                                        <div class="form-group col-md-6">
                                            <label class="head-title col-md-12 text-left p0 fix-height-label"><i class="fa fa-bullseye"></i>Variação / Atraso</label>
                                            <select class="form-control" name="deplay">
                                            <?php foreach (deplay_time() as $value) {
                                                if(MINIMUM_DEPLAY<=$value){                                            
                                                    if($value==1800){
                                            ?>

                                            <option value="<?= $value?>" <?= (DEFAULT_DEPLAY == $value)? "selected": ""?>><?= $value/60?> minutos</option>
                                            <?php }else{ ?>
                                            <option value="<?= $value?>" <?= (DEFAULT_DEPLAY == $value)? "selected": ""?>><?= $value/3600?> horas</option>
                                                <?php } } }?>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="checkbox" class="icheck" name="add_time_post" value="1" />
                                            <label class="fix-height-label"> &nbsp; Descanso após envio</label>
                                            <br/>
                                            <input type="checkbox" class="icheck" name="delete_complete" value="1" />
                                            <label class="fix-height-label"> &nbsp; <?=l('slug-delete-after-finished')?></label>
                                        </div>
                                    </div>
                                    <!--<div class="row">
                                        <div class="line mt10 mb0"></div>
                                        <div class="form-group col-md-12 mt10 mb0">
                                            <input type="checkbox" class="icheck" name="auto_pause" value="1" />
                                            <label class="fix-height-label"> &nbsp; Programar auto-pause</label>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="head-title col-md-12 text-left p0 fix-height-label">Após completar</label>
                                                    <select class="form-control" name="pause_post">
                                                    <?php for ($i=1; $i <= 100; $i++) { ?>
                                                        <option value="<?=$i?>"><?=$i?> <?=l('slug-posts')?></option>
                                                    <?php }?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="head-title col-md-12 text-left p0 fix-height-label">Tempo de Intervalo</label>
                                                    <select class="form-control" name="pause_time">
                                                        <?php foreach (time_pause() as $value) {?>
                                                            <option value="<?=$value?>"><?=$value?> <?=l('slug-minutes')?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     -->  
                                     
                                    
                                    

                                     <input type="hidden" name="auto_pause" value="0" /> 
                                     <input type="hidden" name="pause_post" value="" /> 
                                     <input type="hidden" name="pause_time" value="" /> 
                                     
                                     
                                    <div class="row">
                                        <div class="line mt0"></div>
                                        <div class="form-group col-md-12 mt10">
                                            <input type="checkbox" class="icheck" name="repeat_post" value="1" />
                                            <label class="fix-height-label"> &nbsp; <?=l('slug-repeat-post')?></label>
                                            <div class="row">
                                                <div class="col-md-6 pr0 mobile-pr15">
                                                    <label class="head-title col-md-12 text-left p0 fix-height-label"><?=l('slug-repeat')?></label>
                                                    <select class="form-control" name="post_next">
                                                    <?php foreach ($save_post as $row){?>
                                            <option value="<?=$row->id?>"><?=$row->name?></option>
                                            <?php }?>
                                                    
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="head-title col-md-12 text-left p0 fix-height-label">Quantas vezes</label>
                                                     <select class="form-control" name="repeat">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                     </select>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                                <div class="col-md-6 pr0">
                                    <?php if(!empty($save_post)){?>
                                    <div class="form-group">
                                        <label class="head-title"><?=l('slug-list-save-post')?></label>
                                        <select class="form-control getSavePost">
                                            <option value="">---</option>
                                            <?php foreach ($save_post as $row){?>
                                            <option value="<?=$row->id?>"><?=$row->name?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <?php }?>
                                    <label class="head-title"><?=l('slug-preview')?></label>
                                    <div class="box box-solid wrap-preview">
                                        <div class="widget-user-header widget-user-2">
                                            <div class="widget-user-image">
                                                <img src="<?=BASE?>assets/admin/img/avatar.jpg" alt="" title="">
                                            </div>
                                            <h3 class="widget-user-username">Nome do Usuário</h3>
                                            <h5 class="widget-user-desc"><?=l('slug-just-now')?> <i class="fa fa-globe" aria-hidden="true"></i></h5>
                                        </div>
                                        <div class="box-body box-preview">
                                            <div class="preview-desc preview-box-1">
                                                <div class="line-no-text"></div>
                                                <div class="line-no-text"></div>
                                                <div class="line-no-text w50"></div>
                                            </div>
                                            <div class="box box-widget widget-user box-hide preview-box-5">
                                                <div class="widget-user-header bg-blue preview-box-3 preview-box-image">
                                                    <div class="btn-play preview-box-2"></div>
                                                </div>
                                                <div class="widget-user-image">
                                                </div>
                                                <div class="box-footer preview-box-4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="description-block">
                                                                <h5 class="description-header preview-box-title">
                                                                    <div class="line-no-text"></div>
                                                                </h5>
                                                                <span class="description-text preview-box-desc">
                                                                    <div class="line-no-text"></div>
                                                                    <div class="line-no-text w50"></div>
                                                                </span>
                                                                <span class="description-caption preview-box-caption">
                                                                    <div class="line-no-text w25"></div>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="list-action-fb" src="<?=BASE?>assets/admin/img/list-action-fb.png" alt="" title="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-post pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?=l('slug-publish-post')?></button>
                            <a class="btn btn-default btn-save pull-right mr10"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?=l('slug-save-post')?></a>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="head-title mt20 text-blue"><i class="fa fa-tasks"></i> <?=l('slug-select-page-group-profile')?> <input type="checkbox" class="icheck CheckAllMultiPage" /> <span class="small"><?=l('slug-select-all')?></span></h4> 
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-sm pt15 mb15 col-md-8 pull-right">
                                    <input type="text" class="form-control input-search">
                                    <span class="input-group-btn">
                                      <button type="button" class="btn btn-info btn-flat"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php if(empty($profiles)){?>
                            <?php if(count($profiles) < USERS_LIMIT){?>
                            <div class="text-center">
                                <a href="<?=PATH."facebook/add"?>" class="btn btn-app bg-blue">
                                    <i class="fa fa-facebook"></i> <?=l('slug-add-new')?>
                                </a>
                            </div>
                            <?php }else{?>
                                <div class="callout callout-warning list-errors text-left" style="display: block;">
                                    <div><i class="fa fa-exclamation-circle"></i> <?=l('slug-desc-user-limit')?></div>
                                </div>
                            <?php }?>
                        <?php }?>

                        <?php if(!empty($list_groups)){?>
                        <div class="col-md-10 col-md-offset-2 pl0 selectGroups">
                            <div class="nav-tabs-custom mb0">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_0" data-toggle="tab" aria-expanded="false" data-ids=""><?=l('slug-all-groups')?></a></li>
                                    <?php foreach ($list_groups as $row) {?>
                                    <li class=""><a href="#" data-toggle="tab" aria-expanded="false" data-ids="<?=implode(",", json_decode($row->groups))?>"><?=$row->name?></a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                        <?php }?>
                        <div class="tabbable wrap-stacked-post mt20">
                            <ul class="nav nav-pills nav-stacked stacked-post col-md-2">
                                <?php if(!empty($profiles)){
                                foreach ($profiles as $key => $row) {
                                ?>
                                <li class="<?=$key==0?"active first":""?>"><a href="#post-<?=$row->fid?>" data-toggle="tab"><i class="fa fa-user text-blue"></i> <?=$row->name?></a></li>
                                <?php }}?>
                            </ul>
                            <div class="col-md-10 content-post list_pages pt15">
                                <div class="tab-content">
                                    <?php if(!empty($profiles)){
                                    foreach ($profiles as $key => $row) {
                                    ?>
                                    <div class="tab-pane <?=$key==0?"active":""?>" id="post-<?=$row->fid?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group box-item">
                                                    <input type="checkbox" class="checkItemPage" id="item-profile-<?=$row->fid?>" name="pages[]" value="profile{-}<?=$row->fid?>{-}<?=$row->name?>{-}<?=$row->id?>" />
                                                    <label class="fix-height-label label-checkItemPage small" for="item-profile-<?=$row->fid?>"> &nbsp; <?=l('slug-profile-timeline')?> <a class="btn btn-default btn-xs" target="_blank" href="https://www.facebook.com/<?=$row->fid?>"><i class="fa fa-search"></i></a></label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="head-title text-blue"><input type="checkbox" class="icheck CheckAllPage"/>  <?=l('slug-pages')?></label><br/>
                                                    <div class="row">
                                                        <?php if(!empty($row->pages['data'])){
                                                        $pages = $row->pages['data'];
                                                        foreach ($pages as $node => $value) {
                                                        ?>
                                                        <div class="col-md-6 box-item">
                                                            <input type="checkbox" class="checkItemPage" id="item-pages-<?=$key?>-<?=$node?>" name="pages[]" value="page{-}<?=$value['id']?>{-}<?=$value['name']?>{-}<?=$value['access_token']?>" />
                                                            <label class="fix-height-label label-checkItemPage small" for="item-pages-<?=$key?>-<?=$node?>"> &nbsp; <?=$value['name']?> <a class="btn btn-default btn-xs" target="_blank" href="https://www.facebook.com/<?=$value['id']?>"><i class="fa fa-search"></i></a></label><br/>
                                                        </div>
                                                        <?php }}else{?>
                                                            <div class="text-center" style="background: #eee; padding: 5px;"><?=l('slug-empty')?></div>
                                                        <?php }?>  
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <label class="head-title text-blue"><input type="checkbox" class="icheck CheckAllPage"/> <?=l('slug-groups')?></label> <span class="small">(if groups empty or missing. Click <a href="javascript:void(0);" class="getGroups">here</a> to get a list group)</span><br/>

                                                    <div class="row box-item-group">
                                                        <?php 
                                                        if(!empty($row->groups)){
                                                        $groups = $row->groups;
                                                        foreach ($groups as $node => $value) {
                                                        ?>
                                                        <div class="col-md-6 item-group box-item" data-id="<?=$value->id?>">
                                                            <input type="checkbox" class="checkItemPage checkbox-group" id="item-groups-<?=$key?>-<?=$node?>" name="pages[]" value="group{-}<?=$value->group_id?>{-}<?=$value->group_name?>{-}<?=$value->fid?>" />
                                                            <label class="fix-height-label label-checkItemPage small" for="item-groups-<?=$key?>-<?=$node?>"> &nbsp; <?=$value->group_name?>  <span class="btn btn-xs label-<?=$value->privacy != "OPEN"?"default":"success"?>" style="font-size:9px!important;"><i class="fa fa-eye<?=$value->privacy != "OPEN"?"-slash":""?>"></i> <?=$value->privacy?></span> <a class="btn btn-default btn-xs" target="_blank" href="https://www.facebook.com/<?=$value->group_id?>"><i class="fa fa-search"></i></a></label><br/>
                                                        </div>
                                                        <?php }}else{?>
                                                            <div class="text-center" style="background: #eee; padding: 5px;"><?=l('slug-empty')?></div>
                                                        <?php }?>     
                                                    </div>                                           
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }}?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal-save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?=l('slug-title')?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control save_title"/>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-modal-save"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?=l('slug-save-post')?></button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    $(".getGroups").click(function(){
        _that = $(this);
        _api = _that.parents(".item").data("api");
        _url  = PATH+'groups';

        popwin = window.open(_url, "getGroups", "height=600,width=700");
    });

    function popupCallback(str){
        window.location.reload();
    }
    
</script>

