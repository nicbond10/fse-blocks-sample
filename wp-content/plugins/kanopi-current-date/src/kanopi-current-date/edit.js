import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	const today = new Date();
	const formattedDate = today.toLocaleDateString(undefined, {
		year: 'numeric',
		month: 'long',
		day: 'numeric',
	});

	return (
		<p {...useBlockProps()}>
			{formattedDate}
		</p>
	);
}