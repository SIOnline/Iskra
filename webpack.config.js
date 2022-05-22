'use strict';

const path = require('path');
const glob = require('glob');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const AssetsPlugin = require('assets-webpack-plugin');
const FriendlyErrorsPlugin = require('friendly-errors-webpack-plugin');

const paths = {
    appBuild: path.resolve(__dirname, './theme/build/'),
    appCommon: path.resolve(__dirname, './theme/common'),
    appBlocks: path.resolve(__dirname, './theme/src/Blocks'),
    appComponents: path.resolve(__dirname, './theme/src/Components'),
    appTheme: path.resolve(__dirname, './theme/'),
};

let items = {};

items['Global'] = [
    paths.appCommon + '/main.js',
    paths.appCommon + '/main.scss'
];

items['Editor'] = [
    paths.appCommon + '/editor.js',
    paths.appCommon + '/editor.scss'
];

glob.sync('theme/src/Blocks/**/*.js*').forEach(function (filePath) {
    var extension = path.extname(filePath);
    var file = path.basename(filePath, extension);
    var fileRelativePath = paths.appBlocks + '/' + file + '/' + file;
    items['Block-' + file] = [fileRelativePath + '.js'];
    items['Block-' + file] = [fileRelativePath + '.scss'];
});

glob.sync('theme/src/Components/**/*.js*').forEach(function (filePath) {
    var extension = path.extname(filePath);
    var file = path.basename(filePath, extension);
    var fileRelativePath = paths.appComponents + '/' + file + '/' + file;
    items['Component-' + file] = [fileRelativePath + '.js'];
    items['Component-' + file] = [fileRelativePath + '.scss'];
});


module.exports = {
    entry: items,
    bail: true,
    stats: 'summary',
    module: {
        rules: [

            {
                test: /\.css$/i,
                use: ["css-loader"],
            },

            {
                test: /\.scss$/,
                exclude: /node_modules/,
                include: paths.appTheme,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'sass-loader'
                    }
                ]
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                include: paths.appTheme,
                use: ['babel-loader']
            },
            {
                test: /\.(png|svg|jpg|gif)$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            outputPath: "../build/images",
                            esModule: false
                        }
                    }
                ]
            },
            {
                test: /\.(ttf|otf|eot|woff2|woff)$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            outputPath: "../build/fonts",
                            esModule: false
                        }
                    }
                ]
            }
        ]
    },

    output: {
        path: paths.appBuild,
        filename: "[name].js",
        clean: true
    },

    plugins: [

        new MiniCssExtractPlugin({
            filename: '[name].css'
        }),

        new AssetsPlugin({
            path: paths.appTheme,
            filename: 'assets.json',
            fullPath: false,
            prettyPrint: true
        }),

        new FriendlyErrorsPlugin({
            compilationSuccessInfo: {
                messages: ['Use: \n    [yarn start] to develop, \n    [yarn block] to create a new block \n    [yarn dist] to generate production optimised files\n'],
            },
            clearConsole: true
        }),

    ],
}            
