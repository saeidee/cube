module.exports = {
    "env": {
        "browser": true,
        "commonjs": true,
        "es6": true
    },
    "extends": [
        "eslint:recommended",
        "plugin:vue/recommended"
    ],
    "overrides": [
        {
            "files": ["*.vue"],
            "rules": {
                "vue/name-property-casing": ["error", "kebab-case"],
                "vue/max-attributes-per-line": [0, {
                    "multiline": {
                        "allowFirstLine": true
                    }
                }]
            }
        }
    ],
    "parserOptions": {
        "parser": "babel-eslint",
        "ecmaVersion": 2017,
        "sourceType": "module"
    },
    "rules": {
        "indent": [
            "error",
            "tab",
            { "ObjectExpression": 1 }
        ],
        "linebreak-style": [
            "error",
            "unix"
        ],
        "quotes": [
            "error",
            "single"
        ],
        "semi": [
            "error",
            "always"
        ],
        "brace-style": [
            "error", "1tbs"
        ],
        "keyword-spacing": "error",
        'arrow-parens': 0,
        'generator-star-spacing': 0,
        "no-console": 0,
        "space-before-function-paren": 0,
        "space-before-blocks": "error",
        "allowFirstLine": true,
        "quotes": [2, "single", {
            avoidEscape: true,
            allowTemplateLiterals: true
        }],
        "no-mixed-spaces-and-tabs": [0, "smart-tabs"]
    }
};
