	
	/*  SLIDESHOW CLASS  */
	
	var Slideshow = Class.create();
	
	Slideshow = {
		
		/*  Initalize the Slideshow, usually run on window load.
			The parent_id & xml variables are obviously required, everything
			else is optional and has default variables.  */
		initialize: function(options) {
			
			/*  Write out options that were passed to the function.  */
			this.set_options(options);
			
			/*  Write out options that were passed as get variables in the
				<script> tag call.  */
			$$('script').each(this.script_options.bind(this));
			
			/*  Create the swfobject and write it to the page.  */
			var so = new SWFObject(
				this.options.f_source,
				this.options.slide_id,
				this.options.width,
				this.options.height,
				this.options.version,
				this.options.bg_color
				);
			
			so.addVariable('xmlPath_PASS',this.options.xml);
			so.addVariable('intervalRate_PASS',this.options.interval);
			so.addVariable('transitionType_PASS',this.options.type);
			
			so.write(this.options.parent_id);
			
		},
		
		/*  Set up the default options and override them with
			ones defined in the options object if present.  */
		set_options: function(options) {
			this.options = {
				xml:       '/toolshow/xml/',
				parent_id: 'slideshow',
				f_source:  '/assets/flash/slideshow.swf',
				slide_id:  'slide_object',
				width:     '372',
				height:    '242',
				version:   '7',
				bg_color:  '#F0EBE0',
				interval:  '3000',
				type:      'alpha'
			}
			Object.extend(this.options,options || {});
		},
		
		/*  If there were any options sent via the GET parameter
			in the script call let's set them.  */
		script_options: function(script) {
			if(script.src && script.src.match(/slideshow\.js(\?.*)?$/)) {
				var get_options = script.src.toQueryParams();
				Object.extend(this.options,get_options || {});
			}
		}
		
	}
	
	/*  Load the slideshow on window load, using prototype
		event observing so as not to affect existing onload
		events.  */
	Event.observe(window,'load',function() {
		Slideshow.initialize();
	});