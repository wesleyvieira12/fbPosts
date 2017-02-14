<section class="content-header">
    <h1 class="head-title">
        <?=l('slug-settings')?>
    </h1>
</section>
<section class="content">
    <div class="box box-solid">
        <form role="form" method="POST" data-redirect="settings" enctype="multipart/form-data">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-credit-card text-red" aria-hidden="true"></i> <?=l('slug-purchase-code')?></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <input type="password" class="form-control" name="purchase_code" id="purchase_code" value="<?=!empty($result)?$result->purchase_code:""?>">
                </div>
                <?php if(!empty($verify) && is_array($verify)){
                    $support_end = strtotime($verify['supported_until']);
                    $support_now = strtotime(NOW);
                ?>
                
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-blue">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?=BASE."assets/admin/img/avatar.png"?>" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username"><?=$verify['buyer']?></h3>
                            <h5 class="widget-user-desc"><?=$verify['licence']?></h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#"><?=l('slug-purchase-date')?> <span class="pull-right badge bg-green"><?=date("H:i:s d/m/Y", strtotime($verify['created_at']))?></span></a></li>
                                <li><a href="#"><?=l('slug-supported-until')?> <span class="pull-right badge bg-<?=($support_now > $support_end)?"red":"green"?>"><?=date("H:i:s d/m/Y", strtotime($verify['supported_until']))?></span></a></li>
                            </ul>
                            <?php if($support_now > $support_end){?>
                                <div style="padding: 10px 20px;" class="bg-red"><?=l('slug-supported-end')?></a></div>
                            <?php }?>
                        </div>
                    </div>
                <?php }else{?>
                    <?php if(!$verify){?>
                        <?php if($result->purchase_code != ""){?>
                            <div style="padding: 10px 20px;" class="bg-red"><?=l('slug-purchase-code-invalid')?></a></div>
                        <?php }else{?>
                            <div style="padding: 10px 20px; border: 1px solid red;"><?=l('slug-enter-purchase-code')?> <a href="https://themeskingdom.com/knowledge-base/how-to-find-your-themeforest-item-purchase-code/" target="_blank">(<?=l('slug-guide')?>)</a></div>
                        <?php }?>
                    <?php }?>
                <?php }?>
            </div>
            <div class="box-header with-border" style="border-top: 15px solid #ecf0f5;">
                <h3 class="box-title"><i class="fa fa-tint text-green"></i> <?=l('slug-customization-options')?></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="name"><?=l('slug-website-name')?></label>
                    <input type="hidden" class="form-control" name="token" id="token" value="<?=$this->security->get_csrf_hash();?>">
                    <input type="text" class="form-control" name="name" id="name" value="<?=!empty($result)?$result->name:""?>">
                </div>
                <div class="form-group">
                    <label for="file"><?=l('slug-logo')?></label>
                    <div class="row">
                      <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail" style="background: #eee;">
                          <img src="<?=(!empty($result) && $result->logo != "")?BASE.$result->logo:BASE."assets/img/logo_analytics.png"?>" alt="" style="max-width: 200px;">
                        </a>
                      </div>
                    </div>
                    <input type="file" class="form-control" name="file" id="file">
                </div>
                <div class="form-group">
                    <label><?=l('slug-theme')?></label>
                    <select class="form-control" name="theme">
                        <option value="blue" <?=(!empty($result) && $result->theme == "blue")?"selected":""?> >Blue - Dark</option>
                        <option value="blue-light" <?=(!empty($result) && $result->theme == "blue-light")?"selected":""?> >Blue - Light</option>
                        <option value="green" <?=(!empty($result) && $result->theme == "green")?"selected":""?> >Green - Dark</option>
                        <option value="green-light" <?=(!empty($result) && $result->theme == "green-light")?"selected":""?> >Green - Light</option>
                        <option value="red" <?=(!empty($result) && $result->theme == "red")?"selected":""?> >Red - Dark</option>
                        <option value="red-light" <?=(!empty($result) && $result->theme == "red-light")?"selected":""?> >Red - Light</option>
                        <option value="yellow" <?=(!empty($result) && $result->theme == "yellow")?"selected":""?> >Yellow - Dark</option>
                        <option value="yellow-light" <?=(!empty($result) && $result->theme == "yellow-light")?"selected":""?> >Yellow - Light</option>
                        <option value="purple" <?=(!empty($result) && $result->theme == "purple")?"selected":""?> >Purple - Dark</option>
                        <option value="purple-light" <?=(!empty($result) && $result->theme == "purple-light")?"selected":""?> >Purple - Light</option>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-md-1" style="padding-right: 10px;"><?=l('slug-layout')?></label>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                        <input type="radio" class="icheck" name="layout" value="layout-boxed" <?=(!empty($result) && $result->layout == "layout-boxed")?"checked":""?>> <span style="margin-right: 10px;"><?=l('slug-boxed-layout')?></span>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                        <input type="radio" class="icheck" name="layout" value="fixed" <?=(!empty($result) && $result->layout == "fixed")?"checked":""?>> <?=l('slug-fixed-layout')?>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                        <input type="radio" class="icheck" name="layout" value="none" <?=(!empty($result) && $result->layout == "none")?"checked":""?>> <span style="margin-right: 10px;"><?=l('slug-default-layout')?></span>
                    </div>
                </div>
                <div class="form-group row ">
                    <label class="col-md-1" style="padding-right: 10px;"><?=l('slug-sidebar')?></label>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                        <input type="radio" class="icheck" name="sidebar" value="1" <?=(!empty($result) && $result->sidebar == 1)?"checked":""?>> <span style="margin-right: 10px;"><?=l('slug-open')?></span>
                    </div>
                    <div class="col-md-2" style="margin-bottom: 5px;">
                        <input type="radio" class="icheck" name="sidebar" value="0" <?=(!empty($result) && $result->sidebar == 0)?"checked":""?>> <?=l('slug-collapse')?>
                    </div>
                </div>
            </div>
            <div class="box-header with-border" style="border-top: 15px solid #ecf0f5;">
                <h3 class="box-title"><i class="fa fa-user text-blue"></i> <?=l('slug-admin-options')?></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label style="padding-right: 10px;"><?=l("slug-register")?></label>
                    <input type="radio" class="icheck" name="register" value="1" <?=(!empty($result) && $result->register == 1)?"checked":""?>> <span style="margin-right: 10px;"><?=l('slug-yes')?></span>
                    <input type="radio" class="icheck" name="register" value="0" <?=(!empty($result) && $result->register == 0)?"checked":""?>> <?=l('slug-no')?>
                </div>
                <div class="form-group">
                    <label style="padding-right: 10px;"><?=l("slug-automatically-active-user")?></label>
                    <input type="radio" class="icheck" name="active_register" value="1" <?=(!empty($result) && $result->active_register == 1)?"checked":""?>> <span style="margin-right: 10px;"><?=l('slug-yes')?></span>
                    <input type="radio" class="icheck" name="active_register" value="0" <?=(!empty($result) && $result->active_register == 0)?"checked":""?>> <?=l('slug-no')?>
                </div>
                <div class="form-group">
                    <label><?=l('slug-time-zone')?></label>
                    <select class="form-control" name="default_timezone">
                    <?php
                    $list_time_zone = list_time_zone();
                    if(!empty($list_time_zone)){
                    foreach($list_time_zone as $region => $list)
                    {
                    ?>
                        <optgroup label="<?=$region?>">
                        <?php foreach($list as $timezone => $name){?>
                            <option value="<?=$timezone?>" <?=(!empty($result) && $result->default_timezone == $timezone)?"selected":""?>><?=$name?></option>
                        <?php }?>
                        </optgroup>
                    <?php }}?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?=l('slug-default-language')?></label>
                    <select class="form-control" name="default_language">
                        <?php if(!empty($lang))
                        foreach ($lang as $row) {
                        ?>
                        <option value="<?=$row?>" <?=(!empty($result) && $result->default_language == $row)?"selected":""?>><?=strtoupper($row)?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?=l('slug-add-new-language')?></label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="language" id="language">
                        <a href="<?=BASE?>language/en.xml" target="_blank" class="input-group-addon"><i class="fa fa-info-circle"></i> <?=l('slug-view-demo')?></a>
                      </div>
                </div>
            </div>
            <div class="box-header with-border" style="border-top: 15px solid #ecf0f5;">
                <h3 class="box-title"><i class="fa fa-pencil-square-o text-red"></i> <?=l('slug-posting-options')?></h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label><?=l('slug-facebook-users-limits')?></label>
                    <select class="form-control" name="users_limit">
                        <?php for($i = 1; $i <= 100; $i++){?>
                        <option value="<?=$i?>" <?=(!empty($result) && $result->users_limit == $i)?"selected":""?> ><?=$i?> <?=l('slug-users')?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?=l('slug-default-delay')?></label>
                    <select class="form-control" name="default_deplay">
                        <?php foreach (deplay_time() as $i) {?>
                        <option value="<?=$i?>" <?=(!empty($result) && $result->default_deplay == $i)?"selected":""?> ><?=$i?> <?=l('slug-seconds')?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?=l('slug-minimum-delay')?></label>
                    <select class="form-control" name="minimum_deplay">
                        <?php foreach (deplay_time() as $i) {?>
                        <option value="<?=$i?>" <?=(!empty($result) && $result->minimum_deplay == $i)?"selected":""?> ><?=$i?> <?=l('slug-seconds')?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?=l('slug-update')?></button>
            </div>
        </form>
    </div>
</section>