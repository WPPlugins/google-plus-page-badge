<?php
/*
Plugin Name:  Google+ Page Badge
Plugin URI:   http://pleer.co.uk/wordpress/plugins/google-plus-page-badge/
Description:  Lets you insert a Google+ Page Badge to your site via shortcode. Easy to intall and implement.
Version:      0.1
Author:       Alex Moss
Author URI:   http://alex-moss.co.uk/
Contributors: pleer

Copyright (C) 2012-2012, Alex Moss
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
Neither the name of Alex Moss or pleer nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/

if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX )) {
	add_action('admin_menu', 'show_googlepb_options');
	function show_googlepb_options() {
		add_options_page('Google+ Page Badge Options', 'Google+ Page Badge', 'manage_options', 'googlepb', 'googlepb_options');
	}

	add_option('googlepb_gpageid', '105796846489429422695');
	add_option('googlepb_js', 'on');
	add_option('googlepb_usehtml5', 'on');
	add_option('googlepb_lang', 'en-US');
	add_option('googlepb_size', 'badge');

	//
	// Admin page HTML //
	//
	function googlepb_options() { ?>
		<style type="text/css">
		div.headerWrap { background-color:#e4f2fds; width:200px}
		#options h3 { padding:7px; padding-top:10px; margin:0px; cursor:auto }
		#options label { width: 300px; float: left; margin-left: 10px; }
		#options input { float: left; margin-left:10px}
		#options p { clear: both; padding-bottom:10px; }
		#options .postbox { margin:0px 0px 10px 0px; padding:0px; }
		</style>
		<div class="wrap">
		<form method="post" action="options.php" id="options">
		<?php wp_nonce_field('update-options') ?>
		<h2>Google+ Page Badge Options</h2>
		<div class="postbox-container" style="width:100%;">
			<div class="metabox-holder">
			<div class="postbox">
				<h3 class="hndle"><span>Resources</span></h3>
				<div style="margin:20px;">
					<div style="width:180px; text-align:center; float:right; font-size:10px; font-weight:bold">
						<a href="http://pleer.co.uk/go/gpluspage-paypal/">
						<img src="https://www.paypal.com/en_GB/i/btn/btn_donateCC_LG.gif" border="0" style="padding-bottom:10px" /></a>
					</div>
			<a href="http://pleer.co.uk/wordpress/plugins/google-plus-page-badge/" style="text-decoration:none" target="_blank">Plugin Homepage</a> <small>- More information on this plugin</small><br /><br />
			<a href="http://pleer.co.uk/wordpress/plugins/" style="text-decoration:none" target="_blank">WordPress Plugins</a> <small>- I have developed other plugins including a <a href="http://pleer.co.uk/wordpress/plugins/wp-twitter-feed/" style="text-decoration:none" target="_blank">Twitter Feed</a> and <a href="http://pleer.co.uk/wordpress/plugins/facebook-comments/" style="text-decoration:none" target="_blank">Facebook Comments</a>!</small><br /><br />
<link href="https://plus.google.com/<?php echo get_option('googlepb_gpageid'); ?>" rel="publisher" /><script type="text/javascript">
window.___gcfg = {lang: '<?php echo get_option('googlepb_lang'); ?>'};
(function()
{var po = document.createElement("script");
po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(po, s);
})();</script>
<div class="g-plus" data-href="https://plus.google.com/105796846489429422695" data-size="badge"></div><br /><br />
			</div>
			</div>
			</div>
			<div class="metabox-holder">
			<div class="postbox">
				<h3 class="hndle"><span>Settings</span></h3>
				<div style="margin:20px;">
				<p>
					<?php
						if (get_option('googlepb_js') == 'on') {echo '<input type="checkbox" name="googlepb_js" checked="yes" />';}
						else {echo '<input type="checkbox" name="googlepb_js" />';}
					?>
					<label>Enable JS</label><small>only disable this if you already have Google's script called elsewhere</small>
				</p>
				<p>
					<?php
						if (get_option('googlepb_usehtml5') == 'on') {echo '<input type="checkbox" name="googlepb_usehtml5" checked="yes" />';}
						else {echo '<input type="checkbox" name="googlepb_usehtml5" />';}
					?>
					<label>Use HTML5</label><small>only disable this if you can't see the badge</small>
				</p>
					<p><label>Google+ Page ID</label> <input type="text" name="googlepb_gpageid" value="<?php echo get_option('googlepb_gpageid'); ?>" />your Google+ page ID. You can find this by visiting your page you will see your ID within the URL</p>
							<p>
		<br />
					<p><label>Badge Size</label>

					    <select name="googlepb_size">
							  <option value="badge" <?php if (get_option('googlepb_size') == 'badge') { echo "selected=\"selected\""; } ?>>
							    Standard
							  </option>
							  <option value="smallbadge" <?php if (get_option('googlepb_size') == 'smallbadge') { echo "selected=\"selected\""; } ?>>
							    Small
							  </option>
						</select>
			    </p>

			<p><label>Language</label>
			    <select name="googlepb_lang">
			      <option value="ar" <?php if (get_option('googlepb_lang') == 'ar') { echo "selected=\"selected\""; } ?>>Arabic - ???????</option>
			      <option value="bg" <?php if (get_option('googlepb_lang') == 'bg') { echo "selected=\"selected\""; } ?>>Bulgarian - ?????????</option>
			      <option value="ca" <?php if (get_option('googlepb_lang') == 'ca') { echo "selected=\"selected\""; } ?>>Catalan - català</option>
			      <option value="zh-CN" <?php if (get_option('googlepb_lang') == 'zh-CN') { echo "selected=\"selected\""; } ?>>Chinese (Simplified) - ?? ?(??)</option>
			      <option value="zh-TW" <?php if (get_option('googlepb_lang') == 'zh-TW') { echo "selected=\"selected\""; } ?>>Chinese (Traditional) - ?? ?(??)</option>
			      <option value="hr" <?php if (get_option('googlepb_lang') == 'hr') { echo "selected=\"selected\""; } ?>>Croatian - hrvatski</option>
			      <option value="cs" <?php if (get_option('googlepb_lang') == 'cs') { echo "selected=\"selected\""; } ?>>Czech - ceština</option>
			      <option value="da" <?php if (get_option('googlepb_lang') == 'da') { echo "selected=\"selected\""; } ?>>Danish - dansk</option>
			      <option value="nl" <?php if (get_option('googlepb_lang') == 'nl') { echo "selected=\"selected\""; } ?>>Dutch - Nederlands</option>
			      <option value="en-US" <?php if (get_option('googlepb_lang') == 'en-US') { echo "selected=\"selected\""; } ?>>English (US) - English ?(US)</option>
			      <option value="en-GB" <?php if (get_option('googlepb_lang') == 'en-GB') { echo "selected=\"selected\""; } ?>>English (UK) - English ?(UK)</option>
			      <option value="et" <?php if (get_option('googlepb_lang') == 'et') { echo "selected=\"selected\""; } ?>>Estonian - eesti</option>
			      <option value="fil" <?php if (get_option('googlepb_lang') == 'fil') { echo "selected=\"selected\""; } ?>>Filipino - Filipino</option>
			      <option value="fi" <?php if (get_option('googlepb_lang') == 'fi') { echo "selected=\"selected\""; } ?>>Finnish - suomi</option>
			      <option value="fr" <?php if (get_option('googlepb_lang') == 'fr') { echo "selected=\"selected\""; } ?>>French - français</option>
			      <option value="de" <?php if (get_option('googlepb_lang') == 'de') { echo "selected=\"selected\""; } ?>>German - Deutsch</option>
			      <option value="el" <?php if (get_option('googlepb_lang') == 'el') { echo "selected=\"selected\""; } ?>>Greek - ????????</option>
			      <option value="iw" <?php if (get_option('googlepb_lang') == 'iw') { echo "selected=\"selected\""; } ?>>Hebrew - ?????</option>
			      <option value="hi" <?php if (get_option('googlepb_lang') == 'hi') { echo "selected=\"selected\""; } ?>>Hindi - ??????</option>
			      <option value="hu" <?php if (get_option('googlepb_lang') == 'hu') { echo "selected=\"selected\""; } ?>>Hungarian - magyar</option>
			      <option value="id" <?php if (get_option('googlepb_lang') == 'id') { echo "selected=\"selected\""; } ?>>Indonesian - Bahasa Indonesia</option>
			      <option value="it" <?php if (get_option('googlepb_lang') == 'it') { echo "selected=\"selected\""; } ?>>Italian - italiano</option>
			      <option value="ja" <?php if (get_option('googlepb_lang') == 'ja') { echo "selected=\"selected\""; } ?>>Japanese - ???</option>
			      <option value="ko" <?php if (get_option('googlepb_lang') == 'ko') { echo "selected=\"selected\""; } ?>>Korean - ???</option>
			      <option value="lv" <?php if (get_option('googlepb_lang') == 'lv') { echo "selected=\"selected\""; } ?>>Latvian - latviešu</option>
			      <option value="lt" <?php if (get_option('googlepb_lang') == 'lt') { echo "selected=\"selected\""; } ?>>Lithuanian - lietuviu</option>
			      <option value="ms" <?php if (get_option('googlepb_lang') == 'ms') { echo "selected=\"selected\""; } ?>>Malay - Bahasa Melayu</option>
			      <option value="no" <?php if (get_option('googlepb_lang') == 'no') { echo "selected=\"selected\""; } ?>>Norwegian - norsk</option>
			      <option value="fa" <?php if (get_option('googlepb_lang') == 'fa') { echo "selected=\"selected\""; } ?>>Persian - ?????</option>
			      <option value="pl" <?php if (get_option('googlepb_lang') == 'pl') { echo "selected=\"selected\""; } ?>>Polish - polski</option>
			      <option value="pt-BR" <?php if (get_option('googlepb_lang') == 'pt-BR') { echo "selected=\"selected\""; } ?>>Portuguese (Brazil) - português ?(Brasil)</option>
			      <option value="pt-PT" <?php if (get_option('googlepb_lang') == 'pt-PT') { echo "selected=\"selected\""; } ?>>Portuguese (Portugal) - Português ?(Portugal)</option>
			      <option value="ro" <?php if (get_option('googlepb_lang') == 'ro') { echo "selected=\"selected\""; } ?>>Romanian - româna</option>
			      <option value="ru" <?php if (get_option('googlepb_lang') == 'ru') { echo "selected=\"selected\""; } ?>>Russian - ???????</option>
			      <option value="sr" <?php if (get_option('googlepb_lang') == 'sr') { echo "selected=\"selected\""; } ?>>Serbian - ??????</option>
			      <option value="sv" <?php if (get_option('googlepb_lang') == 'sv') { echo "selected=\"selected\""; } ?>>Swedish - svenska</option>
			      <option value="sk" <?php if (get_option('googlepb_lang') == 'sk') { echo "selected=\"selected\""; } ?>>Slovak - slovenský</option>
			      <option value="sl" <?php if (get_option('googlepb_lang') == 'sl') { echo "selected=\"selected\""; } ?>>Slovenian - slovenšcina</option>
			      <option value="es" <?php if (get_option('googlepb_lang') == 'es') { echo "selected=\"selected\""; } ?>>Spanish - español</option>
			      <option value="es-419" <?php if (get_option('googlepb_lang') == 'es-419') { echo "selected=\"selected\""; } ?>>Spanish (Latin America) - español ?(Latinoamérica y el Caribe)</option>
			      <option value="th" <?php if (get_option('googlepb_lang') == 'th') { echo "selected=\"selected\""; } ?>>Thai - ???</option>
			      <option value="tr" <?php if (get_option('googlepb_lang') == 'tr') { echo "selected=\"selected\""; } ?>>Turkish - Türkçe</option>
			      <option value="uk" <?php if (get_option('googlepb_lang') == 'uk') { echo "selected=\"selected\""; } ?>>Ukrainian - ??????????</option>
			      <option value="vi" <?php if (get_option('googlepb_lang') == 'vi') { echo "selected=\"selected\""; } ?>>Vietnamese - Ti?ng Vi?t</option>
			    </select>
			    </p>
		</div></div>
		</div>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="googlepb_gpageid,googlepb_js,googlepb_size,googlepb_lang,googlepb_usehtml5" />
		<div class="submit"><input type="submit" class="button-primary" name="submit" value="Save Google+ Page Badge Settings"></div>

		</form>
		</div>
	<?php }

	// Add settings link on plugin page
	function googlepb_link($links) {
	  $settings_link = '<a href="options-general.php?page=googlepb">Settings</a>';
	  array_unshift($links, $settings_link);
	  return $links;
	}
	$plugin = plugin_basename(__FILE__);
	add_filter("plugin_action_links_$plugin", 'googlepb_link' );


} else {

	//ADD GOOGLE+ JS
	function googlepbjs() {
		if (get_option('googlepb_js') == 'on') {
	?><!-- Google+ Page Badge for WordPress http://pleer.co.uk/wordpress/plugins/google-plus-page-badge/ -->
	<link href="https://plus.google.com/".get_option('googlepb_gpageid')."" rel="publisher" />
	<script type="text/javascript">
	<?php if (get_option('googlepb_lang') != 'en-US') { echo "\nwindow.___gcfg = {lang: '".get_option('googlepb_lang')."'};\n"; } ?>
	(function()
	{var po = document.createElement("script");
	po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
	var s = document.getElementsByTagName("script")[0];
	s.parentNode.insertBefore(po, s);
	})();</script><?php
	}}
	add_action('wp_head', 'googlepbjs', 102);


	function googlepbshortcode($googlepbatts) {
	    extract(shortcode_atts(array(
			"pageid" => get_option('googlepb_gpageid'),
			"size" => get_option('googlepb_size'),
			"usehtml5" => get_option('googlepb_usehtml5'),
	    ), $googlepbatts));
	    $gpbadge = "<!-- Google+ Page Badge for WordPress: http://pleer.co.uk/wordpress/plugins/google-plus-page-badge/ -->\n";
	    if ($usehtml5 == 'off') {
		$gpbadge.= "<g:plus href=\"https://plus.google.com/".$pageid."\" size=\"".$size."\"></g:plus>";
	    } else {
		$gpbadge.= "<div class=\"g-plus\" data-href=\"https://plus.google.com/".$pageid."\" data-size=\"".$size."\"></div>";
	    }
	return $gpbadge;
	}
}
add_filter('widget_text', 'do_shortcode');
add_shortcode('gpbadge', 'googlepbshortcode');
?>