<?php
# =====================================================================
# =           Sert transformer la phrase nbe de spectateurs           =
# =====================================================================

	function nbreSpectateurs($cv){
		if ($cv == ''|| $cv == '0') {
			$cv = 'Rencontre à huis-clos';
			return $cv;
		}
		else{
			return $cv.' spectateurs';
		}
	}

# ======  End of Sert transformer la phrase nbe de spectateurs  =======
?>