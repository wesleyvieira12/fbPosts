<section class="content-header">
    <h1 class="head-title">
        <?=l('slug-user-manage')?>
    </h1>
</section>

<section class="content">
    <div class="box box-solid">
        <form class="formUpdate" role="form" data-redirect="users">
            <div class="box-body">
                <div class="form-group">
                    <label><?=l('slug-role')?></label>
                    <select class="form-control" name="admin" >
                        <option value="0" <?=(!empty($result) && $result->admin == 0)?"selected":""?>><?=l('slug-user')?></option>
                        <option value="1" <?=(!empty($result) && $result->admin == 1)?"selected":""?>><?=l('slug-admin')?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label><?=l('slug-username')?></label>
                    <input type="hidden" class="form-control" name="id" value="<?=!empty($result)?$result->id:""?>">
                    <input type="text" class="form-control" name="username" id="username" value="<?=!empty($result)?$result->username:""?>">
                </div>
                <div class="form-group">
                    <label><?=l('slug-password')?></label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label><?=l('slug-re-password')?></label>
                    <input type="password" class="form-control" name="repassword">
                </div>
                <div class="form-group">
                    <div class="btn-group btn-group-xs pull-right">
                        <a href="http://findmyfbid.com/" target="_blank" class="btn btn-default"><i class="fa fa-info"></i> <?=l('slug-get-facebook-user-id')?></a>
                    </div>
                </div>
                <div class="form-group">
                    <label><a href="http://findmyfbid.com/" target="_blank"><?=l('slug-facebook-user-id')?></a></label>
                    <input type="text" class="form-control" name="fid" value="<?=!empty($result)?$result->fid:""?>">
                </div>
                <!-- <div class="form-group">
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
                </div> -->
                <div class="form-group">
                    <label style="padding-right: 10px;"><?=l('slug-uncheck-closed-groups')?></label>
                    <input type="radio" class="icheck" name="uncheck_groups" value="1" <?=(!empty($result) && $result->uncheck_groups == 1)?"checked":""?>> <span style="margin-right: 10px;"><?=l('slug-yes')?></span>
                    <input type="radio" class="icheck" name="uncheck_groups" value="0" <?=(!empty($result) && $result->uncheck_groups == 0)?"checked":""?>> <?=l('slug-no')?>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="status" value="1" <?php if(empty($result) || (!empty($result) && $result->status == 1)){ echo "checked"; }?> > <?=l('slug-show-hide')?>
                    </label>
                </div>
                <div class="form-group">
                    <div class="msg"></div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-info"><?=l('slug-submit')?></button>
            </div>
        </form>
    </div>
</section>