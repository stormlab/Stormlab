	
	var Arrange = Class.create();
	
	Arrange = {
		
		initialize: function() {
			Sortable.create('arrange_list',{
				containment: ['arrange_list','limbo_list'],
				dropOnEmpty: true,
				onUpdate: function() {
					new Ajax.Request('/portfolio/update_order/',{
						method: 'post',
						parameters: Sortable.serialize('arrange_list')
					});
				}
			});
			Sortable.create('limbo_list',{
				containment: ['arrange_list','limbo_list'],
				dropOnEmpty: true
			});
		}
		
	}
	
	Event.observe(window,'load',function(){
		Arrange.initialize();
	});