<style>
* {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 920px;
  width: 100%;
  line-height: 1.4;
  text-align: center;
  padding-left: 15px;
  padding-right: 15px;
}

.notfound .notfound-404 {
  position: absolute;
  height: 100px;
  top: 0;
  left: 50%;
  -webkit-transform: translateX(-50%);
      -ms-transform: translateX(-50%);
          transform: translateX(-50%);
  z-index: -1;
}

.notfound .notfound-404 h1 {
  font-family: 'Maven Pro', sans-serif;
  color: #ececec;
  font-weight: 900;
  font-size: 276px;
  margin: 0px;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound h2 {
  font-family: 'Maven Pro', sans-serif;
  font-size: 46px;
  color: #000;
  font-weight: 900;
  text-transform: uppercase;
  margin: 0px;
}

.notfound p {
  font-family: 'Maven Pro', sans-serif;
  font-size: 16px;
  color: #000;
  font-weight: 400;
  text-transform: uppercase;
  margin-top: 15px;
}

.notfound a {
  font-family: 'Maven Pro', sans-serif;
  font-size: 14px;
  text-decoration: none;
  text-transform: uppercase;
  background: #189cf0;
  display: inline-block;
  padding: 16px 38px;
  border: 2px solid transparent;
  border-radius: 40px;
  color: #fff;
  font-weight: 400;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.notfound a:hover {
  background-color: #fff;
  border-color: #189cf0;
  color: #189cf0;
}

@media only screen and (max-width: 480px) {
  .notfound .notfound-404 h1 {
    font-size: 162px;
  }
  .notfound h2 {
    font-size: 26px;
  }
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>404 HTML Tempate by Colorlib</title>

<style id="" media="all">/* vietnamese */
@font-face {
  font-family: 'Maven Pro';
  font-style: normal;
  font-weight: 400;
  src: url(/fonts.gstatic.com/s/mavenpro/v22/7Au9p_AqnyWWAxW2Wk3GwmQIAFg.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Maven Pro';
  font-style: normal;
  font-weight: 400;
  src: url(/fonts.gstatic.com/s/mavenpro/v22/7Au9p_AqnyWWAxW2Wk3Gw2QIAFg.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Maven Pro';
  font-style: normal;
  font-weight: 400;
  src: url(/fonts.gstatic.com/s/mavenpro/v22/7Au9p_AqnyWWAxW2Wk3GzWQI.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* vietnamese */
@font-face {
  font-family: 'Maven Pro';
  font-style: normal;
  font-weight: 900;
  src: url(/fonts.gstatic.com/s/mavenpro/v22/7Au9p_AqnyWWAxW2Wk3GwmQIAFg.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Maven Pro';
  font-style: normal;
  font-weight: 900;
  src: url(/fonts.gstatic.com/s/mavenpro/v22/7Au9p_AqnyWWAxW2Wk3Gw2QIAFg.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Maven Pro';
  font-style: normal;
  font-weight: 900;
  src: url(/fonts.gstatic.com/s/mavenpro/v22/7Au9p_AqnyWWAxW2Wk3GzWQI.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
</style>

<link type="text/css" rel="stylesheet" href="css/style.css" />


<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
<meta name="robots" content="noindex, follow">
</head>
<body>
<div id="notfound">
<div class="notfound">
<div class="notfound-404">
<h1><?= $error ?></h1>
</div>
<h2 class = "ltext-101"><?= $title ?></h2>
<p><?= $content ?></p>
<a href="#" class = "m-t-20"><?= __RETURN_HOME_PAGE__ ?></a>
</div>
</div>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"666e1a92bafccbe4","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.6.0","si":10}'></script>
</body>
</html>
