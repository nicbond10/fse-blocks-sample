import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
    const { title, description, imageUrl, imageAlt } = attributes;

    return (
        <div {...useBlockProps({ className: 'kanopi-card' })}>
			<MediaUploadCheck>
				<MediaUpload
					onSelect={media =>
						setAttributes({ imageUrl: media.url, imageAlt: media.alt })
					}
					allowedTypes={['image']}
					value={imageUrl}
					render={({ open }) => (
						<Button className="kanopi-card-image-button" onClick={open}>
							{imageUrl ? <img src={imageUrl} alt={imageAlt || ''} /> : 'Select Image'}
						</Button>
					)}
				/>
			</MediaUploadCheck>

			<div className="kanopi-card-text">
				<RichText
					tagName="h3"
					placeholder="Card Title…"
					value={title}
					onChange={value => setAttributes({ title: value })}
					className="kanopi-card-title"
				/>
				<RichText
					tagName="p"
					placeholder="Card Description…"
					value={description}
					onChange={value => setAttributes({ description: value })}
					className="kanopi-card-description"
				/>
			</div>
		</div>
    );
}
