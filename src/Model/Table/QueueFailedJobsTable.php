<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QueueFailedJobs Model
 *
 * @method \App\Model\Entity\QueueFailedJob newEmptyEntity()
 * @method \App\Model\Entity\QueueFailedJob newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QueueFailedJob[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QueueFailedJob get($primaryKey, $options = [])
 * @method \App\Model\Entity\QueueFailedJob findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QueueFailedJob patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QueueFailedJob[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QueueFailedJob|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QueueFailedJob saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QueueFailedJob[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QueueFailedJob[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QueueFailedJob[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QueueFailedJob[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QueueFailedJobsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('queue_failed_jobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('class')
            ->maxLength('class', 255)
            ->requirePresence('class', 'create')
            ->notEmptyString('class');

        $validator
            ->scalar('method')
            ->maxLength('method', 255)
            ->requirePresence('method', 'create')
            ->notEmptyString('method');

        $validator
            ->scalar('data')
            ->requirePresence('data', 'create')
            ->notEmptyString('data');

        $validator
            ->scalar('config')
            ->maxLength('config', 255)
            ->requirePresence('config', 'create')
            ->notEmptyString('config');

        $validator
            ->scalar('priority')
            ->maxLength('priority', 255)
            ->allowEmptyString('priority');

        $validator
            ->scalar('queue')
            ->maxLength('queue', 255)
            ->requirePresence('queue', 'create')
            ->notEmptyString('queue');

        $validator
            ->scalar('exception')
            ->allowEmptyString('exception');

        $validator
            ->scalar('email')
            ->maxLength('email', 255)
            ->requirePresence('email', 'update')
            ->notEmptyString('email');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 255)
            ->requirePresence('full_name', 'update')
            ->notEmptyString('full_name');

        return $validator;
    }
}
