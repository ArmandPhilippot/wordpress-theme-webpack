/**
 * screenshot.js
 *
 * Generate a screenshot (1200x900) of your homepage using Firefox and the URL
 * defined in your .env file.
 */
const dotenv = require( 'dotenv' );
const dotenvExpand = require( 'dotenv-expand' );
const playwright = require( 'playwright-firefox' );

// Load environment variables
const myDotenv = dotenv.config();

if ( myDotenv.error ) {
	throw myDotenv.error;
}

dotenvExpand( myDotenv );

/**
 * Generate a screenshot of homepage.
 */
const takeScreenshot = async () => {
	const url =
		process.env.WP_THEME_PROTOCOL + '://' + process.env.WP_THEME_HOST;
	const browser = await playwright.firefox.launch();
	const context = await browser.newContext( {
		ignoreHTTPSErrors: true,
		viewport: { width: 1200, height: 900 },
	} );
	const page = await context.newPage();
	await page.goto( url );
	await page.screenshot( {
		clip: { x: 0, y: 0, width: 1200, height: 900 },
		path: 'screenshot.png',
	} );
	await browser.close();
};

takeScreenshot();
