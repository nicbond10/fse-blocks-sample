import { useBlockProps, RichText } from '@wordpress/block-editor';

export default function save({ attributes }) {
    const { title, description, imageUrl, imageAlt } = attributes;

    return (
        <div {...useBlockProps.save({ className: 'kanopi-card' })}>
            {imageUrl && <img src={imageUrl} alt={imageAlt || ''} />}
			<div className="kanopi-card-text">
				{title && <RichText.Content tagName="h3" value={title} />}
				{description && <RichText.Content tagName="p" value={description} />}
			</div>
        </div>
    );
}
