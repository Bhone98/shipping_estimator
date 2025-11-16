<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quotes Model
 *
 * @method \App\Model\Entity\Quote newEmptyEntity()
 * @method \App\Model\Entity\Quote newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Quote> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quote get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Quote findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Quote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Quote> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quote|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Quote saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Quote>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quote>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quote>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quote> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quote>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quote>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Quote>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Quote> deleteManyOrFail(iterable $entities, array $options = [])
 */
class QuotesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('quotes');
        $this->setDisplayField('carrier');
        $this->setPrimaryKey('id');
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
            ->numeric('weight')
            ->requirePresence('weight', 'create')
            ->notEmptyString('weight');

        $validator
            ->numeric('length')
            ->requirePresence('length', 'create')
            ->notEmptyString('length');

        $validator
            ->numeric('width')
            ->requirePresence('width', 'create')
            ->notEmptyString('width');

        $validator
            ->numeric('height')
            ->requirePresence('height', 'create')
            ->notEmptyString('height');

        $validator
            ->numeric('volumetric_weight')
            ->requirePresence('volumetric_weight', 'create')
            ->notEmptyString('volumetric_weight');

        $validator
            ->numeric('billable_weight')
            ->requirePresence('billable_weight', 'create')
            ->notEmptyString('billable_weight');

        $validator
            ->numeric('cost')
            ->requirePresence('cost', 'create')
            ->notEmptyString('cost');

        $validator
            ->scalar('carrier')
            ->maxLength('carrier', 255)
            ->requirePresence('carrier', 'create')
            ->notEmptyString('carrier');

        $validator
            ->scalar('speed')
            ->maxLength('speed', 255)
            ->requirePresence('speed', 'create')
            ->notEmptyString('speed');

        return $validator;
    }
}
