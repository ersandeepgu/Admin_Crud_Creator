<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Sandeep\ModuleCreator\Controller\Adminhtml\Index;



use Magento\Framework\Controller\ResultFactory;


class Index extends \Magento\Backend\App\Action
{

 
    /**
     * Execute view action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}

