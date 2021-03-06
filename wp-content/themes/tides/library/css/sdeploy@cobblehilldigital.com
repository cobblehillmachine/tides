/* normalize.css v2.1.0 | MIT License | git.io/normalize */
/* normalize.css v2.1.0 | HTML5 Display Definitions | MIT License | git.io/normalize */
/* line 20, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_html5.scss */
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
nav,
section,
summary {
  display: block;
}

/* line 28, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_html5.scss */
audio,
canvas,
video {
  display: inline-block;
}

/* line 39, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_html5.scss */
audio:not([controls]) {
  display: none;
  height: 0;
}

/* line 46, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_html5.scss */
[hidden] {
  display: none;
}

/* normalize.css v2.1.0 | Base | MIT License | git.io/normalize */
/* line 13, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_base.scss */
html {
  font-family: sans-serif;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
}

/* line 37, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_base.scss */
body {
  margin: 0;
}

/* normalize.css v2.1.0 | Links | MIT License | git.io/normalize */
/* line 9, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_links.scss */
a:focus {
  outline: thin dotted;
}

/* line 16, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_links.scss */
a:active,
a:hover {
  outline: 0;
}

/* normalize.css v2.1.0 | Typography | MIT License | git.io/normalize */
/* line 13, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
h1 {
  font-size: 2em;
  margin: 0.67em 0;
}

/* line 47, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
abbr[title] {
  border-bottom: 1px dotted;
}

/* line 54, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
b,
strong {
  font-weight: bold;
}

/* line 66, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
dfn {
  font-style: italic;
}

/* line 73, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
hr {
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  height: 0;
}

/* line 81, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
mark {
  background: #ff0;
  color: #000;
}

/* line 100, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
code,
kbd,
pre,
samp {
  font-family: monospace, serif;
  font-size: 1em;
}

/* line 110, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
pre {
  white-space: pre;
  white-space: pre-wrap;
  word-wrap: break-word;
}

/* line 118, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
q {
  quotes: "\201C" "\201D" "\2018" "\2019";
}

/* line 140, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
small {
  font-size: 80%;
}

/* line 147, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

/* line 154, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
sup {
  top: -0.5em;
}

/* line 158, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_typography.scss */
sub {
  bottom: -0.25em;
}

/* normalize.css v2.1.0 | Embedded Content | MIT License | git.io/normalize */
/* line 9, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_embeds.scss */
img {
  border: 0;
}

/* line 18, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_embeds.scss */
svg:not(:root) {
  overflow: hidden;
}

/* normalize.css v2.1.0 | Figures | MIT License | git.io/normalize */
/* line 9, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_figures.scss */
figure {
  margin: 0;
}

/* normalize.css v2.1.0 | Forms | MIT License | git.io/normalize */
/* line 17, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em;
}

/* line 30, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
legend {
  border: 0;
  padding: 0;
  white-space: normal;
}

/* line 49, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
button,
input,
select,
textarea {
  font-family: inherit;
  font-size: 100%;
  margin: 0;
}

/* line 63, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
button,
input {
  line-height: normal;
}

/* line 73, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
button,
select {
  text-transform: none;
}

/* line 90, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  -webkit-appearance: button;
  cursor: pointer;
}

/* line 101, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
button[disabled],
html input[disabled] {
  cursor: default;
}

/* line 113, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
input[type="checkbox"],
input[type="radio"] {
  box-sizing: border-box;
  padding: 0;
}

/* line 126, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
input[type="search"] {
  -webkit-appearance: textfield;
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box;
  box-sizing: content-box;
}

/* line 137, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}

/* line 144, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
button::-moz-focus-inner,
input::-moz-focus-inner {
  border: 0;
  padding: 0;
}

/* line 152, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_forms.scss */
textarea {
  overflow: auto;
  vertical-align: top;
}

/* normalize.css v2.1.0 | Tables | MIT License | git.io/normalize */
/* line 9, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-normalize-1.4.3/stylesheets/normalize/_tables.scss */
table {
  border-collapse: collapse;
  border-spacing: 0;
}

/* line 10, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/layout/_sticky-footer.scss */
html, body {
  height: 100%;
}

/* line 12, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/layout/_sticky-footer.scss */
#container {
  clear: both;
  min-height: 100%;
  height: auto !important;
  height: 100%;
  margin-bottom: -65px;
}
/* line 18, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/layout/_sticky-footer.scss */
#container #layout-footer {
  height: 65px;
}

/* line 20, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/layout/_sticky-footer.scss */
#footer {
  clear: both;
  position: relative;
  height: 65px;
}

