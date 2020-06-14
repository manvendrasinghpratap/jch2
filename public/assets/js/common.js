/**
 * show the success-message or error-message as fade-in fade-out
 */
function displayMessage(style, message) {
	var $div = $('<div />').appendTo('body');
	// success-message is the class for success message
	$div.attr('class', 'message-container').html(
			"<span>" + message + "</span>");
	$div.addClass(style);
	var message_width = parseInt($('.message-container').width())+82;
	var message_margin_left = (message_width/2);
	var message_position_top = parseInt($(window).scrollTop())+80;
	$('.message-container').css("margin-left","-"+message_margin_left);
	$('.message-container').css("top",message_position_top);
	$div.delay(2000).fadeOut(2000, function() {
		$(this).remove();
	});
}

function initDatepicker() {
		$('[data-toggle="datepicker"]').datepicker({autoHide: true,format: "mm/dd/yyyy"});
		// $('[data-toggle="datepicker"]').attr( 'readOnly' , 'true' );
		// $('[data-toggle="datepicker"]').keypress(function(event)
		// {event.preventDefault();});
}

function initClockpicker() {
		$('.clockpicker').clockpicker({ampm: true,  twelvehour: true, donetext: 'OK'
	});
		
}

function focusDiv(id) {
	$('html, body').animate({ scrollTop: $('#'+id).offset().top }, 'slow');
	$( "#"+id ).accordion({active: 0});
	$(".div-width").css("background-color","#dfdfdf");
}

function closeExpand(id) {
	$('html, body').animate({ scrollTop: $('#'+id).offset().top }, 'slow');
}

function initCollapse(){
	$(function() {
		$( ".accordion" ).accordion({
		  collapsible: true,
		  active: false,
		  heightStyle: "content"
		});
		$( ".accordion" ).first().accordion({active: 0});
		$( ".accordion-expand" ).accordion({active: 0});
  });
}

$(document).ready(function(){
	$(':input').change(function() {
	    $(this).val($(this).val().trim());
	});
	$('.select2').select2();
});	

function showAddDialog(id) {
    document.getElementById(id).classList.toggle("right-show");
	window.onclick = function(event) {
	if (event.target.id != "mtech") {
		var rightDropdowns = document.getElementById("mtechdropdown");
		if (rightDropdowns.classList.contains('right-show')) {
			rightDropdowns.classList.remove('right-show');
		}
	}
    if (event.target.id != "qaTools") {
        var rightDropdowns = document.getElementById("qaToolsDropDown");
        if (rightDropdowns.classList.contains('right-show')) {
            rightDropdowns.classList.remove('right-show');
        }
    }
    if (event.target.id != "hrTools") {
        var rightDropdowns = document.getElementById("hrToolsDropDown");
        if (rightDropdowns.classList.contains('right-show')) {
            rightDropdowns.classList.remove('right-show');
        }
    }
    if (event.target.id != "nursevisit") {
        var rightDropdowns = document.getElementById("nursehomevisitdropdown");
        if (rightDropdowns.classList.contains('right-show')) {
            rightDropdowns.classList.remove('right-show');
        }
    }
     if (event.target.id != "filedownload") {
        var rightDropdowns = document.getElementById("filedownloaddropdown");
        if (rightDropdowns.classList.contains('right-show')) {
            rightDropdowns.classList.remove('right-show');
        }
    }
	if (event.target.id != "menu") {
			var rightDropdowns = document.getElementById("rightmyDropdown");
			if (rightDropdowns.classList.contains('right-show')) {
				rightDropdowns.classList.remove('right-show');
			}
		}
	if (event.target.id != "clients") {
		var rightDropdowns = document.getElementById("clientsDropdown");
		if (rightDropdowns.classList.contains('right-show')) {
			rightDropdowns.classList.remove('right-show');
		}
	}
	if (event.target.id != "mar") {
		var rightDropdowns = document.getElementById("marDropdown");
		if (rightDropdowns.classList.contains('right-show')) {
			rightDropdowns.classList.remove('right-show');
		}
	}
	if (event.target.id != "caregiver") {
		var rightDropdowns = document.getElementById("caregiverdropdown");
		if (rightDropdowns.classList.contains('right-show')) {
			rightDropdowns.classList.remove('right-show');
		}
	}
	if (event.target.id != "physicaltherapydashboard") {
		var rightDropdowns = document.getElementById("physicaltherapydashboarddropdown");
		if (rightDropdowns.classList.contains('right-show')) {
			rightDropdowns.classList.remove('right-show');
		}
	}
	if (event.target.id != "sms") {
		var rightDropdowns = document.getElementById("smsDropdown");
		if (rightDropdowns.classList.contains('right-show')) {
			rightDropdowns.classList.remove('right-show');
		}
	}
	
	
	}
}

