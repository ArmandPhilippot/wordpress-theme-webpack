const paths = require( './paths' );

require( 'dotenv' ).config();

const protocol = process.env.WP_THEME_PROTOCOL;
const host = process.env.WP_THEME_HOST;
const port = process.env.WP_THEME_PORT;
const siteURL = protocol + '://' + host + ':' + port + '/';
const openIsBoolean = process.env.WP_THEME_OPEN === 'true' || process.env.WP_THEME_OPEN === 'false';
const isHotReload = process.env.WP_THEME_HOT_RELOAD === 'true';
const isHttps = protocol === 'https';

module.exports = {
	mode: 'development',
	module: {
		rules: [
			{
				test: /\.(sa|sc|c)ss$/i,
				use: [
					'style-loader',
					{
						loader: 'css-loader',
						options: {
							importLoaders: 2,
							sourceMap: true,
						},
					},
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: [ 'autoprefixer' ],
							},
							sourceMap: true,
						},
					},
					{
						loader: 'sass-loader',
						options: {
							implementation: require( 'sass' ),
							sassOptions: {
								indentWidth: 2,
								outputStyle: 'expanded',
								includePaths: paths.sassPaths,
							},
							sourceMap: true,
						},
					},
				],
			},
		],
	},
	devServer: {
		client: {
			overlay: {
				warnings: true,
				errors: true,
			},
		},
		devMiddleware: {
			writeToDisk: true,
		},
		host,
		hot: isHotReload,
		https: ! isHttps
			? false
			: {
				key: process.env.WP_THEME_HTTPS_KEY,
				cert: process.env.WP_THEME_HTTPS_CERT,
			},
		liveReload: true,
		open: openIsBoolean
			? process.env.WP_THEME_OPEN
			: {
				app: {
					name: process.env.WP_THEME_OPEN,
				},
			},
		proxy: {
			'/': {
				target: siteURL,
				secure: false,
			},
		},
		static: false,
		watchFiles: paths.files,
	},
	devtool: 'inline-source-map',
};
