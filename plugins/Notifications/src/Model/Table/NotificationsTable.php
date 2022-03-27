<?php
declare(strict_types=1);

namespace Notifications\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Notifications\Model\Entity\Notification;

/**
 * Notifications Model
 *
 * @method Notification newEmptyEntity()
 * @method Notification newEntity(array $data, array $options = [])
 * @method Notification[] newEntities(array $data, array $options = [])
 * @method Notification get($primaryKey, $options = [])
 * @method Notification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method Notification patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Notification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method Notification|false save(EntityInterface $entity, $options = [])
 * @method Notification saveOrFail(EntityInterface $entity, $options = [])
 * @method Notification[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method Notification[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method Notification[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method Notification[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class NotificationsTable extends Table
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

        $this->addBehavior('Notifications.Morph');

        $this->setTable('notifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->morphsTo('Notificationables');
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('notifiable_type')
            ->maxLength('notifiable_type', 255)
            ->allowEmptyString('notifiable_type', 'create');

        $validator
            ->scalar('data')
            ->allowEmptyString('data');

        $validator
            ->dateTime('read_at')
            ->allowEmptyDateTime('read_at');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        return $rules;
    }
}
