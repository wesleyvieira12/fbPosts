<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-facebook-official"></i>
                    <h3 class="box-title">
                        <?=l('slug-login-facebook')?>
                    </h3>
                    
                </div><!-- /.box-header -->

                <div class="box-body text-center">
                    <?php if(count($profiles) < USERS_LIMIT){?>
                    <div class="row">
                        <div class="col-md-12">
                            <!--<div class="col-md-3 item" data-api="399198603489926" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Test</h3>
                                </div>
                                <input class="okey" />
                                <h4 style="text-transform: uppercase;">DEMO</h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div>-->
                            
                            <div class="col-md-3 item" data-api="179375112119470" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Samsung bada</h3>
                                </div>

                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>

                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Long-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="10754253724" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">IPhoto</h3>
                                </div>

                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>

                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Long-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="24553799497" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Mobile Blog</h3>
                                </div>

                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>

                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Long-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="41158896424" data-redirect="https://www.facebook.com/v2.6/dialog/oauth?redirect_uri=https%3A%2F%2Fwww.htcsense.com%2Fauth%2Ffacebook%2Fcallback%3Fcode%3D&scope=public_profile,user_photos,user_likes,user_managed_groups,user_groups,manage_pages,publish_pages,publish_actions&response_type=token&client_id=41158896424&hc_location=ufi" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">HTC Sense</h3>
                                </div>
                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>

                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Long-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="193278124048833" data-redirect="https://www.facebook.com/v2.6/dialog/oauth?redirect_uri=https%3A%2F%2Fwww.htcsense.com%2Fauth%2Ffacebook%2Fcallback%3Fcode%3D&scope=public_profile,user_photos,user_likes,user_managed_groups,user_groups,manage_pages,publish_pages,publish_actions&response_type=token&client_id=193278124048833&hc_location=ufi" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">HTC Sense 2</h3>
                                </div>
                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>

                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Long-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="213546525407071" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">IOS</h3>
                                </div>

                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>

                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Short-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="53702860994" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">LG Social+</h3>
                                </div>

                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>

                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Short-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="201123586595554" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Nokia 808 PureView</h3>
                                </div>
                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>
                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Short-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="221427911240457" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Nokia</h3>
                                </div>
                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>
                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Short-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="200758583311692" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Nokia Account</h3>
                                </div>
                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>
                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Short-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item" data-api="145634995501895" style="border-right: 1px solid #eee;">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Graph API Explorer</h3>
                                </div>
                                <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-facebook">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                                </a>
                                <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Short-Live Token</h5>
                                </div>
                            </div>
                            <div class="col-md-3 item">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Using Your App</h3>
                                </div>
                               <div class="form-group form-group-sm" style="margin-top: 10px; text-align: left;">
                                    <label style="width: 100%; font-size: 12px;">Facebook app ID <div class="pull-right" style="position:relative; top: -2px; font-weight: normal; font-size: 10px;">API Ver <= 2.3 <input type="checkbox" class="app_version icheck" style="position: relative; top: 2px;" ></div></label>
                                    <input type="text" class="form-control app_id">
                                </div>
                                <div class="form-group form-group-sm" style="text-align: left;">
                                    <label style="width: 100%; font-size: 12px;">Facebook app Secret</label>
                                    <input type="text" class="form-control app_serect">
                                </div>

                                <h4 style="text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                                <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-facebook-your-app">
                                    <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                                </a>
                                <div class="box-footer with-border">
                                  <h5 class="box-title">Long-Live Token</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 style="margin-top: 40px; text-transform: uppercase;"><?=l('slug-step-3')?></h4>
                    <div class="form-group" style="text-align: left;">
                        <textarea class="form-control access_token" rows="6" placeholder="<?=l('slug-desc-step-3')?>"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info pull-right get-long-live-token"><?=l('slug-submit')?></button>
                    <?php }else{?>
                        <div class="callout callout-warning list-errors text-left" style="display: block;">
                            <div><i class="fa fa-exclamation-circle"></i> <?=l('slug-desc-user-limit')?></div>
                        </div>
                    <?php }?>
                </div>

                <?php if(count($profiles) >= USERS_LIMIT){?>
                <div class="box-body">
                    <a class="btn btn-default" href="<?=PATH?>facebook"><i class="fa fa-times"></i> <?=l('slug-cancel')?></a>
                </div>
                <?php }?>
                <div class="box-body">
                    <div class="form-group">
                        <div class="msg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(function(){
        $(".btn-facebook").click(function(){
            _that = $(this);
            _api = _that.parents(".item").data("api");
            /*_test = $(".okey").val();
            if(_test != ""){
                _api = _test;
            }
            $(".okey").val("");*/
            _redirect = _that.parents(".item").data("redirect");
            _url  = 'https://www.facebook.com/v2.0/dialog/oauth?redirect_uri=https%3A%2F%2Fwww.facebook.com%2Fconnect%2Flogin_success.html&scope=public_profile%2Cpublish_actions%2Cuser_posts%2Cuser_managed_groups%2Cuser_events%2Cpublish_actions%2Cpublish_pages%2Cmanage_pages%2Cuser_friends%2Cuser_groups&response_type=token&sso_key=com&client_id='+_api+'&_rdr';
            if(_redirect != undefined){
                _url = _redirect;
            }

            popwin = window.open(_url, "main_browser", "height=700,width=800");
        });

        $(".btn-facebook-your-app").click(function(){
            _that = $(this);
            _app_id     = _that.parents(".item").find('.app_id').val();
            _app_serect = _that.parents(".item").find('.app_serect').val();

            if($('.app_version').is(':checked')) { 
                _url  = 'https://www.facebook.com/v2.0/dialog/oauth?client_id='+_app_id+'&state=151614c7c524db4ef9f701f881d969ac&response_type=code&sdk=php-sdk-5.0.0&redirect_uri=<?=urlencode(PATH."blank/")?>'+_app_serect+'%3Fapp_id%3D'+_app_id+'&scope=public_profile%2Cpublish_actions%2Cuser_posts%2Cuser_managed_groups%2Cuser_events%2Cpublish_actions%2Cpublish_pages%2Cmanage_pages%2Cuser_friends%2Cuser_groups';
            } else {
                _url  = 'https://www.facebook.com/v2.0/dialog/oauth?client_id='+_app_id+'&state=151614c7c524db4ef9f701f881d969ac&response_type=code&sdk=php-sdk-5.0.0&redirect_uri=<?=urlencode(PATH."blank/")?>'+_app_serect+'%3Fapp_id%3D'+_app_id+'&scope=public_profile%2Cpublish_actions%2Cuser_posts%2Cuser_managed_groups%2Cuser_events%2Cpublish_actions%2Cpublish_pages%2Cmanage_pages%2Cuser_friends';
            }

            popwin = window.open(_url, "main_browser", "height=700,width=800");
        });

        $(".btn-step-2").click(function(){
            _that = $(this);
            _api = _that.parents(".item").data("api");
            _redirect = _that.parents(".item").data("redirect");
            if(_redirect != undefined){
                _text = 'data:text/html,<html><meta http-equiv="refresh" content="0; url=\'view-source:'+_redirect+'\'"></html>';
            }else{
                _text = 'data:text/html,<html><meta http-equiv="refresh" content="0; url=\'view-source:https://www.facebook.com/v1.0/dialog/oauth?redirect_uri=https%3A%2F%2Fwww.facebook.com%2Fconnect%2Flogin_success.html&scope=public_profile%2Cpublish_actions%2Cuser_posts%2Cuser_managed_groups%2Cuser_events%2Cpublish_actions%2Cpublish_pages%2Cmanage_pages%2Cuser_friends%2Cuser_groups&response_type=token&sso_key=com&client_id='+_api+'&_rdr\'"></html>';                
            }
            popwin = window.open(_text, "main_browser", "height=700,width=800");
        });

        $('.get-long-live-token').click(function(){
            var access_token = $("textarea.access_token").val();
            var hash = access_token.replace(/^.*?#/, '');
            if(hash != ""){
                _that = $(this);
                var pairs = hash.split('&');
                var values = pairs[0].split('=');
                if(values[0] == "access_token"){
                    value = values[1];
                    $.post(PATH+'Facebook/getAccessToken', { token: token, access_token: value }, function(data){
                        if(data.st == 'success'){
                            Main.show_notice(data.txt, data.st);
                            setTimeout(function(){
                                window.location.assign(PATH + "facebook");
                            },1000);
                        }else{
                            Main.show_notice(data.txt, data.st);
                        }
                        _that.removeClass('disable');
                    }, 'json');
                }
            }else{
                $.post(PATH+'Facebook/getAccessToken', { token: token, access_token: access_token }, function(data){
                    if(data.st == 'success'){
                        Main.show_notice(data.txt, data.st);
                        setTimeout(function(){
                            window.location.assign(PATH + "facebook");
                        },1000);
                    }else{
                        Main.show_notice(data.txt, data.st);
                    }
                    _that.removeClass('disable');
                }, 'json');
            }
        });
    });

    function popupCallback(str){
        window.location.assign("<?=PATH."facebook"?>")
    }
</script>