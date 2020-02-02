<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

/**
 * Comments.php
 * 评论相关组件
 *
 * @author     Jayden
 * @version    since 1.0.4
 */

class Comments
{

    /**
     * 解析评论user-agent
     *
     * @param string $ua
     *
     * @return string
     */

    public static function parseUseragent($ua)
    {
      // 解析操作系统
      $htmlTag = "";
      $os = null;
      $fontClass = null;
      if (preg_match('/Windows NT 6.0/i', $ua)) {$os = "Windows Vista";
      } elseif (preg_match('/Windows NT 6.1/i', $ua)) {$os = "Windows 7";
      } elseif (preg_match('/Windows NT 6.2/i', $ua)) {$os = "Windows 8";
      } elseif (preg_match('/Windows NT 6.3/i', $ua)) {$os = "Windows 8.1";
      } elseif (preg_match('/Windows NT 10.0/i', $ua)) {$os = "Windows 10";
      } elseif (preg_match('/Windows NT 5.1/i', $ua)) {$os = "Windows XP";
      } elseif (preg_match('/Windows NT 5.2/i', $ua) && preg_match('/Win64/i', $ua)) {$os = "Windows XP 64 bit";
      } elseif (preg_match('/Android ([0-9.]+)/i', $ua, $matches)) {$os = "Android " . $matches[1];
      } elseif (preg_match('/iPhone OS ([_0-9]+)/i', $ua, $matches)) {$os = 'iPhone ' . $matches[1];
      } elseif (preg_match('/iPad/i', $ua)) {$os = "iPad";
      } elseif (preg_match('/Mac OS X ([_0-9]+)/i', $ua, $matches)) {$os = 'Mac OS X ' . $matches[1];
      } elseif (preg_match('/Gentoo/i', $ua)) {$os = 'Gentoo Linux';
      } elseif (preg_match('/Ubuntu/i', $ua)) {$os = 'Ubuntu Linux';
      } elseif (preg_match('/Debian/i', $ua)) {$os = 'Debian Linux';
      } elseif (preg_match('/X11; FreeBSD/i', $ua)) {$os = 'FreeBSD';
      } elseif (preg_match('/X11; Linux/i', $ua)) {$os = 'Linux';
      } else { $os = 'unknown os';
      }
      $htmlTag = '<span class="vsys">'.$os.'</span>';
      $browser = null;
      //解析浏览器
      if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Sogou browser';
      } elseif (preg_match('#360([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = '360 browser ';
      } elseif (preg_match('#Maxthon( |\/)([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Maxthon ';
      } elseif (preg_match('#Edge( |\/)([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Edge ';
      } elseif (preg_match('#MicroMessenger/([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Wechat ';
      } elseif (preg_match('#QQ/([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'QQ Mobile ';
      } elseif (preg_match('#Chrome/([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Chrome ';
      } elseif (preg_match('#CriOS/([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Chrome ';
      } elseif (preg_match('#Chromium/([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Chromium ';
      } elseif (preg_match('#Safari/([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Safari ';
      } elseif (preg_match('#opera mini#i', $ua)) {
        preg_match('#Opera/([a-zA-Z0-9.]+)#i', $ua, $matches);
        $browser = 'Opera Mini ';} elseif (preg_match('#Opera.([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Opera ';
      } elseif (preg_match('#QQBrowser ([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'QQ browser ';
      } elseif (preg_match('#UCWEB([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'UCWEB ';
      } elseif (preg_match('#MSIE ([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Internet Explorer ';
      } elseif (preg_match('#Trident/([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Internet Explorer 11';
      } elseif (preg_match('#(Firefox|Phoenix|Firebird|BonEcho|GranParadiso|Minefield|Iceweasel)/([a-zA-Z0-9.]+)#i', $ua, $matches)) {$browser = 'Firefox ';
      } else { $browser = 'unknown br';
      }
      $htmlTag .= "&nbsp;";
      $htmlTag .= '<span class="vsys">'.$browser.'</span>';
      return $htmlTag;
    }

}
