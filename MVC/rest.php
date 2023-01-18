<?php 
//indica para client qual retorno aplicação vai ter
header('Content-Type: application/json; charset=utf-8');

require 'Lib/Livro/Core/ClassLoader.php';

$l = new Livro\Core\ClassLoader;
$l->addNamespace('Livro', 'Lib/Livro');
$l->register();

require 'Lib/Livro/Core/AppLoader.php';
$app = new Livro\Core\AppLoader;
$app->addDirectory('App/Control');
$app->addDirectory('App/Model');
$app->addDirectory('App/Services');
$app->register();

class LivroRestService
{
	public static function run($request)
	{
		
		$class = isset($request['class'])?$request['class']:'';
		$method = isset($request['method'])?$request['method']:'';

		try{

			if(class_exists($class))
			{
				if(method_exists($class,$method))
				{
					$response = call_user_func([$class, $method], $request);

					return json_encode([
						'status' => 'success',
						'data' => $response
					]);
				}
				else
				{
					return json_encode([
						'status' => 'error',
						'data' => "Método {$method} não existe"
					]);
				}
			}
			else
			{
				return json_encode([
					'status' => 'error',
					'data' => "Classe não {$class} existe"
				]);
			}
		}
		catch(Exception $e)
		{
			return json_encode([
				'status' => 'error',
				'data' => $e->getMessage()
			]);
		}
	}
}

echo LivroRestService::run( $_REQUEST );