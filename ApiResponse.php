<?php
class ApiResponse 
{
    public function __construct($json = false)
    {
        if($json) $this->set(json_decode($json, true));
    }

    /**
     * This method parses json data
     */
    public function set($data) {
        // Iterate over array data
        foreach($data as $key => $value) {
            // If next $value is array create new object
            if(is_array($value)){
                $arraySub = new ApiResponse;
                $arraySub->set($value);
                $value = $arraySub;
            }

            $this->{$key} = $value;
        }
    }
}
?>