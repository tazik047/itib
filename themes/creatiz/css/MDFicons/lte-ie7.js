/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'MDFicons\'">' + entity + '</span>' + html;
	}
	var icons = {
			'micon-zerply' : '&#xe000;',
			'micon-youtube' : '&#xe001;',
			'micon-yahoo' : '&#xe002;',
			'micon-wordpress' : '&#xe003;',
			'micon-vimeo' : '&#xe004;',
			'micon-video' : '&#xe005;',
			'micon-viddler' : '&#xe006;',
			'micon-twitter' : '&#xe007;',
			'micon-tumblr' : '&#xe008;',
			'micon-triangle-up' : '&#xe009;',
			'micon-triangle-right' : '&#xe00a;',
			'micon-triangle-left' : '&#xe00b;',
			'micon-triangle-down' : '&#xe00c;',
			'micon-top-up' : '&#xe00d;',
			'micon-tag' : '&#xe00e;',
			'micon-stumbleupon' : '&#xe00f;',
			'micon-standard' : '&#xe010;',
			'micon-spotify' : '&#xe011;',
			'micon-sound-on' : '&#xe012;',
			'micon-sound-off' : '&#xe013;',
			'micon-soundcloud' : '&#xe014;',
			'micon-socl' : '&#xe015;',
			'micon-socialcam' : '&#xe016;',
			'micon-slider-arrow-right' : '&#xe017;',
			'micon-slider-arrow-left' : '&#xe018;',
			'micon-skype' : '&#xe019;',
			'micon-sharethis' : '&#xe01a;',
			'micon-rss' : '&#xe01b;',
			'micon-reddit' : '&#xe01c;',
			'micon-quote' : '&#xe01d;',
			'micon-posterous' : '&#xe01e;',
			'micon-play' : '&#xe01f;',
			'micon-pinterest' : '&#xe020;',
			'micon-picasaweb' : '&#xe021;',
			'micon-pause' : '&#xe022;',
			'micon-path' : '&#xe023;',
			'micon-options' : '&#xe024;',
			'micon-myspace' : '&#xe025;',
			'micon-menu-arrow-right' : '&#xe026;',
			'micon-menu-arrow-left' : '&#xe027;',
			'micon-menu' : '&#xe028;',
			'micon-map-pointer' : '&#xe029;',
			'micon-magnifier' : '&#xe02a;',
			'micon-linkedin' : '&#xe02b;',
			'micon-link' : '&#xe02c;',
			'micon-lastfm' : '&#xe02d;',
			'micon-itunes' : '&#xe02e;',
			'micon-instagram' : '&#xe02f;',
			'micon-image' : '&#xe030;',
			'micon-home' : '&#xe031;',
			'micon-grooveshark' : '&#xe032;',
			'micon-googleplus' : '&#xe033;',
			'micon-github' : '&#xe034;',
			'micon-gallery' : '&#xe035;',
			'micon-forrst' : '&#xe036;',
			'micon-flickr' : '&#xe037;',
			'micon-facebook-alt' : '&#xe038;',
			'micon-facebook' : '&#xe039;',
			'micon-evernote' : '&#xe03a;',
			'micon-email' : '&#xe03b;',
			'micon-dribbble' : '&#xe03c;',
			'micon-digg' : '&#xe03d;',
			'micon-deviantart' : '&#xe03e;',
			'micon-delicious' : '&#xe03f;',
			'micon-cross' : '&#xe040;',
			'micon-checkmark' : '&#xe041;',
			'micon-bubbles' : '&#xe042;',
			'micon-blogger' : '&#xe043;',
			'micon-behance' : '&#xe044;',
			'micon-audio' : '&#xe045;',
			'micon-aside' : '&#xe046;',
			'micon-arrow-up' : '&#xe047;',
			'micon-arrow-right' : '&#xe048;',
			'micon-arrow-left' : '&#xe049;',
			'micon-arrow-down' : '&#xe04a;',
			'micon-apple' : '&#xe04b;',
			'micon-addthis' : '&#xe04c;',
			'micon-px' : '&#xe04d;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/micon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};