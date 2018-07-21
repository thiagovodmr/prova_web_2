<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Monitors Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Monitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Monitor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Monitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Monitor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor findOrCreate($search, callable $callback = null, $options = [])
 */
class MonitorsTable extends Table
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

        $this->setTable('monitors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'monitor_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'monitors_users'
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
            ->scalar('disciplina')
            ->maxLength('disciplina', 500)
            ->requirePresence('disciplina', 'create')
            ->notEmpty('disciplina');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
