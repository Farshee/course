<?php   

class new_child extends ArrayObject {

    // inherits function from parent class
    public function __set($keys, $val) {
        $this[$keys] = $val;
    }

    public function displayAsTable() {
        $table =  '<table border="1px solid black">';
        $table .= '<tbody>';  

        $all_data = (array) $this;
        foreach ($all_data as $key => $value) {
            $table .= '<tr>';
            $table .= '<td>' . $key . '</td>';
            $table .= '<th>' . $value . '</th>';
            $table .= '</tr>';
        } 

        $table .= '</tbody>';
        $table .=  '</table>';    
        return $table;
    } 
}

$obj = new new_child(); 

$obj->firstName = 'salman'; 
$obj->lastname = 'farshee'; 

echo $obj->displayAsTable();