/* line 154, tides/*.png */
.tides-sprite, .tides-active_sub_nav, .tides-close-button, .tides-closed_nav, .tides-eastwest_logo, .tides-eo_logo, .tides-footer_nav, .tides-inactive_sub_nav, .tides-logo, .tides-mobile-nav, .tides-nav-single-left, .tides-nav-single-right, .tides-news_left_nav, .tides-news_right_nav, .tides-slider_left_nav, .tides-slider_right_nav {
  background: url('../images/tides-s850aa1e7f8.png') no-repeat;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-active_sub_nav {
  background-position: 0 -705px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-close-button {
  background-position: 0 -411px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-closed_nav {
  background-position: 0 -672px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-eastwest_logo {
  background-position: 0 0;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-eo_logo {
  background-position: 0 -141px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-footer_nav {
  background-position: 0 -553px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-inactive_sub_nav {
  background-position: 0 -633px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-logo {
  background-position: 0 -55px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-mobile-nav {
  background-position: 0 -583px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-nav-single-left {
  background-position: 0 -311px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-nav-single-right {
  background-position: 0 -361px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-news_left_nav {
  background-position: 0 -461px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-news_right_nav {
  background-position: 0 -507px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-slider_left_nav {
  background-position: 0 -251px;
}

/* line 60, ../../../../../usr/local/var/rbenv/versions/1.9.3-p392/lib/ruby/gems/1.9.1/gems/compass-0.12.2/frameworks/compass/stylesheets/compass/utilities/sprites/_base.scss */
.tides-slider_right_nav {
  background-position: 0 -191px;
}

/**
 * links - set the love hate for anchors
 *
 * @param $hover
 * @param $active
 * @param visited
 **/
/**
 * text-replace - replace text with an image
 *
 * @param $image
 * @param $pos1
 * @param $pos2
 * @param $width
 * @param $height
 **/
/**
 * set-text - set the text size and color
 *
 * @param $size
 * @param $color
 **/
/**
 * form - set the contact form css
 *
 * @param $type
 **/
/* line 103, ../sass/style.scss */
body {
  font-family: 'Open Sans', sans-serif, arial;
  font-weight: 400;
  font-style: normal;
  line-height: 1.4;
  font-size: 1em;
  background-color: white;
}

/* line 113, ../sass/style.scss */
.container {
  width: 960px;
  margin: 0 auto;
  position: relative;
}

/* line 118, ../sass/style.scss */
#bg {
  position: fixed;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
}

/* line 126, ../sass/style.scss */
#bg img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  min-width: 50%;
  min-height: 50%;
}

/* line 134, ../sass/style.scss */
.button {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #ffffff), color-stop(100%, #abc8e2));
  background-image: -webkit-linear-gradient(#ffffff, #abc8e2);
  background-image: -moz-linear-gradient(#ffffff, #abc8e2);
  background-image: -o-linear-gradient(#ffffff, #abc8e2);
  background-image: linear-gradient(#ffffff, #abc8e2);
}

/* line 135, ../sass/style.scss */
.uppercase {
  text-transform: uppercase;
}

/* line 136, ../sass/style.scss */
.clear-both {
  clear: both;
}

/* line 137, ../sass/style.scss */
.left {
  float: left;
}

/* line 138, ../sass/style.scss */
.right {
  float: right;
}

/* line 139, ../sass/style.scss */
.inline {
  display: inline;
}

/* line 140, ../sass/style.scss */
.block {
  display: block;
}

/* line 141, ../sass/style.scss */
.max-width {
  width: 100%;
}

/* line 142, ../sass/style.scss */
.max-height {
  height: 100%;
}

/* line 143, ../sass/style.scss */
.ul-reset {
  list-style: none;
}

/* line 144, ../sass/style.scss */
.hide {
  display: none;
}

/* line 145, ../sass/style.scss */
.reset {
  margin: 0;
  padding: 0;
}

/* line 149, ../sass/style.scss */
.side-box {
  width: 240px;
  padding: 15px 30px 0 30px;
}

/* line 153, ../sass/style.scss */
.bold {
  font-family: 'Open Sans';
  font-weight: 700;
  font-style: normal;
}

/* line 158, ../sass/style.scss */
.bold-italic {
  font-family: 'Open Sans';
  font-weight: 700;
  font-style: italic;
}

/* line 163, ../sass/style.scss */
.extra-bold {
  font-family: 'Open Sans';
  font-weight: 800;
  font-style: normal;
}

/* line 168, ../sass/style.scss */
.extra-bold-italic {
  font-family: 'Open Sans';
  font-weight: 800;
  font-style: italic;
}

/* line 173, ../sass/style.scss */
.italic {
  font-family: 'Open Sans';
  font-weight: 400;
  font-style: italic;
}

/* line 178, ../sass/style.scss */
.light {
  font-family: 'Open Sans';
  font-weight: 300;
  font-style: normal;
}

/* line 183, ../sass/style.scss */
.light-italic {
  font-family: 'Open Sans';
  font-weight: 300;
  font-style: italic;
}

/* line 188, ../sass/style.scss */
.regular {
  font-family: 'Open Sans';
  font-weight: 400;
  font-style: normal;
}

/* line 193, ../sass/style.scss */
.semibold {
  font-family: 'Open Sans';
  font-weight: 600;
  font-style: normal;
}

/* line 198, ../sass/style.scss */
.semibold-italic {
  font-family: 'Open Sans';
  font-weight: 600;
  font-style: italic;
}

/* line 203, ../sass/style.scss */
.error-field {
  outline: red solid thin;
}

/* line 204, ../sass/style.scss */
.chromeframe {
  margin: 0.2em 0;
  background: #ccc;
  color: black;
  padding: 0.2em 0;
}

/* line 210, ../sass/style.scss */
.clearfix {
  zoom: 1;
}
/* line 213, ../sass/style.scss */
.clearfix:before, .clearfix:after {
  content: "";
  display: table;
}
/* line 217, ../sass/style.scss */
.clearfix:after {
  clear: both;
}

/* line 223, ../sass/style.scss */
.carousel ul {
  position: absolute;
  overflow: hidden;
}
/* line 226, ../sass/style.scss */
.carousel ul li {
  float: left;
}
/* line 230, ../sass/style.scss */
.carousel .mask {
  position: relative;
  overflow: hidden;
  width: 540px;
}
/* line 235, ../sass/style.scss */
.carousel .pagination-links {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
/* line 239, ../sass/style.scss */
.carousel .pagination-links li {
  display: inline;
}
/* line 240, ../sass/style.scss */
.carousel .pagination-links li.current {
  text-decoration: underline;
}
/* line 246, ../sass/style.scss */
.carousel a.next {
  display: block;
  background: url('../images/tides-s850aa1e7f8.png?1357221753') no-repeat scroll transparent 0 -191px;
  text-indent: -119988px;
  overflow: hidden;
  text-align: left;
  width: 41px;
  height: 40px;
  background-position: 0 -191px !important;
}
/* line 251, ../sass/style.scss */
.carousel a.prev {
  display: block;
  background: url('../images/tides-s850aa1e7f8.png?1357221753') no-repeat scroll transparent 0 -251px;
  text-indent: -119988px;
  overflow: hidden;
  text-align: left;
  width: 41px;
  height: 40px;
  background-position: 0 -251px !important;
}

/* line 258, ../sass/style.scss */
#sb-wrapper-inner {
  border: 15px solid white;
}

/* line 263, ../sass/style.scss */
::-webkit-input-placeholder {
  color: white;
}

/* line 264, ../sass/style.scss */
:-moz-placeholder {
  color: white;
}

/* line 265, ../sass/style.scss */
:-ms-input-placeholder {
  color: white;
}

/* line 267, ../sass/style.scss */
#top-stripe {
  height: 6px;
  background-color: #abc8e2;
  position: relative;
}

/* line 273, ../sass/style.scss */
#bottom-stripe {
  height: 6px;
  background-color: white;
  position: relative;
  margin-top: 100px;
}

/* line 280, ../sass/style.scss */
#sidebar {
  margin-top: -6px;
}

/* line 282, ../sass/style.scss */
#header {
  width: 300px;
  background-color: #fff;
  height: 121px;
}
/* line 286, ../sass/style.scss */
#header header {
  margin: 28px 0 0 25px;
}
/* line 288, ../sass/style.scss */
#header header h1 {
  background: url('../images/tides-s850aa1e7f8.png?1357221753') no-repeat scroll transparent 0 -55px;
  text-indent: -119988px;
  overflow: hidden;
  text-align: left;
  width: 117px;
  height: 70px;
}
/* line 290, ../sass/style.scss */
#header header h1 a {
  display: block;
}
/* line 294, ../sass/style.scss */
#header nav {
  width: 130px;
  padding-left: 20px;
  margin-top: 5px;
}
/* line 300, ../sass/style.scss */
#header nav ul li a {
  font-size: 12px;
  text-transform: uppercase;
  margin-bottom: 5px;
  color: #465973;
  text-decoration: none;
}
/* line 49, ../sass/style.scss */
#header nav ul li a:visited {
  color: #465973;
}
/* line 50, ../sass/style.scss */
#header nav ul li a:hover {
  color: #abc8e2;
}
/* line 51, ../sass/style.scss */
#header nav ul li a:active {
  color: #abc8e2;
}

/* line 311, ../sass/style.scss */
#sidebar-content {
  background-color: rgba(70, 89, 115, 0.9);
  margin: 10px 0;
}
/* line 314, ../sass/style.scss */
#sidebar-content h2 {
  font-size: 17px;
  color: white;
  margin-top: 5px;
  font-weight: 300;
}
/* line 320, ../sass/style.scss */
#sidebar-content p {
  line-height: 2;
  font-size: 13px;
  color: white;
  font-weight: 100;
}

/* line 327, ../sass/style.scss */
#nav-neighborhood, #nav-residencies, #nav-community {
  background-color: white;
  margin: -10px 0 10px 0;
  width: 300px;
}
/* line 331, ../sass/style.scss */
#nav-neighborhood li, #nav-residencies li, #nav-community li {
  font-size: 12px;
  color: #465973;
  padding: 11px 0 9px 30px;
  border-bottom: 1px solid #465973;
}
/* line 332, ../sass/style.scss */
#nav-neighborhood li.active, #nav-residencies li.active, #nav-community li.active {
  background-color: #465973;
}
/* line 334, ../sass/style.scss */
#nav-neighborhood li.active a, #nav-residencies li.active a, #nav-community li.active a {
  color: white;
  background-position: 244px -730px;
}
/* line 342, ../sass/style.scss */
#nav-neighborhood li ol, #nav-residencies li ol, #nav-community li ol {
  padding-left: 15px;
}
/* line 344, ../sass/style.scss */
#nav-neighborhood li ol li, #nav-residencies li ol li, #nav-community li ol li {
  padding: 5px 0;
  border: none;
}
/* line 351, ../sass/style.scss */
#nav-neighborhood a, #nav-residencies a, #nav-community a {
  color: #465973;
  text-decoration: none;
  background-position: 240px -665px;
}
/* line 49, ../sass/style.scss */
#nav-neighborhood a:visited, #nav-residencies a:visited, #nav-community a:visited {
  color: #465973;
}
/* line 50, ../sass/style.scss */
#nav-neighborhood a:hover, #nav-residencies a:hover, #nav-community a:hover {
  color: #465973;
}
/* line 51, ../sass/style.scss */
#nav-neighborhood a:active, #nav-residencies a:active, #nav-community a:active {
  color: #465973;
}

/* line 360, ../sass/style.scss */
#nav-residencies li.current {
  background-color: #465973;
}
/* line 362, ../sass/style.scss */
#nav-residencies li.current a {
  color: white;
}

/* line 370, ../sass/style.scss */
#nav-community li.current {
  background-color: #465973;
}
/* line 372, ../sass/style.scss */
#nav-community li.current a {
  color: white;
}

/* line 377, ../sass/style.scss */
#blog-nav {
  background-color: rgba(70, 89, 115, 0.8);
  margin: 10px 0;
  width: 280px;
  height: 40px;
  padding: 25px 0 0 20px;
}
/* line 383, ../sass/style.scss */
#blog-nav p {
  font-size: 12px;
  color: white;
  margin-right: 15px;
}
/* line 388, ../sass/style.scss */
#blog-nav .indexed {
  margin: -4px 15px 0 0;
}
/* line 390, ../sass/style.scss */
#blog-nav .indexed li {
  display: -moz-inline-stack;
  display: inline-block;
  *vertical-align: auto;
  zoom: 1;
  *display: inline;
  margin-right: 5px;
}
/* line 393, ../sass/style.scss */
#blog-nav .indexed li.current {
  font-size: 12px;
  color: white;
  text-decoration: underline;
}
/* line 397, ../sass/style.scss */
#blog-nav .indexed li a {
  color: white;
  text-decoration: none;
  font-size: 12px;
  color: white;
}
/* line 49, ../sass/style.scss */
#blog-nav .indexed li a:visited {
  color: white;
}
/* line 50, ../sass/style.scss */
#blog-nav .indexed li a:hover {
  color: white;
}
/* line 51, ../sass/style.scss */
#blog-nav .indexed li a:active {
  color: white;
}
/* line 400, ../sass/style.scss */
#blog-nav .indexed li a:hover {
  text-decoration: underline;
}

