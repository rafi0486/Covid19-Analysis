<?php
class Report_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
             //$this->load->library('Dom_parser');

    }

    public function getJsonDataCovidOut() {
            $full = file_get_contents("https://covidout.in/");
           // echo $full;
             $cntr=0;
            if (preg_match('/<script>window.__INITIAL_STATE__ =(.*?)<\/script>/s', $full, $match)== 1) {
                     //$this->db->empty_table('all_cases_covidout');
                    $arr = (array) json_decode($match[1],true);
                    $case_ids=array();
                    foreach ($arr as $row){

                            $this->db->where("case_id",$row["case_id"]);
                            $q = $this->db->get("all_cases_covidout");
                            array_push($case_ids,$row["case_id"]);
                            if ( $q->num_rows() > 0 )
                            {
                                $this->db->where("case_id",$row["case_id"]);
                                unset($row["case_id"]);
                                unset($row["case_id"]);
                                $this->db->update('all_cases_covidout',$row);
                            } else {

                                if($this->db->insert('all_cases_covidout',$row)){
                                    $cntr++;
                                }
                            }


                    }
                    if($cntr>0){
                        $this->db->where_not_in('case_id', $case_ids);
                                $this->db->delete('all_cases_covidout');

                    }
                   return $cntr;
            }
        }
           public function getDatafromFlourish() {
            $full = file_get_contents("https://public.flourish.studio/visualisation/1538247/embed?auto=1");
           // echo $full;
             $cntr=0;
            if (preg_match('/_Flourish_data = {"choropleth":(.*?),"points":\[\]};/s', $full, $match)== 1) {
                     //$this->db->empty_table('all_cases_covidout');
                    $arr = (array) json_decode($match[1],true);
                    $case_ids=array();
                    foreach ($arr as $row){
                       // var_dump($row);
                        $data['state_name']=$row['name'];
                        $data['Indians']=$row['metadata'][0];
                        $data['Foreigners']=$row['metadata'][1];
                        $data['Recovered']=$row['metadata'][2];
                        $data['Deaths']=$row['metadata'][3];
                        $data['Confirmed']=$row['metadata'][4];
                        $data['Active']=$row['metadata'][5];
                        $data['geometry']=$row['geometry'];
                         $this->db->where("state_name",$data["state_name"]);
                         $q = $this->db->get("flourish_states");
                        if ( $q->num_rows() > 0 )
                            {
                                 $this->db->where("state_name",$data["state_name"]);
                                unset($row["state_name"]);
                                unset($row["geometry"]);
                                 if($this->db->update('flourish_states',$data)){
                                  //  $cntr++;
                                     }

                            } else {
                             if($this->db->insert('flourish_states',$data)){
                                    $cntr++;
                            }
                            }



                        /*
                            $this->db->where("case_id",$row["case_id"]);
                            $q = $this->db->get("all_cases_covidout");
                            array_push($case_ids,$row["case_id"]);
                            if ( $q->num_rows() > 0 )
                            {
                                $this->db->where("case_id",$row["case_id"]);
                                unset($row["case_id"]);
                                unset($row["case_id"]);
                                $this->db->update('all_cases_covidout',$row);
                            } else {

                                if($this->db->insert('all_cases_covidout',$row)){
                                    $cntr++;
                                }
                            }
*/

                   // }
                   // if($cntr>0){
                      //  $this->db->where_not_in('case_id', $case_ids);
                        //        $this->db->delete('all_cases_covidout');

                   // }
                    }
                   return $cntr;
            }
        }
        public function getMohfwData() {

            require_once('application/libraries/simple_html_dom.php');

//$html = new Simple_html_dom();
$html = file_get_html('https://www.mohfw.gov.in/');

// find all link
$cntr=0;
$cntrins=0;
foreach($html->find('div.content') as $e0)
{

          $cntr++;
    $e=$e0->find('thead');
    $e=$e0->find('tbody')[0];
     $case_ids=array();
    foreach($e->find('tr') as $e2){

        //echo count($e2->find('td'));
        $tds=$e2->find('td');
        if(count($e2->find('td'))==6){
                //echo $e1->innertext . '<br>';
                $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                $in_data['added_time']=$date->format('Y-m-d H:i:s');
                $in_data['cur_date']=$date->format('Y-m-d');
                $in_data['state_name']=$tds[1]->innertext;
                $in_data['total_cases_ind']=$tds[2]->innertext;
                $in_data['total_cases_for']=$tds[3]->innertext;
                $in_data['recovered']=$tds[4]->innertext;
                $in_data['deaths']=$tds[5]->innertext;


                $this->db->where("state_name",$in_data["state_name"]);
                            $q = $this->db->get("mohfw_data");
                            array_push($case_ids,$in_data["state_name"]);
                            if ( $q->num_rows() > 0 )
                            {
                                $this->db->where("state_name",$in_data["state_name"]);
                                unset($in_data["state_name"]);
                                $this->db->update('mohfw_data',$in_data);
                            } else {

                                if($this->db->insert('mohfw_data',$in_data)){
                                    $cntrins++;
                                }
                            }



        }elseif(count($e2->find('td'))==5){
                echo $e2->plaintext;
     }
        }
        echo $cntrins;
         if($cntrins>0){
                        $this->db->where_not_in('state_name', $case_ids);
                                $this->db->delete('mohfw_data');

                    }

}
        }

    public function getJsonDataWorldoMeter() {
            $full = file_get_contents("https://www.worldometers.info/coronavirus/");
           // echo $full;
             $cntr=0;
             $date = new DateTime("now", new DateTimeZone('America/St_Johns') );
               $hour= $date->format('H');
               $minutes= $date->format('i');
               if($hour=23 && $minutes>43){
                   return;

               }
$curdaate=$date->format('Y-m-d');
$this->db->where('cur_date', $curdaate);
                $this->db->delete('india_worldometer');
                //, array('emp_dept' => 'sales')
                $queryx = $this->db->get('counties');

                $counries = $queryx->result();
  foreach ($counries as $country){

      if (preg_match('/<td style="font-weight: bold; font-size:15px; text-align:left;">'.$country->country_name.'<\/td>(.*?)<\/tr>/s', $full, $match)== 1) {
                $in_data=$this->GetWMData($match[1]);
                $in_data['cur_date']=$curdaate;
                $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                $in_data['added_time']=$date->format('Y-m-d H:i:s');
                $in_data['c_type']=$country->country_code;
                $this->db->insert('india_worldometer',$in_data);

            }  else{

                if (preg_match('/<a class="mt_a" href="country\/'.  strtolower($country->country_slug).'\/">'.$country->country_name.'<\/a><\/td>(.*?)<\/tr>/s', $full, $match)== 1) {


                $in_data=$this->GetWMData($match[1]);
                $in_data['cur_date']=$curdaate;
                $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                $in_data['added_time']=$date->format('Y-m-d H:i:s');
                $in_data['c_type']=$country->country_code;
                $this->db->insert('india_worldometer',$in_data);

            }
            }
  }
            if (preg_match('/<td><strong>Total:<\/strong><\/td>(.*?)<\/tr>/s', $full, $match)== 1) {

                $world_data=$this->GetWMData($match[1]);
                $world_data['cur_date']=$curdaate;
                 $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
                $world_data['added_time']=$date->format('Y-m-d H:i:s');
                $world_data['c_type']="ALL";
                $this->db->insert('india_worldometer',$world_data);

            }

        }
        public function LatestReports(){
                $query=$this->db->query("SELECT * FROM all_cases_covidout  order by case_id desc limit 50");
                return $query->result();
        }
        public function getCumulative($limit=0){
            if($limit){
                                $query=$this->db->query("select * from (SELECT  confirmed_on as label,count(*) as val from  all_cases_covidout group by confirmed_on order by STR_TO_DATE(confirmed_on,'%d %M %Y') desc limit $limit) x order by STR_TO_DATE(label,'%d %M %Y')");

            }else{
                               $query=$this->db->query("SELECT  confirmed_on as label,count(*) as val from  all_cases_covidout group by confirmed_on order by STR_TO_DATE(confirmed_on,'%d %M %Y')");

            }
                return $query->result_array();

        }

        public function GetWorldSummary($type="ALL"){

             $dates=$this->db->query("SELECT max(cur_date) as last_date,subdate(max(cur_date),1) as prev_date FROM india_worldometer")->row();
             switch ($type){
                 case "ALL":$data['title']="World";break;
                 case "IND":$data['title']="India";break;
             }

               $data['today']=$this->db->query("select * from india_worldometer where c_type='".$type."' and  cur_date='".$dates->last_date."'")->row();
               $data['prevday']=$this->db->query("select * from india_worldometer where c_type='".$type."' and  cur_date='".$dates->prev_date."'")->row();

               return $data;


        }
        public function GetSummary(){
               $dates=$this->db->query("SELECT max(STR_TO_DATE(confirmed_on,'%d %M %Y')) as last_date,subdate(max(STR_TO_DATE(confirmed_on,'%d %M %Y')),1) as prev_date FROM all_cases_covidout")->row();
               $data['all']['total']=$this->db->query("select count(*)as cnt from all_cases_covidout")->row()->cnt;
               $data['all']['today']=$this->db->query("select count(*)as cnt from all_cases_covidout where STR_TO_DATE(confirmed_on,'%d %M %Y')='".$dates->last_date."'")->row()->cnt;
               $data['all']['prevday']=$this->db->query("select count(*)as cnt from all_cases_covidout where STR_TO_DATE(confirmed_on,'%d %M %Y')='".$dates->prev_date."'")->row()->cnt;
               $data['hospital']=$this->GetSummaryByStatus('HOSPITALIZED');
               $data['recovered']=$this->GetSummaryByStatus('RECOVERED');
               $data['died']=$this->GetSummaryByStatus('DIED');
               return $data;

        }
        public function GetSummaryByStatus($status){
                           $dates=$this->db->query("SELECT max(STR_TO_DATE(confirmed_on,'%d %M %Y')) as last_date,subdate(max(STR_TO_DATE(confirmed_on,'%d %M %Y')),1) as prev_date FROM all_cases_covidout")->row();
                        if($status=='DIED'){
 $data['total']=$this->db->query("select count(*)as cnt from all_cases_covidout where status='".$status."'")->row()->cnt;
               $data['today']=$this->db->query("select count(*)as cnt from all_cases_covidout where   status='".$status."' and  if(died_on!='',STR_TO_DATE(died_on,'%d %M %Y'),if(hospitalized_on!='',STR_TO_DATE(hospitalized_on,'%d %M %Y'),STR_TO_DATE(confirmed_on,'%d %M %Y')))='".$dates->last_date."'")->row()->cnt;
               $data['prevday']=$this->db->query("select count(*)as cnt from all_cases_covidout where   status='".$status."'  and  if(died_on!='',STR_TO_DATE(died_on,'%d %M %Y'),if(hospitalized_on!='',STR_TO_DATE(hospitalized_on,'%d %M %Y'),STR_TO_DATE(confirmed_on,'%d %M %Y')))='".$dates->prev_date."'")->row()->cnt;

                        }elseif($status=='HOSPITALIZED'){
 $data['total']=$this->db->query("select count(*)as cnt from all_cases_covidout where status='".$status."'")->row()->cnt;

                        }

                        elseif($status=='RECOVERED'){
 $data['total']=$this->db->query("select count(*)as cnt from all_cases_covidout where status='".$status."'")->row()->cnt;

                        }
                        else{
 $data['total']=$this->db->query("select count(*)as cnt from all_cases_covidout where status='".$status."'")->row()->cnt;
               $data['today']=$this->db->query("select count(*)as cnt from all_cases_covidout where   status='".$status."' and  STR_TO_DATE(confirmed_on,'%d %M %Y')='".$dates->last_date."'")->row()->cnt;
               $data['prevday']=$this->db->query("select count(*)as cnt from all_cases_covidout where   status='".$status."' and STR_TO_DATE(confirmed_on,'%d %M %Y')='".$dates->prev_date."'")->row()->cnt;

                        }
              return $data;
        }
        public function GetWMData($inp){
             $wmdata=array();
             $cntr=0;
            foreach (explode("</td>", $inp) as $td){
                    var_dump($td);
                    $td=  strip_tags($td);
                    $td=  str_replace( ",", "",$td);
                      $pattern = '/\s*/m';


                        $td = preg_replace( $pattern, '',$td);

                    switch ($cntr){
                        case 0:$wmdata['total_cases']=$td;break;
                        case 1:$wmdata['new_cases']=$td;break;
                        case 2:$wmdata['total_deaths']=$td;break;
                        case 3:$wmdata['new_deaths']=$td;break;
                        case 4:$wmdata['total_recovered']=$td;break;
                        case 5:$wmdata['active_cases']=$td;break;
                        case 6:$wmdata['critical_cases']=$td;break;
                        case 7:$wmdata['permillion']=$td;break;
                    }
                    $cntr++;
                }
                return $wmdata;
        }
}
?>