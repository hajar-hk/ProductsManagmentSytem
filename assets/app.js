   //le point d'entrée principal pour le JavaScript de votre application Symfony.

/*
 * Welcome to your app's main JavaScript file!
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import './web/assets/jquery';
 // require jQuery normally
 const $ = require('jquery');
 var dt = require( 'datatables.net' )();