<?php
	$disable_switcher = theme_get_setting('creatiz_disable_switch', 'creatiz');
	if(empty($disable_switcher))
		$disable_switcher = 'on';
	if(!empty($disable_switcher) && $disable_switcher=='on'){
?>
<?php global $base_url;?>
<style>
	#skin-switcher {
		position:fixed;
		top:50%;
		margin-top:-210px;
		right:0;
		padding:10px 10px 15px 10px;
		width:220px;
		background:#FFF;
		box-shadow:0 0 5px rgba(0, 0, 0, .2);
		-webkit-box-shadow:0 0 5px rgba(0, 0, 0, .2);
		-moz-box-shadow:0 0 5px rgba(0, 0, 0, .2);
		z-index:999999;
		transition:right ease .3s
	}
	#skin-switcher.toggled-out {
		right:-243px
	}
	#skin-switcher.toggled-out #skin-toggle {
		left:-30px;
		box-shadow:0 0 5px rgba(0, 0, 0, .2);
		-webkit-box-shadow:0 0 5px rgba(0, 0, 0, .2);
		-moz-box-shadow:0 0 5px rgba(0, 0, 0, .2)
	}
	#skin-switcher h3 {
		font-size:16px;
		text-transform:uppercase;
		text-align:center;
		margin-bottom:10px
	}
	#skin-switcher #color-switcher a {
		overflow:hidden;
		display:inline-block;
		float:left;
		width:25px;
		height:25px;
		background-position:center center !important;
		text-indent:-9999px;
		margin:3px;
		cursor:pointer;
		box-shadow:inset 0 0 0 1px rgba(0, 0, 0, 0.05);
		-moz-box-shadow:inset 0 0 0 1px rgba(0, 0, 0, 0.05);
		-webkit-box-shadow:inset 0 0 0 1px rgba(0, 0, 0, 0.05);
		background-image:-moz-linear-gradient(top, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.08) 51%, rgba(255, 255, 255, 0) 100%);
		background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(255, 255, 255, 0)), color-stop(50%, rgba(255, 255, 255, 0.2)), color-stop(51%, rgba(255, 255, 255, 0.08)), color-stop(100%, rgba(255, 255, 255, 0)));
		background-image:-webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.08) 51%, rgba(255, 255, 255, 0) 100%);
		background-image:-o-linear-gradient(top, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.08) 51%, rgba(255, 255, 255, 0) 100%);
		background-image:-ms-linear-gradient(top, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.08) 51%, rgba(255, 255, 255, 0) 100%);
		background-image:linear-gradient(to bottom, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.08) 51%, rgba(255, 255, 255, 0) 100%)
	}
	#skin-switcher #color-switcher a:hover {
		opacity:.8
	}
	#skin-toggle {
		font-weight:bold;
		background:#fff;
		display:block;
		position:absolute;
		width:30px;
		height:30px;
		left:0;
		top:0;
		text-align:center;
		line-height:30px !important;
		cursor:pointer
	}
	#wrap-all.box-layout {
		margin:0 auto !important
	}
	@media only screen and (max-width: 767px) {
		#skin-switcher {
			-webkit-transform:scale(.7)
		}
		#skin-switcher.toggled-out {
			right:-200px
		}
	}
