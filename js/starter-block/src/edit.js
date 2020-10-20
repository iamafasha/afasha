import { __ } from '@wordpress/i18n';
import './editor.scss';
export default function edit({ atrributes}) {
	return (
		<div class="row">
          <MediaPlaceholder
            icon="format-gallery"
            className='hello'
            labels={ {
			  title:  'Project Gallery',
			  instructions:'Upload or select images to be displayed'
			} }
			value={atrributes.images}
			allowedTypes = { [ 'image' ] }
			onSelect={()=>console.log("uploded")}
            type="images"
			multiple = {true}
          />
		</div>
	);
}
