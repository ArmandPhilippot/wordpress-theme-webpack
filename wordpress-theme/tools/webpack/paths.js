const path = require( 'path' );
const devFolder = path.resolve( __dirname, '../../src/' );

module.exports = {
	src: {
		fonts: path.resolve( devFolder, './fonts/' ),
		img: path.resolve( devFolder, './images/' ),
		styles: {
			editor: path.resolve( devFolder, './scss/editor.scss' ),
			style: path.resolve( devFolder, './scss/style.scss' ),
			print: path.resolve( devFolder, './scss/print.scss' ),
		},
		scripts: {
			editor: path.resolve( devFolder, './js/editor.js' ),
			footer: path.resolve( devFolder, './js/footer.js' ),
			header: path.resolve( devFolder, './js/header.js' ),
		},
	},
	dist: path.resolve( devFolder, '../assets/' ),
	files: [ path.resolve( devFolder, '../**/*.php' ) ],
	sassPaths: [
		path.resolve( devFolder, '../node_modules/modern-normalize/' ),
	],
};
