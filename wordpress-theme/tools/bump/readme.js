/**
 * readme.js
 *
 * Copy package.json version into readme.txt file.
 */
const fs = require( 'fs' );

// Load package.json data.
const packageJson = JSON.parse( fs.readFileSync( './package.json' ) );
const packageVersion = packageJson.version;

module.exports = {
	files: 'readme.txt',
	from: new RegExp(
		'Stable tag: (0|[1-9]\\d*)\\.(0|[1-9]\\d*)\\.(0|[1-9]\\d*)(?:-((?:0|[1-9]\\d*|\\d*[a-zA-Z-][0-9a-zA-Z-]*)(?:\\.(?:0|[1-9]\\d*|\\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?(?:\\+([0-9a-zA-Z-]+(?:\\.[0-9a-zA-Z-]+)*))?',
		'g'
	),
	to: 'Stable tag: ' + packageVersion,
};
