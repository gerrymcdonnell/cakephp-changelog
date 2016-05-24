<?php
namespace Gmcd\Changelogs\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Gmcd\Changelogs\Model\Table\ChangelogsTable;

/**
 * Gmcd\Changelogs\Model\Table\ChangelogsTable Test Case
 */
class ChangelogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Gmcd\Changelogs\Model\Table\ChangelogsTable
     */
    public $Changelogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.gmcd/changelogs.changelogs',
        'plugin.gmcd/changelogs.changelogscategories',
        'plugin.gmcd/changelogs.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Changelogs') ? [] : ['className' => 'Gmcd\Changelogs\Model\Table\ChangelogsTable'];
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
