'use strict';

module.exports = {
	css: [
		'html/bootstrap-3.3/bootstrap.css', 
		'html/fonts/fontawesome-4.7.0.css', 
		'html/fonts/glyphicon-bootstrap-3.0.css', 
		'html/daterangepicker/daterangepicker.css', 
		'html/datatables-1.10.16/datatables.css', 
		'html/print.js-1.0.37/print.min.css', 
		// 'css/template.css', 
	],
	js: [
		'html/jquery-3.3.1/jquery-3.3.1.js', 
		'html/bootstrap-3.3/bootstrap.js', // jquery
		'html/print.js-1.0.37/print.min.js', 
		'html/moment.js-2.22/moment.js', 
		'html/daterangepicker/daterangepicker.js', // jquery, moment, bootstrap
		// 'js/template.js', 
	],
	source: __dirname+"/", // menentukan doc_root yang akan di compress jika dinamis isikan saja __dirname+"/"
	dest: {
		path: __dirname+ "/", // menentukan path tujuan
		css: "style_def.css", // menentukan nama hasil compress dari semua css dan scss
		js: "script_def.js" // menentukan nama hasil compress dari semua file js
	},
	jscompress : 2, // 1=uglify, 2=packer
	watch : 1 // 1=recompile when changes, 0=compile only
}