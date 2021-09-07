module.exports = {
	root: true,
	env: {
		browser: true,
		commonjs: true,
		es6: true,
		node: true,
	},
	extends: [ 'plugin:@wordpress/eslint-plugin/recommended-with-formatting' ],
	rules: {
		'@wordpress/no-unused-vars-before-return': 'error',
	},
	overrides: [
		{
			files: [ './tools/**' ],
			rules: {
				'no-console': 'off',
			},
		},
	],
	settings: {
		'import/resolver': {
			node: {
				extensions: [
					'.js',
					'.jsx',
				],
			},
		},
	},
};
