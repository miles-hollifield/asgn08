<?php

function hourly_wage_less_than_ten_dollars_query () {
    $userQuery = "SELECT empID, firstName, lastName";
    $userQuery .= " FROM personnel";
    $userQuery .= " WHERE hourlyWage < 10.00";
    return $userQuery;
}