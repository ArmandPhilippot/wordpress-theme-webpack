module.exports = {
	'!(assets)/**/*.js': [ 'eslint --cache --fix' ],
	'**/*.scss': [ 'stylelint --fix --syntax=scss', 'prettier --write' ],
	'*.md': 'prettier --write',
};
