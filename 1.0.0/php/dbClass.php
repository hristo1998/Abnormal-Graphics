<?php

/**
 * Created by PhpStorm.
 * User: Zerzolar
 * Date: 14.3.2016 г.
 * Time: 8:08
 */
	session_start();

	class database
    {
        private $config = array(
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'database'=>'abnormal_graphics',
            'encoding'=> 'utf8'
        );

        public $link = null;

        function __construct($config=array())
        {
            if(!empty($config))
            {
                $this->config = $config;
            }

            $this->link = mysqli_connect($this->config['host'],$this->config['user'],$this->config['pass']);
            mysqli_select_db( $this->link, $this->config['database']);

            mysqli_query($this->link, "SET NAMES '".$this->config['encoding']."'");

        }


        function fetchArray($query)
        {

            $result = mysqli_query($this->link, $query);

            $info = array();
            while($row = mysqli_fetch_assoc($result))
            {
                $info[] = $row;
            }

            return $info;

        }


        function saveArray($table,$info)
        {

            //$table = 'products';

            if(!isset($info[0]))
            {
                $info = array(0=>$info);
            }
            foreach($info as $key=>$row)
            {
                if(isset($row['id']) && $row['id']>0)
                {
                    // update
                    return $this->updateRow($table, $row);

                }
                else
                {
                    // insert
                    return $this->insertRow($table, $row);
                }
            }
        }

        function updateRow($table, $row)
        {
            $query = "UPDATE `".$table."` SET ";

            $conditions = array();
            foreach($row as $dbField=>$dbValue)
            {
                $conditions[] = " `".$table."`.`".$dbField."` = '".$dbValue."'";
            }

            $query .= implode(',', $conditions);
            $query .= " WHERE `".$table."`.`id` = '".$row['id']."'";

            mysqli_query($this->link, $query);
            return $row['id'];
        }

        function insertRow($table, $row)
        {
            $query = "INSERT INTO `".$table."` (";

            $query .= "`".implode('`,`', array_keys($row))."`";
            $query .= ") VALUES (";
            $query .= "'".implode("','", $row)."'";
            $query .= ")";

            mysqli_query($this->link, $query);
            return mysqli_insert_id($this->link);
        }

        function deleteRow($table, $where, $searchBy)
        {
            $query = "DELETE FROM `".$table."` WHERE `".$searchBy."` = '".$where."'";
            mysqli_query($this->link, $query);
        }
    }

	$db = new database();

