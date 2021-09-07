/**
 * init.js
 *
 * Automate the search and replace to init your theme. Replacement values are
 * loaded from your .env file.
 */
const path = require( 'path' );
const replace = require( 'replace-in-file' );
const dotenv = require( 'dotenv' );
const dotenvExpand = require( 'dotenv-expand' );

// Load environment variables
const myDotenv = dotenv.config();

if ( myDotenv.error ) {
	throw myDotenv.error;
}

dotenvExpand( myDotenv );

const replacementMap = new Map();
replacementMap.set( 'Your theme name', process.env.WP_THEME_NAME );
replacementMap.set(
	'Your theme description.',
	process.env.WP_THEME_DESCRIPTION
);
replacementMap.set(
	'WP.org Username1, WP.org Username2',
	process.env.WP_THEME_CONTRIBUTORS
);
replacementMap.set( 'Company Name', process.env.WP_THEME_TEAM_NAME );
replacementMap.set( 'contact@email.com', process.env.WP_THEME_TEAM_EMAIL );
replacementMap.set(
	'https://www.companyWebsite.com/',
	process.env.WP_THEME_TEAM_URL
);
replacementMap.set(
	'Firstname Lastname',
	process.env.WP_THEME_CONTRIBUTOR_NAME
);
replacementMap.set( 'your@email.com', process.env.WP_THEME_CONTRIBUTOR_EMAIL );
replacementMap.set( 'yourTextDomain', process.env.WP_THEME_TEXT_DOMAIN );
replacementMap.set( 'https://github.com/your/repo', process.env.WP_THEME_REPO );
replacementMap.set( 'your-vendor-name', process.env.WP_THEME_VENDOR_NAME );
replacementMap.set(
	'Your-Package-Name',
	process.env.WP_THEME_PACKAGE_CAPITALIZE
);
replacementMap.set(
	'your-package-name',
	process.env.WP_THEME_PACKAGE_CAPITALIZE.toLowerCase()
);
replacementMap.set( 'YourPrefix', process.env.WP_THEME_PREFIX_PASCALCASE );
replacementMap.set(
	'yourprefix',
	process.env.WP_THEME_PREFIX_PASCALCASE.toLowerCase()
);
replacementMap.set(
	'YOURPREFIX',
	process.env.WP_THEME_PREFIX_PASCALCASE.toUpperCase()
);
replacementMap.set( '2021', process.env.WP_THEME_COPYRIGHT_YEAR );

const files = [
	path.join( __dirname, '../*.php' ),
	path.join( __dirname, '../inc/*.php' ),
	path.join( __dirname, '../template-parts/**/*.php' ),
	path.join( __dirname, '../src/scss/abstracts/_variables.scss' ),
	path.join( __dirname, '../composer.json' ),
	path.join( __dirname, '../package.json' ),
	path.join( __dirname, '../phpcs.xml' ),
	path.join( __dirname, '../README.md' ),
	path.join( __dirname, '../readme.txt' ),
];

// Values will be replaced sequentially so we can build two arrays from the map.
// See: https://github.com/adamreisnz/replace-in-file#multiple-values-with-the-same-replacement
const from = [];
const to = [];

for ( const [ key, value ] of replacementMap.entries() ) {
	from.push( new RegExp( key, 'g' ) );
	to.push( value );
}

const options = {
	files,
	from,
	to,
	countMatches: true,
};

replace( options )
	.then( ( results ) => {
		results.forEach( ( result ) => {
			let changes;
			if ( result.hasChanged ) {
				changes = result.numReplacements > 1 ? 'changes' : 'change';
				console.log(
					result.numReplacements +
						' ' +
						changes +
						' in ' +
						result.file
				);
			}
		} );
	} )
	.catch( ( error ) => {
		console.error( 'Error occurred:', error );
	} );
