<?php
/**
 * PinX
 *
 * pinx is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * pinx is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * pinx; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 */
/**
 * Loads system settings into build
 *
 * @package pinx
 * @subpackage build
 */

$chunks = array();

$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'pinx-item-tpl',
    'description' => 'Image template.',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/image.chunk.tpl'),
    'properties' => NULL
),'',true,true);

$chunks[2]= $modx->newObject('modChunk');
$chunks[2]->fromArray(array(
    'id' => 2,
    'name' => 'pinx-set-tpl',
    'description' => 'List template.',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/settpl.chunk.tpl'),
    'properties' => NULL
),'',true,true);

$chunks[3]= $modx->newObject('modChunk');
$chunks[3]->fromArray(array(
    'id' => 3,
    'name' => 'pinx-form',
    'description' => 'PinX Submission Form.',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/pinxform.chunk.tpl'),
    'properties' => NULL
),'',true,true);

$chunks[4]= $modx->newObject('modChunk');
$chunks[4]->fromArray(array(
    'id' => 4,
    'name' => 'pinx-form-del',
    'description' => 'PinX Delete Form.',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/pinxdelete.chunk.tpl'),
    'properties' => NULL
),'',true,true);

$chunks[5]= $modx->newObject('modChunk');
$chunks[5]->fromArray(array(
    'id' => 5,
    'name' => 'pinx-modals',
    'description' => 'PinX Modals.',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/pinxmodals.chunk.tpl'),
    'properties' => NULL
),'',true,true);

$chunks[6]= $modx->newObject('modChunk');
$chunks[6]->fromArray(array(
    'id' => 6,
    'name' => 'pinx-gallery-item',
    'description' => 'PinX Gallery Items.',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/galleryitem.chunk.tpl'),
    'properties' => NULL
),'',true,true);

return $chunks;
