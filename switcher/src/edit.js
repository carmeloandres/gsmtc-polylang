/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';



export default function Edit() {
	const blockProps = useBlockProps();
	
	return (
		<>
            <ul>
                <li>bandera - 1</li>
                <li>bandera - 2</li>
            </ul>
		</>
	);
}
