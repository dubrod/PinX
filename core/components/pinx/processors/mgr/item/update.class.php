<?php
/**
 * PinX
 *
 * PinX is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * PinX is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * PinX; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package pinx
 */
/**
 * Update an Item
 *
 * @package pinx
 * @subpackage processors
 */
 class PinXItemUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'PinXItem';
    public $languageTopic = array('pinx:default');
    public $objectType = 'pinx.pinx';
}

return 'PinXItemUpdateProcessor';
