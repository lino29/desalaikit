<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="card-body border-bottom mt-0">
	<div class="row text-center">
		<div class="col no-gutters content-color-secondary small">
			<a name="fb_share" href="http://www.facebook.com/sharer.php?u=<?= $link; ?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Facebook'><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-facebook-square fa-2x"></i></button></a>
			<a href="http://twitter.com/share?source=sharethiscom&url=<?= $link; ?>&text=<?= htmlspecialchars($judul); ?>%0A" class="twitter-share-button" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Twitter'><button type="button" class="btn btn-info btn-sm"><i class="fa fa-twitter fa-2x"></i></button></a>
			<a href="mailto:?subject=<?= htmlspecialchars($judul); ?>&body=Selengkapnya di <?= $link; ?>" title='Email'><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-envelope fa-2x"></i></button></a>
			<a href="https://telegram.me/share/url?url=<?= $link; ?>&text=<?= htmlspecialchars($judul); ?>%0A" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Telegram'><button type="button" class="btn btn-dark btn-sm"><i class="fa fa-telegram fa-2x"></i></button></a>
			<a href="javascript:void(0);" onclick="printDiv('printableArea')" title='Cetak'><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-print fa-2x"></i></button></a>
			<a href="https://api.whatsapp.com/send?text=<?= $link; ?>%0A<?= htmlspecialchars($judul); ?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Whatsapp'><button type="button" class="btn btn-success btn-sm"><i class="fa fa-whatsapp fa-2x"></i></button></a>
		</div>
	</div>
</div>
