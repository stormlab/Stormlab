	
	var Add_item = Class.create();
	
	Add_item = {
		
		image: '',
		browse: '',
		current: 1,
		
		initialize: function(image,browse) {
			Event.observe($(browse),'click',function(event){
				Add_item.update_vars(image,browse);
				mcImageManager.open('add_item','images[]','','Add_item.handle_url');
			});
			Event.observe($('add_image'),'click',function(event){
				Add_item.add_li();
			});
		},
		
		handle_url: function(url) {
			$(Add_item.image).value = url;
		},
		
		update_vars: function(image,browse) {
			Add_item.image  = image;
			Add_item.browse = browse;
		},
		
		add_li: function() {
			Add_item.current++;
			var li     = document.createElement('li');
			var flabel = document.createElement('label');
			var file   = document.createTextNode('File');
			var input  = document.createElement('input');
			var img    = document.createElement('img');
			var br     = document.createElement('br');
			var tlabel = document.createElement('label');
			var titext = document.createTextNode('Title');
			var title  = document.createElement('input')
			input.name = 'images[]';
			input.id   = 'image_'+Add_item.current;
			img.src    = 'http://www.stormlab.com/assets/img/browse.gif';
			img.id     = 'browse_'+Add_item.current;
			title.name = 'titles[]';
			title.id   = 'title_'+Add_item.current;
			flabel.appendChild(file);
			li.appendChild(flabel);
			li.appendChild(input);
			li.appendChild(img);
			li.appendChild(br);
			tlabel.appendChild(titext);
			li.appendChild(tlabel);
			li.appendChild(title);
			$('images_list').appendChild(li);
			Event.observe(img,'click',function(event){
				Add_item.update_vars(input.id,img.id);
				mcImageManager.open('add_item','images[]','','Add_item.handle_url');
			});
		}
		
	}
	
	Event.observe(window,'load',function(){
		Add_item.initialize('image_1','browse_1');
	});