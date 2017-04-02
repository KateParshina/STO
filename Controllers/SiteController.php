<?php
class SiteController
{
	public function actionIndex()
	{
		//echo '1234';
		require_once (ROOT.'/Views/Site/index.php');
		return true;
	}
}