function deleteModalHide() {
	var elem = document.getElementById('delete-content');
	var pos = 0;
	var id = setInterval(frame, 1);
	function frame() {
		if (pos == -1000) {
			clearInterval(id);
			elem.style.display = "none";
		} else {
			pos = pos - 20;
			elem.style.top = pos + 'px';
		}
	}
}

function mySearch() {
	document.getElementById("search-myDropdown").classList
			.toggle("search-show");
	$(".search-show").removeClass("search-hide");

}

function filterCancel() {
	var dropdowns = document.getElementById("search-myDropdown");
	if (dropdowns.classList.contains('search-show')) {
		dropdowns.classList.remove('search-show');
	}
}
function openDialog(work_root, url, title,height='') {
	$("body").css({ overflow: 'hidden' })
	var viewportWidth = $(window).width()-100;
	var viewportHeight;
	if(height != '') {
		viewportHeight = height;
	} else {
		viewportHeight = $(window).height()-200;
	}
	var loaderContent = '<div id="modal-box"'
			+ ' class="box-contain margin-zero-auto empty-box-contain">'
			+ '<div class="modal-loader">' + '<img src="' + work_root
			+ '/view/image/loader.gif" />' + '</div>'
			+ '</div>';
	$('#show-modal-content').html(loaderContent).load(work_root + url).dialog({
		title:title,
		width: $(window).width() > 625 ? 625 : viewportWidth,
		height: $(window).width() > 625 ? 'auto' : viewportHeight,
		modal: true,
	    resizable: false,
        draggable: false,
	    position: {
		    my: "center top",
		    at: "center top",
		    of: window,
		    collision: "none"
	    }, 
	    create: function (event, ui) {
		    $(event.target).parent().css('position', 'fixed');
		    
	    },
    	 beforeClose: function(event, ui) {
    	  $("body").css({ overflow: 'inherit' })
    	 }
	});
	
	$('.ui-widget-overlay').bind( 'click', function() {
        $("#show-modal-content").dialog('close');
        $('.ui-widget-overlay').unbind();
    } );
}

function toggleMenu(){
	if($("#frm-content").attr("class") == "form-content-collapse"){
		$( "#sidebar" ).removeClass("frm-input-auto");
		$( ".icon-margin" ).removeClass("display-none");
		$( "#frm-content" ).removeClass("form-content-collapse");
	}else{
		$( "#sidebar" ).addClass("frm-input-auto");
		$( ".icon-margin" ).addClass("display-none");
		$( "#frm-content" ).addClass("form-content-collapse");
	}	
}


function expandAll() {
	$( ".accordion" ).accordion({active: 0});
}

function collapseAll() {
	$( ".accordion" ).accordion({active: false});
}

