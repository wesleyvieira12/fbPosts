<section class="content-header">
    <h1 class="head-title">
        <?=l('slug-manage-groups')?>
    </h1>
</section>

<section class="content">
    <div class="box box-solid">
        <form class="formManageGroups" role="form" data-redirect="manage-groups">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callout callout-danger list-errors">
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if(get("id")){?>
                            <input type="text" class="form-control" name="id" value="<?=get("id")?>" />
                        <?php }?>
                        <div class="form-group">
                            <label class="head-title"><?=l('slug-name')?></label>
                            <input type="text" class="form-control" name="name" value="<?=(!empty($item))?$item->name:""?>" />
                        </div>
                        <div class="form-group">
                            <label class="control-label no-padding-top" for="duallist"><?=l('slug-list-groups')?></label>

                            <select multiple="multiple" size="10" name="list_groups[]" id="duallist">
                                <?php if(!empty($result)){
                                    foreach ($result as $row) {
                                ?>
                                <option value="<?=$row->id?>" <?=(!empty($groups) && in_array($row->id, $groups))?"selected":""?> ><?=$row->group_name?></option>
                                <?php }}?>
                            </select>

                            <div class="hr hr-16 hr-dotted"></div>
                        </div>
                    </div>
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

<script type="text/javascript">
    jQuery(function($){
        var demo1 = $('select[name="list_groups[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
        var container1 = demo1.bootstrapDualListbox('getContainer');
        container1.find('.btn').addClass('btn-white btn-info btn-bold');
    
        $(document).one('ajaxloadstart.page', function(e) {
            $('[class*=select2]').remove();
            $('select[name="list_groups[]"]').bootstrapDualListbox('destroy');
            $('.rating').raty('destroy');
            $('.multiselect').multiselect('destroy');
        });
    
    });
</script>