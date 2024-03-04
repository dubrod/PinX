
<?php
/**
 * PinX
 **
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
 */
/**
 * @package pinx
 * @subpackage controllers
 */
require_once dirname(dirname(__FILE__)).'/model/pinx/pinx.class.php';
class PinXSetManagerController extends \modExtraManagerController {
    public $pinx;
    private $setid = false;

    public function initialize() {
        $this->pinx = new PinX($this->modx);
        $this->addCss($this->pinx->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->pinx->config['jsUrl'].'mgr/pinx.js');
        $this->addHtml('<script>
            Ext.onReady(function() {
                PinX.config = ' . $this->modx->toJSON($this->pinx->config) . ';
                PinX.config.connector_url = "' . $this->pinx->config['connectorUrl'] . '";
                PinX.action = "' . (!empty($_REQUEST['a']) ? $_REQUEST['a'] : 'index') . '";
                PinX.request = ' . $this->modx->toJSON($_GET) . ';
            });
        </script>');

        return parent::initialize();
    }

    public function getLanguageTopics() {
        return array('pinx:default');
    }

    public function checkPermissions() {
        return true;
    }

    public function process(array $scriptProperties = []) {
        if (isset($scriptProperties['setid'])) {
            $this->setid = $scriptProperties['setid'];
        } else {
            return false;
        }
    }

    public function getPageTitle() {
        return $this->modx->lexicon('pinx');
    }

    public function loadCustomCssJs() {

        // Load anything set when envoking OnRichTextEditorInit
        $rte = $this->loadRTE();
        if (!empty($rte)) {
            $this->addHtml($rte);
        }

        $this->addJavascript($this->pinx->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->pinx->config['jsUrl'] . 'mgr/widgets/set.panel.js');
        $this->addLastJavascript($this->pinx->config['jsUrl'] . 'mgr/sections/set.js');
        $this->addHtml('<script>Ext.onReady(function() { MODx.load({xtype: "pinx-page-set", setid:"' . $this->setid . '"}) })</script>');
    }

    public function getTemplateFile() {
        return $this->pinx->config['templatesPath'] . 'set.tpl';
    }

    private function loadRTE() {
        // See if we need to load a richtext editor.
        $useRichText = $this->modx->getOption('pinx.use_richtext', $this->pinx->config, false);
        $useEditor = $this->modx->getOption('use_editor');
        $whichEditor = $this->modx->getOption('which_editor');
        if ($useRichText && $useEditor && !empty($whichEditor)) {
            // Invoke OnRichTextEditorInit event to prepare RTE
            $onRichTextEditorInit = $this->modx->invokeEvent('OnRichTextEditorInit',array(
                'editor' => $whichEditor,
                'elements' => array(),
            ));
            if (is_array($onRichTextEditorInit)) {
                $onRichTextEditorInit = implode('', $onRichTextEditorInit);
            }

            return $onRichTextEditorInit;
        }
    }
}
