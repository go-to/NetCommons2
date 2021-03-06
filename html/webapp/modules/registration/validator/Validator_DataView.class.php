<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * 入力データ参照権限チェックバリデータクラス
 *
 * @package     NetCommons.validator
 * @author      Noriko Arai,Ryuji Masukawa
 * @copyright   2006-2007 NetCommons Project
 * @license     http://www.netcommons.org/license.txt  NetCommons License
 * @project     NetCommons Project, supported by National Institute of Informatics
 * @access      public
 */
class Registration_Validator_DataView extends Validator
{
    /**
     * 入力データ参照権限チェックバリデータ
     *
     * @param   mixed   $attributes チェックする値
     * @param   string  $errStr     エラー文字列
     * @param   array   $params     オプション引数
     * @return  string  エラー文字列(エラーの場合)
     * @access  public
     */
    function validate($attributes, $errStr, $params)
    {
		if (empty($attributes["data_id"])) {
			return;
		}

		$container =& DIContainerFactory::getContainer();
        $registrationView =& $container->getComponent("registrationView");
		$data = $registrationView->getData();
		if (empty($data)) {
        	return $errStr;
        }

        if ($data["registration_id"] != $attributes["registration_id"]) {
        	return $errStr;
        }
		        
        return;
    }
}
?>