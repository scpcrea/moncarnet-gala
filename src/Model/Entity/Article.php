<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Article Entity
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Article extends Entity
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
      if($this->_properties['category_id']){
        $category = TableRegistry::get('Categories')->get($this->_properties['category_id']);

        if($category->parent_id){
          $parentCategory = TableRegistry::get('Categories')->get($category->parent_id);
          return CDC_MEDIA_ROOT . $parentCategory->media_path . DS. $category->media_path . DS . $this->_properties['media_path'];
        } else return null;
      }
      else return null;
    }

    protected function _getFirstImage()
    {
      $dir = new Folder(WWW_ROOT . DS . "img/".$this->full_media_path);

      $file = $dir->find('.*\.jpg', true);
        if (!$file)
            return NULL;
        else
            return $file[0];
    }

    protected function _getAllImages()
    {
      $dir = new Folder(WWW_ROOT . DS. "img/".$this->full_media_path);
      $files = $dir->find('.*\.jpg', true);

        if (!$files)
            return NULL;
        else
            return $files;
    }

    protected function _getPoster()
    {
        if(isset($this->_properties['media']) && isset($this->_properties['media'][0])){
            return $this->_properties['media'][0]; // poster : 1ère image
        } else {
            return new Media(['file'=>META_IMAGE]);
        }
    }

}
