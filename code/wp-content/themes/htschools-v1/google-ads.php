<?php require_once('google-ad-codes.php'); ?>
<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
<script>
	var isMobileDevice = (window.screen.availWidth <= 640) ? true : false;

	window.googletag = window.googletag || {cmd: []};
	googletag.cmd.push(function() {

		let ads = isMobileDevice ? mobileAdsDetails : desktopAdsDetails;

		ads.map((value, index) => {
			if(jQuery("#" + value.divid).length > 0 && jQuery("#" + value.divid).is(":visible")) {
				jQuery("#" + value.divid).before('<span class="adwork_text">Advertisement</span>');
				googletag.defineSlot(value.adcode, value.adsize, value.divid).addService(googletag.pubads());
			}
		});

		googletag.pubads().enableSingleRequest();
		googletag.pubads().collapseEmptyDivs();
		googletag.enableServices();
	});
</script>