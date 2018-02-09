<?php
use Migrations\AbstractMigration;
use Cake\ORM\TableRegistry;

class CreateChangelogs extends AbstractMigration
{
    public function up()
    {

        $this->table('changelog_categories')
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
			
			
		//insert catagories
        //inserting multiple rows
        $rows = [
            [
                'id'    => 1,
                'title'  => 'Changelog'
            ],
            [
                'id'    => 2,
                'title'  => 'bug'
            ],
            [
                'id'    => 3,
                'title'  => 'To do'
            ],
            [
                'id'    => 4,
                'title'  => 'Article'
            ],
            [
                'id'    => 5,
                'title'  => 'Plugins'
            ],
            [
                'id'    => 6,
                'title'  => 'Project'
            ],
            [
                'id'    => 7,
                'title'  => 'Idea'
            ]
        ];

        // this is a handy shortcut
        $this->insert('changelog_categories', $rows);



        $this->table('changelogs')
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('changelog_category_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('priority', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('url', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();
    }

    public function down()
    {
        $this->dropTable('changelog_categories');
        $this->dropTable('changelogs');
    }
}
