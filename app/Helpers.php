<?php

if (!function_exists('getColorForPerson')) {
    /**
     * Get color based on person's ID.
     *
     * @param int $personId
     * @return string
     */
    function getColorForPerson($personId) {
        // Your color logic here based on $personId
        switch ($personId) {
            case 1:
                return 'green';
            case 2:
                return 'blue';
            case 3:
                return 'red';
            default:
                return 'black'; // Default color
        }
    }
}
