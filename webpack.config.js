const path = require ( 'path' );
const MiniCssExtractPlugin = require ( 'mini-css-extract-plugin' );
const { CleanWebpackPlugin } = require ( 'clean-webpack-plugin' );

const JS_DIR = path.resolve ( __dirname, 'src');
const BUILD_DIR = path.resolve ( __dirname, 'build');

const entry = {
    main: JS_DIR + '/main.js',
};
const output = {
    path: BUILD_DIR,
    filename: '[name].js',
};

const rules = [
    {
        test: /\.js$/,
        include: [JS_DIR],
        exclude: /node_modules/,
        use: 'babel-loader',
    },

    {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
    },

    {

    }
];

const plugins =  [
    new CleanWebpackPlugin (),
    new MiniCssExtractPlugin ({
        filename: '[name].css',
    }),
];

module.exports = ( env, argv ) => ({

    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules,
    },
    plugins: plugins,

});