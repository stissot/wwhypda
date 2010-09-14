// rock-type.js
$(document).ready(function() {

	$('.rockTree').bind('click.jstree',function(e) {
		rockId = $(e.target).parents('li').first().children('a').attr('hash').substring(1);
		if (e.target.nodeName.toLowerCase()=='a' || e.target.nodeName.toLowerCase()=='ins' && $(e.target).parent().get(0).nodeName.toLowerCase()=='a')
		{
			loadDetail(rockId);
		}
	}).jstree({ 
		core: {
			"animation": 200
		},
		themes: {
			"theme": "apple",
			"dots": false,
			"url": "/js/themes/apple/style.css"
		},
		ui: {
			"select_limit": 1,
		},
		plugins: ["themes","html_data","ui"]
	});
	
});

function loadDetail(rockId) {
	$('#loading').show();
	$('.maincontent').load('/rock-type/detail', {format:'html',id:rockId}, function() {
		var options = {
				target:	'#rockParamSummary', // target element(s) to be updated with server response
				success: registerDataLinks // post submit callback
		};
		// automatically submit filter form via ajax each time an input element changes
		$('#rockMeasFilter .auto_submit').change(function() {
			$(this).parents().filter('form').submit();
		});
		$('#rockMeasFilter').ajaxForm(options);
		registerDataLinks();
	});
	// document.location.href='#'+rockId;
}

function registerDataLinks() {
	$('#loading').hide();
	$('a.viewData').click(function(e) {
		$('#data').load($(this).attr('href'), registerRawEdit)
		return false;
	});
}

function registerRawEdit() {
	console.log('success');
}

// pre-submit callback
function showRequest(formData, jqForm, options) {
	var queryString = $.param(formData);
	console.log('About to submit: \n\n' + queryString);
	return true; // prevent the form to be submited
}

// post-submit callback
function showResponse(responseText, statusText, xhr, $form) {
	console.log('status: ' + statusText + '\n\nresponseText: \n' + responseText +
	'\n\nThe output div should have already been updated with the responseText.'); 
}
