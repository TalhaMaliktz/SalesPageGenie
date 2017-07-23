$(document).ready(function(){

	$body = $("body");

	$(document).on({
		ajaxStart: function() { $body.addClass("loading");},
		ajaxStop: function() { $body.removeClass("loading"); }    
	});

	$(document).tooltip();
	
	var dialog;
	dialog = $( "#dialog" ).dialog({
		autoOpen: false,
		height: "auto",
		width: "75%",
		modal: true,
		buttons: [
			{
				text: "Cancel",
				click: function() {
					$( this ).dialog( "close" );
				}
			}
		],
	});

	var $sortableDiv = $("#psP");

	$sortableDiv.sortable({
		placeholder: "ui-state-highlight",
		helper:'clone',
 		create: function( event, ui ) {
			$("#dialog").contents().find($("#headerDiv").append('<div id="section1" class="form-group last-added"><h4 id="sectionTitle1" style="text-align: justify; text-align: center;" contenteditable="true">'+ $("#sectTitle1").val() +' </h4><br><p id="sectiondesc1" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+ $("#sectDesc1").val() +'</p></div>'));
			$("#dialog").contents().find($("#headerDiv").append('<div id="section2" class="form-group last-added"><h4 id="sectionTitle2" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle2").val()+'</h4><br><p id="sectiondesc2" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc2").val()+'</p></div>'));
			$("#dialog").contents().find($("#headerDiv").append('<div id="section3" class="form-group last-added"><h4 id="sectionTitle3" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle3").val()+'</h4><br><p id="sectiondesc3" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc3").val()+'</p></div>'));
			$("#dialog").contents().find($("#headerDiv").append('<div id="vidDiv" class="videodiv last-added"><p id="VideoURL" class="text-center page-title" Style="text-align:center;line-height:55px;">'+ $("#YoutubeLink").val() +'</p></div>'));
		},	

		stop : function(event, ui){
			var sortorder = [];
			sortorder = ($(this).sortable('toArray'));
			$.each(sortorder, function( index, value ) {
					if (index == "0" && value =="1") {
						if ($("#section1").length == 0 && $("#section2").length == 0 && $("#section3").length == 0 && $("#vidDiv").length == 0) {
							$("#dialog").contents().find($("#headerDiv").append('<div id="section1" class="form-group last-added"><h4 id="sectionTitle1" style="text-align: justify; text-align: center;" contenteditable="true">'+ $("#sectTitle1").val() +' </h4><br><p id="sectiondesc1" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+ $("#sectDesc1").val() +'</p></div>'));
						} else {
							$("#dialog").contents().find("#section1").remove();
							$("#dialog").contents().find("#section2").remove();
							$("#dialog").contents().find("#section3").remove();
							$("#dialog").contents().find("#vidDiv").remove();
							
							$("#dialog").contents().find($("#headerDiv").append('<div id="section1" class="form-group last-added"><h4 id="sectionTitle1" style="text-align: justify; text-align: center;" contenteditable="true">'+ $("#sectTitle1").val() +' </h4><br><p id="sectiondesc1" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+ $("#sectDesc1").val() +'</p></div>'));
						}

					}else if (index == "0" && value =="2") {
						if ($("#section1").length == 0 && $("#section2").length == 0 && $("#section3").length == 0 && $("#vidDiv").length == 0) {
							$("#dialog").contents().find($("#headerDiv").append('<div id="section2" class="form-group last-added"><h4 id="sectionTitle2" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle2").val()+'</h4><br><p id="sectiondesc2" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc2").val()+'</p></div>'));
						}else {
							$("#dialog").contents().find("#section1").remove();
							$("#dialog").contents().find("#section2").remove();
							$("#dialog").contents().find("#section3").remove();
							$("#dialog").contents().find("#vidDiv").remove();
							$("#dialog").contents().find($("#headerDiv").append('<div id="section2" class="form-group last-added"><h4 id="sectionTitle2" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle2").val()+'</h4><br><p id="sectiondesc2" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc2").val()+'</p></div>'));
						}
					}
					else if (index == "0" && value =="3") {
						if ($("#section1").length == 0 && $("#section2").length == 0 && $("#section3").length == 0 && $("#vidDiv").length == 0) {
							$("#dialog").contents().find($("#headerDiv").append('<div id="section3" class="form-group last-added"><h4 id="sectionTitle3" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle3").val()+'</h4><br><p id="sectiondesc3" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc3").val()+'</p></div>'));
						}else{
							$("#dialog").contents().find("#section1").remove();
							$("#dialog").contents().find("#section3").remove();
							$("#dialog").contents().find("#section2").remove();
							$("#dialog").contents().find("#vidDiv").remove();
							$("#dialog").contents().find($("#headerDiv").append('<div id="section3" class="form-group last-added"><h4 id="sectionTitle3" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle3").val()+'</h4><br><p id="sectiondesc3" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc3").val()+'</p></div>'));
						}
					}
					else if (index == "0" && value =="link") {
						if ($("#section1").length == 0 && $("#section2").length == 0 && $("#section3").length == 0 && $("#vidDiv").length == 0) {
							$("#dialog").contents().find($("#headerDiv").append('<div id="vidDiv" class="videodiv last-added"><p id="VideoURL" class="text-center page-title" Style="text-align:center;line-height:55px;">'+ $("#YoutubeLink").val() +'</p></div>'));
						}else{
							$("#dialog").contents().find("#section1").remove();
							$("#dialog").contents().find("#section2").remove();
							$("#dialog").contents().find("#section3").remove();
							$("#dialog").contents().find("#vidDiv").remove();
							$("#dialog").contents().find($("#headerDiv").append('<div id="vidDiv" class="videodiv last-added"><p id="VideoURL" class="text-center page-title" Style="text-align:center;line-height:55px;">'+ $("#YoutubeLink").val() +'</p></div>'));
						}
					}
					
					if (index == "1" && value =="1") {
						var lastAddedDiv = $(".last-added");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section1" class="form-group last-added1"><h4 id="sectionTitle1" style="text-align: justify; text-align: center;" contenteditable="true">'+ $("#sectTitle1").val() +' </h4><br><p id="sectiondesc1" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+ $("#sectDesc1").html() +'</p></div>'));
					}
					else if (index == "1" && value =="2") {
						var lastAddedDiv = $(".last-added");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section2" class="form-group last-added1"><h4 id="sectionTitle2" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle2").val()+'</h4><br><p id="sectiondesc2" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc2").val()+'</p></div>'));

					}
					else if (index == "1" && value =="3") {
						var lastAddedDiv = $(".last-added");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section3" class="form-group last-added1"><h4 id="sectionTitle3" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle3").val()+'</h4><br><p id="sectiondesc3" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc3").val()+'</p></div>'));
					}
					else if (index == "1" && value =="link") {
						var lastAddedDiv = $(".last-added");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="vidDiv" class="videodiv last-added1"><p id="VideoURL" class="text-center page-title" Style="line-height:55px;">'+ $("#YoutubeLink").val() +'</p></div>'));
					}
					if (index == "2" && value =="1") {
						var lastAddedDiv = $(".last-added1");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section1" class="form-group last-added2"><h4 id="sectionTitle1" style="text-align: justify; text-align: center;" contenteditable="true">'+ $("#sectTitle1").val() +' </h4><br><p id="sectiondesc1" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+ $("#sectDesc1").val() +'</p></div>'));
					}else if (index == "2" && value =="2") {
						var lastAddedDiv = $(".last-added1");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section2" class="form-group last-added2"><h4 id="sectionTitle2" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle2").val()+'</h4><br><p id="sectiondesc2" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc2").val()+'</p></div>'));
					}
					else if (index == "2" && value =="3") {
						var lastAddedDiv = $(".last-added1");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section3" class="form-group last-added2"><h4 id="sectionTitle3" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle3").val()+'</h4><br><p id="sectiondesc3" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc3").val()+'</p></div>'));
					}
					else if (index == "2" && value =="link") {
						var lastAddedDiv = $(".last-added1");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="vidDiv" class="videodiv last-added2"><p id="VideoURL" class="text-center page-title" Style="text-align:center;line-height:55px;">'+ $("#YoutubeLink").val() +'</p></div>'));
					}
				else if (index =="3"){
					if (index == "3" && value =="1") {
						var lastAddedDiv = $(".last-added2");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section1" class="form-group last-added3"><h4 id="sectionTitle1" style="text-align: justify; text-align: center;" contenteditable="true">'+ $("#sectTitle1").val() +' </h4><br><p id="sectiondesc1" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+ $("#sectDesc1").val() +'</p></div>'));
					}
					else if (index == "3" && value =="2") {
						var lastAddedDiv = $(".last-added2");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section2" class="form-group last-added3"><h4 id="sectionTitle2" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle2").val()+'</h4><br><p id="sectiondesc2" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc2").val()+'</p></div>'));
					}
					else if (index == "3" && value =="3") {
						var lastAddedDiv = $(".last-added2");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="section3" class="form-group last-added3"><h4 id="sectionTitle3" style="text-align: justify; text-align: center;" contenteditable="true">'+$("#sectTitle3").val()+'</h4><br><p id="sectiondesc3" class="text-center page-title" Style="text-align:center; text-align: justify; padding:0 21.5% 0 21.5%; width:100%; overflow-wrap: break-word;word-wrap: break-word; hyphens: auto;">'+$("#sectDesc3").val()+'</p></div>'));
					}
					else if (index == "3" && value =="link") {
						var lastAddedDiv = $(".last-added2");
						var lastAddedId =lastAddedDiv.attr("id");
						$("#dialog").contents().find($("#"+lastAddedId).after('<div id="vidDiv" class="videodiv last-added3"><p id="VideoURL" class="text-center page-title" Style="text-align:center;line-height:55px;">'+ $("#YoutubeLink").val() +'</p></div>'));
					}
				}
			});
			}
	});	

	$("#previewBtn").click(function(e){

		$("#saveTemplateBtn").attr("disabled", false);	

		var headerText = $("#headertxt").val();
		var headerDesc = $("#headerDescInput").val();

		var paypalCode = $("#paypalCode").val();

		var sectionOneTitle = $("#sectTitle1").val();
		var sectionTwoTitle = $("#sectTitle2").val();
		var sectionThreeTitle = $("#sectTitle3").val();

		var sectionOneDescription= $("#sectDesc1").val();
		var sectionTwoDescription = $("#sectDesc2").val();
		var sectionThreeDescription = $("#sectDesc3").val();
		var YoutubeLink = $("#YoutubeLink").val();

		$("#dialog").contents().find("#heading").html(headerText);

		$("#dialog").contents().find("#sectionTitle1").html(sectionOneTitle);
		$("#dialog").contents().find("#sectionTitle2").html(sectionTwoTitle);
		$("#dialog").contents().find("#sectionTitle3").html(sectionThreeTitle);

		$("#dialog").contents().find("#sectiondesc1").html(sectionOneDescription);
		$("#dialog").contents().find("#sectiondesc2").html(sectionTwoDescription);
		$("#dialog").contents().find("#sectiondesc3").html(sectionThreeDescription);
		 $("#dialog").contents().find("#VideoURL").html(YoutubeLink);
		
		$("#dialog").contents().find("#headerDesc").html(headerDesc);

		$("#dialog").contents().find("#buybtn").html(paypalCode);

		dialog.dialog("open");
	});
 
	$("#addlink").click(function(){
		var clonedDiv =	$('#linkdiv').clone();
		var copied =$(clonedDiv).find("img").remove().end();
		$("#psP").append(copied);

	});

$(document).ready(function(){
	jQuery.fn.center = function(parent) {
		if (parent) {
			parent = this.closest("#dialog");
		} else {
			parent = window;
		}
		this.css({
				"position": "absolute",
				"top": ((($(parent).height() - this.outerHeight()) ) + $(parent).scrollTop() + "px"),
				"left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
			});
		return this;
	}
	$("div.target:nth-child(1)").center(true);

	});

	$("#saveTemplateBtn").click(function (e) { 
	var templateSource = $("#dialog");
	var headerText = $("#headertxt").val();
	console.log(headerText);
	templateSource = templateSource.html();
	templateSource = '<!doctype html><head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="crossorigin="anonymous"></script></head>	<body style="margin:0;padding:0;">' +templateSource +'<script>(function($){$(document).ready(function(){$("form").attr("style","text-align: center");$("#buybutton").attr("style","width:25%;height:auto;");$.fn.center=function(){return this.each(function(){var $this=$(this),parent=$this.parent(),topPos,topMargin,leftMargin,resizeTimeout;if(parent.is("body:not(.root-height-set)"))$("html,body").css("height","100%").addClass("root-height-set");if($this.css("position")==="absolute"||$this.css("position")==="fixed"){topPos="50%";leftMargin="-"+Math.round($this.outerWidth()/2)+"px";$this.css({"left":"50%","margin-left":leftMargin})}else{topPos=Math.floor(parent.height()-$this.outerHeight());$this.css({"position":"relative","margin-left":"auto","margin-right":"auto"})}$(window).resize(function(){if(resizeTimeout)clearTimeout(resizeTimeout);resizeTimeout=setTimeout(function(){if($this.css("position")==="absolute"){topMargin="-"+Math.round($this.outerHeight()/2)+"px";leftMargin="-"+Math.round($this.outerWidth()/2)+"px";$this.css({"margin-left":leftMargin,"margin-top":topMargin})}},150)})})};$("#buybutton").center()})})(jQuery);</script></body></html>'
	
	$.ajax({
	            url: './SaveT',
	            method: 'post',
	            data: { templateString: templateSource,
						Title: headerText },
	            success: function (data) {
					$(".templatediv").hide();
					window.location.href ="TSource"  
					 //alert("Your Template was saved successfully");
	            },
	            cache: false
	        });
	});



	//Downloading Source
	$('.download').click(function (e) { 
		var id = $(this).closest("tr").find('td:eq(3)').find('input').val();
    	   if (confirm('Are you sure you want to delete this Source ?')) {
        		alert(id);
    		}
	});

	// $('.download').click(function (e) { 
	// 	var id = $(this).closest("tr").find('td:eq(3)').find('input').val();
    // 	   if (confirm('Are you sure you want to delete this Source ?')) {
    //     		alert(id);
    // 		}
	// });



	//Saving Source
	// $("#savesrc").click(function (e) { 
	//  //console.log(site_url= $('#site_url').val());
	// 	$.ajax({
	//             url: './Save',
	//             method: 'post',
	//             data: { site_url: site_url },
	//             success: function (data) {          	
	// 				alert("Your Source was saved successfully");
	// 				window.location.href ="Links" 
					 
	//             },
	//             cache: false
	//         });
	// });
	

	//Capturing and compiling HTML
	$("#siteform").validate({
		submitHandler : function(e) {
			site_url= $('#site_url').val();
			$('#site_url2').val(site_url);

	        $.ajax({
	            url: './Capture',
	            method: 'post',
	            data: { site_url: site_url },
	            success: function (data) {
	                if(data){
						var head = data.head;
						var body = data.body;
	                	$('#site').contents().find('head').html(head);
						$('#site').contents().find("body").html(body);
						//console.log(data);
						//alert("The Source was captured! Login or Signup to download the Source");
						
	                } else {
	                	alert('Something went wrong please try again');
	                }
	                
	            },
	            cache: false
	        });
		},
		rules : {
			site_url : {
				required : true,
				url: true
			}	
		},
		messages : {
			site_url : {
				required : "Please enter your site address",
			}
		},
		errorPlacement : function(error, element) {
			$(element).closest('.form-group').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success : function(element, lab) {
			var messages = new Array("That's Great!", "Looks good!", "You got it!", "Great Job!", "Smart!", "That's it!");
			var num = Math.floor(Math.random() * 6);
			$(lab).closest('.form-group').find('.help-block').text(messages[num]);
			$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
		}
	});
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	// $.ajaxSetup({
	// 	headers: {
	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 	}
	// });
});