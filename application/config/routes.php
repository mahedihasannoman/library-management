<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['book_management'] = 'book_management/bookmanagement';

$route['books'] = 'books/bookList';
$route['books/edit/(:any)'] = 'books/edit/$1';


$route['students'] = 'students/studentList';



$route['default_controller'] = 'books/bookList';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
