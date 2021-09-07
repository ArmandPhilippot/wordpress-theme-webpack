const paths = require( './paths' );

const CssMinimizerPlugin = require( 'css-minimizer-webpack-plugin' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );

module.exports = {
	mode: 'production',
	devtool: false,
	optimization: {
		minimizer: [ new CssMinimizerPlugin(), '...' ],
	},
	module: {
		rules: [
			{
				test: /\.(sa|sc|c)ss$/i,
				use: [
					{
						loader: MiniCssExtractPlugin.loader,
					},
					'css-loader',
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: [ 'autoprefixer' ],
							},
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
						},
					},
				],
			},
		],
	},
	plugins: [ new MiniCssExtractPlugin() ],
};