/* line 406, ../sass/style.scss */
.blog-nav {
  margin-top: -4px;
}

/* line 409, ../sass/style.scss */
#prev a {
  background: url('../images/tides-s850aa1e7f8.png?1357221753') no-repeat scroll transparent 0 -461px;
  text-indent: -119988px;
  overflow: hidden;
  text-align: left;
  width: 26px;
  height: 26px;
  display: -moz-inline-stack;
  display: inline-block;
  *vertical-align: auto;
  zoom: 1;
  *display: inline;
  margin-right: 5px;
}

/* line 417, ../sass/style.scss */
#next a {
  background: url('../images/tides-s850aa1e7f8.png?1357221753') no-repeat scroll transparent 0 -507px;
  text-indent: -119988px;
  overflow: hidden;
  text-align: left;
  width: 26px;
  height: 26px;
  display: -moz-inline-stack;
  display: inline-block;
  *vertical-align: auto;
  zoom: 1;
  *display: inline;
  margin-right: 5px;
}

/* line 424, ../sass/style.scss */
.single #page-content {
  float: none;
  clear: both;
  margin-left: 0;
}

/* line 430, ../sass/style.scss */
#page-content .news-post {
  width: 910px;
  background: white;
  padding: 30px 20px;
  margin-top: 20px;
}
/* line 435, ../sass/style.scss */
#page-content .news-post .gallery-thumb {
  margin-right: 30px;
}
/* line 436, ../sass/style.scss */
#page-content .news-post .content {
  width: 328px;
  height: 390px;
  padding-right: 45px;
  line-height: 1.2;
}
/* line 441, ../sass/style.scss */
#page-content .news-post .content h1 {
  font-size: 40px;
  color: #465973;
}
/* line 442, ../sass/style.scss */
#page-content .news-post .content h2 {
  font-size: 36px;
  color: #465973;
  width: auto;
  margin: auto;
}
/* line 447, ../sass/style.scss */
#page-content .news-post .content h3 {
  font-size: 24px;
  color: #abc8e2;
}
/* line 448, ../sass/style.scss */
#page-content .news-post .content h4 {
  font-size: 20px;
  color: #abc8e2;
}
/* line 449, ../sass/style.scss */
#page-content .news-post .content h5 {
  font-size: 18px;
  color: #9c9c9d;
}
/* line 450, ../sass/style.scss */
#page-content .news-post .content h6 {
  font-size: 16px;
  color: #9c9c9d;
}
/* line 451, ../sass/style.scss */
#page-content .news-post .content p {
  font-size: 12px;
  color: #465973;
  line-height: 1.7;
  clear: both;
  float: left;
}
/* line 458, ../sass/style.scss */
#page-content .news-post .content ul li, #page-content .news-post .content ol li {
  font-size: 12px;
  color: #465973;
}
/* line 460, ../sass/style.scss */
#page-content .news-post .content pre, #page-content .news-post .content address {
  font-size: 12px;
  color: #465973;
}

/* line 464, ../sass/style.scss */
#contact-form {
  height: 300px;
  background-color: rgba(156, 154, 154, 0.7);
}
/* line 467, ../sass/style.scss */
#contact-form h2 {
  font-size: 16px;
  color: white;
}
/* line 469, ../sass/style.scss */
#contact-form p {
  font-size: 12px;
  color: white;
}
/* line 471, ../sass/style.scss */
#contact-form form {
  margin-top: 12px;
}
/* line 474, ../sass/style.scss */
#contact-form input[type="text"] {
  font-size: 10px;
  color: white;
  border: none;
  background-color: rgba(156, 156, 157, 0.7);
  padding: 3px 5px;
  width: 240px;
  margin-bottom: 5px;
}
/* line 476, ../sass/style.scss */
#contact-form input[type="submit"] {
  border: none;
  width: 110px;
  height: 30px;
  font-size: 12px;
  color: #465973;
  text-shadow: 0px 0px 1px rgba(255, 255, 255, 0.7);
}
/* line 486, ../sass/style.scss */
#contact-form textarea {
  font-size: 10px;
  color: white;
  border: none;
  background-color: rgba(156, 156, 157, 0.7);
  padding: 3px 5px;
  width: 240px;
  margin-bottom: 10px;
  resize: none;
  height: 80px;
}

/* line 493, ../sass/style.scss */
#page-content {
  margin: 100px 0 0 30px;
  width: 630px;
}
/* line 496, ../sass/style.scss */
#page-content h2 {
  font-size: 36px;
  color: #465973;
  line-height: 1em;
  width: 580px;
  margin-bottom: 15px;
}
/* line 502, ../sass/style.scss */
#page-content h3 {
  font-size: 16px;
  color: #465973;
}

/* line 505, ../sass/style.scss */
#page-content {
  margin-top: 125px;
}
/* line 506, ../sass/style.scss */
.home #page-content h2 {
  margin-top: 0;
  width: 390px;
}
/* line 512, ../sass/style.scss */
#page-content .location {
  background-color: white;
  width: 619px;
}
/* line 515, ../sass/style.scss */
#page-content .location ul {
  position: relative;
  height: 544px;
  overflow: hidden;
}
/* line 519, ../sass/style.scss */
#page-content .location ul li {
  position: absolute;
}
/* line 523, ../sass/style.scss */
#page-content .location .location-content {
  padding: 0 20px 20px;
  width: 93%;
}
/* line 526, ../sass/style.scss */
#page-content .location .location-content h3 {
  font-size: 14px;
  color: #465973;
}
/* line 527, ../sass/style.scss */
#page-content .location .location-content p {
  font-size: 12px;
  color: #465973;
}
/* line 528, ../sass/style.scss */
#page-content .location .location-content a {
  color: #465973;
  text-decoration: none;
  text-shadow: 0px 0px 1px rgba(255, 255, 255, 0.7);
  font-size: 12px;
  height: 18px;
  width: 83px;
  padding: 5px 0 4px 0;
  margin-top: 10px;
  text-align: center;
}
/* line 49, ../sass/style.scss */
#page-content .location .location-content a:visited {
  color: #465973;
}
/* line 50, ../sass/style.scss */
#page-content .location .location-content a:hover {
  color: #465973;
}
/* line 51, ../sass/style.scss */
#page-content .location .location-content a:active {
  color: #465973;
}
/* line 543, ../sass/style.scss */
#page-content .gallery, #page-content .neighbors, #page-content .floorplans {
  background-color: rgba(255, 255, 255, 0.9);
  height: 503px;
  padding: 30px 25px;
  width: 540px;
}
/* line 548, ../sass/style.scss */
#page-content .gallery h3, #page-content .neighbors h3, #page-content .floorplans h3 {
  font-size: 24px;
  color: #465973;
}
/* line 553, ../sass/style.scss */
#page-content .neighbors {
  height: 380px;
}
/* line 558, ../sass/style.scss */
#page-content .floorplans {
  height: 433px;
}

/* line 567, ../sass/style.scss */
.page-id-157 #page-content ul,
.page-id-26 #page-content ul,
.page-id-379 #page-content ul {
  margin-top: 10px;
}
/* line 569, ../sass/style.scss */
.page-id-157 #page-content ul li,
.page-id-26 #page-content ul li,
.page-id-379 #page-content ul li {
  font-size: 12px;
  color: #465973;
  margin-bottom: 5px;
}

/* line 579, ../sass/style.scss */
.page-id-157 #page-content,
.page-id-26 #page-content,
.page-id-379 #page-content {
  background-color: rgba(255, 255, 255, 0.9);
  width: 610px;
  padding: 15px 10px;
}

/* line 588, ../sass/style.scss */
.page-id-379 #contact-info {
  padding: 0 70px;
}
/* line 590, ../sass/style.scss */
.page-id-379 #contact-info h3 {
  text-transform: uppercase;
  font-size: 24px;
  margin-bottom: 20px;
}
/* line 595, ../sass/style.scss */
.page-id-379 #contact-info p {
  color: #465973;
  margin: 0 0 10px 0;
  font-size: 12px;
}
/* line 601, ../sass/style.scss */
.page-id-379 #map {
  float: right;
  margin: 50px 80px 0 0;
}
/* line 605, ../sass/style.scss */
.page-id-379 .carousel-team {
  margin-left: 70px;
  width: 440px;
}
/* line 608, ../sass/style.scss */
.page-id-379 .carousel-team .mask {
  width: 440px;
}
/* line 611, ../sass/style.scss */
.page-id-379 .carousel-team .prev {
  float: left;
}
/* line 614, ../sass/style.scss */
.page-id-379 .carousel-team .next {
  float: right;
}
/* line 618, ../sass/style.scss */
.page-id-379 #team {
  clear: both;
  position: relative;
}
/* line 621, ../sass/style.scss */
.page-id-379 #team h3 {
  text-transform: uppercase;
  font-size: 24px;
  margin: 0 0 20px 70px;
}
/* line 626, ../sass/style.scss */
.page-id-379 #team ul {
  margin-top: 10px;
}
/* line 628, ../sass/style.scss */
.page-id-379 #team ul .member {
  font-size: 12px;
  color: #465973;
  width: 140px;
  height: 200px;
  margin-right: 10px;
}
/* line 633, ../sass/style.scss */
.page-id-379 #team ul .member p {
  margin: 0;
  font-size: 10px;
  font-weight: 100;
}
/* line 638, ../sass/style.scss */
.page-id-379 #team ul .member a {
  font-size: 10px;
  color: #465973;
  color: #465973;
  text-decoration: none;
}
/* line 49, ../sass/style.scss */
.page-id-379 #team ul .member a:visited {
  color: #465973;
}
/* line 50, ../sass/style.scss */
.page-id-379 #team ul .member a:hover {
  color: #465973;
}
/* line 51, ../sass/style.scss */
.page-id-379 #team ul .member a:active {
  color: #465973;
}

