<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends CI_Model {
    /*
		* DOCU: This function is to fetch all the info in the database
		* Owned by Cherry Ann Nepomuceno 
	*/
    public function get_all_players()
    {
        return $this->db->query("SELECT name, file_name FROM athletes")->result_array();
    }

     /*
		* DOCU: This function is to search for the result
		* Owned by Cherry Ann Nepomuceno 
	*/
    public function search_player()
    {
        $query = $this->query_builder($this->input->post());
        return $this->db->query($query)->result_array(); 
    }

     /*
		* DOCU: This query is to select the information from the database where the condition are met.
		* Owned by Cherry Ann Nepomuceno 
	*/
    public function query_builder($post)
    {
        $query = "SELECT known_sports.id as id, athletes.gender, sports.name as sports, athletes.name, athletes.file_name
                    FROM known_sports
                    LEFT JOIN athletes 
                        ON athletes.id = known_sports.athlete_id
                    LEFT JOIN sports 
                        ON sports.id = known_sports.sport_id";

        $filter_query = "";
        $filter = array();
        if(!empty($post['search']) || !empty($post['Male']) || !empty($post['Female']) || !empty($post['Basketball']) || !empty($post['Volleyball']) || !empty($post['Baseball']) || !empty($post['Soccer']) || !empty($post['Football']))
        {
            $filter_query .= " WHERE ";
        }
        
        if(!empty($post['search']))
        {
            $filter_query .= " athletes.name LIKE '%" . $post['search'] . "%'";
        }
        
        if(!empty($post['Male']))
        {
            $filter['gender'][] = "Male";
        }
        if(!empty($post['Female']))
        {
            $filter['gender'][] = "Female";
        }
        
        if(!empty($post['Basketball']))
        {
            $filter['sports'][] = "Basketball";
        }
        if(!empty($post['Volleyball']))   
        {
            $filter['sports'][] = "Volleyball";
        }
        if(!empty($post['Baseball']))
        {
            $filter['sports'][] = "Baseball";
        }
        if(!empty($post['Soccer']))
        {
            $filter['sports'][] = "Soccer";
        }
        if(!empty($post['Football']))
        {
            $filter['sports'][] = "Football";
        }
        
        if(!empty($filter['gender']))
        {
            if(!empty($post['search']))
            {
                $filter_query .= " AND ";
            }
            $filter_query .= " gender IN ('" . implode("','", $filter['gender']) . "')";
        }
        
        if(!empty($filter['sports']))
        {
            if(!empty($filter['gender']))
            {
                $filter_query .= " AND ";
            }
            $filter_query .= " sports.name IN ('" . implode("','", $filter['sports']) . "')";
        }
        
        $query .= $filter_query;
        return $query;
    }
}
