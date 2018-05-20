/*!
 * Display a Dialog Box with Jquery UI
 *
 * Authors: Steven Letter
 * Theme: farceur
 * Version: 1.0.0
 */
jQuery(document).ready(function($){
		$( function() {
			// Open Dialog box with 640 pixel width
			// don't blank main window (modal)
			$( ".Dialog").dialog({
				autoOpen: false,
				width: 640,
				modal: false,
				show: { effect: "blind", duration: 1000},
				hide: { effect: "blind", duration: 1000}
			});
			
			// With class "pdfopener"  open dialog with class "Dialog"
			// Get record id number from HTML and append to id as follows "IDn"
			$( ".pdfopener" ).on( "click", function(idvar) {
		        var id = $(this).data("record-id");
				$( "#id" + id ).dialog( "open");
			});
		});	
});
