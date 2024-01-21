<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogsTags Model
 *
 * @property \App\Model\Table\BlogsTable&\Cake\ORM\Association\BelongsTo $Blogs
 * @property \App\Model\Table\TagsTable&\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\BlogsTag newEmptyEntity()
 * @method \App\Model\Entity\BlogsTag newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogsTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogsTag findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BlogsTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsTag[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogsTag|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsTag saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogsTag[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsTag[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsTag[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogsTag[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class BlogsTagsTable extends Table
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

        $this->setTable('blogs_tags');
        $this->setDisplayField(['blog_id', 'tag_id']);
        $this->setPrimaryKey(['blog_id', 'tag_id']);

        $this->belongsTo('Blogs', [
            'foreignKey' => 'blog_id',
        ]);
        $this->belongsTo('Tags');
    }
}
