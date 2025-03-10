<?php

require_once 'vendor/autoload.php';
require_once 'vendor/econea/nusoap/src/nusoap.php';
require_once 'server.php';

$namespace = 'urn:mywsdlservice';
$server = new nusoap_server();
$server->configureWSDL('myWebService', $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

$server->wsdl->addComplexType(
  'Product',
  'complexType',
  'struct',
  'all',
  '',
  [
    'id' => ['name' => 'id', 'type' => 'xsd:int'],
    'nombre' => ['name' => 'nombre', 'type' => 'xsd:string'],
    'precio' => ['name' => 'precio', 'type' => 'xsd:decimal'],
    'stock' => ['name' => 'stock', 'type' => 'xsd:int'],
  ]
);

$server->wsdl->addComplexType(
  'ProductsList',
  'complexType',
  'array',
  '',
  'SOAP-ENC:Array',
  [],
  [
    [
      'ref' => 'SOAP-ENC:arrayType',
      'wsdl:arrayType' => 'tns:Product[]'
    ]
  ],
  'tns:Product'
);

$server->register(
  'Server.getProducts',
  [
    'token' => 'xsd:string'
  ],
  [
    'return' => 'tns:ProductsList'
  ],
  $namespace,
  false,
  'rpc',
  'encoded',
  'Obtiene la lista de productos'
);

$server->register(
  'Server.getProductById',
  [
    'id' => 'xsd:int',
    'token' => 'xsd:string'
  ],
  [
    'return' => 'tns:Product'
  ],
  $namespace,
  false,
  'rpc',
  'encoded',
  'Obtiene un producto por su ID'
);

$server->register(
  'Server.addProduct',
  [
    'nombre' => 'xsd:string',
    'precio' => 'xsd:float',
    'stock' => 'xsd:int',
    'token' => 'xsd:string'
  ],
  [
    'return' => 'tns:Product'
  ],
  $namespace,
  false,
  'rpc',
  'encoded',
  'Añade un producto'
);

$server->register(
  'Server.updateProduct',
  [
    'id' => 'xsd:int',
    'nombre' => 'xsd:string',
    'token' => 'xsd:string',
    'precio' => 'xsd:float',
    'stock' => 'xsd:int'
  ],
  [
    'return' => 'tns:Product'
  ],
  $namespace,
  false,
  'rpc',
  'encoded',
  'Busca un producto y luego lo actualiza.'
);

$server->service(file_get_contents('php://input'));