<?php 
namespace DAO;
use Models\Cinema as Cinema;

class Cinemas{
	
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
	public function saveData(){
		$arrayToEncode = array();

		foreach ($this->list as $cinema) {
			$valueArray['name'] = $cinema->getName();
			$valueArray['id'] = $cinema->getId();
            $valueArray['address'] = $cinema->getAddress();
<<<<<<< HEAD
            $valueArray['room'] = $cinema->getRoom();
=======
			$valueArray['room'] = $cinema->getRoom();
			$valueArray['price'] = $cinema->getPrice();

>>>>>>> PablitoBranch
			array_push($arrayToEncode, $valueArray);	
		}
		$jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

		file_put_contents(dirname(__DIR__).'/Data/cinemas.json', $jsonContent);
    }
    
	public function retrieveData(){
		$this->list = array();
		
		if(file_exists(dirname(__DIR__).'/Data/cinemas.json')){
			$jsonContent =file_get_contents(dirname(__DIR__).'/Data/cinemas.json');

			$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

			foreach ($arrayToDecode as $valueArray) {
<<<<<<< HEAD
				$cinema = new Cinema($valueArray['name'],$valueArray['address'],$valueArray['id'],$valueArray['room']);
=======
				$cinema = new Cinema($valueArray['name'],$valueArray['address'],$valueArray['id'],$valueArray['room'],$valueArray['price']);
>>>>>>> PablitoBranch
				array_push($this->list, $cinema);
			}
		}
	}
	public function remove($id)
	{
		$this->retrieveData();
		foreach ($this->list as $key => $value)
		{
			if($id == $value->getId())
			{
				unset($this->list[$key]);
				$this->saveData();
				break;
			}
		}
	}
}

 ?>