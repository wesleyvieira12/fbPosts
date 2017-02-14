<link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=BASE?>assets/admin/css/AdminLTE.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="<?=BASE?>assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
            var PATH       = '<?=PATH?>';
            var token      = '<?=$this->security->get_csrf_hash();?>';
        </script>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-facebook-official"></i>
                    <h3 class="box-title">
                        Get Groups
                    </h3>
                </div><!-- /.box-header -->
                <div class="box-body text-center">
                    <div class="row">
                        <div class="col-md-12 item" data-api="145634995501895">
                            <h4 style="text-transform: uppercase;"><?=l('slug-step-1')?></h4>
                            <a href="javascript:void(0);" class="btn btn-app btn-facebook bg-blue">
                                <i class="fa fa-facebook"></i> <?=l('slug-desc-step-1')?>
                            </a>
                            <h4 style="margin-top: 20px; text-transform: uppercase;"><?=l('slug-step-2')?></h4>
                            <a href="javascript:void(0);" class="btn btn-app btn-success bg-green btn-step-2">
                                <i class="fa fa-facebook"></i> <?=l('slug-desc-step-2')?>
                            </a>
                        </div>
                    </div>


                    <h4 style="margin-top: 20px; text-transform: uppercase;"><?=l('slug-step-3')?></h4>
                    <div class="form-group" style="text-align: left;">
                        <textarea class="form-control access_token" rows="6" placeholder="<?=l('slug-desc-step-3')?>"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info pull-right get-long-live-token"><?=l('slug-submit')?></button>
                </div>
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
            _url  = 'https://www.facebook.com/v2.0/dialog/oauth?redirect_uri=https%3A%2F%2Fwww.facebook.com%2Fconnect%2Flogin_success.html&scope=public_profile%2Cpublish_actions%2Cuser_posts%2Cuser_managed_groups%2Cuser_events%2Cpublish_actions%2Cpublish_pages%2Cmanage_pages%2Cuser_friends%2Cuser_groups&response_type=token&sso_key=com&client_id='+_api+'&_rdr';

            popwin = window.open(_url, "main_browser", "height=500,width=600");
        });

        $(".btn-step-2").click(function(){
            _that = $(this);
            _api = _that.parents(".item").data("api");

            _text = 'data:text/html,<html><meta http-equiv="refresh" content="0; url=\'view-source:https://www.facebook.com/v2.0/dialog/oauth?redirect_uri=https%3A%2F%2Fwww.facebook.com%2Fconnect%2Flogin_success.html&scope=public_profile%2Cpublish_actions%2Cuser_posts%2Cuser_managed_groups%2Cuser_events%2Cpublish_actions%2Cpublish_pages%2Cmanage_pages%2Cuser_friends%2Cuser_groups&response_type=token&sso_key=com&client_id='+_api+'&_rdr\'"></html>';

            popwin = window.open(_text, "main_browser", "height=500,width=600");
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
                    $.post(PATH+'Facebook/getGroups', { token: token, access_token: value }, function(data){
                      	window.opener.popupCallback("pop some data"); window.close();
                        _that.removeClass('disable');
                    }, 'json');
                }
            }
        });
    });
</script>