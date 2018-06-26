<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Media Entity
 *
 * @property int $id
 * @property int $media_type_id
 * @property int $product_id
 * @property string $path
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\MediaType $media_type
 * @property \App\Model\Entity\Product $product
 */
class Media extends Entity
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

    public function insertMedia($mediaTypeId, $productId, $path)
{
    $media = TableRegistry::get('Medias')->newEntity();
    $media->media_type_id = $mediaTypeId;
    $media->product_id = $productId;
    $media->path = $path;

    if(TableRegistry::get('Medias')->save($media)){
        return true;
    }
    else{
        return false;
    }
}
}