/* line 650, ../sass/style.scss */
#page-content .floorplans {
  padding: 30px 25px;
  width: 569px;
  height: 433px;
  background-color: rgba(255, 255, 255, 0.9);
}
/* line 655, ../sass/style.scss */
#page-content .floorplans h3 {
  font-size: 24px;
  color: #465973;
}

/* line 659, ../sass/style.scss */
#download-link {
  color: white;
  text-decoration: none;
  font-size: 12px;
  color: white;
}
/* line 49, ../sass/style.scss */
#download-link:visited {
  color: white;
}
/* line 50, ../sass/style.scss */
#download-link:hover {
  color: white;
}
/* line 51, ../sass/style.scss */
#download-link:active {
  color: white;
}

/* line 666, ../sass/style.scss */
.carousel-floorplans,
.carousel-gallery,
.carousel-neighbors,
.carousel-neighbors {
  margin-top: 45px;
  position: relative;
}
/* line 669, ../sass/style.scss */
.carousel-floorplans .pagination-links,
.carousel-gallery .pagination-links,
.carousel-neighbors .pagination-links,
.carousel-neighbors .pagination-links {
  position: absolute;
  top: -25%;
  right: 0;
}
/* line 673, ../sass/style.scss */
.carousel-floorplans .pagination-links a,
.carousel-gallery .pagination-links a,
.carousel-neighbors .pagination-links a,
.carousel-neighbors .pagination-links a {
  color: #465973;
  text-decoration: none;
  font-size: 12px;
  color: #465973;
  padding: 0 3px;
}
/* line 49, ../sass/style.scss */
.carousel-floorplans .pagination-links a:visited,
.carousel-gallery .pagination-links a:visited,
.carousel-neighbors .pagination-links a:visited,
.carousel-neighbors .pagination-links a:visited {
  color: #465973;
}
/* line 50, ../sass/style.scss */
.carousel-floorplans .pagination-links a:hover,
.carousel-gallery .pagination-links a:hover,
.carousel-neighbors .pagination-links a:hover,
.carousel-neighbors .pagination-links a:hover {
  color: #465973;
}
/* line 51, ../sass/style.scss */
.carousel-floorplans .pagination-links a:active,
.carousel-gallery .pagination-links a:active,
.carousel-neighbors .pagination-links a:active,
.carousel-neighbors .pagination-links a:active {
  color: #465973;
}
/* line 677, ../sass/style.scss */
.carousel-floorplans .pagination-links a:hover,
.carousel-gallery .pagination-links a:hover,
.carousel-neighbors .pagination-links a:hover,
.carousel-neighbors .pagination-links a:hover {
  text-decoration: underline;
}
/* line 682, ../sass/style.scss */
.carousel-floorplans .mask,
.carousel-gallery .mask,
.carousel-neighbors .mask,
.carousel-neighbors .mask {
  width: 460px;
}
/* line 683, ../sass/style.scss */
.carousel-floorplans a.prev,
.carousel-gallery a.prev,
.carousel-neighbors a.prev,
.carousel-neighbors a.prev {
  float: left;
}
/* line 684, ../sass/style.scss */
.carousel-floorplans a.next,
.carousel-gallery a.next,
.carousel-neighbors a.next,
.carousel-neighbors a.next {
  float: right;
}

/* line 688, ../sass/style.scss */
.carousel-gallery .mask, .carousel-neighbors .mask {
  width: 540px;
  margin-bottom: 10px;
}
/* line 692, ../sass/style.scss */
.carousel-gallery .pagination-links, .carousel-neighbors .pagination-links {
  top: -20%;
}

/* line 701, ../sass/style.scss */
.gallery-image {
  margin: 0 10px 10px 0;
  width: 175px;
  height: 175px;
  padding: 0 !important;
}

/* line 708, ../sass/style.scss */
.neighbor {
  height: 230px;
  width: 175px;
  margin-right: 10px;
  padding: 0 !important;
}

/* line 717, ../sass/style.scss */
.neighbor-comment,
.floorplan-detail,
.gallery-detail {
  font-size: 12px;
  color: white;
}

/* line 721, ../sass/style.scss */
.floorplan {
  width: 120px;
  margin: 0 55px 35px 0;
  padding: 0 !important;
}
/* line 725, ../sass/style.scss */
.floorplan h4 {
  font-size: 16px;
  color: #465973;
}
/* line 728, ../sass/style.scss */
.floorplan p {
  font-size: 12px;
  color: #6b7a8f;
}
/* line 731, ../sass/style.scss */
.floorplan a {
  color: #9c9a9a;
  text-decoration: none;
  font-size: 12px;
  color: #9c9a9a;
}
/* line 732, ../sass/style.scss */
.floorplan a:hover {
  text-decoration: underline;
}
/* line 49, ../sass/style.scss */
.floorplan a:visited {
  color: #9c9a9a;
}
/* line 50, ../sass/style.scss */
.floorplan a:hover {
  color: #9c9a9a;
}
/* line 51, ../sass/style.scss */
.floorplan a:active {
  color: #9c9a9a;
}

/* line 740, ../sass/style.scss */
.price {
  font-size: 14px;
  color: #465973;
}

/* line 746, ../sass/style.scss */
.page-id-157 #page-content {
  display: none;
}

/* line 751, ../sass/style.scss */
.blog #page-content {
  float: left;
  clear: both;
  margin: 0;
  width: 100%;
  margin-top: 15px;
}
/* line 758, ../sass/style.scss */
.blog #page-content .posts article {
  cursor: pointer;
}
/* line 760, ../sass/style.scss */
.blog #page-content .post {
  height: 186px;
  width: 300px;
  float: left;
  position: relative;
  margin: 0 15px 15px 0;
}
/* line 766, ../sass/style.scss */
.blog #page-content .post .datetime {
  display: block;
  font-size: 12px;
  color: white;
  bottom: 55px;
  left: 0;
  position: absolute;
  background-color: #465973;
  width: 285px;
  padding: 5px 0 0 15px;
}
/* line 776, ../sass/style.scss */
.blog #page-content .post h2 {
  position: absolute;
  margin: 0;
  z-index: 500;
  font-size: 14px;
  color: white;
  width: 270px;
  padding: 5px 15px 0px;
  background-color: #465973;
  bottom: -1px;
  height: 53px;
}
/* line 787, ../sass/style.scss */
.blog #page-content .post .post-body {
  display: none;
  position: absolute;
  top: 0;
  height: 156px;
  width: 280px;
  padding: 30px 0 0 20px;
  background-color: rgba(70, 89, 115, 0.7);
}
/* line 795, ../sass/style.scss */
.blog #page-content .post .post-body .title {
  top: 20px;
  left: 5px;
  background: none;
  z-index: 0;
}
/* line 801, ../sass/style.scss */
.blog #page-content .post .post-body .excerpt {
  position: absolute;
  font-size: 12px;
  color: white;
  top: 70px;
}
/* line 807, ../sass/style.scss */
.blog #page-content .post .post-body .read-more {
  position: absolute;
  bottom: 15px;
  text-transform: uppercase;
  background-color: white;
  background-position: 128px -633px;
  padding: 3px 30px 2px 5px;
  z-index: 1000;
  color: #465973;
  text-decoration: none;
  font-size: 12px;
  color: #465973;
}
/* line 49, ../sass/style.scss */
.blog #page-content .post .post-body .read-more:visited {
  color: #465973;
}
/* line 50, ../sass/style.scss */
.blog #page-content .post .post-body .read-more:hover {
  color: #465973;
}
/* line 51, ../sass/style.scss */
.blog #page-content .post .post-body .read-more:active {
  color: #465973;
}

