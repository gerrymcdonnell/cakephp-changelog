<?php
namespace Gerrymcdonnell\Changelog\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Changelogs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ChangelogCategories
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \Gerrymcdonnell\Changelog\Model\Entity\Changelog get($primaryKey, $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\Changelog newEntity($data = null, array $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\Changelog[] newEntities(array $data, array $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\Changelog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\Changelog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\Changelog[] patchEntities($entities, array $data, array $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\Changelog findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->belongsTo('ChangelogCategories', [
            'foreignKey' => 'changelog_category_id',
            'joinType' => 'INNER',
            'className' => 'Gerrymcdonnell/Changelog.ChangelogCategories'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Gerrymcdonnell/Changelog.Users'
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');
		*/
		
        $validator
            ->integer('priority')
            ->requirePresence('priority', 'create')
            ->notEmpty('priority');

		/*
        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');
		*/
		
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
        $rules->add($rules->existsIn(['changelog_category_id'], 'ChangelogCategories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
