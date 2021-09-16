<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Preco Entity
 *
 * @property int $id
 * @property string $preco
 * @property int $produto_id
 * @property int $mercado_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\Produto $produto
 * @property \App\Model\Entity\Mercado $mercado
 */
class Preco extends Entity
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
        'preco' => true,
        'produto_id' => true,
        'mercado_id' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'produto' => true,
        'mercado' => true,
    ];
}
