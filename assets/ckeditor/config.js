/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */


var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;
var pathArray = window.location.pathname.split( '/' );
var firstseg = '';
var locationdir='';
if(window.location.host=="localhost"){
    firstseg = pathArray[1];
        locationdir = '/'+firstseg+'/assets/kcfinder'
}else{
   locationdir = '/assets/kcfinder'
}

var newPathname = "";
for ( i = 0; i < pathArray.length; i++ ) {
  newPathname += "/";
  newPathname += pathArray[i];
}

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	 config.toolbar_Full =
        [
            { name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
            { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
            { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
            { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',
                'HiddenField' ] },
            '/',
            { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
                '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
            { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
            { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
            '/',
            { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
            { name: 'colors', items : [ 'TextColor','BGColor' ] },
            { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
        ];

    config.toolbar_Basic =
        [
            ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','TextColor','BGColor' ,'Image', 'Smiley']
        ];

    // ...
   // config.filebrowserBrowseUrl = locationdir+'/browse.php?type=files';
   // config.filebrowserImageBrowseUrl = locationdir+'/browse.php?type=images';
   // config.filebrowserFlashBrowseUrl = locationdir+'/browse.php?type=flash';
   config.filebrowserUploadUrl = locationdir+'/upload.php?type=files';
   config.filebrowserImageUploadUrl = locationdir+'/upload.php?type=images';
   config.filebrowserFlashUploadUrl = locationdir+'/upload.php?type=flash';
// ...
};
