<?php
require 'vendor/autoload.php';
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
?>
<?php
Configuration::instance('cloudinary://177893987749658:sCL_-AWCJAkCtaRj4kjxf-tIq8Q@dbete4djx?secure=true');
(new UploadApi())->upload('images/movies1.jpg');
// (new UploadApi())->upload('Screenshot (2).png');
?>

