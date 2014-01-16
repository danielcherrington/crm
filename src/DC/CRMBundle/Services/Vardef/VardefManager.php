<?php

namespace DC\CRMBundle\Services\Vardef;

class VardefManager {
	
	private function _getVardefsFile($module)
	{
		$file = __DIR__."/../../Modules/".$module."/vardefs/vardefs.php";

		return $file;
	}

	public function getVardefs($module)
	{
		$file = $this->_getVardefsFile($module);

		if(file_exists($file)){
			require_once $file;
			return $var_defs;
		}else{
			Throw new \Exception(sprintf("Metadata file does not exist: %s", $file));
		}

	}
}