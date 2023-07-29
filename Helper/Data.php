<?php


namespace Sandeep\ModuleCreator\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{   
	
	/**
     * @param \Magento\Framework\App\Helper\Context   $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }  

    public function getRegistration($namespace, $moduleName)
    {
        return '<?php
    /**
     * @category  Magento2.XX
     * @package  ' . $namespace . '_' . $moduleName . '
     * @author    Sandeep Gupta
     * @email    ersandeepgu@gmail.com
     * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * 
     */
    \Magento\Framework\Component\ComponentRegistrar::register(
        \Magento\Framework\Component\ComponentRegistrar::MODULE,
        \'' . $namespace . '_' . $moduleName . '\',
        __DIR__
    );';
    }


    public function getModule($namespace, $moduleName)
    {
    return '<?xml version="1.0"?>
    <!--
     /**
     * @category  Magento2.XX
     * @package  ' . $namespace . '_' . $moduleName . '
     * @author    Sandeep Gupta
     * @email    ersandeepgu@gmail.com
     * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * 
     */
     -->
    <config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
        <module name="' . $namespace . '_' . $moduleName . '" setup_version="1.0.0" />
    </config>
    ';
    }




    public function getDbSchema($namespace, $moduleName)
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
    <!--
    /**
     * @category  Magento2.XX
     * @package   ' . $namespace . '_' . $moduleName . '
     * @author    Sandeep Gupta
     * @email    ersandeepgu@gmail.com
     * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * 
     */
    -->
    <schema xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Setup/Declaration/Schema/etc/schema.xsd">
      <table name="' . strtolower($moduleName) . '" resource="default" engine="innodb" comment="' . $moduleName . '">
        <column xsi:type="int" name="id" padding="10" unsigned="true" nullable="false" identity="true" comment="Id"/>
        <column xsi:type="varchar" name="name" nullable="false" comment="Name"/>
        <column xsi:type="varchar" name="email" nullable="false" comment="Email"/>
        <column xsi:type="text" name="message" nullable="false" comment="Message"/>
        <column xsi:type="timestamp" name="created_at" on_update="false" nullable="false" default="CURRENT_TIMESTAMP" comment="Created_at"/>
        <constraint xsi:type="primary" referenceId="PRIMARY">
          <column name="id"/>
        </constraint>
      </table> 
    </schema>';
    }

   public function getMenu($namespace, $moduleName)
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
    <!--
    /**
     * @category  Magento2.XX
     * @package   ' . $namespace . '_' . $moduleName . '
     * @author    Sandeep Gupta
     * @email    ersandeepgu@gmail.com
     * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * 
     */
    -->
    <config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Backend:etc/menu.xsd">
        <menu>
            <add 
                id="' . $namespace . '_' . $moduleName . '::form" 
                title="' . $moduleName . '" 
                module="' . $namespace . '_' . $moduleName . '" 
                sortOrder="10" 
                resource="' . $namespace . '_' . $moduleName . '::form"
            />
            <add 
                id="' . $namespace . '_' . $moduleName . '::uiform" 
                title="Manage ' . $moduleName . ' Form" 
                module="' . $namespace . '_' . $moduleName . '" 
                sortOrder="20" 
                action="'.strtolower($moduleName).'/form/index" 
                resource="' . $namespace . '_' . $moduleName . '::uiform" 
                parent="' . $namespace . '_' . $moduleName . '::form"
            />
        </menu>
    </config>';
    }


    public function getRoutes($namespace, $moduleName)
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
    <!--
    /**
     * @category  Magento2.XX
     * @package   ' . $namespace . '_' . $moduleName . '
     * @author    Sandeep Gupta
     * @email    ersandeepgu@gmail.com
     * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * 
     */
    -->
    <config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd">
        <router id="admin">
            <route id="' . strtolower($moduleName) . '" frontName="' . strtolower($moduleName) . '">
                <module name="' . $namespace . '_' . $moduleName . '" before="Magento_Backend" />
            </route>
        </router>
    </config>';
    }  

   public function getPost($namespace, $moduleName)
    {
        return '<?php

    /**
     * @category  Magento2.XX
     * @package   ' . $namespace . '_' . $moduleName . '
     * @author    Sandeep Gupta
     * @email    ersandeepgu@gmail.com
     * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * 
     */

    namespace ' . $namespace . '\\' . $moduleName . '\Model;

    use Magento\Framework\Model\AbstractModel;

        class Post extends AbstractModel 
        {   
            protected function _construct()
            {
                $this->_init(\'' . $namespace . '\\' . $moduleName . '\Model\ResourceModel\Post\');
            } 
        }';
    } 

   public function getResource($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Model\ResourceModel;

        use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

        class Post extends AbstractDb 
        {   
            protected function _construct()
            {
                $this->_init(\'' . strtolower($moduleName) . '\', \'id\');
            } 
        }';
    }


    public function getResourceCollection($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Model\ResourceModel\Post;

        use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

        class Collection extends AbstractCollection 
        {   
            protected function _construct()
            {
                $this->_init(\'' . $namespace . '\\' . $moduleName . '\Model\Post\', \'' . $namespace . '\\' . $moduleName . '\Model\ResourceModel\Post\');
            } 
        }';
    }

    public function getUiAction($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Ui\Component\Listing\Columns\Form;

        use Magento\Ui\Component\Listing\Columns\Column;
        use Magento\Framework\UrlInterface;
        use Magento\Framework\View\Element\UiComponent\ContextInterface;
        use Magento\Framework\View\Element\UiComponentFactory;

        class Actions extends Column
        {
            public $urlBuilder;

            public function __construct(
                ContextInterface $context,
                UiComponentFactory $uiComponentFactory,
                UrlInterface $urlBuilder,
                array $components = [],
                array $data = []
            ) {
                $this->urlBuilder = $urlBuilder;
                parent::__construct($context, $uiComponentFactory, $components, $data);
            }
            
            public function prepareDataSource(array $dataSource)
            {
                if (isset($dataSource["data"]["items"])) {
                    foreach ($dataSource["data"]["items"] as &$item) {
                        if (isset($item["id"])) {
                            $item[$this->getData("name")] = [
                                "edit" => [
                                    "href" => $this->urlBuilder->getUrl(
                                        \'' . strtolower($moduleName) . '/form/edit\',
                                        [
                                            "id" => $item["id"],
                                        ]
                                    ),
                                    "label" => __("Edit"),
                                ],
                                "delete" => [
                                    "href" => $this->urlBuilder->getUrl(
                                        \'' . strtolower($moduleName) . '/form/delete\',
                                        [
                                            "id" => $item["id"],
                                        ]
                                    ),
                                    "label" => __("Delete"),
                                ],
                            ];
                        }
                    }
                }

                return $dataSource;
            }
        }';
    }



     public function getDataProvider($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Ui\DataProvider;

        use Magento\Ui\DataProvider\AbstractDataProvider;
        use ' . $namespace . '\\' . $moduleName . '\Model\ResourceModel\Post\CollectionFactory;

        class DataProvider extends AbstractDataProvider
        {
            protected $_loadedData;
            protected $collection;
            protected $addFieldStrategies;
            protected $addFilterStrategies;
	    protected $collectionFactory;

            public function __construct(
                $name,
                $primaryFieldName,
                $requestFieldName,
                CollectionFactory $collectionFactory,
                array $addFieldStrategies = [],
                array $addFilterStrategies = [],
                array $meta = [],
                array $data = []
            ) {
                parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
                $this->collection = $collectionFactory->create();
                $this->addFieldStrategies = $addFieldStrategies;
                $this->addFilterStrategies = $addFilterStrategies;
            }

            public function getData()
            {
                if (isset($this->_loadedData)) {
                    return $this->_loadedData;
                }

                $resultdata = $this->getCollection()->getItems();
                foreach ($resultdata as $data) {
                    $this->_loadedData[$data->getId()] = $data->getData();
                }
                return $this->_loadedData;
            }
        }';
    }

    public function getFormDataProvider($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Ui\DataProvider\Form;

        use Magento\Ui\DataProvider\AbstractDataProvider;
        use ' . $namespace . '\\' . $moduleName . '\Model\ResourceModel\Post\CollectionFactory;

        class DataProvider extends AbstractDataProvider
        {
            protected $_loadedData;
            protected $collection;
            protected $addFieldStrategies;
            protected $addFilterStrategies;
	    protected $collectionFactory;

            public function __construct(
                $name,
                $primaryFieldName,
                $requestFieldName,
                CollectionFactory $collectionFactory,
                array $addFieldStrategies = [],
                array $addFilterStrategies = [],
                array $meta = [],
                array $data = []
            ) {
                parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
                $this->collection = $collectionFactory->create();
                $this->addFieldStrategies = $addFieldStrategies;
                $this->addFilterStrategies = $addFilterStrategies;
            }

            public function getData()
            {
                if (!$this->getCollection()->isLoaded()) {
                    $this->getCollection()->load();
                }
                $items = $this->getCollection()->getData();
                return [
                    "totalRecords" => $this->getCollection()->getSize(),
                    "items" => array_values($items),
                ];
            }
        }';
    }



public function getDelete($namespace, $moduleName)
{
    return '<?php

    /**
     * @category  Magento2.XX
     * @package   ' . $namespace . '_' . $moduleName . '
     * @author    Sandeep Gupta
     * @email    ersandeepgu@gmail.com
     * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
     * 
     */

    namespace ' . $namespace . '\\' . $moduleName . '\Controller\Adminhtml\Form;

    use Magento\Framework\Controller\ResultFactory;
    use Magento\Framework\App\Action\Context;

    class Delete extends \Magento\Framework\App\Action\Action
    {  
        public function execute()
        {
            $id = $this->getRequest()->getParam("id");
            $resultRedirect = $this->resultRedirectFactory->create();
            
            if ($id) {
                $title = "";
                try {
                    // init model and delete
                    $model = $model = $this->_objectManager->create(\\' . $namespace .'\\'. $moduleName . '\Model\Post::class);

                    $model->load($id);
                    
                    $title = $model->getName();
                    $model->delete();
                    
                    $this->messageManager->addSuccessMessage(__("The data has been deleted."));   
                    return $resultRedirect->setPath("*/*/");
                } catch (\Exception $e) {               
                    // $this->messageManager->addErrorMessage($e->getMessage());
                    $this->messageManager->addErrorMessage(__("We can\'t find a page to delete."));
                }
            }
            
            return $resultRedirect->setPath("*/*/");
        }
    }';
}



     public function getEdit($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Controller\Adminhtml\Form;

        use Magento\Backend\App\Action;
        use Magento\Backend\App\Action\Context;
        use Magento\Framework\View\Result\Page;
        use Magento\Framework\View\Result\PageFactory;
        use Magento\Framework\App\Action\HttpGetActionInterface;

        class Edit extends Action
        {
            private $pageFactory;

            public function __construct(
                Context $context,
                PageFactory $pageFactory
            ) {
                $this->pageFactory = $pageFactory;
                parent::__construct($context);
            }

            public function execute()
            {
                $resultPage = $this->pageFactory->create();
                $resultPage->getConfig()->getTitle()->prepend(__("Edit details"));
                return $resultPage;
            }            
        }';
    }


    public function getIndex($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Controller\Adminhtml\Form;

        use Magento\Backend\App\Action;
        use Magento\Framework\View\Result\PageFactory;

        class Index extends Action
        {
            public $resultPageFactory;

            public function __construct(
                Action\Context $context,
                PageFactory $resultPageFactory
            ) {
                parent::__construct($context);
                $this->resultPageFactory = $resultPageFactory;
            }

            public function execute()
            {
                $resultPage = $this->resultPageFactory->create();
                $resultPage->setActiveMenu("' . $namespace . '_' . $moduleName . '::form");


                $resultPage->getConfig()->getTitle()->prepend(__("Form Data"));
                return $resultPage;
            }
        }';
    }


    public function getMassDelete($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Controller\Adminhtml\Form;

        use Magento\Framework\Controller\ResultFactory;
        use Magento\Framework\App\Action\Context;
        use Magento\Ui\Component\MassAction\Filter;

        use ' . $namespace . '\\' . $moduleName . '\Model\ResourceModel\Post\CollectionFactory;
       class MassDelete extends  \Magento\Framework\App\Action\Action
        {   

            protected $filter;

           
            protected $collectionFactory;

            public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
            {
                $this->filter = $filter;
                $this->collectionFactory = $collectionFactory;
                parent::__construct($context);
            }

           
            public function execute()
            {

                $collection = $this->filter->getCollection($this->collectionFactory->create());
                $collectionSize = $collection->getSize();

                foreach ($collection as $page) {
                    $page->delete();
                }

                $this->messageManager->addSuccessMessage(__("A total of %1 record(s) have been deleted.", $collectionSize));
                $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
                
                return $resultRedirect->setPath("*/*/");    
            }
        }';
    }


    public function getNewAction($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Controller\Adminhtml\Form;

        use Magento\Backend\App\Action;
        use Magento\Backend\App\Action\Context;
        use Magento\Framework\View\Result\PageFactory;

       class NewAction extends Action
        {
            private $pageFactory;
            public function __construct(
                Context $context,
                PageFactory $rawFactory
            ) {
                $this->pageFactory = $rawFactory;
                parent::__construct($context);
            }
            public function execute()
            {
                $resultPage = $this->pageFactory->create();
                $resultPage->getConfig()->getTitle()->prepend(__("Add Form Data"));
                return $resultPage;
            }
        }';
    }


    public function getSave($namespace, $moduleName)
    {
        return '<?php

        /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */

        namespace ' . $namespace . '\\' . $moduleName . '\Controller\Adminhtml\Form;


        use Magento\Backend\App\Action;
        use Magento\Backend\App\Action\Context;
        use  ' . $namespace . '\\' . $moduleName . '\Model\PostFactory;
        use Magento\Framework\Controller\ResultFactory;

       

        class Save extends Action
        {

            public function __construct(
                Context $context,
                PostFactory $postFactory   
             ) {
                $this->postFactory = $postFactory;
                parent::__construct($context);
            }
            public function execute()
            {

                $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
                $postData = $this->getRequest()->getPostValue();
                if (!$postData) {
                     return $resultRedirect->setPath("*/*/");
                }
                try {
                    $model = $this->postFactory->create();
                    $model->setData($postData);       
                    $model->save();
                    $this->messageManager->addSuccess( __("Save Successfully") );
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage(__("Error occurred while saving the data."));
                }
                return $resultRedirect->setPath("*/*/");

            }
        }';
    }

    public function getFormEdit($namespace, $moduleName)
    {
        return '<?xml version="1.0"?>
        <!-- /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */
        -->
        <page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="admin-1column"  xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
            <body>
                <referenceContainer name="content">
                    <uiComponent name="ui_grid_form"/>
                </referenceContainer>
            </body>
        </page>';
    }

     public function getformIndex($namespace, $moduleName)
    {
        return '<?xml version="1.0"?>
        <!-- /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */
        -->
        <page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="admin-1column"  xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
            <body>
                <referenceContainer name="content">
                    <uiComponent name="ui_form_grid"/>
                </referenceContainer>
            </body>
        </page>';
    }


    public function getformnewaction($namespace, $moduleName)
    {
        return '<?xml version="1.0"?>
        <!-- /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */
        -->
        <page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="admin-1column"  xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
            <body>
                <referenceContainer name="content">
                    <uiComponent name="ui_grid_form"/>
                </referenceContainer>
            </body>
        </page>';
    }

     public function getUiFormEdit($namespace, $moduleName)
    {
        return '<?xml version="1.0"?>
        <!-- /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */
        -->
        <form xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Ui:etc/ui_configuration.xsd">
            <argument name="data" xsi:type="array">
                <item name="js_config" xsi:type="array">
                    <item name="provider" xsi:type="string">ui_grid_form.ui_grid_form_data_source</item>
                    <item name="deps" xsi:type="string">ui_grid_form.ui_grid_form_data_source</item>
                </item>
                <item name="buttons" xsi:type="array">
                    <item name="back" xsi:type="array">
                        <item name="name" xsi:type="string">back</item>
                        <item name="label" xsi:type="string" translate="true">Back</item>
                        <item name="class" xsi:type="string">action-default scalable back</item>
                        <item name="url" xsi:type="string">*/*/index</item>
                    </item>
                    <item name="save" xsi:type="array">
                        <item name="name" xsi:type="string">save</item>
                        <item name="label" xsi:type="string" translate="true">Save</item>
                        <item name="class" xsi:type="string">primary</item>
                        <item name="url" xsi:type="string">*/*/save</item>
                    </item>
                </item>
                <item name="config" xsi:type="array">
                    <item name="dataScope" xsi:type="string">data</item>
                    <item name="namespace" xsi:type="string">ui_eav_form</item>
                </item>
                <item name="template" xsi:type="string">templates/form/collapsible</item>

            </argument>
            <dataSource name="ui_grid_form_data_source">
                <argument name="dataProvider" xsi:type="configurableObject">
                    <argument name="class" xsi:type="string">'. $namespace . '\\' . $moduleName .'\Ui\DataProvider\DataProvider</argument>
                    <argument name="name" xsi:type="string">ui_grid_form_data_source</argument>
                    <argument name="primaryFieldName" xsi:type="string">id</argument>
                    <argument name="requestFieldName" xsi:type="string">id</argument>
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="submit_url" xsi:type="url" path="*/*/save"/>
                        </item>
                    </argument>
                </argument>
                <argument name="data" xsi:type="array">
                    <item name="js_config" xsi:type="array">
                        <item name="component" xsi:type="string">Magento_Ui/js/form/provider</item>
                    </item>
                </argument>
            </dataSource>
            <fieldset name="form">
                <argument name="data" xsi:type="array">
                    <item name="config" xsi:type="array">
                        <item name="label" xsi:type="string" translate="true">Form Details</item>
                        <item name="sortOrder" xsi:type="number">20</item>
                    </item>
                </argument>
               <field name="name">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="dataType" xsi:type="string">text</item>
                            <item name="label" xsi:type="string" translate="true">Name</item>
                            <item name="formElement" xsi:type="string">input</item>
                            <item name="source" xsi:type="string">data</item>
                            <item name="sortOrder" xsi:type="number">10</item>
                            <item name="validation" xsi:type="array">
                                <item name="required-entry" xsi:type="boolean">true</item>
                            </item>
                        </item>
                    </argument>
                </field>
                 <field name="email">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="dataType" xsi:type="string">text</item>
                            <item name="label" xsi:type="string" translate="true">Email</item>
                            <item name="formElement" xsi:type="string">input</item>
                            <item name="source" xsi:type="string">data</item>
                            <item name="sortOrder" xsi:type="number">20</item>
                            <item name="validation" xsi:type="array">
                                <item name="validate-email" xsi:type="boolean">true</item>
                            </item>
                        </item>
                    </argument>
                </field>
                <field name="message">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="formElement" xsi:type="string">textarea</item>
                            <item name="cols" xsi:type="number">15</item>
                            <item name="rows" xsi:type="number">5</item>
                            <item name="label" translate="true" xsi:type="string">Message</item>
                            <item name="dataType" translate="true" xsi:type="string">text</item>
                            <item name="validation" xsi:type="array">
                                <item name="required-entry" xsi:type="boolean">true</item>
                            </item>
                        </item>
                    </argument>
                </field>
            </fieldset>
        </form>';
    }


    public function getUiGrid($namespace, $moduleName)
    {
        return '<?xml version="1.0"?>
        <!-- /**
         * @category  Magento2.XX
         * @package   ' . $namespace . '_' . $moduleName . '
         * @author    Sandeep Gupta
         * @email    ersandeepgu@gmail.com
         * @license  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
         * 
         */
        -->
        <listing xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                 xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Ui:etc/ui_configuration.xsd">
            <argument name="data" xsi:type="array">
                <item name="js_config" xsi:type="array">
                    <item name="provider" xsi:type="string">ui_form_grid.ui_form_grid_source</item>
                    <item name="deps" xsi:type="string">ui_form_grid.ui_form_grid_source</item>
                </item>
                <item name="spinner" xsi:type="string">ui_form_grid_columns</item>
                <item name="buttons" xsi:type="array">
                    <item name="add" xsi:type="array">
                        <item name="name" xsi:type="string">add</item>
                        <item name="label" xsi:type="string" translate="true">Add Data</item>
                        <item name="class" xsi:type="string">primary</item>
                        <item name="url" xsi:type="string">*/*/newaction</item>
                    </item>
                </item>
            </argument>
            <dataSource name="ui_form_grid_source">
                <argument name="dataProvider" xsi:type="configurableObject">
                   <argument name="class" xsi:type="string">'. $namespace . '\\' . $moduleName .'\Ui\DataProvider\Form\DataProvider</argument>
                    <argument name="name" xsi:type="string">ui_form_grid_source</argument>
                    <argument name="primaryFieldName" xsi:type="string">id</argument>
                    <argument name="requestFieldName" xsi:type="string">id</argument>
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="update_url" xsi:type="url" path="mui/index/render"/>
                            <item name="storageConfig" xsi:type="array">
                                <item name="indexField" xsi:type="string">id</item>
                            </item>
                            <item name="resizeConfig" xsi:type="array">
                                <item name="enabled" xsi:type="boolean">true</item>
                                <item name="component" xsi:type="string">Magento_Ui/js/grid/resize</item>
                                <item name="rootSelector" xsi:type="string">${ $.columnsProvider }:.admin__data-grid-wrap</item>
                                <item name="columnsProvider" xsi:type="string">${ $.name }</item>
                            </item>
                        </item>
                    </argument>
                </argument>
                <argument name="data" xsi:type="array">
                    <item name="js_config" xsi:type="array">
                        <item name="component" xsi:type="string">Magento_Ui/js/grid/provider</item>
                    </item>
                </argument>
            </dataSource>
            <listingToolbar name="listing_top">
                <argument name="data" xsi:type="array">
                    <item name="config" xsi:type="array">
                        <item name="template" xsi:type="string">ui/grid/toolbar</item>
                    </item>
                </argument>
                <bookmark name="bookmarks"/>
                <columnsControls name="columns_controls"/>
                <filters name="listing_filters" />
                <massaction name="listing_massaction">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="component" xsi:type="string">Magento_Ui/js/grid/tree-massactions</item>
                        </item>
                    </argument>
                    <action name="delete">
                        <argument name="data" xsi:type="array">
                            <item name="config" xsi:type="array">
                                <item name="confirm" xsi:type="array">
                                    <item name="title" xsi:type="string" translate="true">Delete Data(s)</item>
                                    <item name="message" xsi:type="string" translate="true">Delete Data(s) from Magento?</item>
                                </item>
                                <item name="type" xsi:type="string">delete</item>
                                <item name="label" xsi:type="string" translate="true">Delete Data(s)</item>
                                <item name="url" xsi:type="url" path="*/*/massdelete"/>
                            </item>
                        </argument>
                    </action>
                </massaction>
                <paging name="listing_paging"/> 
            </listingToolbar>
            <columns name="ui_form_grid_columns">
                <argument name="data" xsi:type="array">
                    <item name="config" xsi:type="array">
                        <item name="storageConfig" xsi:type="array">
                            <item name="provider" xsi:type="string">ui_form_grid.ui_form_grid.listing_top.bookmarks</item>
                            <item name="namespace" xsi:type="string">current</item>
                        </item>
                        <item name="childDefaults" xsi:type="array">
                            <item name="fieldAction" xsi:type="array">
                                <item name="provider" xsi:type="string">ui_form_grid.ui_form_grid.ui_form_grid_columns.actions</item>
                                <item name="target" xsi:type="string">applyAction</item>
                                <item name="params" xsi:type="array">
                                    <item name="0" xsi:type="string">edit</item>
                                    <item name="1" xsi:type="string">${ $.$data.rowIndex }</item>
                                </item>
                            </item>
                            <item name="storageConfig" xsi:type="array">
                                <item name="provider" xsi:type="string">ui_form_grid.ui_form_grid.listing_top.bookmarks</item>
                                <item name="root" xsi:type="string">columns.${ $.index }</item>
                                <item name="namespace" xsi:type="string">current.${ $.storageConfig.root}</item>
                            </item>
                        </item>
                    </item>
                </argument>
                <selectionsColumn name="ids">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="indexField" xsi:type="string">id</item>
                            <item name="sortOrder" xsi:type="number">0</item>
                        </item>
                    </argument>
                </selectionsColumn>
                <column name="id">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="indexField" xsi:type="string">id</item>
                            <item name="label" xsi:type="string" translate="true">Id</item>
                            <item name="sortOrder" xsi:type="number">1</item>
                        </item>
                    </argument>
                </column>
                <column name="name">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="filter" xsi:type="string">text</item>
                            <item name="sorting" xsi:type="string">asc</item>
                            <item name="label" xsi:type="string" translate="true">Name</item>
                            <item name="sortOrder" xsi:type="number">2</item>
                        </item>
                    </argument>
                </column>
                <column name="email">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="filter" xsi:type="string">text</item>
                            <item name="dataType" xsi:type="string">text</item>
                            <item name="label" xsi:type="string" translate="true">Email</item>
                            <item name="sortOrder" xsi:type="number">6</item>
                        </item>
                    </argument>
                </column>
                <column name="message">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="filter" xsi:type="string">text</item>
                            <item name="dataType" xsi:type="string">text</item>
                            <item name="label" xsi:type="string" translate="true">Message</item>
                            <item name="sortOrder" xsi:type="number">8</item>
                        </item>
                    </argument>
                </column>
                <actionsColumn name="actions" class="'. $namespace . '\\' . $moduleName .'\Ui\Component\Listing\Columns\Form\Actions">
                    <argument name="data" xsi:type="array">
                        <item name="config" xsi:type="array">
                            <item name="indexField" xsi:type="string">id</item>
                            <item name="urlEntityParamName" xsi:type="string">id</item>
                            <item name="sortOrder" xsi:type="number">50</item>
                            <item name="label" xsi:type="string" translate="true">Actions</item>
                        </item>
                    </argument>
                </actionsColumn>
            </columns>
        </listing>';
    }
}
