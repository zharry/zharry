// template, editor
var tmpl = $.summernote.renderer.getTemplate();
var editor = $.summernote.eventHandler.getEditor();

function toggleBtn($btn, isEnable) {
	$btn.toggleClass('disabled', !isEnable);
	$btn.attr('disabled', !isEnable);
};


function showPageDialog($editable, $dialog) {
	var $pageDialog = $dialog.find('.note-page-dialog');
	var $pageNumber = $pageDialog.find('.note-page-number');
	var $pageBtn = $pageDialog.find('.note-page-btn');

	toggleBtn($pageBtn, true);
	$pageNumber.val('');

	editor.saveRange($editable);

	$pageDialog.one('shown.bs.modal', function() {
		$pageBtn.click(function(event) {
			event.preventDefault();

			$pageDialog.modal('hide');
			// Call insertText
//			editor.insertText($editable, '$$_(' + $pageNumber.val() + ')_$$');

			// Prettify
			$pageLink = $('<a>').attr('href', 'PageNumber: ' + $pageNumber.val()).attr('class', 'pagenumber').html($pageNumber.val());
			editor.restoreRange($editable);
			editor.insertNode($editable, $pageLink[0]);
		});
	}).one('hidden.bs.modal', function() {
		$pageNumber.off('input');
		$pageBtn.off('click');
	}).modal('show');
}

// add plugin 
$.summernote.addPlugin({
	name: 'textbookPage',
	buttons: { // define button that be added in the toolbar
		page: function () {
			// create button template 
			return tmpl.iconButton('fa fa-file', {
				// set event's name to used as callback when this button is clicked
				event : 'page',
				title: 'Insert Page Link',
				hide: true
			});
    	}
	},

	dialogs: {
		page: function(lang) {
			var body = '<div class="form-group row-fluid">' +
				'<label>Page Number: </label>' + 
				'<input class="note-page-number form-control span12" type="text" />' +
				'</div>';
			var footer = '<button href="#" class="btn btn-primary note-page-btn disabled" disabled>Insert</button>'; 
			return tmpl.dialog('note-page-dialog fade', "Insert", body, footer);
		}
	},

	events: { // events
		page: function (event, editor, layoutInfo, value) {
			// Get current editable node
			var $editable = layoutInfo.editable();
			var $dialog = layoutInfo.dialog();

			showPageDialog($editable, $dialog);
		}
	}
});




