<?php 
namespace DAO;
use Models\Cinema as Cinema;
use Models\Connection;
use PDOException;

class Cinemas{
	
	private $connection;
	
	public function add(Cinema $item)
	{
			try {
				$query = "INSERT INTO cinemas (state,cinema_name,address,opening_time,closing_time) VALUES (:state,:cinema_name,:address,:opening_time,:closing_time)";
				$parameters["state"] = $item->getState();
				$parameters["cinema_name"] = $item->getName();
				$parameters["address"] = $item->getAddress();
				$parameters["opening_time"] = $item->getOpeningTime();
				$parameters["closing_time"] = $item->getClosingTime();
				
				$this->connection = Connection::getInstance();
				$value = $this->connection->executeNonQuery($query,$parameters);

			} catch (PDOException $e) {
				throw $e;
			}
			return $value;
	}

	private function create($statementRes)
	{
		$cinema = new Cinema();
		$cinema->setID($statementRes['id']);
		$cinema->setState($statementRes['state']);
		$cinema->setName($statementRes['cinema_name']);
		$cinema->setAddress($statementRes['address']);
		$cinema->setOpeningTime($statementRes['opening_time']);
		$cinema->setOpeningTime($statementRes['closing_time']);
		return $cinema;
	}

	public function getAll()
	{
		$cinemasList = array();

		try {
			$sql = "SELECT * FROM cinemas";
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql);

			if(!empty($statement))
			{
				foreach ($statement as $value) {
					$cineAux = $this->create($value);
					array_push($cinemasList,$cineAux);
				}
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $cinemasList;
	}

	public function getOne($id)
	{
		$cinema = null;

		try {
			$parameters['id'] = $id; 

			$sql = "SELECT * FROM cinemas WHERE idCinemas=:id";
			
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql);

			if(!empty($statement))
			{
				$cinema = $this->create($statement[0]);
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $cinema;
	}

	public function remove($id)
	{
		$parameters['id'] = $id; 
		$sql = "UPDATE cinemas SET state=0 WHERE idCinemas=:id";
		$statement = 0;
		try {
		$this->connection = Connection::getInstance();
		$statement = $this->connection->executeNonQuery($sql,$parameters);		
		}catch (PDOException $ex) {
			throw $ex;
		}

		return $statement;
	}

	public function putShowtime()
	{
		
	}
}

 ?>