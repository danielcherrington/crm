var DashboardManager = {
	
	gridster: "",

	init: function(){
		//events
		$("#add-dashlet").on("click", function() {
			DashboardManager.addDashlet();
		});

		$(document).on("click", ".dashlet-item", function(){
			DashboardManager.getDashlet($(this).attr("data-dashlet"));
		});

		//create grid
		$(".gridster ul").gridster({
        	widget_margins: [10, 10],
        	widget_base_dimensions: [380, 200],
        	draggable: {
            	handle: 'h3'
        	}
    	});

    	this.gridster =  $(".gridster ul").gridster().data('gridster');
	},

	addDashlet: function() {
		$('#dashletSelect').modal({remote: "ajax/getAvailableDashlets/none"});
	},

	getDashlet: function(id) {

		var p = {dashlet:id};
		$.ajax({
		  url: "ajax",
		  data: {method: "getDashlet", params: p},
		  context: document.body
		}).done(function(r) {
		  DashboardManager.gridster.add_widget(r,1,1);

		  $('#dashletSelect').modal('hide');
		});
	}

}