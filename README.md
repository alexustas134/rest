# Порядок установки модуля для редактирования любого json-документа метом PATCH

## Патчинг документа 

1) Импортировать sql файл в Вашу БД
2) Настроить в файле web.php - config следующим обрзом:

``` php
'parsers' => [
	        	'application/json' => 'yii\web\JsonParser',
	        ]
``` 
 А также  urlManager:
 
 ``` php
 
 'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,
            'rules' => [
            	'api/employee' => 'api/employee/index',
	            '<controller:\w+>/<id:\d+>'=>'<controller>/view',
	            '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
	            'api/employee/get-post/<id:\d+>' => 'api/employee/get-post',
	            'PUT,PATCH employee' => 'employee/update',
            	['class' => 'yii\rest\UrlRule', 'controller' => 'employee', 'pluralize'=>false],
            ],
        ],
	
```	
