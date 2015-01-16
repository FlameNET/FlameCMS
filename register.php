<!-- DO NOT TOUCH -->
<?php require_once('system/config.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" class="en-gb">
<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="imagetoolbar" content="false" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- YOU CAN TOUCH NOW -->
<!-- (If you know what you're doing) -->
<!-- Description of CMS -->
<?php include('webkit/desc.php'); ?>
<!-- Description of CMS END -->
<title><?php echo TITLE ?> | Registration</title>
<!-- The Styles & Javascripts of the CMS -->
<link rel="shortcut icon" href="assets/images/logos/favicon.png" />
<link rel="search" type="application/opensearchdescription+xml" href="en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/local-common/css/common.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/bnet.css" />
<link rel="stylesheet" type="text/css" media="print" href="<?php echo BASE_URL ?>assets/account/static/css/bnet-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/legal/ratings.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/inputs.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/account-creation/streamlined-creation.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>assets/account/static/css/locale/en-gb.css" />
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/third-party/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/common/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/third-party/class-inheritance.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/third-party/swfobject-2.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/common.js"></script>
<script type="text/javascript">
//<![CDATA[
var Core = Core || {},
Login = Login || {};
Core.staticUrl = '<?php echo BASE_URL ?>assets/account/static';
Core.sharedStaticUrl = '<?php echo BASE_URL ?>assets/account/static/local-common';
Core.baseUrl = 'account';
Core.projectUrl = 'account';
Core.cdnUrl = 'http://media.blizzard.com/';
Core.supportUrl = 'support/';
Core.secureSupportUrl = 'support/';
Core.project = 'bam';
Core.locale = 'en-gb';
Core.language = 'en';
Core.region = 'eu';
Core.shortDateFormat = 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = false;
Core.userAgent = 'web';
Login.embeddedUrl = '<?php echo CORE ?>loginframe.php';
var Flash = Flash || {};
Flash.videoPlayer = '';
Flash.videoBase = '';
Flash.ratingImage = '';
Flash.expressInstall = '';
var _gaq = _gaq || [];
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_trackPageview']);
//]]>
</script>
</head>
<body class="en-gb creation">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<div id="search-bar">
<form action="search" id="search-form" method="get"><div>
<input accesskey="q" alt="Search Battle.net" id="search-field" maxlength="35" name="q" tabindex="50" type="text" value="Search Battle.net" />
<input id="search-button" title="Search Battle.net" tabindex="50" type="submit" value="" />
</div>
</form>
</div>
<h1 id="logo"><a accesskey="h" href="" tabindex="50"></a></h1>
<div id="navigation">
<div id="page-menu" class="large">
<h2><a href="<?php echo BASE_URL ?>assets/account/management/"> Account Creation
</a></h2>
<h2 class="second-header"></h2>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<!-- User Panel -->
<?php include('webkit/userpanel.php'); ?>
<!-- User Panel END -->
</div>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header">
<p class="privacy-message"><b>We value and respect your privacy.</b> Find out how <?php echo TITLE ?> safeguards user information by reading our <a href="#" onclick="window.open(this.href); return false;">Online Privacy Policy</a>.</p>
</div>
<form action="#" method="get" class="country-select">
<div xmlns="http://www.w3.org/1999/xhtml" class="input-row input-row-select">
<span class="input-left">
<label for="country">
<span class="label-text">
Country of Residence:
</span>
<span class="input-required"></span>
</label>
</span><!--
--><span class="input-right">
<span class="input-select input-select-small">
<select name="country" id="country" class="small border-5 glow-shadow-2" tabindex="1">
<option value="" selected="selected">Select a country</option>
<option value="AFG">Afghanistan</option>
<option value="ALA">&#197;land Islands</option>
<option value="ALB">Albania</option>
<option value="DZA">Algeria</option>
<option value="ASM">American Samoa</option>
<option value="AND">Andorra</option>
<option value="AGO">Angola</option>
<option value="AIA">Anguilla</option>
<option value="ATA">Antarctica</option>
<option value="ATG">Antigua And Barbuda</option>
<option value="ARG">Argentina</option>
<option value="ARM">Armenia</option>
<option value="ABW">Aruba</option>
<option value="AUS">Australia</option>
<option value="AUT">Austria</option>
<option value="AZE">Azerbaijan</option>
<option value="BHS">Bahamas</option>
<option value="BHR">Bahrain</option>
<option value="BGD">Bangladesh</option>
<option value="BRB">Barbados</option>
<option value="BLR">Belarus</option>
<option value="BEL">Belgium</option>
<option value="BLZ">Belize</option>
<option value="BEN">Benin</option>
<option value="BMU">Bermuda</option>
<option value="BTN">Bhutan</option>
<option value="BOL">Bolivia</option>
<option value="BIH">Bosnia And Herzegovina</option>
<option value="BWA">Botswana</option>
<option value="BVT">Bouvet Island</option>
<option value="BRA">Brazil</option>
<option value="IOT">British Indian Ocean Territory</option>
<option value="BRN">Brunei Darussalam</option>
<option value="BGR">Bulgaria</option>
<option value="BFA">Burkina Faso</option>
<option value="BDI">Burundi</option>
<option value="KHM">Cambodia</option>
<option value="CMR">Cameroon</option>
<option value="CAN">Canada</option>
<option value="CPV">Cape Verde</option>
<option value="CYM">Cayman Islands</option>
<option value="CAF">Central African Republic</option>
<option value="TCD">Chad</option>
<option value="CHL">Chile</option>
<option value="CHN">China</option>
<option value="CXR">Christmas Island</option>
<option value="CCK">Cocos (Keeling) Islands</option>
<option value="COL">Colombia</option>
<option value="COM">Comoros</option>
<option value="COG">Congo</option>
<option value="COD">Congo, Democratic Republic Of The</option>
<option value="COK">Cook Islands</option>
<option value="CRI">Costa Rica</option>
<option value="CIV">Cote D'Ivoire</option>
<option value="HRV">Croatia</option>
<option value="CYP">Cyprus</option>
<option value="CZE">Czech Republic</option>
<option value="DNK">Denmark</option>
<option value="DJI">Djibouti</option>
<option value="DMA">Dominica</option>
<option value="DOM">Dominican Republic</option>
<option value="TLS">East Timor</option>
<option value="ECU">Ecuador</option>
<option value="EGY">Egypt</option>
<option value="SLV">El Salvador</option>
<option value="GNQ">Equatorial Guinea</option>
<option value="ERI">Eritrea</option>
<option value="EST">Estonia</option>
<option value="ETH">Ethiopia</option>
<option value="FLK">Falkland Islands (Malvinas)</option>
<option value="FRO">Faroe Islands</option>
<option value="FJI">Fiji</option>
<option value="FIN">Finland</option>
<option value="FRA">France</option>
<option value="GUF">French Guiana</option>
<option value="ATF">French Southern Territories</option>
<option value="GAB">Gabon</option>
<option value="GMB">Gambia</option>
<option value="GEO">Georgia</option>
<option value="DEU">Germany</option>
<option value="GHA">Ghana</option>
<option value="GIB">Gibraltar</option>
<option value="GRC">Greece</option>
<option value="GRL">Greenland</option>
<option value="GRD">Grenada</option>
<option value="GLP">Guadeloupe</option>
<option value="GUM">Guam</option>
<option value="GTM">Guatemala</option>
<option value="GGY">Guernsey</option>
<option value="GIN">Guinea</option>
<option value="GNB">Guinea-Bissau</option>
<option value="GUY">Guyana</option>
<option value="HTI">Haiti</option>
<option value="HMD">Heard Island And Mcdonald Islands</option>
<option value="HND">Honduras</option>
<option value="HKG">Hong Kong</option>
<option value="HUN">Hungary</option>
<option value="ISL">Iceland</option>
<option value="IND">India</option>
<option value="IDN">Indonesia</option>
<option value="IRN">Iran, Islamic Republic Of</option>
<option value="IRQ">Iraq</option>
<option value="IRL">Ireland</option>
<option value="IMN">Isle Of Man</option>
<option value="ISR">Israel</option>
<option value="ITA">Italy</option>
<option value="JAM">Jamaica</option>
<option value="JPN">Japan</option>
<option value="JEY">Jersey</option>
<option value="JOR">Jordan</option>
<option value="KAZ">Kazakhstan</option>
<option value="KEN">Kenya</option>
<option value="KIR">Kiribati</option>
<option value="KOR">Korea, Republic Of</option>
<option value="KWT">Kuwait</option>
<option value="KGZ">Kyrgyzstan</option>
<option value="LAO">Lao People's Democratic Republic</option>
<option value="LVA">Latvia</option>
<option value="LBN">Lebanon</option>
<option value="LSO">Lesotho</option>
<option value="LBR">Liberia</option>
<option value="LBY">Libyan Arab Jamahiriya</option>
<option value="LIE">Liechtenstein</option>
<option value="LTU">Lithuania</option>
<option value="LUX">Luxembourg</option>
<option value="MAC">Macao</option>
<option value="MKD">Macedonia, The Former Yugoslav Republic Of</option>
<option value="MDG">Madagascar</option>
<option value="MWI">Malawi</option>
<option value="MYS">Malaysia</option>
<option value="MDV">Maldives</option>
<option value="MLI">Mali</option>
<option value="MLT">Malta</option>
<option value="MHL">Marshall Islands</option>
<option value="MRT">Mauritania</option>
<option value="MUS">Mauritius</option>
<option value="MYT">Mayotte</option>
<option value="MEX">Mexico</option>
<option value="FSM">Micronesia, Federated States Of</option>
<option value="MDA">Moldova, Republic Of</option>
<option value="MCO">Monaco</option>
<option value="MNG">Mongolia</option>
<option value="MNE">Montenegro</option>
<option value="MSR">Montserrat</option>
<option value="MAR">Morocco</option>
<option value="MOZ">Mozambique</option>
<option value="NAM">Namibia</option>
<option value="NRU">Nauru</option>
<option value="NPL">Nepal</option>
<option value="NLD">Netherlands</option>
<option value="ANT">Netherlands Antilles</option>
<option value="NCL">New Caledonia</option>
<option value="NZL">New Zealand</option>
<option value="NIC">Nicaragua</option>
<option value="NER">Niger</option>
<option value="NGA">Nigeria</option>
<option value="NIU">Niue</option>
<option value="NFK">Norfolk Island</option>
<option value="MNP">Northern Mariana Islands</option>
<option value="NOR">Norway</option>
<option value="OMN">Oman</option>
<option value="PAK">Pakistan</option>
<option value="PLW">Palau</option>
<option value="PSE">Palestinian Territory, Occupied</option>
<option value="PAN">Panama</option>
<option value="PNG">Papua New Guinea</option>
<option value="PRY">Paraguay</option>
<option value="PER">Peru</option>
<option value="PHL">Philippines</option>
<option value="PCN">Pitcairn</option>
<option value="POL">Poland</option>
<option value="PRT">Portugal</option>
<option value="PRI">Puerto Rico</option>
<option value="QAT">Qatar</option>
<option value="REU">Reunion</option>
<option value="ROU">Romania</option>
<option value="RUS">Russian Federation</option>
<option value="RWA">Rwanda</option>
<option value="BLM">Saint Barthélemy</option>
<option value="SHN">Saint Helena</option>
<option value="KNA">Saint Kitts And Nevis</option>
<option value="LCA">Saint Lucia</option>
<option value="MAF">Saint Martin (French Part)</option>
<option value="SPM">Saint Pierre And Miquelon</option>
<option value="VCT">Saint Vincent And The Grenadines</option>
<option value="WSM">Samoa</option>
<option value="SMR">San Marino</option>
<option value="STP">Sao Tome And Principe</option>
<option value="SAU">Saudi Arabia</option>
<option value="SEN">Senegal</option>
<option value="SRB">Serbia</option>
<option value="SYC">Seychelles</option>
<option value="SLE">Sierra Leone</option>
<option value="SGP">Singapore</option>
<option value="SVK">Slovakia</option>
<option value="SVN">Slovenia</option>
<option value="SLB">Solomon Islands</option>
<option value="SOM">Somalia</option>
<option value="ZAF">South Africa</option>
<option value="SGS">South Georgia And The South Sandwich Islands</option>
<option value="ESP">Spain</option>
<option value="LKA">Sri Lanka</option>
<option value="SUR">Suriname</option>
<option value="SJM">Svalbard And Jan Mayen</option>
<option value="SWZ">Swaziland</option>
<option value="SWE">Sweden</option>
<option value="CHE">Switzerland</option>
<option value="TWN">Taiwan</option>
<option value="TJK">Tajikistan</option>
<option value="TZA">Tanzania, United Republic Of</option>
<option value="THA">Thailand</option>
<option value="TGO">Togo</option>
<option value="TKL">Tokelau</option>
<option value="TON">Tonga</option>
<option value="TTO">Trinidad And Tobago</option>
<option value="TUN">Tunisia</option>
<option value="TUR">Turkey</option>
<option value="TKM">Turkmenistan</option>
<option value="TCA">Turks And Caicos Islands</option>
<option value="TUV">Tuvalu</option>
<option value="UGA">Uganda</option>
<option value="UKR">Ukraine</option>
<option value="ARE">United Arab Emirates</option>
<option value="GBR">United Kingdom</option>
<option value="USA">United States</option>
<option value="UMI">United States Minor Outlying Islands</option>
<option value="URY">Uruguay</option>
<option value="UZB">Uzbekistan</option>
<option value="VUT">Vanuatu</option>
<option value="VAT">Vatican City State</option>
<option value="VEN">Venezuela, Bolivarian Republic Of</option>
<option value="VNM">Vietnam</option>
<option value="VGB">Virgin Islands, British</option>
<option value="VIR">Virgin Islands, U.S.</option>
<option value="WLF">Wallis And Futuna</option>
<option value="ESH">Western Sahara</option>
<option value="YEM">Yemen</option>
<option value="ZMB">Zambia</option>
<option value="ZWE">Zimbabwe</option>
</select>
<span class="inline-message " id="country-message">&#160;</span>
</span>
<button class="ui-button button1" type="submit" id="country-submit" tabindex="1" style="display: none;"><span class="button-left"><span class="button-right">Change Country</span></span></button>
</span>
</div>
<div class="input-row input-row-note" id="country-warning" style="display: none">
</div>
</form>
<script type="text/javascript">
//<![CDATA[
(function() {
var countrySubmit = document.getElementById('country-submit');
countrySubmit.style.display = 'none';
})();
//]]>
</script>
<div id="page-content">
<form action="#" method="post" id="creation">
<div class="form-blockable" id="country-change">
<div class="input-row input-row-select">
<span class="input-left">
<label for="dobDay">
<span class="label-text">
Date of Birth:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-select input-select-extra-extra-extra-small">
<select name="dobDay" id="dobDay" class="extra-extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="" selected="selected">Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<span class="inline-message no-text-clear" id="dobDay-message">&#160;</span>
</span>
<span class="input-select input-select-extra-extra-small">
<select name="dobMonth" id="dobMonth" class="extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="" selected="selected">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<span class="inline-message no-text-clear" id="dobMonth-message">&#160;</span>
</span>
<span class="input-select input-select-extra-extra-extra-small">
<select name="dobYear" id="dobYear" class="extra-extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="" selected="selected">Year</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
</select>
<span class="inline-message no-text-clear" id="dobYear-message">&#160;</span>
</span>
<span class="inline-note">
<span class="caption">Parents registering for children, <a href="/account/creation/parent-signup.html?country=ALA&amp;theme=bnet">click here.</a></span>
</span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="firstname">
<span class="label-text">
Name:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="firstname" value="" id="firstname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="First Name" />
<span class="inline-message " id="firstname-message">&#160;</span>
</span>
<span class="input-text input-text-small">
<input type="text" name="lastname" value="" id="lastname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="Last Name" />
<span class="inline-message " id="lastname-message">&#160;</span>
</span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="emailAddress">
<span class="label-text">
E-mail Address:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="email" name="emailAddress" value="" id="emailAddress" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="Enter E-mail Address" />
<span class="inline-message " id="emailAddress-message"> <span class="tip-inline tip-default"></span>
<span class="tip-inline tip-information" style="display: none;">This will be the username you use to log in.</span>
<span class="tip-inline tip-warning" style="display: none;">Not a valid e-mail address.</span>
</span>
</span>
<span class="input-text input-text-small">
<input type="email" name="emailAddressConfirmation" value="" id="emailAddressConfirmation" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="Re-enter E-mail Address" />
<span class="inline-message " id="emailAddressConfirmation-message"> <span class="tip-inline tip-default"></span>
<span class="tip-inline tip-information" style="display: none;"></span>
<span class="tip-inline tip-warning" style="display: none;">E-mail addresses must match.</span>
</span>
</span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="password">
<span class="label-text">
Password:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="password" id="password" name="password" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="Enter Password" />
<span class="inline-message " id="password-message">&#160;</span>
</span>
<span class="input-text input-text-small">
<input type="password" id="rePassword" name="rePassword" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="Re-enter Password" />
<span class="inline-message " id="rePassword-message">&#160;</span>
</span>
</span>
</div>
<div class="input-row input-row-note" id="password-strength" style="display: none">
<div class="input-note border-5 glow-shadow">
<div class="input-note-left">
<p class="caption">For your security, we highly recommend that you choose a unique password that you don’t use for any other online&#160;account.</p>
</div>
<div class="input-note-right border-5">
<div class="password-strength">
<span class="password-result">
Password Strength:
<strong id="password-result"></strong>
</span>
<span class="password-rating"><span class="rating rating-default" id="password-rating"></span></span>
</div>
<ul class="password-level" id="password-level">
<li id="password-level-0">
<span class="icon-16"></span>
<span class="icon-16-label">Your password must be between 8–16 characters in&#160;length.</span>
</li>
<li id="password-level-1">
<span class="icon-16"></span>
<span class="icon-16-label">Your password may only contain alphabetic characters (A–Z), numeric characters (0–9), and&#160;punctuation.</span>
</li>
<li id="password-level-2">
<span class="icon-16"></span>
<span class="icon-16-label">Your password must contain at least one alphabetic character and one numeric&#160;character.</span>
</li>
<li id="password-level-3">
<span class="icon-16"></span>
<span class="icon-16-label">Your password must not be similar to your account name.</span>
</li>
<li id="password-level-4">
<span class="icon-16"></span>
<span class="icon-16-label">Passwords must match.</span>
</li>
</ul>
</div>
<div class="clear"></div>
<div class="input-note-arrow"></div>
</div>
</div>
<div class="input-row input-row-select">
<span class="input-left">
<label for="question1">
<span class="label-text">
Secret Question &amp; Answer:
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-select input-select-small">
<select name="question1" id="question1" class="small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="" selected="selected">Select a Question</option>
<option value="19">What was the first car you owned?</option>
<option value="20">What was the street you lived on in high school?</option>
<option value="21">Where was the first place you flew?</option>
<option value="22">What was the first video game you beat?</option>
<option value="23">What was the name of your second pet?</option>
<option value="24">What is the name of your favorite sports team or player?</option>
</select>
</span>
<span class="input-text input-text-small">
<input type="text" name="answer1" value="" id="answer1" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="100" tabindex="1" required="required" placeholder="Answer" />
</span>
</span>
</div>
<div class="input-row input-row-note question-info" id="question-info" style="margin-top: 0; min-height: 24px;">
<span class="inline-message">
<span class="tip-inline tip-default"></span>
<span class="tip-inline tip-information" style="display: none;">This information is used for account security related issues such as resetting your password.</span>
<span class="tip-inline tip-warning" style="display: none;"></span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="agreedToChatPolicy">
<span class="label-text">Chat Agreement:</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<div class="agreement-check">
<p class="tou-desc">As part of the <?php echo TITLE ?> Server, <?php echo TITLE ?> provides various tools to allow you communicate between characters and characters of other players. As these communication tools do not constitute an electronic communication service (in legal terms), messages sent using them should not be considered private or personal. So be careful cause we keep an eye of what you are talking about. Illegal behavior and hacks will not be tolerated. Anything against the Server and the Gameplay or any other tool that makes the gameplay easier is considered a hack tool and your account will be suspended without consideration.</p>
</div>
</span>
</div>
<div class="input-row input-row-checkbox input-row-important">
<span class="input-left">
<span class="title-text">
</span>
<span class="input-required"></span>
</span><!--
--><span class="input-right">
<label for="agreedToChatPolicy">
<input type="checkbox" name="agreedToChatPolicy" value="true" id="agreedToChatPolicy" tabindex="1" required="required" />
<span class="label-text">
I consent to <?php echo TITLE ?> storing and reviewing both sent and received in-game chats and other messages.<span class="input-required">*</span>
</span>
</label>
</span>
<span class="input-left">
<span class="title-text">
</span>
<span class="input-required"></span>
</span><!--
--><span class="input-right">
<label for="agreedToToU">
<input type="checkbox" name="agreedToToU" value="true" id="agreedToToU" tabindex="1" required="required" />
<span class="label-text">
I accept the <a href="#" onclick="window.open(this.href); return false;">Terms of Use</a> applicable to my country of residence and if under 18 years old, agree and acknowledge that my parent or guardian has also reviewed and accepted the Terms of Use on my behalf.<span class="input-required">*</span>
</span>
</label>
</span>
</div>
<div class="submit-row">
<div class="input-left">&#160;</div>
<div class="input-right">
<button class="ui-button button1" type="submit" id="creation-submit" tabindex="1"><span class="button-left"><span class="button-right">Create Free Account</span></span></button>
<a class="ui-cancel "
href=""
tabindex="1">
<span>
Cancel </span>
</a>
</div>
</div>
<div class="form-block" id="country-change-overlay" style="display: none"></div>
</div>
<script type="text/javascript">
//<![CDATA[
var FormMsg = {
'headerSingular': 'Oops! This needs your attention:',
'headerMultiple': 'Oops! This needs your attention:',
'fieldMissing': 'This field is required.',
'fieldsMissing': 'Please fill in all required fields.',
'emailInfo': 'This will be the username you use to log in.',
'emailMissing': 'Please enter a valid e-mail address.',
'emailInvalid': 'Not a valid e-mail address.',
'emailMismatch': 'E-mail addresses must match.',
'passwordInvalid': 'Password does not meet guidelines.',
'passwordMismatch': 'Passwords must match.',
'tosDisagree': 'You must agree to this to continue.',
'taxInvoiceSelect': 'Please select a tax invoice option'
, 'emailError1': 'Not a valid e-mail address.'
, 'emailError2': 'E-mail addresses must match.'
, 'passwordError1': 'Password does not meet guidelines.'
, 'passwordError2': 'Passwords must match.'
, 'passwordStrength0': 'Too Short'
, 'passwordStrength1': 'Weak'
, 'passwordStrength2': 'Fair'
, 'passwordStrength3': 'Strong'
, 'errorsHeader': 'The following errors have occurred:'
, 'errorHeader': 'An error has occurred.'
, 'errorReq': 'This field is required.'
, 'errorMismatch': 'A field was entered incorrectly or was left blank.'
, 'errorEmail': 'Please enter a valid e-mail address.'
, 'errorPlease': 'Please fill in all required fields.'
, 'errorTerms': 'You must agree to this to continue.'
, 'errorChat': 'In order to continue, you must agree to the chat agreement.'
, 'errorAntiCheating': 'In order to continue, you must agree to the anti-cheating agreement.'
, 'selectCountry': 'You must select a Country of Residence.'
};
//]]>
</script>
</form>
</div>
<div class="templates">
<div class="alert error closeable border-4 glow-shadow" style=" " >
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong>Oops! This needs your attention:</strong></p>
</div>
</div>
<a class="alert-close" href="#" onclick="$(this).parent().fadeOut(250, function() { $(this).css({opacity:0}).animate({height: 0}, 100, function() { $(this).remove(); }); }); return false;">Close</a>
<span class="clear"><!-- --></span>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
var inputs,
creation,
analytics;
$(function() {
inputs = new Inputs("#creation");
creation = new Creation("#creation");
if (typeof(Analytics) != "undefined") {
analytics = Analytics.create();
}
Core.appendFrame('https://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ifrm=1&amp;ActivityID=99739&amp;Value=Revenue&amp;OrderID=OrderID&amp;ProductID=ProductID&amp;ProductInfo=ProductInfo&amp;rnd=' + Math.random());
});
//]]>
</script>
<!--[if IE 6]> <script type="text/javascript" src="//bneteu-a.akamaihd.net/account/static/local-common/js/third-party/DD_belatedPNG.4JzIy.js"></script>
<script type="text/javascript">
//<![CDATA[
DD_belatedPNG.fix('.icon-32');
DD_belatedPNG.fix('.icon-64');
DD_belatedPNG.fix('.input-note-arrow');
//]]>
</script>
<![endif]-->
</div>
</div>
</div>
<div id="layout-bottom-divider"></div>
<div id="layout-bottom">
<div class="wrapper">
<?php footer(); ?>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
var csrftoken = "";
$(function() {
Locale.dataPath = "data/i18n.frag.xml";
});
var fullTimeDisplay = true;
//]]>
</script>
<script>
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '\//eu.battle.net';
var Msg = Msg || {};
Msg.support = {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to&#160;{1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need&#160;Info',
ticketAll: 'View All Tickets'
};
Msg.cms = {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long.",
editSuccess: "Success. Reload?",
postDelete: "Are you sure you want to delete this post?",
throttleError: "You must wait before you can post again."
};
Msg.bml= {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
};
Msg.ui= {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.',
flashErrorHeader: 'Adobe Flash Player must be installed to see this content.',
flashErrorText: 'Download Adobe Flash Player',
flashErrorUrl: 'http://get.adobe.com/flashplayer/',
save: 'Save'
};
Msg.grammar= {
colon: '{0}:',
first: 'First',
last: 'Last',
ellipsis: '…'
};
Msg.fansite= {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
};
Msg.search= {
noResults: 'There are no results to display.',
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
url: 'Suggested Links',
friend: 'Friends',
product: 'Marketplace Products',
other: 'Other'
};
//]]>
</script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/js/bam.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/common/menu.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/local-common/js/third-party/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/js/inputs.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/js/account-creation/streamlined-creation.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>assets/account/static/js/account-creation/analytics.js"></script>
<script>
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "../../../ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "../../../www.google-analytics.com/ga.js";
}
ga.type = 'text/javascript';
ga.setAttribute('async', 'true');
ga.src = src;
var s = document.getElementsByTagName('script');
s = s[s.length-1];
s.parentNode.insertBefore(ga, s.nextSibling);
})();
//]]>
</script>
<script>
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '\//eu.battle.net';
var Msg = Msg || {};
Msg.support = {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to&#160;{1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need&#160;Info',
ticketAll: 'View All Tickets'
};
Msg.cms = {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long.",
editSuccess: "Success. Reload?",
postDelete: "Are you sure you want to delete this post?",
throttleError: "You must wait before you can post again."
};
Msg.bml= {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
};
Msg.ui= {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.',
flashErrorHeader: 'Adobe Flash Player must be installed to see this content.',
flashErrorText: 'Download Adobe Flash Player',
flashErrorUrl: 'http://get.adobe.com/flashplayer/',
save: 'Save'
};
Msg.grammar= {
colon: '{0}:',
first: 'First',
last: 'Last',
ellipsis: '…'
};
Msg.fansite= {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
};
Msg.search= {
noResults: 'There are no results to display.',
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
url: 'Suggested Links',
friend: 'Friends',
product: 'Marketplace Products',
other: 'Other'
};
//]]>
</script>
</body>
</html>