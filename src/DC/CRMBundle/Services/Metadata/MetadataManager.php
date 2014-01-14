<?php

namespace DC\CRMBundle\Services\Metadata;

class MetadataManager {
	

	private function _getMetadataFile($module, $type)
	{
		$file = __DIR__."/../../Modules/".$module."/metadata/".$type.".defs.php";

		return $file;
	}

	public function getMetadata($module, $type)
	{
		$file = $this->_getMetaDataFile($module, $type);

		if(file_exists($file)){
			require_once $file;
			return $defs;
		}else{
			Throw new \Exception(sprintf("Metadata file does not exist: %s", $file));
		}

	}
}