<?php

namespace Croogo\Meta\Model;

use Meta\Model\MetaAppModel;

/**
 * Meta
 *
 * @category Meta.Model
 * @package  Croogo.Meta
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class Meta extends MetaAppModel
{

/**
 * Model name
 *
 * @var string
 * @access public
 */
    public $name = 'Meta';

/**
 * Table name
 *
 * @var string
 * @access public
 */
    public $useTable = 'meta';

/**
 * Behaviors
 *
 * @var array
 */
    public $actsAs = [
        'Croogo.Trackable',
    ];

/**
 * Model associations: belongsTo
 *
 * @var array
 * @access public
 */
    public $belongsTo = [
        'Node' => [
            'className' => 'Node',
            'foreignKey' => 'foreign_key',
            'conditions' => '',
            'fields' => '',
            'order' => '',
        ],
    ];
}