<section class="content-header">
    <h1 class="head-title">
        <?=l('slug-accounts-facebook')?>
    </h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-3">
			<a href="<?=PATH.segment(1)."/add"?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> <?=l('slug-add-new')?></a>
		</div>
		<div class="col-xs-9">
			<div class="btn-group btn-group-sm pull-right">
				<button type="button" class="btnStatusAll item-show btn btn-danger"><i class="fa fa-toggle-on"></i> <?=l('slug-show')?></button>
				<button type="button" class="btnStatusAll item-hide btn btn-danger"><i class="fa fa-toggle-off"></i> <?=l('slug-hide')?></button>
				<button type="button" class="btnDeleteAll btn btn-danger"><i class="fa fa-trash-o"></i> <?=l('slug-delete')?></button>
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
			            <h3 class="box-title"><i class="fa fa-bars text-blue"></i> <?=l('slug-list-account-facebook')?></h3>
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
				                    <th class="text-center"><?=l('slug-status')?></th>
				                    <th class="text-center" style="width: 90px"><?=l('slug-option')?></th>
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
				                    	<?php if($row->status != 0){?>
				                        	<span class="text-green" style="font-size: 25px;"><i class="fa fa-toggle-on"></i></span>
				                        <?php }else{?>
				                        	<span class="text-danger" style="font-size: 25px;"><i class="fa fa-toggle-off"></i></span>
				                        <?php }?>
				                    </td>
				                    <td class="text-center">
				                    	<div class="btn-group btn-group-sm">
			                          		<a href="https://www.facebook.com/<?=$row->fid?>" target="_blank" class="btn btn-default"><i class="fa fa-eye"></i></a>
			                          		<a href="javascript:void(0);" class="btn btn-default btnDelete"><i class="fa fa-trash-o"></i></a>
				                        </div>
				                    </td>
				                </tr>
				                <tr>
				                	<td colspan="7">
				                		<table class="table">
									        <tbody>
										        <tr >
										            <th>App name</th>
										            <th>Status</th>
										            <th style="width: 40px"></th>
										        </tr>
										        <?php
										        $items = $row->items;
										        if(!empty($items)){
										        	foreach ($items as $item) {
										        ?>
										        <tr data-id="<?=$item->id?>" class="item-app">
										            <td><?=$item->name?></td>
										            <td>
										            	<?php if($item->status == 1){?>
										            		<div class="text-green">Active</div>
										            	<?php }else{?>
										            		<div class="text-red">Expired</div>
										            	<?php }?>
										            </td>
										            <td>
										            	<div class="btn-group btn-group-sm">
							                          		<a href="javascript:void(0);" class="btn btn-default btnDeleteApp"><i class="fa fa-trash-o"></i></a>
								                        </div>
										            </td>
										        </tr>
										        <?php }}?>
										    </tbody>
										</table>
				                	</td>
				                </tr>
				                <?php }}else{?>
				                <tr>
				                	<td class="text-center" colspan="8">
				                		Empty
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