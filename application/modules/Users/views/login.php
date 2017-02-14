<div class="header">
    <div class="container text-center">
        <div class="wrap-logo">
            <a href="<?=PATH?>" class="logo">
                <img src="<?=BASE.LOGO?>" style="max-height: 50px; position: relative; top: -1px;">
            </a>
        </div>

        
    </div>
</div>
<div class="banner">
    <div class="box-shadow"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="wrap-form">
                <ul class="nav nav-tabs">
                    <li class="active" style="<?=(!REGISTER)?"width: 100%; border-bottom: 1px solid #eee;":""?>"><a data-toggle="tab" href="#loginFrom"><?=l('slug-login')?></a></li>
                    <?php if(REGISTER){?>
                    <li><a data-toggle="tab" href="#registerForm"><?=l('slug-register')?></a></li>
                    <?php }?>
                </ul>

                <div class="tab-content">
                    <div id="loginFrom" class="tab-pane fade in active">
                        <div class="col-md-12">
                            <form class="form-horizontal formLogin" role="form">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" name="username" placeholder="<?=l('slug-username')?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                        <input type="password" class="form-control" name="password" placeholder="<?=l('slug-password')?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="msg error"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">                
                                            <div class="checkbox">
                                                <input type="checkbox" class="icheck"> <?=l('slug-remember-me')?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group pull-right">                
                                            <button type="submit" class="btn btn-success"><i class="fa fa-unlock-alt"></i> <?=l('slug-login')?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if(REGISTER){?>
                    <div id="registerForm" class="tab-pane fade">
                        <div class="col-md-12">
                            <form class="form-horizontal formRegister" role="form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="<?=l('slug-username')?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="<?=l('slug-password')?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="repassword" placeholder="<?=l('slug-re-password')?>">
                                </div>
                                
                                <div class="row">
                                    <div class="msg-register error"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group pull-right">                
                                            <button type="submit" class="btn btn-primary"><?=l('slug-register')?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
						
                    </div>
                    <?php }?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
		
		<center><a href="http://campanhasfb.com.br/premium/assets/admin/plugins/madaiscontato/recuperar_senha/" class="open-image fancybox.iframe"><button type="submit" class="btn btn-default"><i class="fa fa-unlock"></i> Recuperar senha</button></a>  <a href="http://campanhasfb.com.br/premium/assets/admin/plugins/madaiscontato/problema_login" class="open-image fancybox.iframe"><button type="submit" class="btn btn-danger"><i class="fa fa-user-times"></i> Problema ao logar</button></a><br><br><span style="color:#f4f4f4">© 2016 Todos os Direitos Reservados Campanhas<br> FB Premium.</span></center>
    </div>
</div>