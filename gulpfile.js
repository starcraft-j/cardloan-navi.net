
"use strict";
import pkg from 'gulp';
const { src, dest, watch, series } = pkg;
import ftp from 'vinyl-ftp';
import imagemin from 'gulp-imagemin';
import plumber from 'gulp-plumber'
import sassGlob from 'gulp-sass-glob'
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import webp from 'gulp-webp';
import autoprefixer from 'gulp-autoprefixer';
import gulpBabel from 'gulp-babel';
import uglify from 'gulp-uglify';
import rename from 'gulp-rename';

const sass = gulpSass(dartSass);

const connect = ftp.create({
  host: 'sv1231.xserver.jp',
  user: 'dc@cardloan-navi.net',
  password: 'Dqw4t5r322~1_5!!',
  port: 21,
})
const ftpUploadFiles = [
  '*.php',
]
const ftpUploadFilesInc = [
  './inc/*.php',
]
const ftpUploadFilesTag = [
  './tag/*.php',
]
const ftpUploadFilesParts = [
  './inc/parts/*.php',
]
const ftpUploadFilesPartsNew = [
  './parts/*.php',
]
const ftpUploadFilesJs = [
  './assets/js/*.js',
]
const ftpUploadFilesCss = [
  'assets/css/*.css',
]
const ftpUploadFilesNewCommon = [
  'assets/dist/_common/*.webp',
]
const ftpUploadFilesNewFront = [
  'assets/dist/front/*.webp',
]
const remoteDistDir = '/cardloan-navi.net/public_html/wp-content/themes/cardloan'
const remoteDistDirInc = remoteDistDir + '/inc'
const remoteDistDirTag = remoteDistDir + '/tag'
const remoteDistDirParts = remoteDistDir + '/parts'
const remoteDistDirIncParts = remoteDistDirInc + '/parts'
const remoteDistDirCss = remoteDistDir + '/assets/css/'
const remoteDistDirJs = remoteDistDir + '/assets/js/'
const remoteDistDirCommon = remoteDistDir + '/assets/dist/_common/'
const remoteDistDirFront = remoteDistDir + '/assets/dist/front/'

const vinylFtp = () => {
  return src(ftpUploadFiles, { buffer: false })
    .pipe(connect.newerOrDifferentSize(remoteDistDir))
    .pipe(connect.dest(remoteDistDir))
}
const vinylFtpInc = () => {
  return src(ftpUploadFilesInc, { buffer: false })
    .pipe(connect.newerOrDifferentSize(remoteDistDirInc))
    .pipe(connect.dest(remoteDistDirInc))
}
const vinylFtpTag = () => {
  return src(ftpUploadFilesTag, { buffer: false })
    .pipe(connect.newerOrDifferentSize(remoteDistDirTag))
    .pipe(connect.dest(remoteDistDirTag))
}
const vinylFtpParts = () => {
  return src(ftpUploadFilesParts, { buffer: false })
    .pipe(connect.newerOrDifferentSize(remoteDistDirParts))
    .pipe(connect.dest(remoteDistDirParts))
}
const vinylFtpIncParts = () => {
  return src(ftpUploadFilesPartsNew, { buffer: false })
    .pipe(connect.newerOrDifferentSize(remoteDistDirIncParts))
    .pipe(connect.dest(remoteDistDirIncParts))
}
const vinylFtpCss = () => {
  return src(ftpUploadFilesCss, { buffer: false })
  .pipe(connect.newerOrDifferentSize(remoteDistDirCss))
  .pipe(connect.dest(remoteDistDirCss))
}
const vinylFtpJs = () => {
  return src(ftpUploadFilesJs, { buffer: false })
  .pipe(connect.newerOrDifferentSize(remoteDistDirJs))
  .pipe(connect.dest(remoteDistDirJs))
}
const vinylFtpCommon = () => {
  return src(ftpUploadFilesNewCommon, { buffer: false })
    .pipe(connect.newerOrDifferentSize(remoteDistDirCommon))
    .pipe(connect.dest(remoteDistDirCommon))
}
const vinylFtpFront = () => {
  return src(ftpUploadFilesNewFront, { buffer: false })
    .pipe(connect.newerOrDifferentSize(remoteDistDirFront))
    .pipe(connect.dest(remoteDistDirFront))
}


const styles = () =>
  src("./assets/scss/*.scss")
    .pipe(plumber())
    .pipe(sassGlob())
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer())
    .pipe(dest("./assets/css"));


const imageNew = () =>
  src("./assets/img/**/*")
    .pipe(imagemin())
    .pipe(webp())
    .pipe(dest("./assets/dist"))


const jsMinify = () => {
  return src("assets/js/init.js")
    .pipe(gulpBabel({
      presets: ['@babel/preset-env']
    }))
    .pipe(plumber())
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest("assets/js/"))
};


const watchFile = () => {
  watch("sass/*.scss", styles)
  watch("assets/scss/**/*.scss", styles)
  watch("./assets/img/**/*", imageNew);
  watch("assets/js/init.js", jsMinify);
  watch(ftpUploadFiles, vinylFtp);
  watch(ftpUploadFilesInc, vinylFtpInc);
  watch(ftpUploadFilesTag, vinylFtpTag);
  watch(ftpUploadFilesParts, vinylFtpParts);
  watch(ftpUploadFilesPartsNew, vinylFtpIncParts);
  watch(ftpUploadFilesJs, vinylFtpJs);
  watch(ftpUploadFilesCss, vinylFtpCss);
  watch(ftpUploadFilesNewCommon, vinylFtpCommon);
  watch(ftpUploadFilesNewFront, vinylFtpFront);
}

export default series(watchFile)
