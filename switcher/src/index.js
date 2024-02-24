
import { registerBlockType } from '@wordpress/blocks';


/**
 * Internal dependencies
 */
import Edit from './edit';
import icons from '../icons.js'
import './main.css';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType('gsmtc-pll/gsmtc-switcher', {
	icon:{
		src: icons.primary
	},
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

});
