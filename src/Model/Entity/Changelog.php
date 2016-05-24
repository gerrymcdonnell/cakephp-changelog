<?php
namespace Gerrymcdonnell\Changelogs\Model\Entity;

use Cake\ORM\Entity;

/**
 * Changelog Entity.
 *
 * @property int $id
 * @property string $title
 * @property int $category
 * @property int $changelogscategories_id
 * @property \Gmcd\Changelogs\Model\Entity\ChangelogsCategory $changelogscategory
 * @property string $description
 * @property int $priority
 * @property string $url
 * @property int $status
 * @property int $user_id
 * @property \Gmcd\Changelogs\Model\Entity\User $user
 * @property \Cake\I18n\Time $created
 */
class Changelog extends Entity
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
        'id' => false,
    ];
}
