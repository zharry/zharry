<?php

class CMySQL {
	

    // variables
    var $sDbName;
    var $sDbUser;
    var $sDbPass;
    var $sDbHost;

    var $vLink;

    // constructor
    function CMySQL() {
        $this->sDbHost = getenv('MYSQL_HOST');
        $this->sDbName = "school_bioproject";
        $this->sDbUser = getenv('MYSQL_USER_SCHOOL');
        $this->sDbPass = getenv('MYSQL_PASS_SCHOOL');

        // create db link
        $this->vLink = mysqli_connect($this->sDbHost, $this->sDbUser, $this->sDbPass);
        
		//select the database
        mysqli_select_db($this->vLink, $this->sDbName);

        mysqli_query($this->vLink, "SET names UTF8");
    }

    // return one value result
    function getOne($query, $index = 0) {
        if (!$query)
            return false;
        $res = mysqli_query($this->vLink, $query);
        $arr_res = array();
        if ($res && mysqli_num_rows($res))
            $arr_res = mysqli_fetch_array($res);
        if (count($arr_res))
            return $arr_res[$index];
        else
            return false;
    }

    // executing sql
    function res($query, $error_checking = true) {
        if(!$query)
            return false;
        $res = mysqli_query($this->vLink, $query);
        if (!$res)
            $this->error('Database query error', false, $query);
        return $res;
    }

    // return table of records as result in pairs
    function getPairs($query, $sFieldKey, $sFieldValue, $arr_type = MYSQLI_ASSOC) {
        if (! $query)
            return array();

        $res = $this->res($query);
        $arr_res = array();
        if ($res) {
            while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                $arr_res[$row[$sFieldKey]] = $row[$sFieldValue];
            }
            mysqli_free_result($res);
        }
        return $arr_res;
    }

    // return table of records as result
    function getAll($query, $arr_type = MYSQLI_ASSOC) {
        if (! $query)
            return array();

        if ($arr_type != MYSQLI_ASSOC && $arr_type != MYSQLI_NUM && $arr_type != MYSQLI_BOTH)
            $arr_type = MYSQLI_ASSOC;

        $res = $this->res($query);
        $arr_res = array();
        if ($res) {
            while ($row = mysqli_fetch_array($res, $arr_type))
                $arr_res[] = $row;
            mysqli_free_result($res);
        }
        return $arr_res;
    }

    // return one row result
    function getRow($query, $arr_type = MYSQLI_ASSOC) {
        if(!$query)
            return array();
        if($arr_type != MYSQLI_ASSOC && $arr_type != MYSQLI_NUM && $arr_type != MYSQLI_BOTH)
            $arr_type = MYSQLI_ASSOC;
        $res = $this->res ($query);
        $arr_res = array();
        if($res && mysqli_num_rows($res)) {
            $arr_res = mysqli_fetch_array($res, $arr_type);
            mysqli_free_result($res);
        }
        return $arr_res;
    }

    // escape
    function escape($s) {
        return mysqli_real_escape_string($this->vLink, $s);
    }

    // get last id
    function lastId() {
        return mysqli_insert_id($this->vLink);
    }

    // display errors
    function error($text, $isForceErrorChecking = false, $sSqlQuery = '') {
        echo $text; exit;
    }
}

$GLOBALS['MySQL'] = new CMySQL();

?>
