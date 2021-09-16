<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $quantidade
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $lista_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Lista $lista
 * @property \App\Model\Entity\Preco[] $precos
 */
class Produto extends Entity
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
        'nome' => true,
        'quantidade' => true,
        'created' => true,
        'modified' => true,
        'lista_id' => true,
        'user_id' => true,
        'lista' => true,
        'precos' => true,
    ];
}
