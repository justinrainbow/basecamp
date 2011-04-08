<?php


namespace Sirprize\Basecamp\Cli\Project;


require_once 'Sirprize/Basecamp/Project/Collection.php';


class Collection extends \Sirprize\Basecamp\Project\Collection
{
	
	/**
	 * Instantiate a new project entity
	 *
	 * @return \Sirprize\Basecamp\Cli\Project\Entity
	 */
	public function getProjectInstance()
	{
		$project = new \Sirprize\Basecamp\Cli\Project\Entity();
		$project
			->setHttpClient($this->_getHttpClient())
			->setBasecamp($this->_getBasecamp())
		;
		
		return $project;
	}
	
}