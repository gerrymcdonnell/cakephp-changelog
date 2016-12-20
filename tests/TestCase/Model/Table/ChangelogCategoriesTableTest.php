<?php
namespace Gerrymcdonnell\Changelog\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Gerrymcdonnell\Changelog\Model\Table\ChangelogCategoriesTable;

/**
 * Gerrymcdonnell\Changelog\Model\Table\ChangelogCategoriesTable Test Case
 */
class ChangelogCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Gerrymcdonnell\Changelog\Model\Table\ChangelogCategoriesTable
     */
    public $ChangelogCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.gerrymcdonnell/changelog.changelog_categories',
        'plugin.gerrymcdonnell/changelog.changelogs',
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
        $config = TableRegistry::exists('ChangelogCategories') ? [] : ['className' => 'Gerrymcdonnell\Changelog\Model\Table\ChangelogCategoriesTable'];
        $this->ChangelogCategories = TableRegistry::get('ChangelogCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ChangelogCategories);

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
