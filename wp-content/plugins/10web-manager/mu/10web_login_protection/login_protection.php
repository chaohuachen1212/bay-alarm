<?php

require_once 'ip_banning.php';

class TWLoginProtection
{

    private $ip = null;
    private $banning = null;

    private static $IP_TYPE_SINGLE = 'Single';
    private static $IP_TYPE_WILDCARD = 'Wildcard';
    private static $IP_TYPE_MASK = 'Mask';
    private static $IP_TYPE_CIDR = 'CIDR';
    private static $IP_TYPE_SECTION = 'Section';


    public function __construct()
    {
        $this->ip = $this->getClientIp();
        $this->banning = new TWIPBanning($this->ip);

        //lockouts
        add_action("init", array($this, "checkBlacklist"));
        add_action('wp_login_failed', array($this, "loginFailed"));

        add_filter('login_errors', array($this, 'checkAttemptedLogin'));

    }

    public function checkBlacklist()
    {
        if (is_admin() || $GLOBALS['pagenow'] === 'wp-login.php') {
            if ($this->banning->checkIfIpInBlacklist()) {
                echo TW_LOCKOUT_MESSAGE;
                die();
            }
        }
    }

    public function loginFailed($username)
    {
        global $wp;
        $ip_temp_banning = $this->banning->addTemp();

        if ($ip_temp_banning["count"] >= TW_FAILED_LOGIN_ATTEMPTS_COUNT) {
            $this->banning->removeTemp();
            $this->banning->add();
            wp_redirect(wp_login_url(site_url($wp->request)));
        }

        return false;
    }

    public function checkAttemptedLogin($error)
    {
        $ip_temp_banning = $this->banning->getTempBlackList();
        if (isset($ip_temp_banning[$this->ip])) {
            $rest_failed_attempts_count = TW_FAILED_LOGIN_ATTEMPTS_COUNT - $ip_temp_banning[$this->ip]["count"];
            if(is_wp_error($error)){
                return $error;
            }
            $error = $error . "<br><strong>Failed attempts count:</strong> " . $rest_failed_attempts_count;
        }

        return $error;
    }


    private function getClientIp()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ip = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ip = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = 'UNKNOWN';

        return $ip;
    }

    private function checkIp($ip, $allowed_ips)
    {
        foreach ($allowed_ips as $allowed_ip) {
            $type = $this->judgeIpType($allowed_ip);
            $method_name = 'subChecker' . $type;
            $sub_rst = $this->$method_name($allowed_ip, $ip);

            if ($sub_rst) {
                return true;
            }
        }

        return false;
    }

    private function judgeIpType($ip)
    {
        if (strpos($ip, '*')) {
            return self::$IP_TYPE_WILDCARD;
        }

        if (strpos($ip, '/')) {
            $tmp = explode('/', $ip);
            if (strpos($tmp[1], '.')) {
                return self::$IP_TYPE_MASK;
            } else {
                return self::$IP_TYPE_CIDR;
            }
        }

        if (strpos($ip, '-')) {
            return self::$IP_TYPE_SECTION;
        }

        return self::$IP_TYPE_SINGLE;
    }

    private function subCheckerSingle($allowed_ip, $ip)
    {
        return (ip2long($allowed_ip) == ip2long($ip));
    }

    private function subCheckerWildcard($allowed_ip, $ip)
    {
        $allowed_ip_arr = explode('.', $allowed_ip);
        $ip_arr = explode('.', $ip);
        for ($i = 0; $i < count($allowed_ip_arr); $i++) {
            if ($allowed_ip_arr[$i] == '*') {
                return true;
            } else {
                if (false == ($allowed_ip_arr[$i] == $ip_arr[$i])) {
                    return false;
                }
            }
        }

        return true;
    }

    private function subCheckerMask($allowed_ip, $ip)
    {
        list($allowed_ip_ip, $allowed_ip_mask) = explode('/', $allowed_ip);
        $begin = (ip2long($allowed_ip_ip) & ip2long($allowed_ip_mask)) + 1;
        $end = (ip2long($allowed_ip_ip) | (~ip2long($allowed_ip_mask))) + 1;
        $ip = ip2long($ip);

        return ($ip >= $begin && $ip <= $end);
    }

    private function subCheckerSection($allowed_ip, $ip)
    {
        list($begin, $end) = explode('-', $allowed_ip);
        $begin = ip2long(trim($begin));
        $end = ip2long(trim($end));
        $ip = ip2long($ip);

        return ($ip >= $begin && $ip <= $end);
    }

    private function subCheckerCIDR($CIDR, $IP)
    {
        list ($net, $mask) = explode('/', $CIDR);

        return (ip2long($IP) & ~((1 << (32 - $mask)) - 1)) == ip2long($net);
    }

}

$login_protection = new TWLoginProtection();



