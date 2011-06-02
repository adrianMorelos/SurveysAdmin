<?php

function select_build_structure($g,$q,$structure,$result,$required=false){
    
    if(count($result))$r=true;
    else $r=false;    
    include 'template.php';
}

function select_get_form_config($structure=null){
    include 'form.php';
}

function select_validate_value($value,$struct){
    if( !isset($struct["option"]) ) return false;
    return in_array($value,$struct["option"] );
}

function select_process_result($g, $q, $structure, $results) {
    $r = array();
    $indice = "g" . $g . ",q" . $q;
    if (isset($structure["option"])) {
        foreach ($results as $r_id => $result) {
            if (isset($result[$indice]) && !empty($result[$indice])) {
                if (in_array($result[$indice], $structure["option"])) {
                    @$r[$result[$indice]]++;
                }
            }else{
                @$r["-"]++;
            }
        }
    }
    return $r;
}

function select_show_result($survey_name,$structure,$results){
    include 'result_template.php';
}

function select_get_structure(){
    return array(
        "option"=>array()
    );
}

function select_get_name(){
    return "Opciones (Selección) ";
}

?>
