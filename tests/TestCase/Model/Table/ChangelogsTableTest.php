<?php
namespace Gerrymcdonnell\Changelog\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Gerrymcdonnell\Changelog\Model\Table\ChangelogsTable;

/**
 * Gerrymcdonnell\Changelog\Model\Table\ChangelogsTable Test Case
 */
class ChangelogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Gerrymcdonnell\Changelog\Model\Table\ChangelogsTable
     */
    public $Changelogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.gerrymcdonnell/changelog.changelogs',
        'plugin.gerrymcdonnell/changelog.changelog_categories',
        'plugin.gerrymcdonnell/changelog.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Changelogs') ? [] : ['className' => 'Gerrymcdonnell\Changelog\Model\Table\ChangelogsTable'];
        $this->Changelogs = TableRegistry::get('Changelogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Changelogs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
