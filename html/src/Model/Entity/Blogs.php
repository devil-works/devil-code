<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blog Entity
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $category_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\BlogsCategory $blogs_category
 */
class Blog extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'title' => true,
        'body' => true,
        'category_id' => true,
        'created' => true,
        'modified' => true,
        'blogs_category' => true,
        'description' => true,
    ];
}
