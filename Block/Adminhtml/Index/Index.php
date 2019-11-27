<?php
/**
 * Copyright (c) 2019  Patrick van Efferen
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Pve\PhpinfoViewer\Block\Adminhtml\Index;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;

/**
 * Class Index
 *
 * @package Pve\PhpinfoViewer\Block\Adminhtml\Index
 */
class Index extends Template
{

    /**
     * Constructor
     *
     * @param Context  $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function _construct()
    {
        parent::_construct();
    }

    /**
     * Gives Phpinfo values
     *
     * @return string containing Phpinfo values
     */
    public function getPhpinfo(): string
    {
        ob_start();
        \phpinfo();
        $info = ob_get_clean();

        $info = preg_replace("/^.*?\<body\>/is", "", $info);
        $info = preg_replace("/<\/body\>.*?$/is", "", $info);

        return $info;
    }
}
