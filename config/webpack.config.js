
console.log('test');
const path = require('path');


module.exports = {
    mode: 'development',
    entry: {
        main: path.resolve(__dirname, './common/index.js'),
    },
    output: {
        path: path.resolve(__dirname, './build'),
        filename: '[name].bundle.js',
    },
}