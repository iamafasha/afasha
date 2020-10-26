import { registerBlockType } from '@wordpress/blocks';
const { MediaPlaceholder, RichText, InspectorControls, MediaUpload } = wp.editor;
const { PanelBody, IconButton } = wp.components;
import { __ } from '@wordpress/i18n';
import './style.scss';


registerBlockType('afasha/project-gallery', {
	title: 'Project Gallery',
	description: 'Project Gallery built for afasha theme.',
	category: 'afasha_theme',
	icon: 'format-gallery',
	supports: {
		html: true,
	},
	attributes: {
		images: {
			type:'array',
			default:[],
		},
	},
	edit(props) {
		return (
			<div class="row">
				<MediaPlaceholder
					icon="format-gallery"
					className='hello'
					labels={{
						title: 'Project Gallery',
						instructions: 'Upload or select images to be displayed'
					}}
					value={props.attributes.images}
					allowedTypes={['image']}
					onSelect={(e) => props.setAttributes({images:e})}
					type="images"
					multiple={true}
				/>
			</div>
		);
	}
	,
	save(props){
		return (
			<div class="project-gallery">
					<div class="row">
				{props.attributes.images.map((e)=>{
					return(
						<div class="col-md-2">
						<div class="view view-first"> 
							<img src={e.url} alt="" /> 
							<div class="mask"> 
								<div class="i-icons">
									<a class="zoom" href={e.url}><i class="fa fa-plus"></i></a>
								</div>
							</div>
						</div>
					</div>
					)
				})}
			</div>
			</div>
		)
	},
});


registerBlockType('afasha/progress-level',{
	title:"Progress bar",
	description: 'Progress bar for skill.',
	category: 'afasha_theme',
	icon: 'chart-bar',
	supports: {
		html: true,
	},
	
	attributes:{
		percentage: {
			type:'string',
			default:"50%",
		},
	}
	,
	edit(props){
		return (
			<RichText key="editable"
			tagName="h2"
			placeholder="50%"
			value={ props.attributes.percentage }
			onChange={ (e)=>props.setAttributes({percentage:e}) } />
		)
	},
	save(props){
		return (<div className="meter nostrips frontend"><span style={"width: "+props.attributes.percentage} ></span></div>)
	},
});


registerBlockType('afasha/profile-modal',{
	title:"Profile Modal",
	description: 'Progress bar for skill.',
	category: 'afasha_theme',
	icon: 'chart-bar',
	supports: {
		html: true,
	},

	attributes:{
		name: {
			type:'string',
			default:"John Doe",
		},
		caption: {
			type:'string',
			default:"am the goat",
		},

		url: {
			type:'string',
			default:"",
		},
	}
	,
	edit(props){
		return ([
			<InspectorControls style={ { marginBottom: '40px' } }>
			<PanelBody title={ 'Background Image Settings' }>
				<p><strong>Select a Background Image:</strong></p>
				<MediaUpload
					onSelect={ (e)=>props.setAttributes({url:e.sizes.full.url}) }
					type="image"
					value={ props.attributes.url }
					render={ ( { open } ) => (
						<IconButton
							className="editor-media-placeholder__button is-button is-default is-large"
							icon="upload"
							onClick={ open }>
							 Background Image
						</IconButton>
					)}/>
			</PanelBody>
		</InspectorControls>
			,
		<div>
			<div class="team-post">
				<img alt={props.attributes.name} src={props.attributes.url} />
				<div class="team-hover">
					<div class="team-data">
					<RichText key="editable"
						tagName="h2"
						placeholder="50%"
						value={ props.attributes.name }
						onChange={ (e)=>props.setAttributes({name:e}) } />
						<RichText key="editable"
						tagName="span"
						placeholder={ props.attributes.caption }
						value={ props.attributes.caption }
						onChange={ (e)=>props.setAttributes({caption:e}) } />
					</div>
				</div>
			</div>											
		</div>,]
		)
	},
	save(props){
		return (
			<div>
				<div class="team-post">
					<img alt={props.attributes.name} src={props.attributes.url} />
					<div class="team-hover">
						<div class="team-data">
							<h3>{props.attributes.name}</h3>
							<span>{props.attributes.caption}</span>
						</div>
					</div>
				</div>											
			</div>
		)
	},
});


registerBlockType('afasha/service-item',{
	title:"Service Item",
	description: 'Progress bar for skill.',
	category: 'afasha_theme',
	icon: 'chart-bar',
	supports: {
		html: true,
	},

	attributes:{
		icon: {
			type:'string',
			default:"fa fa-coffee",
		},
		name: {
			type:'string',
			default:"Coding",
		},

	},
	edit(props){
		return (
			<div class="service-item">
			<i class={"fa fa-"+props.attributes.icon}></i>
			<RichText key="editable"
			tagName="p"
			placeholder="FontAwesome Icon Name"
			value={ props.attributes.icon }
			onChange={ (e)=>props.setAttributes({icon:e}) } />
			<div class="serv-border"></div>
			<RichText key="editable"
			tagName="h3"
			placeholder="Title"
			value={ props.attributes.name }
			onChange={ (e)=>props.setAttributes({name:e}) } />
		</div>
		)
	},
	save(props){
		return (
				<div class="service-item">
					<i class={props.attributes.icon}></i>
					<div class="serv-border"></div>
					<h3>{props.attributes.name}</h3>
				</div>
		)
	},
});