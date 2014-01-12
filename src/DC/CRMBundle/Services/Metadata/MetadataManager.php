<?php

namespace DC\CRMBundle\Services\Metadata;

class MetadataManager {
	
	public function getMetadata($file)
	{
		if(file_exists($file)){
			require_once $file;
			return $defs;
		}else{
			Throw new \Exception(sprintf("Metadata file does not exist: %s", $file));
		}

	}
}