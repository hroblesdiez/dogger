
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const isProduction = process.env.NODE_ENV === 'production';
const CopyPlugin = require("copy-webpack-plugin");
const stylesHandler = MiniCssExtractPlugin.loader;
const DIST = path.resolve( __dirname, 'dist' );
const entry = {
  index: './src/index.js',
  editor: './src/editor.js',
};

const config  = {
  entry: entry,
  output: {
    path: DIST,
    filename: '[name].js',
    clean: true,
  },
  plugins: [
    new MiniCssExtractPlugin(),
    new CopyPlugin({
      patterns: [
        { from: "src/library", to: DIST },
      ],
    }),
  ],
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/i,
        loader: 'babel-loader',
      },
      {
        test: /\.(scss|css)$/i,
        use: [stylesHandler, 'css-loader', 'postcss-loader', 'sass-loader'],
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
        type: 'asset',
      },
    ],
  },
};

module.exports = () => {
  if (isProduction) {
    config.mode = 'production';
  } else {
    config.mode = 'development';
  }
  return config;
};