<?php

namespace zlokomatic\phpLoL;

class LoLConfig
{
    private $clientVersion = "3.15.13_12_13_16_07";
    private $region;
    private $regions = array('EUW', 'EUNE', 'NA', 'BR', 'LAN', 'LAS', 'RU');
    private $login_queue_host = array('EUW' => 'lq.euw1.lol.riotgames.com',
                                      'EUNE' => 'lq.eun1.lol.riotgames.com',
                                      'NA' => 'lq.na1.lol.riotgames.com',
                                      'BR' => 'lq.br.lol.riotgames.com',
                                      'LAN' => 'lq.la1.lol.riotgames.com',
                                      'LAS' => 'lq.la2.lol.riotgames.com',
                                      'RU' => 'lq.ru.lol.riotgames.com',
                                     );
    private $rpc_host = array('EUW' => 'prod.euw1.lol.riotgames.com',
                              'EUNE' => 'prod.eun1.lol.riotgames.com',
                              'NA' => 'prod.na1.lol.riotgames.com',
                              'BR' => 'prod.br.lol.riotgames.com',
                              'LAN' => 'prod.la1.lol.riotgames.com',
                              'LAS' => 'prod.la2.lol.riotgames.com',
                              'RU' => 'prod.ru.lol.riotgames.com',
                             );

    public function __construct($region)
    {
        if(in_array($region, $this->regions)){
            $this->region = $region;
        }
        else{
            throw new LoLConfigException("No such region: {$region}");
        }
    }
    
    public function getClientVersion()
    {
        return $this->clientVersion;
    }

    public function getLoginUrl(){
        if(!empty($this->region)){
            return $this->login_queue_host[$this->region];
        }
    }

    public function getRPCUrl(){
        if(!empty($this->region)){
            return $this->rpc_host[$this->region];
        }
    }

}
