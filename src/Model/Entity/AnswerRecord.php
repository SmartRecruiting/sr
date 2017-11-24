<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnswerRecord Entity
 *
 * @property int $id
 * @property int $form_answer_id
 * @property string $answer_code
 * @property string $answer_value
 *
 * @property \App\Model\Entity\FormAnswer $form_answer
 */
class AnswerRecord extends Entity
{
    public $useTable = 'answer_records';

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
        'form_answer_id' => true,
        'answer_code' => true,
        'answer_value' => true,
        'form_answer' => true
    ];
}
