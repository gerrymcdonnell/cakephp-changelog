<?php
namespace Gerrymcdonnell\Changelog\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChangelogCategories Model
 *
 * @property \Cake\ORM\Association\HasMany $Changelogs
 *
 * @method \Gerrymcdonnell\Changelog\Model\Entity\ChangelogCategory get($primaryKey, $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\ChangelogCategory newEntity($data = null, array $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\ChangelogCategory[] newEntities(array $data, array $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\ChangelogCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\ChangelogCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\ChangelogCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \Gerrymcdonnell\Changelog\Model\Entity\ChangelogCategory findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChangelogCategoriesTable extends Table
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

        $this->table('changelog_categories');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Changelogs', [
            'foreignKey' => 'changelog_category_id',
            'className' => 'Gerrymcdonnell/Changelog.Changelogs'
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

        return $validator;
    }
}
