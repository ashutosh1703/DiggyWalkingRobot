<?php

const NORTH = 1;
const EAST = 2;
const SOUTH = 3;
const WEST = 4;
//Directions where to direct
$direction = [ 1 => "NORTH", 2 => "EAST", 3 => "SOUTH", 4 => "WEST"];

const MULTIPLIER_1 = 1;
const MULTIPLIER_2 = 1;
const MULTIPLIER_3 = -1;
const MULTIPLIER_4 = -1;

//input co- ordinates by using command promt
$p = $argv[1];
$q = $argv[2];
// inputed co- ordinates checks is it numeric or not
if(!is_numeric($p) || !is_numeric($q)){
        die("\nCo-ordinates should be in Integer\n");
}

//input direction were to direct
$currentDirection = $argv[3];

if($currentDirection != 'NORTH' && $currentDirection != 'EAST' && $currentDirection != 'SOUTH' && $currentDirection != 'WEST'){
         die("\nThis is Wrong Direction\n");
}

$currentDirNum = constant($currentDirection);

//input way 
$way = $argv[4];

for($i = 0; $i < strlen($way); $i++ ){

        switch($way[$i]){
                case 'R':
                        if($currentDirNum == 4)
                        {
                                $currentDirNum = 1;
                        } 
                        else 
                        {
                                $currentDirNum++;
                        }
                        break;
                case 'L':
                        if($currentDirNum == 1)
                        {
                                $currentDirNum = 4;
                        } 
                        else 
                        {
                                $currentDirNum--;
                        }
                        break;
                case 'W':
                        if( !($currentDirNum % 2) )
                        {
                                $p += ($way[$i+1] * constant("MULTIPLIER_".$currentDirNum) );
                        } 
                        else 
                        {
                                $q += ($way[$i+1] * constant("MULTIPLIER_".$currentDirNum) );
                        }
                        $i++;
                        break;
                default:
                        if(is_numeric($way[$i]))
                        {
                                echo "\nNumber should be similer with 'W' walk between from 0 - 9\n";
                        } 
                        else 
                        {
                                echo "\nInput char '".$way[$i]."' is not valid\n";
                        }
                        break;
        }

}

echo $p." ".$q." ".$direction[$currentDirNum]."\n";

?>