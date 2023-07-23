<?php


namespace Sandeep\ModuleCreator\Controller\Adminhtml\Index;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Sandeep\ModuleCreator\Helper\ModuleCreator as HelperModuleCreator;


class Save extends \Magento\Framework\App\Action\Action
{
    protected $filesystem;

    protected $helperModuleCreator;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        HelperModuleCreator $helperModuleCreator,
        Filesystem $filesystem
    ) {
        $this->filesystem = $filesystem;
        $this->helperModuleCreator = $helperModuleCreator;
        parent::__construct($context);
    }
    public function execute()
    {
        $path = $this->filesystem->getDirectoryWrite(DirectoryList::APP)->getAbsolutePath('code');   
        $absolutePathToMagentoRoot = $this->filesystem->getDirectoryRead(DirectoryList::ROOT)->getAbsolutePath();
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue(); 

        $namespace = ucfirst($data['namespace']);
        $moduleName = ucfirst($data['module']);              
        $modulePath = $path . DIRECTORY_SEPARATOR . $namespace . DIRECTORY_SEPARATOR . $moduleName;
        if ($this->helperModuleCreator->getDirectoryExists($path, $namespace) && $this->helperModuleCreator->getDirectoryExists($modulePath)) {
            $this->messageManager->addError('Module with the  ' .$namespace.'_'.$moduleName.' name already exists');
        } else {
            $this->helperModuleCreator->getCreateDirectories($modulePath);
            $this->helperModuleCreator->getCreateFiles($modulePath, $namespace, $moduleName);
            if($data['enable_default'] == 1){
               $command = $this->helperModuleCreator->getInstallModule($absolutePathToMagentoRoot ,$modulePath , $namespace, $moduleName);               
                $url = $this->_url->getUrl(strtolower($moduleName).'/form/index');
                $this->messageManager->addSuccess('Module Created Successfully You can access it here:' . '<a href="'.$url.' target="_blank"> Here </a>');

            }else{

               $this->messageManager->addSuccess('Module Created Succesfully with name===> ' . $namespace.'_'.$moduleName );
            }
        }
        return $resultRedirect->setPath('*/*/');
    }    
}
