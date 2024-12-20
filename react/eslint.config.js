import js from '@eslint/js';
import globals from 'globals';
import reactHooks from 'eslint-plugin-react-hooks';
import reactRefresh from 'eslint-plugin-react-refresh';
import { configs as tsConfigs } from '@typescript-eslint/eslint-plugin';

export default [
    {
        ignores: ['dist'], // Ignore the dist folder
    },
    {
        extends: [
            js.configs.recommended, // Base JS recommendations
            ...tsConfigs.recommended, // TypeScript recommendations
        ],
        files: ['**/*.{ts,tsx}'], // Apply to TypeScript files
        languageOptions: {
            ecmaVersion: 2020, // Specify ECMAScript version
            globals: globals.browser, // Use browser globals
            parser: '@typescript-eslint/parser', // Use TypeScript parser
            sourceType: 'module', // Allow ES module syntax
        },
        plugins: {
            'react-hooks': reactHooks, // Add react-hooks plugin
            'react-refresh': reactRefresh, // Add react-refresh plugin
        },
        rules: {
            ...reactHooks.configs.recommended.rules, // React hooks recommended rules
            'react-refresh/only-export-components': [
                'warn',
                { allowConstantExport: true }, // Custom rule for react-refresh
            ],
        },
    },
];
