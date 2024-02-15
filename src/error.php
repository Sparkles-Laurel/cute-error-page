<?php
// import Handlebars
require_once 'vendor/autoload.php';
use Handlebars\Handlebars;

// create a new Handlebars object
$handlebars = new Handlebars();
// read the template file
$template = file_get_contents('templates/error.hbs');
// compile the template
$compiled = $handlebars->compile($template);

$status_code = $_GET['code'];
global $errorDescriptions;

$errorDescriptions = [
    200 => 'The server has successfully fulfilled the request.',
    400 => 'The server could not understand the request due to invalid syntax. Please check your request and try again.',
    401 => 'The server could not verify that you are authorized to access the requested resource. Please check your credentials and try again.',
    402 => 'The server received a payment required response. Please check your payment details and try again.',
    403 => 'The server understood the request, but is refusing to fulfill it. Please check your credentials and try again.',
    404 => 'The server could not find the requested resource. Please check the URL and try again.',
    405 => 'The method specified in the request is not allowed for the resource identified by the request URI. Please check your request and try again.',
    406 => 'The server is refusing to service the request because the entity of the request is in a format not supported by the requested resource for the requested method. Please check your request and try again.',
    407 => 'The server is refusing to service the request because proxy authentication is required. Please check your credentials and try again.',
    408 => 'The server timed out waiting for the request. Please try again later.',
    409 => 'The server could not complete the request because of a conflict in the request. Please check your request and try again.',
    410 => 'The server is refusing to service the request because the requested resource is no longer available. Please check the URL and try again.',
    411 => 'The server is refusing to service the request because the request does not meet the requirements of the server. Please check your request and try again.',
    412 => 'The server is refusing to service the request because the request entity is larger than the server is willing or able to process. Please check your request and try again.',
    413 => 'The server is refusing to service the request because the request entity is in a format not supported by the requested resource for the requested method. Please check your request and try again.',
    414 => 'The server is refusing to service the request because the request-target is longer than the server is willing to interpret. Please check your request and try again.',
    415 => 'The server is refusing to service the request because the entity of the request is in a format not supported by the requested resource for the requested method. Please check your request and try again.',
    416 => 'The server is refusing to service the request because the range specified is not valid for the resource. Please check your request and try again.',
    417 => 'The server is refusing to service the request because the expectation given could not be met by at least one of the inbound servers. Please check your request and try again.',
    418 => 'The server is refusing to brew coffee because it is a teapot. Please check your request and try again.',
    421 => 'The server is refusing to service the request because it has misdirected the request. Please check your request and try again.',
    422 => 'The server is refusing to service the request because the request was well-formed but was unable to be followed due to semantic errors. Please check your request and try again.',
    423 => 'The server is refusing to service the request because the resource that is being accessed is locked. Please check your request and try again.',
    424 => 'The server is refusing to service the request because the request failed due to failure of a previous request. Please check your request and try again.',
    425 => 'The server is refusing to service the request because it is too early for the server to process the request. Please try again later.',
    426 => 'The server is refusing to service the request because it is upgrading to a new protocol. Please check your request and try again.',
    428 => 'The server is refusing to service the request because the request requires the condition to be true but the condition was false. Please check your request and try again.',
    429 => 'The server is refusing to service the request because the user has sent too many requests in a given amount of time. Please try again later.',
    431 => 'The server is refusing to service the request because the request headers are too large. Please check your request and try again.',
    451 => 'The server is refusing to service the request because the resource is unavailable for legal reasons. Please check your request and try again.',
    500 => 'The server has encountered a situation it doesn\'t know how to handle. Please try again later.',
    501 => 'The server does not support the functionality required to fulfill the request. Please check your request and try again.',
    502 => 'The server received an invalid response from the upstream server it accessed in attempting to fulfill the request. Please try again later.',
    503 => 'The server is currently unable to handle the request due to a temporary overloading or maintenance of the server. Please try again later.',
    504 => 'The server, while acting as a gateway or proxy, did not receive a timely response from the upstream server it needed to access in order to complete the request. Please try again later.',
    505 => 'The server does not support the HTTP protocol version used in the request. Please check your request and try again.',
    506 => 'The server has an internal configuration error. Please try again later.',
    507 => 'The server is unable to store the representation needed to complete the request. Please try again later.',
    508 => 'The server detected an infinite loop while processing the request. Please check your request and try again.',
    510 => 'The server is refusing to service the request because it requires further negotiations to complete the request. Please check your request and try again.',
    511 => 'The server is refusing to service the request because it requires network authentication. Please check your request and try again.'
];

/// sanitizes raw input text
function sanitize_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
// Before we proceed, sanitize the input

$status_code = sanitize_input($status_code);
// if any parameter other than 'code' is specified, redirect to the 400 page
if (count($_GET) > 1 || !isset($_GET['code']) || !is_numeric($_GET['code'])) {
    header('Location: /error.php?code=400');
    http_response_code(308);
    exit;
}
// if the status code is not in the list of
// the status code this server responds to,
// redirect to the 400 page

if (!array_key_exists($_GET['code'], $errorDescriptions)) {
    header('Location: /error.php?code=400');
    http_response_code(308);
    exit;
}
$http_cat_pic = 'https://http.cat/' . $status_code . '.jpg';
http_response_code($status_code);

echo $compiled([
    'status_code' => $status_code,
    'error_description' => $errorDescriptions[$status_code],
    'http_cat_pic' => $http_cat_pic
]);