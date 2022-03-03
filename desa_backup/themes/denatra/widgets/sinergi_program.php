<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
	#sinergi_program
	{
		text-align: center;
	}

	#sinergi_program table
	{
		margin: auto;
	}

	iframe
	{
		max-width: 100%;
		max-height: 100%;
		transition: all 0.5s;
		-o-transition: all 0.5s;
		-moz-transition: all 0.5s;
		-webkit-transition: all 0.5s;
	}

	iframe:hover
	{
		transition: all 0.3s;
		-o-transition: all 0.3s;
		-moz-transition: all 0.3s;
		-webkit-transition: all 0.3s;
		transform: scale(1.1);
		-moz-transform: scale(1.1);
		-o-transform: scale(1.1);
		-webkit-transform: scale(1.1);
		box-shadow: 2px 2px 6px rgba(0,0,0,0.5);
	}
</style>
<div class="card mb-1">
	<div class="card-header border-bottom">
		<div class="media">
			<div class="media-body">
				<h4 class="content-color-primary mb-0"><i class="material-icons icon-sm">share</i> Youtube</h4>
			</div>    
		</div>
	</div>
	<div class="card-body text-center" id="sinergi_program">
		<div class="align-items-center no-gutters ml-3 mr-3">
			<p class="row">
			<iframe width="100%" height="250" src="https://www.youtube.com/embed/Qzks__MsNbI" title="YouTube video player" frameborder="2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</p>
			<p class="row">
			<iframe width="100%" height="250" src="https://www.youtube.com/embed/b6kBQsup2zk" title="YouTube video player" frameborder="2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</p>
			<p class="row">
			<iframe width="100%" height="250" src="https://www.youtube.com/embed/Oun0O9Ow2JI" title="YouTube video player" frameborder="2" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</p>
		</div>

		
	</div>
</div>