/* line 822, ../sass/style.scss */
#footer {
  background-color: #465973;
  height: auto;
}
/* line 825, ../sass/style.scss */
#footer .divide {
  border-bottom: 1px solid #abc8e2;
  margin: 10px;
  display: inline;
}
/* line 831, ../sass/style.scss */
#footer header h3 {
  background: url('../images/tides-s850aa1e7f8.png?1357221753') no-repeat scroll transparent 0 0;
  text-indent: -119988px;
  overflow: hidden;
  text-align: left;
  width: 280px;
  height: 35px;
  margin: 0 45px 0 5px;
}
/* line 835, ../sass/style.scss */
#footer header h4 {
  font-size: 26px;
  color: #abc8e2;
}

/* line 839, ../sass/style.scss */
#footer-content {
  padding-top: 30px;
}
/* line 841, ../sass/style.scss */
#footer-content .footer-box {
  width: 540px;
  height: auto;
  margin: 0 12px 10px;
}
/* line 845, ../sass/style.scss */
#footer-content .footer-box.first-box {
  width: 365px;
}
/* line 846, ../sass/style.scss */
#footer-content .footer-box p {
  font-size: 12px;
  color: white;
  line-height: 1.5em;
}

/* line 853, ../sass/style.scss */
#footer-wrap {
  background-color: #465973;
}

/* line 855, ../sass/style.scss */
#footer-toggle {
  background-color: #465973;
  font-size: 16px;
  color: white;
  color: white;
  text-decoration: none;
  position: absolute;
  right: 10px;
  top: -32px;
  width: 148px;
  height: 27px;
  text-align: right;
  padding: 5px 15px 0 15px;
  background-position: 10px -662px;
}
/* line 49, ../sass/style.scss */
#footer-toggle:visited {
  color: white;
}
/* line 50, ../sass/style.scss */
#footer-toggle:hover {
  color: white;
}
/* line 51, ../sass/style.scss */
#footer-toggle:active {
  color: white;
}

/* line 868, ../sass/style.scss */
#footer-toggle.open {
  background-position: 10px -692px;
}

/* line 872, ../sass/style.scss */
#footer-link {
  color: #abc8e2;
  text-decoration: none;
}
/* line 49, ../sass/style.scss */
#footer-link:visited {
  color: #abc8e2;
}
/* line 50, ../sass/style.scss */
#footer-link:hover {
  color: #abc8e2;
}
/* line 51, ../sass/style.scss */
#footer-link:active {
  color: #abc8e2;
}

/* line 874, ../sass/style.scss */
#sub-footer {
  padding: 5px 0 1px 175px;
  background-position: 135px -131px;
  width: 785px;
}
/* line 878, ../sass/style.scss */
#sub-footer p {
  font-size: 10px;
  color: white;
}
/* line 880, ../sass/style.scss */
#sub-footer p a {
  color: white;
  text-decoration: none;
}
/* line 49, ../sass/style.scss */
#sub-footer p a:visited {
  color: white;
}
/* line 50, ../sass/style.scss */
#sub-footer p a:hover {
  color: white;
}
/* line 51, ../sass/style.scss */
#sub-footer p a:active {
  color: white;
}

/* line 884, ../sass/style.scss */
#modal {
  left: 8%;
  position: absolute;
  background: white;
  width: 80%;
  top: 20%;
  padding: 0 15px;
  height: 768px;
  overflow: scroll;
  display: none;
  z-index: 900;
}
/* line 895, ../sass/style.scss */
#modal a {
  text-indent: -119988px;
  overflow: hidden;
  text-align: left;
  float: right;
  width: 65px;
  height: 40px;
}

/* ==========================================================================
   Responsive Styles
   ========================================================================== */
