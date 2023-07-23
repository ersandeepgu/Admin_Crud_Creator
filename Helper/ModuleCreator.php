<?php


namespace Sandeep\ModuleCreator\Helper;

use Sandeep\ModuleCreator\Helper\Data as HelperData;


class ModuleCreator extends \Magento\Framework\App\Helper\AbstractHelper
{   
	
    protected $helperData;

	
	/**
     * @param \Magento\Framework\App\Helper\Context   $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        HelperData $helperData,
    ) {
        parent::__construct($context);
        $this->helperData = $helperData;
    }
	
    


    public function getDirectoryExists($path)
    {
        return is_dir($path);
    }

     public function getCreateDirectories($modulePath)
    {
        $subFolders = [
            'etc',
            'etc/adminhtml',
            'Model',
            'Model/ResourceModel',
            'Model/ResourceModel/Post',
            'Ui/Component/Listing/Columns/Form',
            'Ui/DataProvider',
            'Ui/DataProvider/Form',
            'Controller/Adminhtml/Form',
            'view/adminhtml/layout',
            'view/adminhtml/ui_component',
        ];

        foreach ($subFolders as $subFolder) {
            $folderPath = $modulePath . DIRECTORY_SEPARATOR . $subFolder;
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
        }
    }



    public function getCreateFiles($modulePath, $namespace, $moduleName)
    {
        $filesData = [
            ['', 'registration.php', $this->helperData->getRegistration($namespace, $moduleName)],
            ['etc', 'module.xml', $this->helperData->getModule($namespace, $moduleName)],
            ['etc', 'db_schema.xml', $this->helperData->getDbSchema($namespace, $moduleName)],
            ['etc/adminhtml', 'menu.xml', $this->helperData->getMenu($namespace, $moduleName)],
            ['etc/adminhtml', 'routes.xml', $this->helperData->getRoutes($namespace, $moduleName)],
            ['Model', 'Post.php', $this->helperData->getPost($namespace, $moduleName)],
            ['Model/ResourceModel', 'Post.php', $this->helperData->getResource($namespace, $moduleName)],
            ['Model/ResourceModel/Post', 'Collection.php', $this->helperData->getResourceCollection($namespace, $moduleName)],
            ['Ui/Component/Listing/Columns/Form', 'Actions.php', $this->helperData->getUiAction($namespace, $moduleName)],
            ['Ui/DataProvider', 'DataProvider.php', $this->helperData->getDataProvider($namespace, $moduleName)],
            ['Ui/DataProvider/Form', 'DataProvider.php', $this->helperData->getFormDataProvider($namespace, $moduleName)],
            ['Controller/Adminhtml/Form', 'Delete.php', $this->helperData->getDelete($namespace, $moduleName)],
            ['Controller/Adminhtml/Form', 'Edit.php', $this->helperData->getEdit($namespace, $moduleName)],
            ['Controller/Adminhtml/Form', 'Index.php', $this->helperData->getIndex($namespace, $moduleName)],
            ['Controller/Adminhtml/Form', 'MassDelete.php', $this->helperData->getMassDelete($namespace, $moduleName)],
            ['Controller/Adminhtml/Form', 'NewAction.php', $this->helperData->getNewAction($namespace, $moduleName)],
            ['Controller/Adminhtml/Form', 'Save.php', $this->helperData->getSave($namespace, $moduleName)],
            ['view/adminhtml/layout', strtolower($moduleName) . '_form_edit.xml', $this->helperData->getFormEdit($namespace, $moduleName)],
            ['view/adminhtml/layout', strtolower($moduleName) . '_form_index.xml', $this->helperData->getformIndex($namespace, $moduleName)],
            ['view/adminhtml/layout', strtolower($moduleName) . '_form_newaction.xml', $this->helperData->getformnewaction($namespace, $moduleName)],
            ['view/adminhtml/ui_component', 'ui_form_grid.xml', $this->helperData->getUiGrid($namespace, $moduleName)],
            ['view/adminhtml/ui_component', 'ui_grid_form.xml', $this->helperData->getUiFormEdit($namespace, $moduleName)],
        ];

        foreach ($filesData as $fileData) {
            $filePath = $modulePath . DIRECTORY_SEPARATOR . $fileData[0] . DIRECTORY_SEPARATOR . $fileData[1];
            if (file_put_contents($filePath, $fileData[2]) === false) {
                $this->messageManager->addError('Error creating the custom file: ' . $filePath);
            } else {
                chmod($filePath, 0666);
            }
        }
    }

   public function getInstallModule($absolutePathToMagentoRoot ,$modulePath , $namespace ,$moduleName)
    {      
        $commands = [
            "chmod -R 777  {$absolutePathToMagentoRoot}/var/cache/ {$absolutePathToMagentoRoot}/generated/ {$modulePath}",
            "php  {$absolutePathToMagentoRoot}/bin/magento module:enable  {$namespace}_{$moduleName}",
            "php  {$absolutePathToMagentoRoot}/bin/magento s:up",
            "php  {$absolutePathToMagentoRoot}/bin/magento s:d:c",
            "php  {$absolutePathToMagentoRoot}/bin/magento s:s:de -f",
            "php  {$absolutePathToMagentoRoot}/bin/magento c:f"
        ];

        foreach ($commands as $command) {
            $output = shell_exec($command . " 2>&1");
            // echo $output;
            // ob_flush();
            // flush();
        }
        return true;   
    }
}
