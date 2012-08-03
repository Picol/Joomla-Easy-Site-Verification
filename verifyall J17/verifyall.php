<?php
/**
 * @Author		I am Bored So I Blog
 * @version		1.0
 * @copyright	Theo van der Sluijs / IAMBOREDSOIBLOG.eu
 * @license		This is commercial software, you are NOT allowed to copy, distribute, display, sell or perform the work
 * 
 * We ask a usage fee of 1 euro per site.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/* no direct access */
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

/**
 * Google Verify System Plugin
 *
 * @package	plg_GoogleVerify
 */
class plgSystemVerifyall extends JPlugin {
	/**
	 * Constructor
	 *
	 * @access	protected
	 * @param	object		$subject The object to observe
	 */
	function plgSystemVerifyall(& $subject, $params) {
		parent::__construct($subject, $params);
	}

	function onAfterInitialise(){

		// Get Plugin info
		$pluginparams = $this->params;

		// get data
		$googlecontent = $pluginparams->get( 'googlekey' );
		
		$yahoocontent = $pluginparams->get( 'yahookey' );		
		$bingcontent = $pluginparams->get( 'bingkey' );
		
		
		if(empty($googlecontent) && empty($yahoocontent) && empty($bingcontent)){
			return;
		}

		// get document
		$document	=& JFactory::getDocument();
		
		if(!empty($googlecontent)){
			$document->setMetaData('verify-v1', $googlecontent);
			$document->setMetaData('google-site-verification', $googlecontent);
		}
		
		
		if(!empty($yahoocontent)){
			$document->setMetaData('y_key', $yahoocontent);
		}
		
		if(!empty($bingcontent)){
			$document->setMetaData('msvalidate.01', $bingcontent);
		}

	}
}
?>