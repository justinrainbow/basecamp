<?php

/**
 * Basecamp API Wrapper for PHP 5.3+ 
 *
 * LICENSE
 *
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.txt
 *
 * @category   Sirprize
 * @package    Basecamp
 * @copyright  Copyright (c) 2010, Christian Hoegl, Switzerland (http://sirprize.me)
 * @license    MIT License
 */


namespace Sirprize;


class Basecamp
{
	
	
	protected $_baseUri = null;
	protected $_username = null;
	protected $_password = null;
	protected $_httpClient = null;
	
	
	public function __construct(array $config = array())
	{
		if(isset($config['baseUri']))
		{
			$this->_baseUri = $config['baseUri'];
		}
		
		if(isset($config['username']))
		{
			$this->_username = $config['username'];
		}
		
		if(isset($config['password']))
		{
			$this->_password = $config['password'];
		}
	}
	
	
	public function setBaseUri($baseUri)
	{
		$this->_baseUri = $baseUri;
		return $this;
	}
	
	
	public function getBaseUri()
	{
		return $this->_baseUri;
	}
	
	
	public function setUsername($username)
	{
		$this->_username = $username;
		return $this;
	}
	
	
	public function getUsername()
	{
		return $this->_username;
	}
	
	
	public function setPassword($password)
	{
		$this->_password = $password;
		return $this;
	}
	
	
	public function getPassword()
	{
		return $this->_password;
	}
	
	
	public function setHttpClient(\Zend\Http\Client $httpClient)
	{
		$this->_httpClient = $httpClient;
		return $this;
	}
	
	
	protected function _getHttpClient()
    {
        if($this->_httpClient === null)
		{
            $this->_httpClient = new \Zend\Http\Client();
        }

        return $this->_httpClient;
    }
	
	
	
	public function getProjectsInstance()
	{
		$projects = new \Sirprize\Basecamp\Project\Collection();
		$projects
			->setBasecamp($this)
			->setHttpClient($this->_getHttpClient())
		;
		return $projects;
	}
	
	
	
	public function getPersonsInstance()
	{
		$persons = new \Sirprize\Basecamp\Person\Collection();
		$persons
			->setBasecamp($this)
			->setHttpClient($this->_getHttpClient())
		;
		return $persons;
	}
	
	
	
	public function getMilestonesInstance()
	{
		$milestones = new \Sirprize\Basecamp\Milestone\Collection();
		$milestones
			->setBasecamp($this)
			->setHttpClient($this->_getHttpClient())
		;
		return $milestones;
	}
	
	public function getCommentsInstance()
	{
		$comments = new \Sirprize\Basecamp\Comment\Collection();
		$comments
			->setBasecamp($this)
			->setHttpClient($this->_getHttpClient())
		;
		return $comments;
	}
	
	public function getAttachmentsInstance()
	{
		$attachments = new \Sirprize\Basecamp\Attachment\Collection();
		$attachments
			->setBasecamp($this)
			->setHttpClient($this->_getHttpClient())
		;
		return $attachments;
	}
	
	public function getTodoListsInstance()
	{
		$todoLists = new \Sirprize\Basecamp\TodoList\Collection();
		$todoLists
			->setBasecamp($this)
			->setHttpClient($this->_getHttpClient())
		;
		return $todoLists;
	}
	
	
	
	public function getTodoItemsInstance()
	{
		$todoListitems = new \Sirprize\Basecamp\TodoItem\Collection();
		$todoListitems
			->setBasecamp($this)
			->setHttpClient($this->_getHttpClient())
		;
		return $todoListitems;
	}
	
	
	
	public function getSchemaInstance()
	{
		$schema = new \Sirprize\Basecamp\Schema();
		$schema->setBasecamp($this);
		return $schema;
	}

}