/* Desktop */
@media only screen and (min-width: 1000px) {
  /* line 910, ../sass/style.scss */
  .container {
    width: 1100px;
  }

  /* line 911, ../sass/style.scss */
  #page-content {
    width: 750px !important;
  }

  /* line 912, ../sass/style.scss */
  .blog #page-content {
    width: 100% !important;
  }
}
@media only screen and (min-width: 769px) {
  /* line 927, ../sass/style.scss */
  #bg-mobile, .mobile-gallery,
  #nav-mobile, #nav-mobile-single,
  #mobile-nav,
  #mobile-nav-residencies,
  #mobile-sidebar-content,
  #mobile-contact-us,
  #mobile-nav-community,
  .tablet-img, .mobile-img,
  .tablet-neighborhood-img,
  .mobile-neighborhood-img,
  #page-content .news-post .content .mobile-content,
  #mobile-contact-form {
    display: none;
  }
}
/* Mobile Landscape Size to Tablet Portrait (devices and browsers) */
@media only screen and (max-width: 768px) {
  /* line 932, ../sass/style.scss */
  #mobile-nav {
    display: block;
  }
  /* line 934, ../sass/style.scss */
  #mobile-nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  /* line 940, ../sass/style.scss */
  .mobile-box {
    width: 100%;
  }

  /* line 941, ../sass/style.scss */
  .mobile-wrap {
    padding: 15px 30px;
    clear: both;
    float: left;
  }

  /* line 947, ../sass/style.scss */
  .page-id-8 #mobile-nav-neighborhood .mobile-wrap {
    padding: 0;
    width: 100%;
  }

  /* line 952, ../sass/style.scss */
  #bg-mobile img {
    width: 100%;
    clear: both;
    float: left;
  }

  /* line 959, ../sass/style.scss */
  .container,
  #header {
    width: 100%;
  }

  /* line 961, ../sass/style.scss */
  #container {
    margin-bottom: 0;
    min-height: 0;
    height: auto;
  }

  /* line 967, ../sass/style.scss */
  #sidebar {
    margin: 0;
    width: 100%;
  }

  /* line 972, ../sass/style.scss */
  #header {
    height: auto;
  }
  /* line 974, ../sass/style.scss */
  #header header {
    margin: 0 0 0 25px;
    display: inline;
  }
  /* line 978, ../sass/style.scss */
  #header nav.right {
    display: none;
    width: 100%;
    padding: 0;
    margin-top: 0;
    background: #abc8e2;
  }
  /* line 985, ../sass/style.scss */
  #header nav.right ul li {
    border-bottom: 1px solid #465973;
    clear: both;
    float: left;
    width: 100%;
  }
  /* line 990, ../sass/style.scss */
  #header nav.right ul li:hover {
    background-color: #354059;
  }
  /* line 991, ../sass/style.scss */
  #header nav.right ul li a {
    width: 98%;
    margin-bottom: 0;
    padding: 10px 0 9px 15px;
    font-family: 'Open Sans';
    font-weight: 700;
    font-style: normal;
    color: #465973;
    text-decoration: none;
    float: left;
    display: inline;
  }
  /* line 49, ../sass/style.scss */
  #header nav.right ul li a:visited {
    color: #465973;
  }
  /* line 50, ../sass/style.scss */
  #header nav.right ul li a:hover {
    color: white;
  }
  /* line 51, ../sass/style.scss */
  #header nav.right ul li a:active {
    color: white;
  }
  /* line 1006, ../sass/style.scss */
  #header #nav-mobile {
    width: 50px;
    height: 30px;
    float: right;
    clear: none;
    margin: 20px 10px 0 0;
    padding-left: 0;
    cursor: pointer;
  }

  /* line 1020, ../sass/style.scss */
  .home #page-content,
  .page-id-187 #page-content,
  .page-id-379 #page-content {
    width: 100%;
    margin-top: 0;
    margin: 0;
  }
  /* line 1024, ../sass/style.scss */
  .home #page-content h2,
  .page-id-187 #page-content h2,
  .page-id-379 #page-content h2 {
    font-size: 32px;
    margin-top: 0;
    width: auto;
    padding: 0;
  }
  /* line 1030, ../sass/style.scss */
  .home #page-content h3,
  .page-id-187 #page-content h3,
  .page-id-379 #page-content h3 {
    font-size: 14px;
  }

  /* line 1035, ../sass/style.scss */
  #mobile-nav-residencies,
  #mobile-nav-community {
    background-color: white;
    width: 100%;
  }
  /* line 1038, ../sass/style.scss */
  #mobile-nav-residencies li,
  #mobile-nav-community li {
    clear: both;
    font-size: 12px;
    color: #465973;
    padding: 11px 0 9px 30px;
    border-bottom: 1px solid #465973;
  }
  /* line 1040, ../sass/style.scss */
  #mobile-nav-residencies li.current,
  #mobile-nav-community li.current {
    background-color: #465973;
    background-position: 740px -570px;
  }
  /* line 1043, ../sass/style.scss */
  #mobile-nav-residencies li.current a,
  #mobile-nav-community li.current a {
    color: white;
  }
  /* line 1048, ../sass/style.scss */
  #mobile-nav-residencies li.active,
  #mobile-nav-community li.active {
    background-color: #465973;
  }
  /* line 1050, ../sass/style.scss */
  #mobile-nav-residencies li.active a,
  #mobile-nav-community li.active a {
    color: white;
    background-position: 244px -582px;
  }
  /* line 1056, ../sass/style.scss */
  #mobile-nav-residencies li.page-content li,
  #mobile-nav-community li.page-content li {
    border-bottom: none;
    list-style: none;
    padding-left: 0px;
  }
  /* line 1064, ../sass/style.scss */
  #mobile-nav-residencies a,
  #mobile-nav-community a {
    color: #465973;
    text-decoration: none;
    background-position: 240px -516px;
  }
  /* line 49, ../sass/style.scss */
  #mobile-nav-residencies a:visited,
  #mobile-nav-community a:visited {
    color: #465973;
  }
  /* line 50, ../sass/style.scss */
  #mobile-nav-residencies a:hover,
  #mobile-nav-community a:hover {
    color: #465973;
  }
  /* line 51, ../sass/style.scss */
  #mobile-nav-residencies a:active,
  #mobile-nav-community a:active {
    color: #465973;
  }
  /* line 1070, ../sass/style.scss */
  #mobile-nav-residencies .floorplans,
  #mobile-nav-community .floorplans {
    padding: 0 25px;
  }
  /* line 1072, ../sass/style.scss */
  #mobile-nav-residencies .floorplan,
  #mobile-nav-residencies .neighbor,
  #mobile-nav-community .floorplan,
  #mobile-nav-community .neighbor {
    border: none;
    clear: none;
  }
  /* line 1076, ../sass/style.scss */
  #mobile-nav-residencies .pagination-links,
  #mobile-nav-community .pagination-links {
    display: none;
  }
  /* line 1077, ../sass/style.scss */
  #mobile-nav-residencies .mask,
  #mobile-nav-community .mask {
    width: 475px;
    margin-left: 110px;
  }

  /* line 1084, ../sass/style.scss */
  #mobile-nav-community .mask {
    width: 545px;
    margin-left: 80px;
  }

  /* line 1090, ../sass/style.scss */
  #mobile-nav-neighborhood {
    background-color: white;
    width: 100%;
  }
  /* line 1093, ../sass/style.scss */
  #mobile-nav-neighborhood li {
    font-size: 12px;
    color: #465973;
    padding: 11px 0 9px 30px;
    border-bottom: 1px solid #465973;
  }
  /* line 1097, ../sass/style.scss */
  #mobile-nav-neighborhood li.current {
    background-color: #465973;
    background-position: 740px -570px;
  }
  /* line 1100, ../sass/style.scss */
  #mobile-nav-neighborhood li.current a {
    color: white;
  }
  /* line 1102, ../sass/style.scss */
  #mobile-nav-neighborhood li.active {
    background-color: #465973;
  }
  /* line 1104, ../sass/style.scss */
  #mobile-nav-neighborhood li.active a {
    color: white;
    background-position: 678px -701px;
  }
  /* line 1113, ../sass/style.scss */
  #mobile-nav-neighborhood li.page-content li {
    border-bottom: none;
    list-style: circle;
    padding-left: 0px;
  }
  /* line 1119, ../sass/style.scss */
  #mobile-nav-neighborhood li ol {
    padding-left: 15px;
  }
  /* line 1121, ../sass/style.scss */
  #mobile-nav-neighborhood li ol li {
    border: none;
    padding-left: 0;
  }
  /* line 1124, ../sass/style.scss */
  #mobile-nav-neighborhood li ol li.sub-parent {
    clear: both;
  }
  /* line 1126, ../sass/style.scss */
  #mobile-nav-neighborhood li ol .sub-child {
    padding-left: 50px;
  }
  /* line 1128, ../sass/style.scss */
  #mobile-nav-neighborhood li ol .sub-child .location-content {
    width: 570px;
    padding: 0 15px;
  }
  /* line 1132, ../sass/style.scss */
  #mobile-nav-neighborhood li ol .sub-child a {
    float: left;
    border: none;
    width: 86px;
    display: inline;
    margin-top: 10px;
    height: 23px;
    font-size: 12px;
    color: #475973;
    background-image: none;
    padding: 7px 0 0 24px;
    background-color: #abc8e2;
  }
  /* line 1149, ../sass/style.scss */
  #mobile-nav-neighborhood a {
    color: #465973;
    text-decoration: none;
    background-position: 675px -636px;
  }
  /* line 49, ../sass/style.scss */
  #mobile-nav-neighborhood a:visited {
    color: #465973;
  }
  /* line 50, ../sass/style.scss */
  #mobile-nav-neighborhood a:hover {
    color: #465973;
  }
  /* line 51, ../sass/style.scss */
  #mobile-nav-neighborhood a:active {
    color: #465973;
  }
  /* line 1157, ../sass/style.scss */
  .tablet-neighborhood-img {
    display: block;
  }

  /* line 1162, ../sass/style.scss */
  #mobile-nav-residencies .mobile-gallery,
  #mobile-nav-residencies .mobile-floorplans,
  #mobile-nav-residencies .mobile-neighbors {
    width: 545px;
    padding: 0;
    border: none;
    margin: 10px 0 0 105px;
  }
  /* line 1167, ../sass/style.scss */
  #mobile-nav-residencies .mobile-gallery .mask,
  #mobile-nav-residencies .mobile-floorplans .mask,
  #mobile-nav-residencies .mobile-neighbors .mask {
    width: 555px;
    margin-left: 0;
  }
  /* line 1171, ../sass/style.scss */
  #mobile-nav-residencies .mobile-gallery .gallery-image,
  #mobile-nav-residencies .mobile-floorplans .gallery-image,
  #mobile-nav-residencies .mobile-neighbors .gallery-image {
    clear: none;
    border: none;
  }
  /* line 1175, ../sass/style.scss */
  #mobile-nav-residencies .mobile-gallery .prev,
  #mobile-nav-residencies .mobile-floorplans .prev,
  #mobile-nav-residencies .mobile-neighbors .prev {
    float: left;
  }
  /* line 1176, ../sass/style.scss */
  #mobile-nav-residencies .mobile-gallery .next,
  #mobile-nav-residencies .mobile-floorplans .next,
  #mobile-nav-residencies .mobile-neighbors .next {
    float: right;
  }
  /* line 1180, ../sass/style.scss */
  #mobile-nav-residencies .mobile-floorplans .mask,
  #mobile-nav-residencies .mobile-neighbors .mask {
    margin-left: 50px;
    width: 525px;
  }

  /* line 1188, ../sass/style.scss */
  #mobile-nav-community .mobile-neighbors {
    width: 545px;
    padding: 0;
    border: none;
    margin: 10px 0 0 105px;
  }
  /* line 1193, ../sass/style.scss */
  #mobile-nav-community .mobile-neighbors .mask {
    width: 555px;
    margin: 0 0 10px 0;
  }
  /* line 1197, ../sass/style.scss */
  #mobile-nav-community .mobile-neighbors .prev {
    float: left;
  }
  /* line 1198, ../sass/style.scss */
  #mobile-nav-community .mobile-neighbors .next {
    float: right;
  }

  /* line 1202, ../sass/style.scss */
  #mobile-sidebar-content {
    background-color: #465973;
  }
  /* line 1204, ../sass/style.scss */
  #mobile-sidebar-content h2 {
    font-size: 15px;
    color: #abc8e2;
    font-family: 'Open Sans';
    font-weight: 400;
    font-style: normal;
  }
  /* line 1210, ../sass/style.scss */
  #mobile-sidebar-content p {
    font-size: 12px;
    color: white;
    line-height: 2;
  }

  /* line 1217, ../sass/style.scss */
  #mobile-contact-form .mobile-wrap {
    padding-left: 80px;
    padding-right: 80px;
  }
  /* line 1221, ../sass/style.scss */
  #mobile-contact-form h2 {
    font-size: 16px;
    color: #abc8e2;
  }
  /* line 1222, ../sass/style.scss */
  #mobile-contact-form p {
    font-size: 12px;
    color: #465973;
  }
  /* line 1223, ../sass/style.scss */
  #mobile-contact-form label {
    color: #c0c1c2;
  }
  /* line 1224, ../sass/style.scss */
  #mobile-contact-form form {
    margin-top: 12px;
  }
  /* line 1227, ../sass/style.scss */
  #mobile-contact-form input[type="text"] {
    font-size: 10px;
    color: white;
    border: none;
    background-color: rgba(239, 240, 241, 0.7);
    padding: 3px 5px;
    width: 240px;
    margin-bottom: 5px;
    width: 100%;
  }
  /* line 1232, ../sass/style.scss */
  #mobile-contact-form input[type="submit"] {
    border: none;
    width: 110px;
    height: 30px;
    font-size: 12px;
    color: #475973;
    background-color: #abc8e2;
  }
  /* line 1242, ../sass/style.scss */
  #mobile-contact-form .input-button {
    float: left;
  }
  /* line 1244, ../sass/style.scss */
  #mobile-contact-form textarea {
    font-size: 10px;
    color: white;
    border: none;
    background-color: rgba(239, 240, 241, 0.7);
    padding: 3px 5px;
    width: 240px;
    margin-bottom: 10px;
    resize: none;
    height: 80px;
    width: 100%;
  }

  /* line 1252, ../sass/style.scss */
  #blog-nav {
    width: 100%;
    background-color: #465973;
    padding-left: 0;
    margin-top: 0;
  }
  /* line 1257, ../sass/style.scss */
  #blog-nav p {
    margin-left: 30px;
  }

  /* line 1263, ../sass/style.scss */
  .blog .mobile-wrap {
    padding: 0;
  }
  /* line 1264, ../sass/style.scss */
  .blog #page-content {
    margin-bottom: 60px;
  }
  /* line 1266, ../sass/style.scss */
  .blog #page-content .post {
    width: 384px;
    margin: 0;
  }
  /* line 1269, ../sass/style.scss */
  .blog #page-content .post .datetime {
    bottom: 50px;
    width: 370px;
  }
  /* line 1273, ../sass/style.scss */
  .blog #page-content .post h2 {
    width: 355px;
    padding-top: 0;
  }
  /* line 1277, ../sass/style.scss */
  .blog #page-content .post .tablet-img {
    display: block;
  }
  /* line 1278, ../sass/style.scss */
  .blog #page-content .post .post-body {
    width: 364px;
  }

  /* line 1284, ../sass/style.scss */
  .single .mobile-wrap {
    padding: 15px 0;
  }
  /* line 1285, ../sass/style.scss */
  .single #page-content {
    width: 100%;
  }
  /* line 1287, ../sass/style.scss */
  .single #page-content .news-post {
    margin-top: 0;
    width: 100%;
    background-color: transparent;
    padding: 30px 0;
  }
  /* line 1292, ../sass/style.scss */
  .single #page-content .news-post .datetime {
    font-size: 12px;
    color: #465973;
  }
  /* line 1293, ../sass/style.scss */
  .single #page-content .news-post .gallery-thumb {
    margin: 0;
    text-align: center;
    width: 100%;
  }
  /* line 1297, ../sass/style.scss */
  .single #page-content .news-post .gallery-thumb img {
    width: 100%;
  }
  /* line 1299, ../sass/style.scss */
  .single #page-content .news-post .content {
    height: 100%;
    width: 92%;
    padding-right: 0;
    padding: 15px 30px 0;
  }
  /* line 1307, ../sass/style.scss */
  .single #nav-mobile-single {
    background-color: white;
    padding: 0 30px;
  }
  /* line 1310, ../sass/style.scss */
  .single #nav-mobile-single a {
    display: -moz-inline-stack;
    display: inline-block;
    vertical-align: middle;
    *vertical-align: auto;
    zoom: 1;
    *display: inline;
    background: url('../images/tides-s850aa1e7f8.png?1357221753') no-repeat scroll transparent 0 -437px;
    text-indent: -119988px;
    overflow: hidden;
    text-align: left;
    width: 128px;
    height: 30px;
  }
  /* line 1313, ../sass/style.scss */
  .single #nav-mobile-single a[rel="prev"] {
    background-position: 0 -311px;
    float: left;
  }
  /* line 1317, ../sass/style.scss */
  .single #nav-mobile-single a[rel="next"] {
    background-position: 0 -361px;
    float: left;
    margin-left: 388px;
    display: inline;
  }
  /* line 1326, ../sass/style.scss */
  .single #nav-mobile-single a.back {
    float: right;
    width: 64px;
    background-position: 0 -411px;
  }

  /* line 1335, ../sass/style.scss */
  #footer {
    margin-top: 285px;
    display: inline;
    float: left;
  }
  /* line 1339, ../sass/style.scss */
  #footer .divide {
    width: 97%;
  }

  /* line 1342, ../sass/style.scss */
  #footer-toggle {
    right: 36%;
  }

  /* line 1343, ../sass/style.scss */
  #sub-footer {
    width: auto;
    margin-left: 70px;
  }

  /* line 1347, ../sass/style.scss */
  #footer-content {
    margin: 0;
  }
  /* line 1349, ../sass/style.scss */
  #footer-content .footer-box {
    margin: 0 5px 10px 10px;
    width: 355px;
  }

  /* line 1357, ../sass/style.scss */
  .page-id-157 ul li {
    font-size: 12px;
    color: #465973;
    margin-bottom: 0px;
  }

  /* line 1366, ../sass/style.scss */
  .page-id-157 p {
    font-size: 12px;
    color: #465973;
  }

  /* line 1395, ../sass/style.scss */
  #bg,
  #top-stripe,
  #bottom-stripe,
  #sidebar-content,
  #layout-footer,
  #nav-residencies,
  #nav-neighborhood,
  #nav-residencies,
  #nav-community,
  #main-nav,
  .mobile-neighborhood-img,
  .blog .post-thumbnail img,
  .page-id-6 #page-content,
  .page-id-8 #page-content,
  .page-id-22 #page-content,
  .page-id-24 #page-content,
  .page-id-26 #page-content,
  .page-id-157 #page-content,
  .page-id-379 #page-content,
  .page-id-364 #page-content,
  .blog #mobile-nav ul li:last-child,
  .single #mobile-nav ul li:last-child,
  #contact-form,
  .mobile-carousel-floorplans,
  .phone-carousel-gallery,
  .phone-carousel-neighbors {
    display: none;
  }

  /* line 1405, ../sass/style.scss */
  .page-id-6 #page-content,
  .page-id-8 #page-content,
  .page-id-22 #page-content,
  .page-id-24 #page-content,
  .page-id-26 #page-content,
  .page-id-157 #page-content,
  .page-id-379 #page-content,
  .single-post #page-content {
    margin-top: 0 !important;
    margin: 0;
  }

  /* line 1413, ../sass/style.scss */
  .page-id-379 #mobile-contact-info {
    padding: 0 70px;
  }
  /* line 1415, ../sass/style.scss */
  .page-id-379 #mobile-contact-info h3 {
    text-transform: uppercase;
    font-size: 18px;
    margin-bottom: 20px;
  }
  /* line 1420, ../sass/style.scss */
  .page-id-379 #mobile-contact-info p {
    color: #465973;
    margin: 0 0 10px 0;
    font-size: 12px;
  }
  /* line 1426, ../sass/style.scss */
  .page-id-379 #mobile-map {
    margin: 50px 80px 0 0;
  }

  /* line 1433, ../sass/style.scss */
  #page-amenities .mobile-wrap {
    background-color: #465973;
  }
  /* line 1435, ../sass/style.scss */
  #page-amenities .mobile-wrap h2 {
    font-size: 15px;
    color: #abc8e2;
  }
  /* line 1436, ../sass/style.scss */
  #page-amenities .mobile-wrap p {
    font-size: 12px;
    color: white;
  }
}
@media only screen and (max-width: 768px) and (max-width: 720px) {
  /* line 1104, ../sass/style.scss */
  #mobile-nav-neighborhood li.active a {
    background-position: 648px -636px;
  }
}
@media only screen and (max-width: 768px) and (max-width: 720px) {
  /* line 1149, ../sass/style.scss */
  #mobile-nav-neighborhood a {
    background-position: 645px -636px;
  }
}

