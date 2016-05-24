<?php
namespace Gerrymcdonnell\Changelogs\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Gerrymcdonnell\Changelogs\Model\Entity\Changelog;


/**
 * Changelogs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Changelogscategories
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class ChangelogsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('changelogs');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Changelogscategories', [
            'foreignKey' => 'changelogscategories_id',
            'joinType' => 'INNER',
            'className' => 'Gerrymcdonnell/Changelogs.Changelogscategories'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
		
		/*
        $validator
            ->integer('category')
            ->requirePresence('category', 'create')
            ->notEmpty('category');
		*/
		/*
        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');*/

        $validator
            ->integer('priority')
            ->requirePresence('priority', 'create')
            ->notEmpty('priority');

        /*
		$validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');*/

		
        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['changelogscategories_id'], 'Changelogscategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }



    /**
    http://book.cakephp.org/3.0/en/orm/retrieving-data-and-resultsets.html#custom-find-methods
    testing
    http://book.cakephp.org/3.0/en/orm/retrieving-data-and-resultsets.html#custom-find-methods
    **/
    /*
    public function findByStatus(Query $query, $status)
    {
        return $query->where(['status' => $status]);
    }
    */

    /*
    public function findByPriority(Query $query, array $options)
    {
        $p=$options['priority'];
        return $query->where(['priority' => $p]);        
    }
    */


    /*
    public function findByPriority(Query $query, array $options)
    {
        $p=$options['priority'];
        return $query->where(['priority' => $p]);        
    }
    */

}
