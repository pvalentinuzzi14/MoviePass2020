<?php 
namespace Repository;


use Repository\IRepos as IRepos;
use Model\User as User;

class UserRepository{
	
	private $list = array();

	public function add($item){
		$this->retrieveData();
		array_push($this->list, $item);
		$this->saveData();
	}

	public function getAll(){
		$this->retrieveData();
		return $this->list;
    }
    
	public function delete($id){
		$this->retrieveData();
		$newList = array();
		foreach ($this->list as $User) {
			if($User->getId() != $id){
				array_push($list, $User);
			}
		}
		$this->list = $newList;
		$this->saveData();
	}

	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->list as $User) {
			$valueArray['name'] = $User->getName();
			$valueArray['user'] = $User->getUser();
			$valueArray['pass'] = $User->getPass();
			array_push($arrayToEncode, $valueArray);
			
		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

		file_put_contents(dirname(__DIR__).'/data/users.json', $jsonContent);
	}
	public function retrieveData(){
		$this->list = array();
		
		if(file_exists(dirname(__DIR__).'/data/users.json')){
			$jsonContent = file_get_contents(dirname(__DIR__).'/data/users.json');

			$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

			foreach ($arrayToDecode as $valueArray) {
				$User = new User($valueArray['name'],$valueArray['user'],$valueArray['pass']);
				array_push($this->list, $User);
			}
		}
	}
}

 ?>