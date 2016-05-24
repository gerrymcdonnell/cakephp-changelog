<?php
namespace Gmcd\Changelogs\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Gmcd\Changelogs\Model\Table\ChangelogsCategoriesTable;

/**
 * Gmcd\Changelogs\Model\Table\ChangelogsCategoriesTable Test Case
 */
class ChangelogsCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Gmcd\Changelogs\Model\Table\ChangelogsCategoriesTable
     */
    public $ChangelogsCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.gmcd/changelogs.changelogs_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ChangelogsCategories') ? [] : ['className' => 'Gmcd\Changelogs\Model\Table\ChangelogsCategoriesTable'];
        $this->ChangelogsCategories = TableRegistry::get('ChangelogsCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChangelogsCategories);

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
