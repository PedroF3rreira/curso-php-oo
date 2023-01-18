<?php 
namespace Livro\Http;

class LivroRestService
{
	public static function run($request)
	{
		
		$class = isset($request['class'])?$request['class']:'';
		$method = isset($request['method'])?$request['method']:'';
		$response = null;

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
					'data' => "Classe {$class} não existe"
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