</style>
<div id="skin-switcher"><span id="skin-toggle">X</span>
	<h3>Style Switcher</h3>
	<div id="color-switcher">
		<a href="dodger-blue" title="default" style="background-color:#33b3d3;"></a>
		<a href="red" title="red" style="background-color:#D64343;"></a>
		<a href="dodger-blue" title="dodger-blue" style="background-color:#00a3d3;"></a>
		<a href="dark-blue" title="dark-blue" style="background-color:#516899;"></a>
		<a href="lime-green" title="lime-green" style="background-color:#77cc33;"></a>
		<a href="green" title="green" style="background-color:#25AE5F;"></a>
		<a href="light-green" title="light-green" style="background-color:#7cc576;"></a>
		<a href="orange" title="orange" style="background-color:#f39c12;"></a>
		<a href="pink" title="pink" style="background-color:#ea4c89;"></a>
		<a href="purple" title="purple" style="background-color:#A252B1;"></a>
		<a href="spring-green" title="spring-green" style="background-color:#58cb8e;"></a>
		<a href="violet" title="violet" style="background-color:#78559B;"></a>
		<a href="laurel" title="laurel" style="background-color:#7A997B;"></a>
		<a href="turquoise" title="turquoise" style="background-color:#1abc9c;"></a>
		<a href="emerald" title="emerald" style="background-color:#2ecc71;"></a>
		<a href="wet-asphalt" title="wet-asphalt" style="background-color:#34495e;"></a>
		<a href="green-smoke" title="green-smoke" style="background-color:#9cb265;"></a>
		<a href="amethyst" title="amethyst" style="background-color:#9b59b6;"></a>
		<a href="concrete" title="concrete" style="background-color:#95a5a6;"></a>
		<a href="nephritis" title="nephritis" style="background-color:#27ae60;"></a>
		<a href="alizarin" title="alizarin" style="background-color:#e74c3c;"></a>
		<a href="burnt-sienna" title="burnt-sienna" style="background-color:#ee6a4c;"></a>
		<a href="belize-hole" title="belize-hole" style="background-color:#2980b9;"></a>
		<a href="midnight-blue" title="midnight-blue" style="background-color:#2c3e50;"></a>
		<a href="green-sea" title="green-sea" style="background-color:#16a085;"></a>
	</div>
	<div class="clear"></div>
	<div class="mds-divider style-default length-long contenttype-text alignment-center" style="margin-top:10px;margin-bottom:10px;">
		<div class="content"><strong>Grid</strong></div>
		<div class="divider"></div>
	</div>
	<a href="default" rel="960px" class="button button-small gridmdf">Default: 960px</a>
	<a href="1200" rel="1200px" class="button button-small gridmdf">1200px</a>
	
	<div class="clear"></div>
	<div class="mds-divider style-default length-long contenttype-text alignment-center" style="margin-top:10px;margin-bottom:10px;">
		<div class="content"><strong>Layout</strong></div>
		<div class="divider"></div>
	</div>
	<a href="" rel="default" class="button button-small layoutmdf">Default: Full width</a>
	<a href="" rel="boxed" class="button button-small layoutmdf">Boxed</a>
</div>

<script type="text/javascript">
	(function($){$(window).bind('load',function(){$('#skin-switcher').addClass('toggled-out');$('#skin-toggle').text('?');});$('#skin-toggle').toggle(function(){$('#skin-switcher').removeClass('toggled-out');$('#skin-toggle').text('X');},function(){$('#skin-switcher').addClass('toggled-out');$('#skin-toggle').text('?');});})(jQuery);
</script>

<script language="javascript">
	$(document).ready(function(){
		$("#color-switcher a").click(function(){
			$href = $(this).attr('href');
			$("link[id='css_skin']").attr('href', '<?php print base_path().path_to_theme()?>/css/skins/'+$href+'.css')
			return false;
		});
		$(".gridmdf").click(function(){
			$rel = $(this).attr('rel');
			$("link[id='css_grid']").attr('href', '<?php print base_path().path_to_theme()?>/css/'+$rel+'.css')
			return false;
		});
		$(".layoutmdf").click(function(){
			$rel = $(this).attr('rel');
			if($rel=='boxed'){
				$("body").css({"background-image":"url('<?php print path_to_theme()?>/images/bg/random_grey_variations.png')", "background-color":"#222", "background-repeat":"repeat", "background-position":"center center", "background-attachment":"fixed", "background-size":"auto"});
				$("#wrap-all").addClass("box-layout float-default");
				return false;
			}else{
				$("body").css({"background-image":"", "background-color":"", "background-repeat":"", "background-position":"", "background-attachment":"", "background-size":""});
				$("#wrap-all").removeClass("box-layout float-default");
				return false;
			}
		});
	});
</script>
<?php
	}
?>