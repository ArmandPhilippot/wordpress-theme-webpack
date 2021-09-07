/**
 * translate.js
 *
 * Generate a pot files in languages folder.
 */
const dotenv = require( 'dotenv' );
const dotenvExpand = require( 'dotenv-expand' );
const wpPot = require( 'wp-pot' );

// Load environment variables
const myDotenv = dotenv.config();

if ( myDotenv.error ) {
	throw myDotenv.error;
}

dotenvExpand( myDotenv );

const options = {
	bugReport: process.env.WP_THEME_REPO + '/issues',
	destFile: './languages/' + process.env.WP_THEME_TEXT_DOMAIN + '.pot',
	domain: process.env.WP_THEME_TEXT_DOMAIN,
	lastTranslator: process.env.WP_THEME_LAST_TRANSLATOR,
	package: process.env.WP_THEME_PACKAGE_CAPITALIZE,
	src: [ '**/*.php', '!vendor/**/*.php' ],
	team: process.env.WP_THEME_TRANSLATION_TEAM,
};

wpPot( options );
