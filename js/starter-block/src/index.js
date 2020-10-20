import { registerBlockType } from '@wordpress/blocks';
import { MediaPlaceholder } from '@wordpress/editor';
import { __ } from '@wordpress/i18n';
import './style.scss';
import save from './save';

registerBlockType('afasha/project-gallery', {
	title: 'Project Gallery',
	description: 'Project Gallery built for afasha theme.',
	category: 'media',
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
		console.log(props)
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