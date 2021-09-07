/**
 * zip.js
 *
 * Generate a zip archive of your theme directory without development files.
 * Paths must be relative to the theme root.
 */
const archiver = require( 'archiver' );
const dotenv = require( 'dotenv' );
const dotenvExpand = require( 'dotenv-expand' );
const fs = require( 'fs' );
const path = require( 'path' );
const slugify = require( './utils/slugify' );

// Load environment variables
const myDotenv = dotenv.config();

if ( myDotenv.error ) {
	throw myDotenv.error;
}

dotenvExpand( myDotenv );

/**
 * Create a zip archive of the theme excluding dev files.
 *
 * @return {Promise} The zip archive.
 */
const zipTheme = () => {
	const themeName = slugify( process.env.WP_THEME_NAME );
	const dest = path.resolve( __dirname, '../' + themeName + '.zip' );
	const output = fs.createWriteStream( dest );
	const archive = archiver( 'zip', {
		zlib: { level: 9 }, // Compression level.
	} );
	const ignore = [
		'node_modules/**',
		'src/**',
		'tools/**',
		'vendor/**',
		'*.log',
		'*.lock',
		'*.zip',
		'.git/**',
		'.husky/**',
		'.browserslistrc',
		'.commitlintrc.json',
		'.editorconfig',
		'.env',
		'.env.*',
		'.eslintignore',
		'.eslintrc.js',
		'.gitignore',
		'.prettierrc.js',
		'.stylelintignore',
		'.stylelintrc.json',
		'.versionrc',
		'babel.config.json',
		'lint-staged.config.js',
		'package-lock.json',
		'phpcs.xml',
		'postcss.config.js',
		'webpack.config.js',
	];

	return new Promise( ( resolve, reject ) => {
		archive
			.glob( '**', {
				ignore,
			} )
			.on( 'error', ( err ) => reject( err ) )
			.pipe( output );
		output.on( 'close', () => resolve() );
		archive.finalize();
	} );
};

zipTheme();
