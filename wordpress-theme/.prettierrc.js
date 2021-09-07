module.exports = {
	...require('@wordpress/prettier-config'),
	overrides: [
		{
			files: ['*.scss', '*.css'],
			options: {
				parenSpacing: false,
				singleQuote: false,
			},
		},
	],
};
