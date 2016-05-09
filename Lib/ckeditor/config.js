/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = 'http://ciproject.com/Lib/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = 'http://ciproject.com/Lib/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl = 'http://ciproject.com/Lib/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = 'http://ciproject.com/Lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl = 'http://ciproject.com/Lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl = 'http://ciproject.com/Lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
