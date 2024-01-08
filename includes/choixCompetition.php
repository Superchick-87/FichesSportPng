<?php
	
	if ($Championnat == 'Top 14'|| $Championnat == 'Pro d2' || $Championnat == 'VI Nations' || $Championnat == 'Test matches' || $Championnat == 'Champions Cup' || $Championnat == 'Challenge Cup') {
		$entrees = 16;
		$discipline = 'Rugby';
		$table ='EffectifsRugby201920';
	};
	if ($Championnat == 'Ligue 2') {
		$entrees = 12;
		$discipline = 'Foot';
		$table ='EffectifsFoot201920';
	};

	if ($Championnat == 'Ligue 1') {
		$entrees = 12;
		$discipline = 'Foot';
		$table ='EffectifsFoot201920';
	};
	if ($Championnat == 'Foot - Equipe de France') {
		$entrees = 12;
		$discipline = 'Foot';
		$table ='EffectifsFoot201920';
	};

	if ($Championnat == 'Jeep Elite') {
		$entrees = 6;
		$discipline = 'Basket';
		$table ='EffectifsBasket201920';
	};

?>