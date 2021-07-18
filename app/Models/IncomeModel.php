<?php

class IncomeModel {
  
  
  // HTTP REQUEST
  public function http_request($url)
  {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $output = curl_exec($ch);
      curl_close($ch);
      $result = json_decode($output, TRUE);
      return $result;
  }

  
  public function getIncome()
  {
    
  }
  
  public function totalIncome()
    {
        $lastDay = date('Y-m-d');
        
        $url = $this->http_request("https://api3.adsterratools.com/publisher/38633a1d5982b9c5db29e918f29dd2bc/stats.json?country=id&start_date=2021-02-05&finish_date=$lastDay");
        $result = $url['items'];
        
        foreach ( $result as $results ) {
            $impressions += $results['impression'];
            $clicks += $results['clicks'];
            $ctr += $results['ctr'];
            $cpm += $results['cpm'];
            $revenue += $results['revenue'];
        }
        
        $data['impression'] = $impressions;
        $data['clicks'] = $clicks;
        $data['ctr'] = $ctr;
        $data['cpm'] = $cpm;
        $data['revenue'] = $revenue;
        
        return $data;
    }
    
    public function todayIncome()
    {
        $lastDay = date('Y-m-d');
        
        $url = $this->http_request("https://api3.adsterratools.com/publisher/38633a1d5982b9c5db29e918f29dd2bc/stats.json?country=id&start_date=$lastDay&finish_date=$lastDay");
        $result = $url['items'][0];
        
        $data['impression'] = $result['impression'];
        $data['clicks'] = $result['clicks'];
        $data['ctr'] = $result['ctr'];
        $data['cpm'] = $result['cpm'];
        $data['revenue'] = $result['revenue'];
        
        return $data;
    }
  
}