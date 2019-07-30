// @see ./node_modules/stylelint-config-suitcss/index.js for default rules

module.exports = {
    extends: [
        // 'stylelint-config-suitcss'
    ],
    plugins: [
        // 'stylelint-scss',
        // 'stylelint-suitcss'
    ],
    rules: {
        'at-rule-empty-line-before': null,
        'at-rule-name-space-after': 'always',
        'function-max-empty-lines': null,
        indentation: 4,
        'rule-empty-line-before': [
            'always', {
                except: ['first-nested'],
                ignore: ['after-comment']
            }
        ]
    }
};
