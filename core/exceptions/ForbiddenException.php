<?php 
namespace app\core\exceptions;

class ForbiddenException extends \Exception {
    protected $message = 'You dont\'have access this page';
    protected $code = 403;
}
?>