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
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2010, Christian Hoegl, Switzerland (http://sirprize.me)
 * @license    MIT License
 */


class Sirprize_Basecamp_MilestoneTest extends PHPUnit_Framework_TestCase
{
	
	
	
	protected $_basecamp = null;
	protected $_httpClient = null;
	
	
	
	protected function setUp()
    {
        $this->_httpClient = new \Zend\Http\Client();
		$this->_httpClient->setAdapter('Zend\Http\Client_Adapter_Test');
		$this->_httpClient->getAdapter()->setNextRequestWillFail(true);
			
		$config = array(
			'baseUri' => TESTS_SIPRIZE_BASECAMP_BASEURI,
			'username' => TESTS_SIPRIZE_BASECAMP_USERNAME,
			'password' => TESTS_SIPRIZE_BASECAMP_PASSWORD
		);

		$this->_basecamp = new \Sirprize\Basecamp($config);
	}
	
	
	
	protected function tearDown()
    {}
	
	
	
	public function testFluidInterface()
    {
		$log = new \Sirprize\Basecamp\Milestone\Entity\Observer\Log();
		
		$milestone = new \Sirprize\Basecamp\Milestone\Entity();
		
		$deadline = new \Sirprize\Basecamp\Date('2010-12-23');

		$projectId = new \Sirprize\Basecamp\Id('4311451');
		$responsiblePartyId = new \Sirprize\Basecamp\Id('4793703');
		
		$milestone
			->attachObserver($log)
			->detachObserver($log)
			->setBasecamp($this->_basecamp)
			->setHttpClient($this->_httpClient)
			->setTitle('some title')
			->setDeadline($deadline)
			->setProjectId($projectId)
			->setResponsiblePartyId($responsiblePartyId)
		;
		
        $this->assertTrue($milestone instanceof \Sirprize\Basecamp\Milestone\Entity);
    }
	
	
	
	public function testCreateXmlExceptionTitleMissing()
    {
        try {
			$milestone = new \Sirprize\Basecamp\Milestone\Entity();
			$milestone->setBasecamp($this->_basecamp);
			
			$deadline = new \Sirprize\Basecamp\Date('2010-12-23');

			$responsiblePartyId = new \Sirprize\Basecamp\Id('4793703');
			
			$milestone
				#->setTitle('some title')
				->setDeadline($deadline)
				->setResponsiblePartyId($responsiblePartyId)
			;
			
			$milestone->getXml();
            $this->fail('Expected \Sirprize\Basecamp\Exception not thrown');
        }
		catch (\Sirprize\Basecamp\Exception $e)
		{
            $this->assertContains("call setTitle() before ", $e->getMessage());
        }
    }
	
	
	
	public function testCreateXmlExceptionDeadlineMissing()
    {
        try {
			$milestone = new \Sirprize\Basecamp\Milestone\Entity();
			$milestone->setBasecamp($this->_basecamp);
			
			$deadline = new \Sirprize\Basecamp\Date('2010-12-23');

			$responsiblePartyId = new \Sirprize\Basecamp\Id('4793703');
			
			$milestone
				->setTitle('some title')
				#->setDeadline($deadline)
				->setResponsiblePartyId($responsiblePartyId)
			;
			
			$milestone->getXml();
            $this->fail('Expected \Sirprize\Basecamp\Exception not thrown');
        }
		catch (\Sirprize\Basecamp\Exception $e)
		{
            $this->assertContains("call setDeadline() before ", $e->getMessage());
        }
    }

	
	
	public function testCreateXmlExceptionResponsiblePartyIdMissing()
    {
        try {
			$milestone = new \Sirprize\Basecamp\Milestone\Entity();
			$milestone->setBasecamp($this->_basecamp);
			
			$deadline = new \Sirprize\Basecamp\Date('2010-12-23');

			$responsiblePartyId = new \Sirprize\Basecamp\Id('4793703');
			
			$milestone
				->setTitle('some title')
				->setDeadline($deadline)
				#->setResponsiblePartyId($responsiblePartyId)
			;
			
			$milestone->getXml();
            $this->fail('Expected \Sirprize\Basecamp\Exception not thrown');
        }
		catch (\Sirprize\Basecamp\Exception $e)
		{
            $this->assertContains("call setResponsiblePartyId() before ", $e->getMessage());
        }
    }
	
}

?>
