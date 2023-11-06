<?php

/**
 * Created by IntelliJ IDEA.
 * User: NCJoes
 * Date: 9/2/17
 * Time: 10:44 PM
 */

return [
    'MERCHANTID' => getenv('MERCHANTID'),
    'GATEWAYURL' => getenv('GATEWAYURL'),
    "SERVICETYPEID" => getenv('SERVICETYPEID'),
    "ACCEPTANCEID" => getenv('ACCEPTANCEID'),
    "APIKEY" => getenv('APIKEY'),
    "SCREENING_FEES" => getenv('SCREENING_FEES'),
    "PATH" => 'http://' . $_SERVER['HTTP_HOST'],
    "CHECKSTATUSURL" => getenv('CHECKSTATUSURL'),
    "DESCRIPTION" => getenv('DESCRIPTION'),
    "ACCEPTANCE_FEES" => getenv('ACCEPTANCE_FEES'),

];