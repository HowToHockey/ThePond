<?php

return <<<'VALUE'
"namespace IPS\\Theme;\nclass class_core_admin_plugins extends \\IPS\\Theme\\Template\n{\n\tpublic $cache_key = '0b2449a0f3ecc2efcbf0c0545e5a6ce8';\n\tfunction details( $plugin ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n<table class='ipsTable'>\n\t<tr>\n\t\t<td class=\"field_title\">\n\t\t\t<strong class=\"title\">\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'plugin_name', ENT_DISALLOWED, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n<\/strong>\n\t\t<\/td>\n\t\t<td class=\"field_field\">\n\t\t\t\nCONTENT;\n$return .= htmlspecialchars( $plugin->name, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\n\t\t<\/td>\n\t<\/tr>\n\t<tr>\n\t\t<td class=\"field_title\">\n\t\t\t<strong class=\"title\">\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'plugin_details_version', ENT_DISALLOWED, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n<\/strong>\n\t\t<\/td>\n\t\t<td class=\"field_field\">\n\t\t\t\nCONTENT;\n\n$sprintf = array($plugin->version_human, $plugin->version_long); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'plugin_version', ENT_DISALLOWED, 'UTF-8', FALSE ), FALSE, array( 'sprintf' => $sprintf ) );\n$return .= <<<CONTENT\n\n\t\t<\/td>\n\t<\/tr>\n\t<tr>\n\t\t<td class=\"field_title\">\n\t\t\t<strong class=\"title\">\nCONTENT;\n\n$return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'plugin_author_details', ENT_DISALLOWED, 'UTF-8', FALSE ), TRUE, array(  ) );\n$return .= <<<CONTENT\n<\/strong>\n\t\t<\/td>\n\t\t<td class=\"field_field\">\n\t\t\t\nCONTENT;\n$return .= htmlspecialchars( $plugin->author, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n\nCONTENT;\n\nif ( $plugin->website ):\n$return .= <<<CONTENT\n <a href='\nCONTENT;\n$return .= htmlspecialchars( $plugin->website(true), ENT_QUOTES | ENT_DISALLOWED, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n' target='_blank' rel='noopener'><i class=\"fa fa-external-link-square\" title='\nCONTENT;\n$return .= htmlspecialchars( $plugin->website, ENT_QUOTES | ENT_DISALLOWED, 'UTF-8', FALSE );\n$return .= <<<CONTENT\n'><\/i><\/a>\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\t\t<\/td>\n\t<\/tr>\n<\/table>\n\nCONTENT;\n\n\t\treturn $return;\n}\n\n\tfunction pluginRowDescription( $plugin ) {\n\t\t$return = '';\n\t\t$return .= <<<CONTENT\n\n\n\nCONTENT;\n\nif ( $plugin->author != '' OR $plugin->website != ''  ):\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nif ( $plugin->author != ''  ):\n$return .= <<<CONTENT\n \nCONTENT;\n\n$sprintf = array($plugin->author); $return .= \\IPS\\Member::loggedIn()->language()->addToStack( htmlspecialchars( 'byline_nodate', ENT_DISALLOWED, 'UTF-8', FALSE ), FALSE, array( 'sprintf' => $sprintf ) );\n$return .= <<<CONTENT\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\nCONTENT;\n\nif ( $plugin->website ):\n$return .= <<<CONTENT\n \nCONTENT;\n\n$return .= \\IPS\\Theme::i()->getTemplate( \"global\", \"core\", 'global' )->basicUrl( $plugin->website(TRUE), TRUE, $plugin->website(FALSE) );\n$return .= <<<CONTENT\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\n\nCONTENT;\n\nendif;\n$return .= <<<CONTENT\n\nCONTENT;\n\n\t\treturn $return;\n}}"
VALUE;
