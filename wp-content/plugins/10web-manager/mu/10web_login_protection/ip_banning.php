<?php

class TWIPBanning
{
    private $ip = null;
    private $blacklist = array();
    private $temp_blacklist = array();

    public function __construct($ip = null)
    {
        wp_cache_delete('tw_banned_ips', 'options');
        wp_cache_delete('tw_temp_banned_ips', 'options');

        $this->ip = $ip;
        $this->blacklist = get_site_option("tw_banned_ips", array());
        $this->temp_blacklist = get_site_option("tw_temp_banned_ips", array());

    }

    public function getBlackList()
    {
        return $this->blacklist;
    }

    public function getTempBlackList()
    {
        return $this->temp_blacklist;
    }

    public function checkIfIpInBlacklist()
    {
        if (isset($this->blacklist[$this->ip])) {
            $diff = (strtotime(date("Y-m-d H:i:s")) - $this->blacklist[$this->ip]["created_at"]);
            if ($diff < TW_LOCKOUT_TIME) {
                return true;
            } else {
                $this->remove();
            }
        }

        return false;

    }

    public function checkIfIpInTempBlacklist()
    {
        if (isset($this->temp_blacklist[$this->ip])) {
            $diff = (strtotime(date("Y-m-d H:i:s")) - $this->temp_blacklist[$this->ip]["created_at"]);
            if ($diff < TW_FAILED_ATTEMPTS_TIME) {
                return true;
            } else {
                $this->removeTemp();
            }
        }

        return false;
    }


    public function add()
    {
        $this->blacklist[$this->ip] = array(
            "ip"         => $this->ip,
            "created_at" => time(),
        );
        update_site_option("tw_banned_ips", $this->blacklist);
    }

    public function remove()
    {
        if (isset($this->blacklist[$this->ip])) {
            unset($this->blacklist[$this->ip]);
        }
        update_site_option("tw_banned_ips", $this->blacklist);
    }

    public function addTemp()
    {
        $count = 0;
        $created_at = time();
        if ($this->checkIfIpInTempBlacklist()) {
            $count = $this->temp_blacklist[$this->ip]["count"];
            $created_at = $this->temp_blacklist[$this->ip]["created_at"];
        }
        $this->temp_blacklist[$this->ip] = array(
            "ip"         => $this->ip,
            "count"      => ($count + 1),
            "created_at" => $created_at,
        );
        update_site_option("tw_temp_banned_ips", $this->temp_blacklist);

        return $this->temp_blacklist[$this->ip];
    }

    public function removeTemp()
    {
        if (isset($this->temp_blacklist[$this->ip])) {
            unset($this->temp_blacklist[$this->ip]);
        }
        update_site_option("tw_temp_banned_ips", $this->temp_blacklist);
    }

}
