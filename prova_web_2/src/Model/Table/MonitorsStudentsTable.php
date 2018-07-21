<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MonitorsStudents Model
 *
 * @property \App\Model\Table\MonitorsTable|\Cake\ORM\Association\BelongsTo $Monitors
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\BelongsTo $Students
 *
 * @method \App\Model\Entity\MonitorsStudent get($primaryKey, $options = [])
 * @method \App\Model\Entity\MonitorsStudent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MonitorsStudent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MonitorsStudent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MonitorsStudent|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MonitorsStudent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MonitorsStudent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MonitorsStudent findOrCreate($search, callable $callback = null, $options = [])
 */
class MonitorsStudentsTable extends Table
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

        $this->setTable('monitors_students');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Monitors', [
            'foreignKey' => 'monitor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
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
            ->dateTime('dateTimeStart')
            ->requirePresence('dateTimeStart', 'create')
            ->notEmpty('dateTimeStart');

        $validator
            ->dateTime('dateTimeEnd')
            ->requirePresence('dateTimeEnd', 'create')
            ->notEmpty('dateTimeEnd');

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
        $rules->add($rules->existsIn(['monitor_id'], 'Monitors'));
        $rules->add($rules->existsIn(['student_id'], 'Students'));

        return $rules;
    }
}
