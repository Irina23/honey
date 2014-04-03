<?php
/**
 * Element: secretkey
 * Отображает авторизацию или отдел
 * @author          Peter van Westen <peter@nonumber.nl>
 * @link            Focus-Studio.PRO
 * @copyright       Focus-Studio.PRO
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access
defined('_JEXEC') or die;

class JFormFieldSecretkey extends JFormField
{
	public $type = 'Secretkey';

	protected function getLabel()
	{
		return;
	}

	protected function getInput()
	{
		
		?>

<div class="sh_reg_line sh_reg_line_visible" style="height: 46px;">
    <div class="sh_reg_label">
		<?=JText::_("SH_SECRET_KEY")?>:
		<div style="font-size: 10px; color: #848484;">(<?=JText::_("SH_SECRET_FOR")?>)</div>
	</div>
    <div class="sh_reg_input">
	<input type="text" name="jform[params][secret_key]" value="<?=$this->value?>" /> 
    </div>
</div>

<?php
		
		return '';
	}
}