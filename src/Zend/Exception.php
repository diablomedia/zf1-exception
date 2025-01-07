<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
* @category   Zend
* @package    Zend
* @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
* @license    http://framework.zend.com/license/new-bsd     New BSD License
*/
class Zend_Exception extends Exception
{
    /**
     * Construct the exception
     *
     * @param  string $msg
     * @param  int $code
     * @return void
     */
    public function __construct($msg = '', $code = 0, Throwable|null $previous = null)
    {
        parent::__construct((string) $msg, (int) $code, $previous);
    }

    /**
     * Overloading
     *
     * For PHP < 5.3.0, provides access to the getPrevious() method.
     *
     * @param  string $method
     * @param  array $args
     * @return Throwable|null
     */
    public function __call($method, array $args)
    {
        if ('getprevious' == strtolower($method)) {
            return $this->_getPrevious();
        }
        return null;
    }

    /**
     * String representation of the exception
     *
     * @return string
     */
    public function __toString()
    {
        return parent::__toString();
    }

    /**
     * Returns previous Exception
     *
     * @return Throwable|null
     */
    protected function _getPrevious()
    {
        return parent::getPrevious();
    }
}
