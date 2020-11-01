<?php 
namespace DAO;
use Models\Cinema as Cinema;
use DAO\Connection;
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
		$cinema->setID($statementRes['idCinemas']);
		$cinema->setState($statementRes['state']);
		$cinema->setName($statementRes['cinema_name']);
		$cinema->setAddress($statementRes['address']);
		$cinema->setOpeningTime($statementRes['opening_time']);
		$cinema->setClosingTime($statementRes['closing_time']);
		if($statementRes['quantity_rooms'] != null)
		{
			$cinema->setRooms($statementRes['quantity_rooms']);
		}else{
			$cinema->setRooms(0);
		}
		return $cinema;
	}

	public function getAll()
	{
		$cinemasList = array();

		try {
			$sql = "SELECT * FROM cinemas c LEFT OUTER JOIN (
			SELECT id_cinema,COUNT(id_cinema) AS 'quantity_rooms' FROM rooms GROUP BY id_cinema
			) rxc ON c.`idCinemas`=rxc.id_cinema";

			
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

	public function getAllAvaible()
	{
		$cinemasList = array();

		try {
			$sql = "SELECT * FROM cinemas c LEFT OUTER JOIN (
			SELECT id_cinema,COUNT(id_cinema) AS 'quantity_rooms' FROM rooms GROUP BY id_cinema
			) rxc ON c.`idCinemas`=rxc.id_cinema WHERE c.state=1" ;
			
				
			
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
			$sql = "SELECT * FROM cinemas c INNER JOIN (
				SELECT id_cinema,COUNT(id_cinema) AS 'quantity_rooms' FROM rooms GROUP BY id_cinema
			) rxc ON c.`idCinemas`=rxc.id_cinema WHERE idCinemas= :id";
			
			$this->connection = Connection::getInstance();
			
			$statement = $this->connection->execute($sql,$parameters);

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

	public function updateName($id,$nombre)
	{
		try {
			$query = "UPDATE cinemas SET cinema_name = :cinema WHERE idCinemas = :id";		
			$parameters['cinema'] = $nombre;
			$parameters ['id'] = $id;

			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
	}

	public function updateAddress($id,$newAddress)
	{
		try {
			$query = "UPDATE cinemas SET address = :address_param WHERE idCinemas = :id";		
			$parameters['address_param'] = $newAddress;
			$parameters ['id'] = $id;

			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
	}
	public function updateOpeningTime($id,$newOpenTime)
	{
		try {
			$query = "UPDATE cinemas SET opening_time = :openTime WHERE idCinemas = :id";		
			$parameters['openTime'] = $newOpenTime;
			$parameters ['id'] = $id;

			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
	}
	public function updateClosingTime($id,$newCloseTime)
	{
		try {
			$query = "UPDATE cinemas SET closing_time = :closeTime WHERE idCinemas = :id";		
			$parameters['closeTime'] = $newCloseTime;
			$parameters ['id'] = $id;

			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
	}

	public function updateState($id,$newState)
	{
		try {
            $parameters['newState'] = $newState;
			$parameters ['id'] = $id;
			$query = "UPDATE cinemas 
						SET state = :newState 
						WHERE idCinemas = :id";		
			
			$this->connection = Connection::getInstance();
			$value = $this->connection->executeNonQuery($query,$parameters);

		} catch (PDOException $e) {
			throw $e;
		}
		return $value;
    }



	public function putShowtime()
	{
		
	}
}

 ?>