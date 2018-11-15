'use strict';

module.exports = {
	css: [ // mengambil semua file css yang akan dicompress menjadi file dengan nama yang ada di `.dest.path`+'css/'+`.dest.css`
		'css/style_def.css',
		'css/style_additional.css' //Uncomment if project Ended
	],
	js: [ // mengambil semua file js yang akan dicompress menjadi file dengan nama yang ada di `.dest.path`+'js/'+`.dest.js`
		'js/script_def.js',
		'js/image_viewer.js',
		'js/script_additional.js' //Uncomment if project Ended
	],
	source: __dirname+"/", // menentukan doc_root yang akan di compress jika dinamis isikan saja __dirname+"/"
	dest: {
		path: __dirname+ "/", // menentukan path tujuan
		css: "style_custom.css", // menentukan nama hasil compress dari semua css dan scss
		js: "script_custom.js" // menentukan nama hasil compress dari semua file js
	},
	jscompress : 2, // 1=uglify, 2=packer
	watch : 1 // 1=recompile when changes, 0=compile only
}
