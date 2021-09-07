const { merge } = require( 'webpack-merge' );
const common = require( './tools/webpack/webpack.common' );
const dev = require( './tools/webpack/webpack.dev' );
const prod = require( './tools/webpack/webpack.prod' );

const isProduction = process.env.NODE_ENV === 'production';

module.exports = () => {
	if ( isProduction ) {
		return merge( common, prod );
	}
	return merge( common, dev );
};
