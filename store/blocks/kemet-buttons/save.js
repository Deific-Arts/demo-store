/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { RichText, useBlockProps, InnerBlocks } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
const Save = ({attributes}) => {
	const { marginTop, marginRight, marginBottom, marginLeft } = attributes;

	const style = {
		marginTop: marginTop,
		marginRight: marginRight,
		marginBottom: marginBottom,
		marginLeft: marginLeft,
	};

    return (
      <div style={style}>
        <InnerBlocks.Content />
			</div>
    );
}

export default Save;