function addMoreMedication() {
	$('input.validate-field').css( "border-color","#d5d5d5" );
	$(".medication-row:last").clone().insertAfter(".medication-row:last");
	if($('input').is('.clockpicker') == true){
		initClockpicker();
	}
	initDatepicker();
	$(".medication-row:last").find("input").val("");
}
function addMoreVitalSign() {
	$(".vital-sign-row:last").clone().insertAfter(".vital-sign-row:last");
	initDatepicker();
	$(".vital-sign-row:last").find("input").val("");
}
function addMoreIntake() {
	$(".intake-row:last").clone().insertAfter(".intake-row:last");
	initClockpicker();
	$(".intake-row:last").find("input").val("");
}
function addMoreOutput() {
	$(".output-row:last").clone().insertAfter(".output-row:last");
	initClockpicker();
	$(".output-row:last").find("input").val("");
}
function addMoreActiveNote() {
	$(".active-row:last").clone().insertAfter(".active-row:last");
	initClockpicker();
	$(".active-row:last").find("#Notelabel").hide();
	$(".active-row:last").find("#hourly_note_label").hide();
	$(".active-row:last").find("input").val("");

}
function addMoreVitalSign() {
	$('input.frm-input-small').css( "border-color","#d5d5d5" );
	$(".vital-sign-row:last").clone().insertAfter(".vital-sign-row:last");
	initClockpicker();
	$(".vital-sign-row:last").find("input").val("");
	$(".vital-sign-row:last").find("input:checkbox").attr('checked', false);
}
function medicationDelete(work_root,id,method='ajax') {
	if(method == "ajax") {
		var btnDelete = '<span id="HideButtondelete"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button" onclick="deletePlanOfCare(\''+work_root+'\','+id+');"><span>Delete</span></button></span>';
	} else if (method == 'link') {
		var btnDelete = '<a href="'+work_root+'medication-administration/delete/'+id+'/"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button"><span>Delete</span></button></a>';
	}
	var	viewDeleteModal = '<div id="delete-content" class="modal"><div class="form-align"><div class="delete-modal-inner"><div id="modal-box" class="delete-box-contain margin-zero-auto"><span>Are you sure to delete this record?</span></div><div class="row form-btn">'+btnDelete+'<button class="btn-outline btn-cancel cursor-pointer"  name="cancel" onclick="deleteModalHide();" type="button"><span>Cancel</span></button></div></div></div></div>';
	$("#show-modal-content").html(viewDeleteModal);
	$(".delete-modal-inner").css("margin-top",$(document).scrollTop());
}
function vitalSignDelete(work_root,id,method='ajax') {
	if(method == "ajax") {
		var btnDelete = '<span id="HideButtondelete"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button" onclick="deletePlanOfCare(\''+work_root+'\','+id+');"><span>Delete</span></button></span>';
	} else if (method == 'link') {
		var btnDelete = '<a href="'+work_root+'vital-signs/delete/'+id+'/"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button"><span>Delete</span></button></a>';
	}
	var	viewDeleteModal = '<div id="delete-content" class="modal"><div class="form-align"><div class="delete-modal-inner"><div id="modal-box" class="delete-box-contain margin-zero-auto"><span>Are you sure to delete this record?</span></div><div class="row form-btn">'+btnDelete+'<button class="btn-outline btn-cancel cursor-pointer"  name="cancel" onclick="deleteModalHide();" type="button"><span>Cancel</span></button></div></div></div></div>';
	$("#show-modal-content").html(viewDeleteModal);
	$(".delete-modal-inner").css("margin-top",$(document).scrollTop());
}
function treatmentDelete(work_root,id,method='ajax') {
	if(method == "ajax") {
		var btnDelete = '<span id="HideButtondelete"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button" onclick="deletePlanOfCare(\''+work_root+'\','+id+');"><span>Delete</span></button></span>';
	} else if (method == 'link') {
		var btnDelete = '<a href="'+work_root+'treatment-administration/delete/'+id+'/"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button"><span>Delete</span></button></a>';
	}
	var	viewDeleteModal = '<div id="delete-content" class="modal"><div class="form-align"><div class="delete-modal-inner"><div id="modal-box" class="delete-box-contain margin-zero-auto"><span>Are you sure to delete this record?</span></div><div class="row form-btn">'+btnDelete+'<button class="btn-outline btn-cancel cursor-pointer"  name="cancel" onclick="deleteModalHide();" type="button"><span>Cancel</span></button></div></div></div></div>';
	$("#show-modal-content").html(viewDeleteModal);
	$(".delete-modal-inner").css("margin-top",$(document).scrollTop());
}
function addMoreICD() {
	$(".intake-row:last").clone().insertAfter(".intake-row:last");
	$(".intake-row:last").find("input").val("");
	initDatepicker();
}


function viewCaragiverDelete(work_root,id,method='ajax') {
	if(method == "ajax") {
		var btnDelete = '<span id="HideButtondelete"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button" onclick="deleteclient-face-sheet(\''+work_root+'\','+id+');"><span>Delete</span></button></span>';
	} else if (method == 'link') {
		var btnDelete = '<a href="'+work_root+'care-giver-assignment/delete/'+id+'"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button"><span>Delete</span></button></a>';
		
	}
	var	viewDeleteModal = '<div id="delete-content" class="modal"><div class="form-align"><div class="delete-modal-inner"><div id="modal-box" class="delete-box-contain margin-zero-auto"><span>Are you sure to delete this Record?</span></div><div class="row form-btn">'+btnDelete+'<button class="btn-outline btn-cancel cursor-pointer"  name="cancel" onclick="deleteModalHide();" type="button"><span>Cancel</span></button></div></div></div></div>';
	$("#show-modal-content").html(viewDeleteModal);
	$(".delete-modal-inner").css("margin-top",$(document).scrollTop());

}


function viewClientDetailInformationDelete(work_root,id,method='ajax') {
	if(method == "ajax") {
		var btnDelete = '<span id="HideButtondelete"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button" onclick="deleteclient-face-sheet(\''+work_root+'\','+id+');"><span>Delete</span></button></span>';
	} else if (method == 'link') {
		var btnDelete = '<a href="'+work_root+'client-details-information/delete/'+id+'"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button"><span>Delete</span></button></a>';
		
	}
	var	viewDeleteModal = '<div id="delete-content" class="modal"><div class="form-align"><div class="delete-modal-inner"><div id="modal-box" class="delete-box-contain margin-zero-auto"><span>Are you sure to delete this Record?</span></div><div class="row form-btn">'+btnDelete+'<button class="btn-outline btn-cancel cursor-pointer"  name="cancel" onclick="deleteModalHide();" type="button"><span>Cancel</span></button></div></div></div></div>';
	$("#show-modal-content").html(viewDeleteModal);
	$(".delete-modal-inner").css("margin-top",$(document).scrollTop());

}




