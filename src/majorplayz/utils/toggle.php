<?php
class ToggleClass {
    public $spawnerstoggled = null;
    
    function togglespawners()
    {
        if (!$spawnerstoggled) {
            
            $spawnerstoggled = true;
            
        } else {
            
            $spawnerstoggled = false;
            
        }
        
    }
}

public $spawners = new ToggleClass;
?> 