@media only screen and (max-width: 768px) and (max-width: 720px) {
  /* line 1317, ../sass/style.scss */
  .single #nav-mobile-single a[rel="next"] {
    margin-left: 342px;
  }
}
/* Mobile Portrait Size to Mobile Landscape Size (devices and browsers) */
@media only screen and (max-width: 540px) {
  /* line 1450, ../sass/style.scss */
  #bg, .gallery-thumb,
  .blog #page-content .post .tablet-img,
  .tablet-neighborhood-img,
  .carousel-floorplans,
  .carousel-gallery,
  .carousel-neighbors,
  .carousel-neighbors,
  .mobile-carousel-gallery,
  .mobile-carousel-floorplans,
  .mobile-carousel-neighbors {
    display: none;
  }

  /* line 1455, ../sass/style.scss */
  .mobile-neighborhood-img,
  .phone-carousel-floorplans,
  .phone-carousel-gallery,
  .phone-carousel-neighbors {
    display: block;
  }

  /* line 1457, ../sass/style.scss */
  .mobile-neighborhood-img {
    width: 100%;
  }

  /* line 1460, ../sass/style.scss */
  .blog #page-content .post .mobile-img,
  #bg-mobile {
    display: block;
  }

  /* line 1465, ../sass/style.scss */
  #header nav.right ul li a {
    width: 94%;
  }

  /* line 1474, ../sass/style.scss */
  .blog #page-content .post {
    width: 240px;
    margin-bottom: 5px;
  }
  /* line 1477, ../sass/style.scss */
  .blog #page-content .post .mobile-img {
    width: 240px;
  }
  /* line 1478, ../sass/style.scss */
  .blog #page-content .post .datetime {
    width: 225px;
  }
  /* line 1479, ../sass/style.scss */
  .blog #page-content .post h2 {
    width: 210px;
  }
  /* line 1480, ../sass/style.scss */
  .blog #page-content .post .post-body {
    width: 220px;
  }

  /* line 1485, ../sass/style.scss */
  .single #nav-mobile-single {
    padding: 0;
  }
  /* line 1488, ../sass/style.scss */
  .single #nav-mobile-single a[rel="next"] {
    float: left;
    margin-left: 0;
  }
  /* line 1492, ../sass/style.scss */
  .single #nav-mobile-single a.back {
    display: block;
  }
  /* line 1495, ../sass/style.scss */
  .single .mobile-wrap {
    padding: 0;
  }
  /* line 1497, ../sass/style.scss */
  .single #page-content .news-post {
    padding: 0;
  }
  /* line 1499, ../sass/style.scss */
  .single #page-content .news-post img {
    width: 480px;
  }
  /* line 1500, ../sass/style.scss */
  .single #page-content .news-post .content {
    width: 450px;
    padding: 15px 15px 0;
  }

  /* line 1508, ../sass/style.scss */
  #mobile-slider li {
    width: 320px;
    height: 267px;
    list-style: none !important;
  }
  /* line 1512, ../sass/style.scss */
  #mobile-slider li h4 {
    padding: 0 10px;
  }
  /* line 1513, ../sass/style.scss */
  #mobile-slider li p {
    padding: 0 10px;
  }

  /* line 1518, ../sass/style.scss */
  .home #page-content h2 {
    font-size: 26px;
  }

  /* line 1523, ../sass/style.scss */
  #mobile-nav-residencies,
  #mobile-nav-community {
    background-color: white;
    width: 100%;
  }
  /* line 1528, ../sass/style.scss */
  #mobile-nav-residencies .mobile-gallery,
  #mobile-nav-residencies .mobile-floorplans,
  #mobile-nav-residencies .mobile-neighbors,
  #mobile-nav-community .mobile-gallery,
  #mobile-nav-community .mobile-floorplans,
  #mobile-nav-community .mobile-neighbors {
    width: 0px;
    margin: 0;
  }
  /* line 1533, ../sass/style.scss */
  #mobile-nav-residencies li.current,
  #mobile-nav-community li.current {
    background-color: #465973;
  }
  /* line 1535, ../sass/style.scss */
  #mobile-nav-residencies li.current a,
  #mobile-nav-community li.current a {
    color: white;
  }
  /* line 1540, ../sass/style.scss */
  #mobile-nav-residencies .mobile-floorplans .mask,
  #mobile-nav-residencies .mobile-neighbors .mask,
  #mobile-nav-community .mobile-floorplans .mask,
  #mobile-nav-community .mobile-neighbors .mask {
    width: 300px !important;
  }

  /* line 1547, ../sass/style.scss */
  #mobile-contact-form .mobile-wrap {
    padding-left: 30px;
    padding-right: 30px;
  }

  /* line 1556, ../sass/style.scss */
  #mobile-nav-neighborhood li ol .sub-child {
    padding-left: 0;
    margin-left: -45px;
    border-bottom: 1px solid #465973;
    float: left;
    padding-bottom: 10px;
  }
  /* line 1562, ../sass/style.scss */
  #mobile-nav-neighborhood li ol .sub-child .location-content {
    width: 90%;
    padding: 0 15px;
  }
  /* line 1569, ../sass/style.scss */
  #mobile-nav-neighborhood li.active a {
    background-position: 414px -701px;
  }
  /* line 1571, ../sass/style.scss */
  #mobile-nav-neighborhood li a {
    background-position: 410px -636px;
  }

  /* line 1576, ../sass/style.scss */
  .mask {
    width: 350px !important;
    height: 250px;
  }

  /* line 1583, ../sass/style.scss */
  .mobile-carousel-floorplans .prev,
  .mobile-carousel-neighbors .prev {
    float: left;
  }
  /* line 1586, ../sass/style.scss */
  .mobile-carousel-floorplans .next,
  .mobile-carousel-neighbors .next {
    float: right;
  }

  /* line 1594, ../sass/style.scss */
  .phone-carousel-gallery,
  .phone-carousel-floorplans,
  .phone-carousel-neighbors {
    margin: 0 0 0 45px;
    width: 300px;
  }
  /* line 1597, ../sass/style.scss */
  .phone-carousel-gallery .mask,
  .phone-carousel-floorplans .mask,
  .phone-carousel-neighbors .mask {
    margin: 0 !important;
  }

  /* line 1603, ../sass/style.scss */
  .phone-carousel-gallery,
  .phone-carousel-floorplans {
    margin: 0 0 0 30px;
    width: 350px;
  }

  /* line 1610, ../sass/style.scss */
  #mobile-nav-community .phone-carousel-neighbors .mask {
    width: 185px !important;
    margin: 0 0 10px 65px !important;
  }

  /* line 1617, ../sass/style.scss */
  #footer-toggle {
    right: 30%;
  }

  /* line 1618, ../sass/style.scss */
  #sub-footer {
    margin-left: -100px;
  }

  /* line 1620, ../sass/style.scss */
  #footer .divide {
    width: 95%;
  }

  /* line 1622, ../sass/style.scss */
  #footer-content {
    margin: 0;
  }
  /* line 1624, ../sass/style.scss */
  #footer-content .footer-box {
    width: 305px;
  }
  /* line 1626, ../sass/style.scss */
  #footer-content .footer-box h4 {
    font-size: 24px;
  }
  /* line 1627, ../sass/style.scss */
  #footer-content .footer-box.first-box {
    width: 305px;
  }
}
@media only screen and (max-width: 320px) {
  /* line 1633, ../sass/style.scss */
  .tablet-neighborhood-img {
    display: none;
  }

  /* line 1634, ../sass/style.scss */
  #sub-footer {
    margin-left: -120px;
  }

  /* line 1635, ../sass/style.scss */
  #footer-toggle {
    right: 23%;
  }

  /* line 1640, ../sass/style.scss */
  #mobile-nav-residencies .mobile-gallery,
  #mobile-nav-residencies .mobile-floorplans,
  #mobile-nav-residencies .mobile-neighbors {
    width: 320px;
  }

  /* line 1646, ../sass/style.scss */
  #mobile-nav-neighborhood li ol .sub-child {
    padding-left: 0;
    margin-left: -45px;
    border-bottom: 1px solid #465973;
    float: left;
    padding-bottom: 10px;
  }
  /* line 1652, ../sass/style.scss */
  #mobile-nav-neighborhood li ol .sub-child .location-content {
    width: 90%;
    padding: 0 15px;
  }
  /* line 1659, ../sass/style.scss */
  #mobile-nav-neighborhood li.active a {
    background-position: 254px -701px;
  }
  /* line 1661, ../sass/style.scss */
  #mobile-nav-neighborhood li a {
    background-position: 250px -636px;
  }

  /* line 1666, ../sass/style.scss */
  .blog #page-content .post {
    width: 300px;
    margin-bottom: 5px;
  }
  /* line 1669, ../sass/style.scss */
  .blog #page-content .post .mobile-img {
    width: 320px;
  }
  /* line 1670, ../sass/style.scss */
  .blog #page-content .post .datetime {
    width: 305px;
  }
  /* line 1671, ../sass/style.scss */
  .blog #page-content .post h2 {
    width: 290px;
  }
  /* line 1672, ../sass/style.scss */
  .blog #page-content .post .post-body {
    width: 300px;
  }

  /* line 1679, ../sass/style.scss */
  .single #page-content .news-post img {
    width: 320px;
  }
  /* line 1680, ../sass/style.scss */
  .single #page-content .news-post .content {
    width: 290px;
  }
}
/* ==========================================================================
   Print styles.
   Inlined to avoid required HTTP connection: h5bp.com/r
   ========================================================================== */
@media print {
  /* line 1691, ../sass/style.scss */
  * {
    background: transparent !important;
    color: #000 !important;
    /* Black prints faster: h5bp.com/s */
    box-shadow: none !important;
    text-shadow: none !important;
  }

  /* line 1699, ../sass/style.scss */
  a,
  a:visited {
    text-decoration: underline;
  }

  /* line 1701, ../sass/style.scss */
  a[href]:after {
    content: " (" attr(href) ")";
  }

  /* line 1703, ../sass/style.scss */
  abbr[title]:after {
    content: " (" attr(title) ")";
  }

  /*
   * Don't show links for images, or javascript/internal links
   */
  /* line 1711, ../sass/style.scss */
  .ir a:after,
  a[href^="javascript:"]:after,
  a[href^="#"]:after {
    content: "";
  }

  /* line 1714, ../sass/style.scss */
  pre,
  blockquote {
    border: 1px solid #999;
    page-break-inside: avoid;
  }

  /* line 1719, ../sass/style.scss */
  thead {
    display: table-header-group;
    /* h5bp.com/t */
  }

  /* line 1722, ../sass/style.scss */
  tr,
  img {