/* add more functionality for physical_therapy_initial_evalution page  section */
function addMoreButton(className){
	$('input.validate-field').css( "border-color","#d5d5d5" );
	$("."+className+":last").clone().insertAfter("."+className+":last");
	if($('input').is('.clockpicker') == true){
	 initClockpicker();
	}
	$("."+className+":last").find("input").val("");
}



/* delete functionality for the physical therapy page  */
function viewPhysicalEvaluationDelete(work_root,id,method='ajax') {
	if(method == "ajax") {
		var btnDelete = '<span id="HideButtondelete"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button" onclick="deleteclient-face-sheet(\''+work_root+'\','+id+');"><span>Delete</span></button></span>';
	} else if (method == 'link') {
		var btnDelete = '<a href="'+work_root+'physical_evaluation/delete/'+id+'"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button"><span>Delete</span></button></a>';
	}
	var	viewDeleteModal = '<div id="delete-content" class="modal"><div class="form-align"><div class="delete-modal-inner"><div id="modal-box" class="delete-box-contain margin-zero-auto"><span>Are you sure to delete this Record?</span></div><div class="row form-btn">'+btnDelete+'<button class="btn-outline btn-cancel cursor-pointer"  name="cancel" onclick="deleteModalHide();" type="button"><span>Cancel</span></button></div></div></div></div>';
	$("#show-modal-content").html(viewDeleteModal);
	$(".delete-modal-inner").css("margin-top",$(document).scrollTop());
}
function addMoreCaregiverToClient(work_root) {
	$.ajax({
		url : work_root + "getTrRecord/",
		success : function(response) {
            $("#medication-table").append(response);
		}
	});

}

/* delete functionality for the incidenet report page  */
function viewIncidentReportDelete(work_root,id,method='ajax') {
	if(method == "ajax") {
		var btnDelete = '<span id="HideButtondelete"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button" onclick="deleteclient-face-sheet(\''+work_root+'\','+id+');"><span>Delete</span></button></span>';
	} else if (method == 'link') {
		var btnDelete = '<a href="'+work_root+'incident_report/delete/'+id+'"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button"><span>Delete</span></button></a>';
	}
	var	viewDeleteModal = '<div id="delete-content" class="modal"><div class="form-align"><div class="delete-modal-inner"><div id="modal-box" class="delete-box-contain margin-zero-auto"><span>Are you sure to delete this Record?</span></div><div class="row form-btn">'+btnDelete+'<button class="btn-outline btn-cancel cursor-pointer"  name="cancel" onclick="deleteModalHide();" type="button"><span>Cancel</span></button></div></div></div></div>';
	$("#show-modal-content").html(viewDeleteModal);
	$(".delete-modal-inner").css("margin-top",$(document).scrollTop());
}

/* delete functionality for the progress note report page  */
function viewPhysicalTherapyProgressNoteDelete(work_root,id,method='ajax') {
	if(method == "ajax") {
		var btnDelete = '<span id="HideButtondelete"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button" onclick="deleteclient-face-sheet(\''+work_root+'\','+id+');"><span>Delete</span></button></span>';
	} else if (method == 'link') {
		var btnDelete = '<a href="'+work_root+'physical-therapy-progress-note/delete/'+id+'"><button class="btn-outline btn-delete cursor-pointer"  name="deleteContact" id="deleteContact" type="button"><span>Delete</span></button></a>';
	}
	var	viewDeleteModal = '<div id="delete-content" class="modal"><div class="form-align"><div class="delete-modal-inner"><div id="modal-box" class="delete-box-contain margin-zero-auto"><span>Are you sure to delete this Record?</span></div><div class="row form-btn">'+btnDelete+'<button class="btn-outline btn-cancel cursor-pointer"  name="cancel" onclick="deleteModalHide();" type="button"><span>Cancel</span></button></div></div></div></div>';
	$("#show-modal-content").html(viewDeleteModal);
	$(".delete-modal-inner").css("margin-top",$(document).scrollTop());
}

/*caregiver add functionality*/
function addMoreClientToCaregiver(work_root) {
	$.ajax({
		url : work_root + "getTrRecordCaregiver/",
		success : function(response) {
            $("#medication-table").append(response);
		}
	});

}

function addMoreClientToPTOT(work_root) {
	$.ajax({
		url : work_root + "getTrRecordPtot/",
		success : function(response) {
            $("#medication-table").append(response);
		}
	});

}

function printData()
{
    var divToPrint = document.getElementById('printTable');
    var htmlToPrint = '' +
        `
 <style type="text/css">
    .no-print, .no-print *
    {
        display: none !important;
    }
 table, table th, table td {
            border:1px solid #000;
            }
            </style>
`

    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    // newWin.close();
}