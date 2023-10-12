<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QueueFailedJob Entity
 *
 * @property int $id
 * @property string $class
 * @property string $method
 * @property string $data
 * @property string $config
 * @property string|null $priority
 * @property string $queue
 * @property string|null $exception
 * @property \Cake\I18n\FrozenTime|null $created
 */
class QueueFailedJob extends Entity
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
        'class' => false,
        'method' => false,
        'data' => true,
        'config' => false,
        'priority' => false,
        'queue' => false,
        'exception' => false,
        'created' => false,
        'email' => true,
        'full_name' => true,
    ];

    /**
     * @return array
     */
    protected function _getDecodedData(): array
    {
        return json_decode($this->data, true);
    }
}
