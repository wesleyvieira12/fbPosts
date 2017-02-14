<section class="content-header">
    <h1 class="head-title">
        <?=l('slug-save-post')?>
    </h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="btn-group btn-group-sm pull-right">
				<button type="button" title="<?=l('slug-delete')?>" class="btnDeleteAll btn btn-danger"><i class="fa fa-trash-o"></i> <?=l('slug-delete')?></button>
            </div>
		</div>
		<br/>
		<br/>
	</div>
    <div class="row">
    	<div class="col-md-12">
    		<form class="formList">
			    <div class="box box-solid">
			        <div class="box-header with-border">
			            <h3 class="box-title"><i class="fa fa-bars text-blue"></i> <?=l('slug-list-post')?></h3>
			        </div>
			        <div class="box-body">
			        	<div class="table-responsive">
				            <table class="table table-bordered">
				                <tbody><tr>
				                    <th style="width: 10px">
			                        	<input type="checkbox" class="icheck CheckAll">
		                    		</th>
				                    <th style="width: 10px"><?=l('slug-order')?></th>
				                    <th><?=l('slug-name')?></th>
				                    <th class="text-center" style="width: 150px"><?=l('slug-option')?></th>
				                </tr>
				                <?php 
				                if(!empty($result)){
				                foreach ($result as $key => $row) {
				                ?>
				                <tr data-id="<?=$row->id?>">
				                	<td>
			                        	<input type="checkbox" name="id[]" class="icheck checkItem" value="<?=$row->id?>">
				                	</td>
				                    <td><?=((int)get('p')*10) + ($key+1)?></td>
				                    <td><?=$row->name?></td>
				                    <td class="text-center">
				                    	<div class="btn-group btn-group-sm">
			                          		<a href="javascript:void(0);" class="btn btn-default btnDelete"><i class="fa fa-trash-o"></i></a>
				                        </div>
				                    </td>
				                </tr>
				                <?php }}else{?>
				                <tr>
				                	<td class="text-center" colspan="7">
				                		<?=l('slug-empty')?>
				                	</td>
				                </tr>
				                <?php }?>
				            </tbody></table>
			            </div>
			        </div><!-- /.box-body -->
			        <div class="box-footer clearfix">
			        	<?=$this->pagination->create_links();?>
			        </div>
			    </div>
		    </form>
		</div>
    </div>
</section>