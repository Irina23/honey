<?php
/**
 * @version   1.0.2
 * @author    Alexandr Artamonov http://focus-studio.pro
 * @copyright Copyright (C) 2012 Focus Studio
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 */
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
/**
* SiteHeartFS system plagin.
*/
class plgSystemSiteHeartFS extends JPlugin
{
    function onBeforeCompileHead()
    {
        $app = JFactory::getApplication();
        //Only run from the client-side, never the admin side
        if($app->isSite()) 
        {	
			
			$settings = array();

			$settings['widget_id'] = $this->params->get("widget_id");
			$settings['secret_key'] = $this->params->get("secret_key");
			
		if($settings['widget_id']) {
			$obj = '';
			
			foreach ($settings as $key => $value) {

				if(!$value){
				continue;
				}
				
				if($key == 'widget_id'){

					$obj .= $key.' : '.$value.', '; 

				}
				
				$user =& JFactory::getUser();
				
				if ($user->guest && $key == 'secret_key') {
					
					continue;
					
				}
				
                if (!$user->guest && $key == 'secret_key') {
                    if($user->block){$stat = 'Заблокирован';}else{$stat = 'Активен';}
                    $db = JFactory::getDBO();
                    $db->setQuery($db->getQuery(true)
                        ->select('profile_key, profile_value')
                        ->from('#__user_profiles')
                        ->where('user_id = \''.$user->id.'\'')
                        );
                    $profile_datas = $db->loadObjectList();
                    $user_data = array("Логин" => $user->username, "Статус" => $stat, "Дата регистрации" => JHtml::_('date', $user->registerDate, JText::_('DATE_FORMAT_LC3')));
                    foreach($profile_datas as $profile_data):
                        if($profile_data->profile_value != '""'){
                            switch($profile_data->profile_key){
                                case 'profile.dob':
                                    $user_data['Дата рождения'] = JHtml::_('date', json_decode($profile_data->profile_value), JText::_('DATE_FORMAT_LC3'));
                                break;
                                case 'profile.aboutme':
                                    $user_data['Обо мне'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.address1':
                                    $user_data['Адрес 1'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.address2':
                                    $user_data['Адрес 2'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.city':
                                    $user_data['Город'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.region':
                                    $user_data['Регион'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.country':
                                    $user_data['Страна'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.postal_code':
                                    $user_data['Почтовый индекс'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.phone':
                                    $user_data['Телефон'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.website':
                                    $user_data['Веб-сайт'] = json_decode($profile_data->profile_value);
                                break;
                                case 'profile.favoritebook':
                                    $user_data['Любимая книга'] = json_decode($profile_data->profile_value);
                                break;
                                default:
                                    $user_data[$profile_data->profile_key] = $profile_data->profile_value;
                            }
                        }
                    endforeach;
                    $user_basic = array(
                        'nick' => $user->name,
                        'id' => $user->id, 
                        'email' => $user->email,
                        'data' => $user_data
                    );
					
                    $time = time();
                    $secret = $value;
                    $user_base64 = base64_encode( json_encode($user_basic) );
                    $sign = md5($secret . $user_base64 . $time);
                    $auth = $user_base64 . "_" . $time . "_" . $sign;
                    $obj .= 'auth : "'.$auth.'", ';
					
					continue;
                }// is user


			 }

			 $obj .= 'widget : "Chat"';
			
             $document = JFactory::getDocument();
             $document->addScriptDeclaration( '_shcp = []; _shcp.push({'.$obj.'}); (function() { var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true; hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://widget.siteheart.com/apps/js/sh.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hcc, s.nextSibling); })();' );
			} // is widget_id
        }//Only run from the client-side, never the admin side
    }//function onBeforeCompileHead
}//class plgSystemSiteHeartFS extends JPlugin