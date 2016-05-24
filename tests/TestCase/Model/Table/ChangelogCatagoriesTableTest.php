<?php
namespace Gmcd\Changelogs\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Gmcd\Changelogs\Model\Table\ChangelogCatagoriesTable;

/**
 * Gmcd\Changelogs\Model\Table\ChangelogCatagoriesTable Test Case
 */
class ChangelogCatagoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Gmcd\Changelogs\Model\Table\ChangelogCatagoriesTable
     */
    public $ChangelogCatagories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.gmcd/changelogs.changelog_catagories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ChangelogCatagories') ? [] : ['className' => 'Gmcd\Changelogs\Model\Table\ChangelogCatagoriesTable'];
        $this->ChangelogCatagories = TableRegistry::get('ChangelogCatagories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChangelogCatagories);

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
}
