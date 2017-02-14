function Main(){
	var self= this;
	var show_timeout = 0;
	var SPINTAX_PATTERN = /\{[^"\r\n\}]*\}/;
	this.init= function(){
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();

		$(".open-image").fancybox({
          	helpers: {
              	title : {
                  	type : 'float'
              	}
          	}
      	});

      	$('.language').change(function(){
      		_that = $(this);
      		_lang = _that.val();
      		$.post(PATH+"Home/setLang", {token: token, lang: _lang}, function(data){
      			window.location.reload();
      		});
      	});

		$('.icheck').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });

        var checkAll = $('input.CheckAll');
	    var checkboxes = $('input.checkItem');

	    checkAll.on('ifChecked ifUnchecked', function(event) {        
	        if (event.type == 'ifChecked') {
	            checkboxes.iCheck('check');
	        } else {
	            checkboxes.iCheck('uncheck');
	        }
	    });

	    checkboxes.on('ifChanged', function(event){
	        if(checkboxes.filter(':checked').length == checkboxes.length) {
	            checkAll.prop('checked', 'checked');
	        } else {
	            checkAll.removeProp('checked');
	        }
	        checkAll.iCheck('update');
	    });

	    $('.CheckAll').change(function(){
			_that = $(this);
			if(_that.is(':checked')){
				$('.checkItem').prop('checked', true);
			}else{
				$('.checkItem').prop('checked', false);
			}
		});

		//
		var checkAllPage = $('input.CheckAllPage');
		var checkAllMultiPage = $('input.CheckAllMultiPage');
	    var checkboxesPage = $('input.checkItemPage');

	    checkAllPage.on('ifChecked ifUnchecked', function(event) {   
	        if (event.type == 'ifChecked') {
	            $(this).parents('.form-group').find('.checkItemPage').prop('checked', true);
	        } else {
	            $(this).parents('.form-group').find('.checkItemPage').prop('checked', false);
	        }
	    });

		checkAllMultiPage.on('ifChecked ifUnchecked', function(event) {   
	        _that = $(this);
			if(_that.is(':checked')){
				$('.checkItemPage').prop('checked', true);
			}else{
				$('.checkItemPage').prop('checked', false);
			}
	    });

	    checkAllPage.change(function(){
			_that = $(this);
			if(_that.is(':checked')){
				_that.parents('.form-group').find('.checkItemPage').prop('checked', true);
			}else{
				_that.parents('.form-group').find('.checkItemPage').prop('checked', false);
			}
		});

		$(document).on("click", ".selectGroups a", function(){
			_that = $(this);
			_ids = _that.data("ids");
			_ids_array = JSON.parse("[" + _ids + "]");
			$(".box-item-group .item-group").each(function(){
				_id = $(this).data("id");
				if(_ids != ""){
					if(jQuery.inArray(_id,_ids_array) == -1){
						$(this).hide();
						$(this).find(".checkbox-group").removeClass('checkItemPage');
					}else{
						$(this).show();
						$(this).find(".checkbox-group").addClass('checkItemPage');
					};
				}else{
					$(this).show();
					$(this).find(".checkbox-group").addClass('checkItemPage');
				}
				
			});
		});

		$(".input-search").keyup(function(){
			_q = $(this).val();
			$(".list_pages .label-checkItemPage").each(function(){
				_that = $(this);
				_text = _that.text();
				_text = self.convertUnicode(_text);
				_result = _text.search(_q);
				if(_result == -1){
					_that.parents(".box-item").hide();
				}else{
					_that.parents(".box-item").show();
				}
			});
		})

		$(document).on("change", ".getSavePost", function(){
			_that = $(this);
			_value = _that.val();
			if(!_that.hasClass('disable')){
				_that.addClass('disable');
				$.post(PATH + "Save/get_post", {token: token, value: _value}, function(data){
					_that.removeClass('disable');
					if(data != ""){
						if(data.type == "text"){
							_type = "post";
						}else{
							_type = data.type;
						}

						$("[name="+_type+"_message]").val(data.message);
						$("[name="+_type+"_title]").val(data.title);
						$("[name="+_type+"_description]").val(data.description);
						if(_type == "image"){
							$("[name="+_type+"_url]").val(data.image);
						}else{
							$("[name="+_type+"_url]").val(data.url);
						}
						$("[name="+_type+"_image]").val(data.image);
						$("[name="+_type+"_picture]").val(data.image);
						$("[name="+_type+"_caption]").val(data.caption);
						$("a[href='#post-"+data.type+"']").trigger("click");
					}
				},'json');
			}
		});

	    //
		$('.btnDeleteAll').click(function(){
			_that = $(this);
			_data = $('.formList').serialize();
			_data = _data + '&' + $.param({token:token});
			var popup = confirm(slug_confirm_delete);
			if (popup == true) {
				if(!_that.hasClass('disable')){
					_that.addClass('disable');
					self.show_notice(slug_system_processing, 'error');
					$.post(PATH + module + "/postDeleteAll", _data, function(data){
						window.location.reload();
						_that.removeClass('disable');
					},'json');
				}
			}

			return false;
		});

		$('.btnStatusAll').click(function(){
			_that   = $(this);
			_data   = $('.formList').serialize();
			_status = (_that.hasClass('item-show'))?1:0;
			_data   = _data + '&' + $.param({token:token,status:_status});

			if(!_that.hasClass('disable')){
				_that.addClass('disable');
				self.show_notice(slug_system_processing, 'error');
				$.post(PATH + module + "/postStatusAll", _data, function(data){
					window.location.reload();
					_that.removeClass('disable');
				},'json');
			}

			return false;
		});

		$('.btnRepostAll').click(function(){
			_that   = $(this);
			_data   = $('.formList').serialize();
			_status = 3;
			_data   = _data + '&' + $.param({token:token,status:_status});

			if(!_that.hasClass('disable')){
				_that.addClass('disable');
				self.show_notice(slug_system_processing, 'error');
				$.post(PATH + module + "/postStatusAll", _data, function(data){
					window.location.reload();
					_that.removeClass('disable');
				},'json');
			}

			return false;
		});
		
		$('.btnDelete').click(function(){
			_that = $(this);
			_id   = _that.parents('tr').data('id');
			_data = $.param({token:token, id:_id});
			var popup = confirm(slug_confirm_delete);
			if (popup == true) {
			   	$.post(PATH + module + "/postDelete", _data, function(data){
			   		if(data.st == 'success'){
						window.location.reload();
					}else{
						alert(data.txt);
					}
			   	},'json');
			}
		});

		$('.btnDeleteApp').click(function(){
			_that = $(this);
			_id   = _that.parents('tr').data('id');
			_data = $.param({token:token, id:_id});
			var popup = confirm(slug_confirm_delete);
			if (popup == true) {
			   	$.post(PATH + module + "/postDeleteApp", _data, function(data){
			   		if(data.st == 'success'){
						_that.parents('tr.item-app').remove();
					}else{
						alert(data.txt);
					}
			   	},'json');
			}
		});

		$('.btnDeleteAllPost').click(function(){
			_that = $(this);
			_data = $.param({token:token});
			var popup = confirm(slug_confirm_delete);
			if (popup == true) {
			   	$.post(PATH + module + "/postDeleteAllPost", _data, function(data){
			   		window.location.reload();
			   	},'json');
			}
		});

		$('.formProfile').submit(function(){
			_that = $(this);
			_data = _that.serialize();
			_redirect = _that.data("redirect");
			_data = _data + '&' + $.param({token:token});

			if(!_that.hasClass('disable')){
				_that.addClass('disable');
				self.show_notice(slug_system_processing, 'error');
				$.post(PATH + module + "/postProfile", _data, function(data){
					if(data.st == 'success'){
						self.show_notice(data.txt, data.st);
						setTimeout(function(){
							window.location.assign(PATH + _redirect);
						},1000);
					}else{
						self.show_notice(data.txt, data.st);
					}
					_that.removeClass('disable');
				},'json');
			}

			return false;
		});

		$('.formUpdate').submit(function(){
			_that = $(this);
			_data = _that.serialize();
			_redirect = _that.data("redirect");
			_data = _data + '&' + $.param({token:token});

			if(!_that.hasClass('disable')){
				_that.addClass('disable');
				self.show_notice(slug_system_processing, 'error');
				$.post(PATH + module + "/postUpdate", _data, function(data){
					if(data.st == 'success'){
						self.show_notice(data.txt, data.st);
						setTimeout(function(){
							window.location.assign(PATH + _redirect);
						},1000);
					}else{
						self.show_notice(data.txt, data.st);
					}
					_that.removeClass('disable');
				},'json');
			}

			return false;
		});

		$('.show-analytics').hover(function(){
			_that = $(this);
			_id   = _that.parents('tr').data('id');
			_text = _that.data('original-title');
			clearTimeout(show_timeout);
			show_timeout = setTimeout(function(){
				_that.parents(".btn-group").find(".tooltip-inner").html("<span class='sploading'></span>");
				$.post(PATH + module + "/getInfo", { token : token, id: _id }, function(data){
					_that.parents(".btn-group").find(".tooltip-inner").html(data);
					_that.attr("data-original-title", data);
					_that.attr("title", data);
					_that.removeClass("none")
					$('.show-analytics').removeClass("disable");
				});
			},200);
		});

		$('.stacked-post a').click(function(){
			_that = $(this);
			_that.find('input').prop('checked', true);
			_tab = _that.find('input').val();
			switch(_tab){
				case 'text':
					$(".preview-box-1").show();
					$(".preview-box-5").hide();
					$message = $("[name='post_message']").val();
					if($message != ""){
						$(".preview-box-1").html(self.cutText(self.downline(self.spintax($message)),250));
					}else{
						$(".preview-box-1").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
					}
					break;
				case 'link':
					$(".preview-box-1,.preview-box-3,.preview-box-4,.preview-box-5").show();
					$(".preview-box-2").hide();
					$message = $("[name='link_message']").val();
					$title   = $("[name='link_title']").val();
					$desc    = $("[name='link_description']").val();
					$caption = $("[name='link_caption']").val();
					$image   = $("[name='link_picture']").val();
					if($message != ""){
						$(".preview-box-1").html(self.cutText(self.downline(self.spintax($message)),250));
					}else{
						$(".preview-box-1").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
					}

					if($title != ""){
						$(".preview-box-title").html(self.spintax($title));
					}else{
						$(".preview-box-title").html('<div class="line-no-text"></div>');
					}

					if($desc != ""){
						$(".preview-box-desc").html(self.cutText(self.spintax($desc),250));
					}else{
						$(".preview-box-desc").html('<div class="line-no-text"></div><div class="line-no-text w50"></div>');
					}

					if($caption != ""){
						$(".preview-box-caption").html(self.spintax($caption));
					}else{
						$(".preview-box-caption").html('<div class="line-no-text w25"></div>');
					}

					if($image != ""){
						$(".preview-box-image").removeClass('bg-blue');
						$(".preview-box-image").css('background-image', 'url(' + self.spintax($image) + ')')
					}else{
						$(".preview-box-image").removeAttr("style").addClass('bg-blue');
					}
					break;
				case 'image':
					$(".preview-box-1,.preview-box-3,.preview-box-5").show();
					$(".preview-box-2,.preview-box-4").hide();
					$(".preview-box-image").removeAttr("style").addClass('bg-blue');
					$message = $("[name='image_description']").val();
					$image   = $("[name='image_url']").val();
					if($message != ""){
						$(".preview-box-1").html(self.cutText(self.downline(self.spintax($message)),250));
					}else{
						$(".preview-box-1").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
					}

					if($image != ""){
						$(".preview-box-image").removeClass('bg-blue');
						$(".preview-box-image").css('background-image', 'url(' + self.spintax($image) + ')')
					}else{
						$(".preview-box-image").removeAttr("style").addClass('bg-blue');
					}
					break;
				case 'video':
					$(".preview-box-1,.preview-box-2,.preview-box-3,.preview-box-5").show();
					$(".preview-box-4").hide();
					$(".preview-box-image").removeAttr("style").addClass('bg-blue');
					$message = $("[name='video_description']").val();
					if($message != ""){
						$(".preview-box-1").html(self.cutText(self.downline(self.spintax($message)),250));
					}else{
						$(".preview-box-1").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
					}

					break;
			}
		});

		$("[name='post_message'],[name='link_message'],[name='image_description'],[name='video_description']").keyup(function(){
			_that = $(this);
			$message = _that.val();
			if($message != ""){
				$(".preview-box-1").html(self.cutText(self.downline(self.spintax($message)),250));
			}else{
				$(".preview-box-1").html('<div class="line-no-text"></div><div class="line-no-text"></div><div class="line-no-text w50"></div>');
			}
		});

		$("[name='link_title']").keyup(function(){
			_that = $(this);
			$title = _that.val();
			if($title != ""){
				$(".preview-box-title").html(self.spintax($title));
			}else{
				$(".preview-box-title").html('<div class="line-no-text"></div>');
			}
		});

		$("[name='link_description']").keyup(function(){
			_that = $(this);
			$desc = _that.val();
			if($desc != ""){
				$(".preview-box-desc").html(self.cutText(self.spintax($desc),250));
			}else{
				$(".preview-box-desc").html('<div class="line-no-text"></div><div class="line-no-text w50"></div>');
			}
		});

		$("[name='link_caption']").keyup(function(){
			_that = $(this);
			$caption = _that.val();
			if($caption != ""){
				$(".preview-box-caption").html(self.spintax($caption));
			}else{
				$(".preview-box-caption").html('<div class="line-no-text w25"></div>');
			}
		});

		$("[name='link_picture'],[name='image_url']").change(function(){
			_that = $(this);
			$image = _that.val();
			if($image != ""){
				$(".preview-box-image").removeClass('bg-blue');
				$(".preview-box-image").css('background-image', 'url(' + self.spintax($image) + ')')
			}else{
				$(".preview-box-image").removeAttr("style").addClass('bg-blue');
			}
		});

		//.add(30, 'minutes')
		/*$('.date_range').appendDtpicker({
			"current": moment().format('YYYY-MM-DD HH:mm'),
			"minDate": moment().format('YYYY-MM-DD HH:mm'),
			"maxDate": moment().add(60, 'days').format('YYYY-MM-DD HH:mm'),
			"autodateOnStart": true
		});
		*/

		//.add(30, 'minutes')
		$('.date_range_only_day').appendDtpicker({
			"dateOnly": true,
			"current": moment().format('YYYY-MM-DD'),
			"minDate": moment().format('YYYY-MM-DD'),
			"autodateOnStart": true
		});

		$(document).mouseup(function (e){
		    var container = $(".datepicker,.date_range,.date_range_only_day");

		    if (!container.is(e.target) // if the target of the click isn't the container...
		        && container.has(e.target).length === 0) // ... nor a descendant of the container
		    {
		        $(".datepicker").hide();
		    }
		});

		$('.dialog-upload').click(function() {
			var _that = $(this);
			var fm = $('<div/>').dialogelfinder({
				url : BASE+'assets/admin/plugins/elFinder/php/connector.php',
				lang : 'en',
				width : 840,
				destroyOnClose : true,
				getFileCallback : function(files, fm) {
					_that.parents(".form-group").find(".form-control").val(files.url);

					$(".preview-box-image").removeClass('bg-blue');
					$(".preview-box-image").css('background-image', 'url(' + files.url + ')')
				},
				commandsOptions : {
					getfile : {
						oncomplete : 'close',
						folders : true
					}
				}
			}).dialogelfinder('instance');
		});

		$('.formManageGroups').submit(function(){
			_that = $(this);
			_data = _that.serialize();
			_redirect = _that.data("redirect");
			_data = _data + '&' + $.param({token:token});
			if(!_that.hasClass('disable')){
				_that.addClass('disable');
				$.post(PATH + "Groups/ajax_update", _data, function(data){
					if(data.st == 'success'){
						self.show_notice(data.txt, data.st);
						setTimeout(function(){
							window.location.assign(PATH + _redirect);
						},1000);
					}else{
						self.show_notice(data.txt, data.st);
					}
					_that.removeClass('disable');
				},'json');
			}

			return false;
		});

		$('.formSchedule').submit(function(){
			_that = $(this);
			_data = _that.serialize();
			_redirect = _that.data("redirect");
			_data = _data + '&' + $.param({token:token});
			self.startPageLoading('.wrap-box-post');
			if(!_that.hasClass('disable')){
				_that.addClass('disable');
				$.post(PATH + "Posts/ajax_post", _data, function(data){
					if(data.st == "error"){
						$('.input-error').removeClass('input-error');
						$('.list-errors').html('');
						$.each( data, function( key, value ) {
							if(key != "st"){
								$('.list-errors').slideDown();
								$('.list-errors').append('<div><i class="fa fa-exclamation-circle"></i> '+value["text"]+'</div>');
					  			$('[name='+value["type"]+']').addClass("input-error");
					  			$('.'+value["type"]).addClass("input-error");
							}
						});
						_that.removeClass('disable');
					}else{
						$('.input-error').removeClass('input-error');
						$('.list-errors').html('').addClass('callout-success');
						$.each( data, function( key, value ) {
							if(key != "st"){
								$('.list-errors').slideDown();
								$('.list-errors').append('<div><i class="fa fa-exclamation-circle"></i> '+value["text"]+'</div>');
							}
						});
						setTimeout(function(){
							window.location.reload();
						},1000);
					}

					self.stopPageLoading('.wrap-box-post');
				},'json');
			}

			return false;
		});

		$(document).on("click", ".btn-modal-save", function(){
			$('.btn-save').trigger("click");
		});

		$('.btn-save').click(function(){
			_that = $(this);
			_form = _that.closest(".formSchedule");
			_data = _form.serialize();
			_redirect = _form.data("redirect");
			_title = $(".save_title").val();
			_data = _data + '&' + $.param({token:token, title: _title});
			self.startPageLoading('.wrap-box-post');
			if(!_form.hasClass('disable')){
				_form.addClass('disable');

				$.post(PATH + "Save/ajax_post", _data, function(data){
					if(data.st == "error"){
						$('.input-error').removeClass('input-error');
						$('.list-errors').html('');
						$.each( data, function( key, value ) {
							if(key != "st"){
								$('.list-errors').slideDown();
								$('.list-errors').append('<div><i class="fa fa-exclamation-circle"></i> '+value["text"]+'</div>');
					  			$('[name='+value["type"]+']').addClass("input-error");
					  			$('.'+value["type"]).addClass("input-error");
							}
						});
						_form.removeClass('disable');
					}else if(data.st == "title"){
						$('.input-error').removeClass('input-error');
						_form.removeClass('disable');
						$('#modal-save').modal('toggle');
					}else{
						$(".save_title").val("");
						$('#modal-save').modal('hide');
						$('.input-error').removeClass('input-error');
						$('.list-errors').html('').addClass('callout-success');
						$.each( data, function( key, value ) {
							if(key != "st"){
								$('.list-errors').slideDown();
								$('.list-errors').append('<div><i class="fa fa-exclamation-circle"></i> '+value["text"]+'</div>');
							}
						});

						setTimeout(function(){
							$('.list-errors').slideUp();
							_form.removeClass('disable');
						},2500);

					}

					self.stopPageLoading('.wrap-box-post');
				},'json');
			}

			return false;
		});

		$('.formScheduleUpdate').submit(function(){
			_that = $(this);
			_data = _that.serialize();
			_redirect = _that.data("redirect");
			_data = _data + '&' + $.param({token:token});
			self.startPageLoading('.wrap-box-post');
			if(!_that.hasClass('disable')){
				_that.addClass('disable');
				$.post(PATH + "Posts/postUpdate", _data, function(data){
					if(data.st == "error"){
						$('.input-error').removeClass('input-error');
						$('.list-errors').html('');
						$.each( data, function( key, value ) {
							if(key != "st"){
								$('.list-errors').slideDown();
								$('.list-errors').append('<div><i class="fa fa-exclamation-circle"></i> '+value["text"]+'</div>');
					  			$('[name='+value["type"]+']').addClass("input-error");
					  			$('.'+value["type"]).addClass("input-error");
							}
						});
						_that.removeClass('disable');
					}else{
						$('.input-error').removeClass('input-error');
						$('.list-errors').html('').addClass('callout-success');
						$.each( data, function( key, value ) {
							if(key != "st" && key != "url"){
								$('.list-errors').slideDown();
								$('.list-errors').append('<div><i class="fa fa-exclamation-circle"></i> '+value["text"]+'</div>');
							}
						});
						setTimeout(function(){
							window.location.assign(data.url);
						},1000);
					}

					self.stopPageLoading('.wrap-box-post');
				},'json');
			}

			return false;
		});
	};

	this.DataTable = function(element){
		$(element).DataTable({
            'searching'   : true,
            'lengthChange': true,
            'responsive'  : true,
            //"order"       : [[ 1, "desc" ]]
        });
	};

	this.downline = function(text){
		text = text.replace(/(?:\r\n|\r|\n)/g, '<br />');
		return text;
	}

	this.cutText = function(text, number){
		if(text.length > number){
			return text.substring(0, number)+"...";
		}else{
			return text;
		}
	} 

	this.chart = function(){
		_timeout = 0;
		setTimeout(function(){ self.ajax_chart('report_posts'); },_timeout);
	};

	this.ajax_chart = function(element){
		$('.' + element).html('');
		self.startPageLoading('.' + element);
		_daterange = $('.daterange').val();
		_data = $.param({token:token, daterange: _daterange});
		$.post(PATH + 'Reports/ajax_' + element, _data, function(data){
			$('.' + element).html(data);
			self.stopPageLoading('.' + element);
		});
	};

	this.convertUnicode = function(string)
    {
        slug = string.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        return slug;
    }

	this.Highcharts = function(options){
		$(options.element).highcharts({
	        chart: {
	            zoomType: 'x',
	            height  : (options.height)?options.height:300
	        },
	        title: {
	            text: (options.title)?options.title:''
	        },
	        subtitle: {
	            text: (options.subtitle)?options.subtitle:''
	        },
	        xAxis: {
	            type: (options.titlex)?options.titlex:'',
	            dateTimeLabelFormats: {
                    day: (options.format)?options.format:'%b %e',
                }
	        },
	        yAxis: {
	            title: {
	                text: (options.titley)?options.titley:''
	            }
	        },
	        legend: {
	            enabled: true
	        },
	        tooltip: {
	            crosshairs: (options.crosshairs)?true:false,
	            shared: true
	        },
	        plotOptions: {
	        	spline: {
	                marker: {
	                    radius: 4,
	                    lineColor: '#666666',
	                    lineWidth: 1
	                }
	            },
	            line: {
	                marker: {
	                    radius: 4,
	                    lineColor: '#666666',
	                    lineWidth: 1
	                },
	                tooltip: {
		        	    valueSuffix: (options.suffix)?options.suffix:''
		            },
	                color: (options.colory)?options.colory:Highcharts.getOptions().colors[5]
	            },
	            area: {
	                fillColor: {
	                    linearGradient: {
	                        x1: 0,
	                        y1: 0,
	                        x2: 0,
	                        y2: 1
	                    },
	                    stops: [
	                        [0, (options.colorx)?options.colorx:Highcharts.getOptions().colors[5]],
	                        [1, Highcharts.Color((options.colory)?options.colory:Highcharts.getOptions().colors[5]).setOpacity(1).get('rgba')]
	                    ]
	                },
	                marker: {
	                    radius: 0
	                },
	                color: (options.colory)?options.colory:Highcharts.getOptions().colors[5],
	                lineWidth: 1,
	                states: {
	                    hover: {
	                        lineWidth: 0
	                    }
	                },
	                threshold: null
	            },
	            pie: {
	            	tooltip: {
		        	    valueSuffix: '%',
		        	    pointFormatter: function() {
		        	    	return '<span style="color: '+this.series.tooltipOptions.backgroundColor+'">\u25CF</span> '+this.series.name+': <b>'+self.round(this.percentage,2)+'%</b><br/>.'
		            	}
		            },
	            }
	        },

	        series: (options.multi)?options.data:[{ type: (options.type)?options.type:'line',name: (options.name)?options.name:'', data: (options.data)?options.data:'', dataLabels: (options.dataLabels)?options.dataLabels:'{point.y}' }]
	    });
		list_chart.push(options.element);
	};

	this.round = function(value, decimals) {
	    return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
	};

	this.resize = function(){
		$(window).resize(function(){
			$('.listCore').height($(window).height());
			$('.listCore').width($('.box-listCore').width());
		});
	};

	this.formatNumber = function(number)
	{
	    var number = number.toFixed(0) + '';
	    var x = number.split('.');
	    var x1 = x[0];
	    var x2 = x.length > 1 ? '.' + x[1] : '';
	    var rgx = /(\d+)(\d{3})/;
	    while (rgx.test(x1)) {
	        x1 = x1.replace(rgx, '$1' + ',' + '$2');
	    }
	    return x1 + x2;
	};

	this.show_notice= function(txt, class_name){
        $('.msg').removeClass('error success').addClass(class_name).html(txt);

        clearTimeout(show_timeout);
        show_timeout = setTimeout(function(){
            $('.msg').html('');
        }, 8000);
    };

    this.startPageLoading = function(element) {
        if (element) {
            $(element).append('<div class="page-spinner-bar"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
        } else {
            $('body').append('<div class="page-spinner-bar"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div>');
        }
    };

    this.stopPageLoading = function(element) {
        $(element + ' .page-loading, '+element + ' .page-spinner-bar').remove();
    };

    this.spintax = function (spun) {
		var match;
		while (match = spun.match(SPINTAX_PATTERN)) {
			match = match[0];
			var candidates = match.substring(1, match.length - 1).split("|");
			spun = spun.replace(match, candidates[Math.floor(Math.random() * candidates.length)])
		}
		return spun;
	}
}
Main= new Main();
$(function(){
	Main.init();
});