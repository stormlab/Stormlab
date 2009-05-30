	
	<h3>The 3D Methodology : Definition, Development, Deployment</h3>
	<p>This is the life cycle of a typical large-scale Stormlab web application. We can adapt this methodology to suit any size engagement - from a year long deployment to a straightforward five page site.</p>
	<p><?php echo img_tag('method_chart.gif'); ?></p>
	
	<div id="definition_blurb">
		<h4 id="definition"><span>Definition</span></h4>
		<div id="definition_body"><div>
			<h5 id="project_management">Project Management</h5>
			<p>Our methodology focuses on identifying the key decision points of the development effort, prototyping various options and engaging with the client to resolve key issues. Typically, we conduct status calls twice weekly to review progress against a project plan, resolve issues, and prioritize next steps. Every project is tracked via <a href="http://www.basecamphq.com/">Basecamp</a>. This allows clients to ask questions, monitor daily progress on a daily basis and interact with the team.</p>
			<h5 id="business_requirements_definition">Business Requirements Definition</h5>
			<p>Stormlab analysts document the details and full scope of the proposed solution from a marketing, design, branding and information architecture standpoint. If neccessary, time is spent interviewing both the client and potential users in an effort to construct &#8216;personas&#8217; that will help inform the development of every aspect of the web site.</p>
			<h5 id="optional_brand_identity_design">Optional Brand Identity Design</h5>
			<p>If required, the brand experts at Stormlab can assist in the creation of a corporate identity. We begin with an extensive round of initial designs imbued with the attributes of the brand that were identified during the definition of the business requirements. </p>
			<h5 id="technical_architecture">Technical Architecture</h5>
			<p>At this point we define the technical architecture for a project. Our proposed solutions include a complete staging area for development version that mirrors the setup of the ultimate, &#8216;live&#8217; site. We typically advocate the use of a third-party data center with leased servers. This is a highly flexible option that allows for rapid growth while still managing risk. An added benefit is the reduced need for in-house or contracted server admin experts.</p>
		</div></div>
	</div>
	
	<div id="development_blurb">
		<h4 id="development"><span>Development</span></h4>
		<div id="development_body"><div>
			<h5 id="database_design_and_construction">Database Design and Construction</h5>
			<p>All key data points will be mapped out and organized into logical groups. Data will be normalized to the degree that best suits a flexible storage, maintenance and reporting scenario. Data replication and backup scenarios will also be planned and discussed in this phase of development. An emphasis will be placed upon flexibility and long-term growth capability in terms of the actual schema.</p>
			<h5 id="application_design_and_construction">Application Design and Construction</h5>
			<p>The Stormlab team works together with the client to create a rough, working model of the site in HTML. By rapid protoyping we can greatly speed up the development process and focus on the user experience first and foremost. The end result, complete with written documentation, serves as a three dimensional blueprint for the project lifecycle.</p>
			<p>Next, Stormlab designers will create several versions of the Graphical User Interface (GUI). Upon approval of the general GUI, we create the individual page-level graphics. Utilizing our in-house marketing team we will create designs that use color, typography, iconography and photography to bring the brand to life.</p>
			<p>The approved site assets and style guides are passed to the programming team. Using the deliverables from the rough prototype, the production process moves swiftly. Stormlab takes care of the client side coding (XHTML/CSS) and the backend engineering bringing everything into a seamless whole on the staging server.</p>
			<h5 id="documentation">Documentation</h5>
			<p>Throughout the development process, we document the site rigorously with style guides and User guidelines (particularly for any administrative modules) . As the project nears completion, these become the basis for the help documentation that we provide in anticipation of the cutover.</p>
			<h5 id="testing">Testing</h5>
			<p>Comprehensive Quality Assurance is critical for successful deployment and satisfied users. We ensure that the design and code is bug free and holds up to all standards independent of the bandwidth, browser and platform of the user.</p>
		</div></div>
	</div>
	
	<div id="deployment_blurb">
		<h4 id="deployment"><span>Deployment</span></h4>
		<div id="deployment_body"><div>
			<h5 id="training">Training</h5>
			<p>Users, administrators and other technical staff members are well trained to take on the tasks of running all aspects of the new applications.</p>
			<h5 id="transition">Transition</h5>
			<p>This begins early in the project and includes tasks such as: developing the Installation Plan, preparing the Production Environment and performing the cutover.</p>
			<h5 id="post_system_support">Post-system support</h5>
			<p>Next, projects move to maintenance for complete, reliable post-production solutions. Administration tools allow clients to be able to update, edit and expand their sites. More complex design/technical changes would be handled by Stormlab in a separate contract or under an additional retainer agreement.</p>
		</div></div>
	</div>
	
	<div id="loops_blurb">
		<h4 id="loops"><span>Loops</span></h4>
		<div id="loops_body"><div>
			<p>At any stage within this development methodology there is the provision for tightly controlled &#8216;loops&#8217;. These loops allow us to revisit aspects of the business logic, design decisions or technology issues that may need to change in the light of new information. In this way, the development process is fluid and we can keep the project moving forward while acknowledging that we don&#8217;t yet have all of the answers.</p>
		</div></div>
	</div>
	
	
	<script type="text/javascript">
		// <![CDATA[
		
		var Sliding = Class.create();
		
		Sliding = {
			
			sections: ['definition','development','deployment','loops'],
			
			initialize: function() {
				Sliding.sections.each(function(s) {
					new Effect.toggle(s+'_body','blind');
					Event.observe(s,'click',function(event){
						new Effect.toggle(this.id+'_body','blind');
						Element.toggleClassName(this.id,'open');
					});
				});
			}
			
		}
		
		if(!Prototype.Browser.IE) {
			Event.observe(window,'load',function(){
				Sliding.initialize();
			});
		}
		
		// ]]>
	</script>