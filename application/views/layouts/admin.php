<?php date_default_timezone_set('America/Sao_Paulo'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=$template['title']?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet"> 
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/jQueryUI/ui-themes/smoothness/jquery-ui-1.10.1.custom.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/css/AdminLTE.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/simplepicker/jquery.simple-dtpicker.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/elFinder/css/elfinder.min.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/elFinder/css/theme.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/elFinder/css/dialog.css">
        <link rel="stylesheet" href="<?=BASE?>assets/plugins/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" href="<?=BASE?>assets/admin/plugins/duallistbox/bootstrap-duallistbox.min.css" />
        <link rel="stylesheet" href="<?=BASE?>assets/admin/css/style.css">
        <link rel="shortcut icon" href="<?=BASE?>assets/img/favicon.ico" type="image/x-icon"/>
        <script src="<?=BASE?>assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script type="text/javascript">
            var PATH       = '<?=PATH?>';
            var BASE       = '<?=BASE?>';
            var token      = '<?=$this->security->get_csrf_hash();?>';
            var module     = '<?=ucfirst($this->router->fetch_class());?>';
            var list_chart = [];
            var slug_system_processing = '<?=l('slug-system-processing')?>';
            var slug_confirm_delete    = '<?=l('slug-confirm-delete')?>';
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-<?=THEME?> sidebar-mini <?=SIDEBAR?> <?=LAYOUT?>">
        <div class="wrapper">
            
            <?=modules::run("Block/header")?>
            <?=modules::run("Block/sidebar")?>

            <div class="content-wrapper">
                <?=$template['body']?>
            </div>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <?=l('slug-version')?> 1.0.0
                </div>
                <div class="clearfix"></div>
            </footer>
        </div><!-- ./wrapper -->

        <script src="<?=BASE?>assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/jQueryUI/jquery-ui.min.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?=BASE?>assets/admin/js/highcharts.js"></script>
        <script src="<?=BASE?>assets/admin/js/moment.min.js"></script>
        <script src="<?=BASE?>assets/plugins/fancybox/jquery.fancybox.pack.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/iCheck/icheck.min.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/elFinder/js/elfinder.full.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/elFinder/js/jquery.dialogelfinder.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/simplepicker/jquery.simple-dtpicker.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="<?=BASE?>assets/admin/plugins/duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <script src="<?=BASE?>assets/admin/js/tooltip.js"></script>
        <script src="<?=BASE?>assets/admin/js/popover.js"></script>
        <script src="<?=BASE?>assets/admin/js/app.js"></script>
        <script src="<?=BASE?>assets/admin/js/main.js"></script>
        <script type="text/javascript">
            //.add(30, 'minutes')
        var time_current =<?php 
        if(empty($ultimo_post)){
           echo "'".date('Y-m-d H:i')."'";
        }else{
            foreach ($ultimo_post as $value) {
                $time_post = date('Y-m-d H:i', strtotime($value->time_post));
                $time_now  = date('Y-m-d H:i', strtotime(NOW));
                if($time_post<$time_now){
                   echo "'".$time_now."'";
                }else{
                   echo "'".$time_post."'";
                }
                break;
            }
        }
?>;
        var time_max =
        <?php 
        if(empty($ultimo_post)){
            echo  "'".date('Y-m-d H:i', strtotime("+60 days",strtotime(date('Y-m-d H:i'))))."'";
        }else{
            foreach ($ultimo_post as $value) {
                $time_post = date('Y-m-d H:i', strtotime($value->time_post));
                $time_now  = date('Y-m-d H:i', strtotime(NOW));
                if($time_post<$time_now){
                    echo  "'".date('Y-m-d H:i', strtotime("+60 days",strtotime($time_now)))."'";
                }else{
                    echo  "'".date('Y-m-d H:i', strtotime("+60 days",strtotime($time_post)))."'";
                }
                
                break;
    }
}
?>;
        $('.date_range').appendDtpicker({
            "current": time_current,
            "minDate":  time_current,
            "maxDate": time_max,
            "autodateOnStart": true
        });
        </script>
    </body>
</html>
