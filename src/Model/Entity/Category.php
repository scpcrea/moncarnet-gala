<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Category Entity
 *
 * @property int $id
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ParentCategory $parent_category
 * @property \App\Model\Entity\Article[] $articles
 * @property \App\Model\Entity\ChildCategory[] $child_categories
 */
class Category extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _getFullMediaPath()
    {
        if(isset($this->_properties['category_id'])){
            $parentCategory = TableRegistry::get('Categories')->get($this->_properties['category_id']);
            return CDC_MEDIA_ROOT . $parentCategory->media_path . DS. $this->_properties['media_path'];
        }
        else
            return CDC_MEDIA_ROOT . DS. $this->_properties['media_path'];

    }

}
