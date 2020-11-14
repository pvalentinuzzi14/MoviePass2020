<?php namespace DAO;
use Models\Room as M_room;
use Models\Movie as M_movie;
use Models\Showtime as M_showtime;
use DAO\Rooms as D_Rooms;
use DAO\Movies as D_Movies;
use DAO\Connection as Connection;
use \PDOException as PDOException;

class Showtimes {

    private $connection;

    public function create(M_showtime $showtime) 
    {
        $value = 0;
        try
        {
            $query = "INSERT INTO showtimes (date_showtime, opening_time, closing_time, id_rooms, id_movie, tickets_sold, total_tickets, ticket_price) VALUES (:date, :openingTime, :closingTime, :idRoom, :idMovie, :ticketsSold, :totalTickets, :ticketPrice)";
            $parameters["date"] = $showtime->getDate();
            $parameters["openingTime"] = $showtime->getOpeningTime();
            $parameters["closingTime"] = $showtime->getClosingTime();
            $parameters["idRoom"] = $showtime->getRoom()->getId();
            $parameters["idMovie"] = $showtime->getMovie()->getIdBd();
            $parameters["ticketsSold"] = 0;
            $parameters["totalTickets"] = $showtime->getTotalTickets();
            $parameters["ticketPrice"] = $showtime->getTicketPrice();

            $this->connection = Connection::getInstance();

            $value = $this->connection->executeNonQuery($query, $parameters);
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $value;
    }

    private function read($row) {
        $showtime = new M_Showtime();

        $showtime->setID($row["id"]);
        $showtime->setDate($row["date_showtime"]);
        $showtime->setOpeningTime($row["opening_time"]);
        $showtime->setClosingTime($row["closing_time"]);
        $showtime->setTicketsSold($row["tickets_sold"]);
        $showtime->setTotalTickets($row["total_tickets"]);
        $showtime->setTicketPrice($row["ticket_price"]);
        return $showtime;
    }

    public function retrieveAll() {
        $showtimeList = array();
        try
        {
            $query = "SELECT * FROM rooms r INNER JOIN (SELECT m.*,sh.`id`,sh.`date_showtime`,
                      sh.`opening_time`,sh.`closing_time`,sh.`tickets_sold`,sh.`total_tickets`,sh.`id_rooms` FROM
                      showtimes sh INNER JOIN movies m ON m.`id_movie`=sh.`id_movie` WHERE DATEDIFF(sh.date_showtime,(CURDATE()-1))> 0) sub ON 
                      r.`idRooms`=sub.id_rooms ORDER BY sub.date_showtime,sub.opening_time";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $showtime = $this->read($row);
                    //$showtime->generateClosingTime($this->retrieveDurationOneMovieFromApi($row["id_api_movie"]));

                    $room = new M_room();
                    $room->setID($row['id_rooms']);
                    $room->setState($row['state']);
                    $room->setName($row['room_name']);
                    $room->setCapacity($row['capacity']);
                    $room->setTicketPrice($row['ticket_price']);
                    $room->setCinema($row['id_cinema']);

                    $movie = new M_movie();
                    $movieDao = new D_Movies();
                    $movie->setId($row['id_api_movie']);
                    $movie->setIdBd($row['id_movie']);
                    $movie->setScore($row['score']);
                    $movie->setTitle($row['name_movie']);
                    $movie->setOverview($row['overview']);
                    $movie->setBackground($row['background']);
                    $movie->setRelease_date($row['uploading_date']);
                    $movie->setImage($row['poster']);
                    $movie->setTrailer($row['id_api_movie']);
                    $array = $movieDao->getGenresById($row['id_movie']);
                    $movie->setGenre_ids($array);

                    $showtime->setRoom($room);
                    $showtime->setMovie($movie);

                    array_push($showtimeList, $showtime);
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $showtimeList;
    }

    public function retrieveAlltoList() {
        $showtimeList = array();
        try
        {
            $query = "SELECT * FROM showtimes ORDER BY date_showtime,opening_time";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $showtime = $this->read($row);

                    $idRoom = $row["id_rooms"];
                    $idMovie = $row["id_movie"];

                    $RoomDAO = new D_Rooms();
                    $Room = $RoomDAO->getOne($idRoom);

                    $movieDAO = new D_Movies();
                    $movie = $movieDAO->getOne($idMovie);

                    $showtime->setRoom($Room);
                    $showtime->setMovie($movie);
                    //$showtime->generateClosingTime($this->retrieveDurationOneMovieFromApi($movie->getId()));
                    array_push($showtimeList, $showtime);
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $showtimeList;
    }

    public function retrieveAllAvailable() {
        $showtimeList = array();
        try
        {
            $query = "SELECT *,COUNT(sub.id_movie) FROM rooms r INNER JOIN (SELECT m.*,sh.`id`,sh.`date_showtime`,
            sh.`opening_time`,sh.`closing_time`,sh.`tickets_sold`,sh.`total_tickets`,sh.`id_rooms` FROM
            showtimes sh INNER JOIN movies m ON m.`id_movie`=sh.`id_movie` WHERE DATEDIFF(sh.date_showtime,(CURDATE()-1))> 0) sub ON 
            r.`idRooms`=sub.id_rooms GROUP BY sub.id_movie ORDER BY sub.date_showtime,sub.opening_time";
            
            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $showtime = $this->read($row);
                    //$showtime->generateClosingTime($this->retrieveDurationOneMovieFromApi($row["id_api_movie"]));

                    $room = new M_room();
                    $room->setID($row['id_rooms']);
                    $room->setState($row['state']);
                    $room->setName($row['room_name']);
                    $room->setCapacity($row['capacity']);
                    $room->setTicketPrice($row['ticket_price']);
                    $room->setCinema($row['id_cinema']);

                    $movie = new M_movie();
                    $movieDao = new D_Movies();
                    $movie->setId($row['id_api_movie']);
                    $movie->setIdBd($row['id_movie']);
                    $movie->setScore($row['score']);
                    $movie->setTitle($row['name_movie']);
                    $movie->setOverview($row['overview']);
                    $movie->setBackground($row['background']);
                    $movie->setRelease_date($row['uploading_date']);
                    $movie->setImage($row['poster']);
                    $movie->setTrailer($row['id_api_movie']);
                    $array = $movieDao->getGenresById($row['id_movie']);
                    $movie->setGenre_ids($array);

                    $showtime->setRoom($room);
                    $showtime->setMovie($movie);
                    array_push($showtimeList, $showtime);
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $showtimeList;
    }

    public function retrieveShowtimesByMovieId($id) {
        $showtimeList = array();
        try
        {
            $parameters['id'] = $id;
            $query = " SELECT cxs.cinema_name,cxs.room_name,sh.id,sh.date_showtime,sh.opening_time FROM showtimes sh
            INNER JOIN (SELECT c.*,r.room_name,r.idRooms FROM cinemas c INNER JOIN rooms r ON r.id_cinema=c.idCinemas)cxs ON sh.id_rooms= cxs.idRooms
             WHERE sh.id_movie=:id AND DATEDIFF(sh.date_showtime,CURDATE()-1)>0";
            
            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query,$parameters);

            if(!empty($resultSet)) {
                for ($i=0; $i < count($resultSet) ; $i++){
                    $showtimeList[$i]['id']=$resultSet[$i]['id'];
                    $showtimeList[$i]['room_name']=$resultSet[$i]['room_name'];
                    $showtimeList[$i]['cinema_name']=$resultSet[$i]['cinema_name'];
                    $showtimeList[$i]['date_showtime']=$resultSet[$i]['date_showtime'];
                    $showtimeList[$i]['opening_time']=$resultSet[$i]['opening_time'];
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $showtimeList;
    }


    public function retrieveShowtimesById($id) {
      
        try
        {
            $parameters['id'] = $id;
            $query = " SELECT *  FROM showtimes sh WHERE sh.id=:id ";
            
            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query,$parameters);

            if(!empty($resultSet)) {
                $showtime=$this->read($resultSet[0]);
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $showtime;
    }




    public function retrieveAllByDate($date) {
        $showtimeList = array();

        try
        {
            $parameters['date'] = $date;
            $query = "SELECT * FROM showtimes where date_showtime=:date ORDER BY date_showtime,opening_time";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query, $parameters);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $showtime = $this->read($row);

                    $idRoom = $row["id_rooms"];
                    $idMovie = $row["id_movie"];

                    $RoomDAO = new D_Rooms();
                    $Room = $RoomDAO->getOne($idRoom);

                    $movieDAO = new D_Movies();
                    $movie = $movieDAO->getOneDate($idMovie);

                    $showtime->setRoom($Room);
                    $showtime->setMovie($movie);

                    array_push($showtimeList, $showtime);
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $showtimeList;
    }

    

    public function retrieveOne($id) {

        try
        {
            $parameters['id'] = $id;

            $query = "SELECT * FROM rooms r INNER JOIN (SELECT m.*,sh.`id`,sh.`date_showtime`,
            sh.`opening_time`,sh.`closing_time`,sh.`tickets_sold`,sh.`total_tickets`,sh.`id_rooms` FROM
            showtimes sh INNER JOIN movies m ON m.`id_movie`=sh.`id_movie` WHERE id = :id) sub ON 
            r.`idRooms`=sub.id_rooms ORDER BY sub.date_showtime,sub.opening_time";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query, $parameters);

            if(!empty($resultSet)) {
                foreach($resultSet as $row):
                $showtime = $this->read($row);

                $room = new M_room();
                    $room->setID($row['id_rooms']);
                    $room->setState($row['state']);
                    $room->setName($row['room_name']);
                    $room->setCapacity($row['capacity']);
                    $room->setTicketPrice($row['ticket_price']);
                    $room->setCinema($row['id_cinema']);

                    $movie = new M_movie();
                    $movieDao = new D_Movies();
                    $movie->setId($row['id_api_movie']);
                    $movie->setIdBd($row['id_movie']);
                    $movie->setScore($row['score']);
                    $movie->setTitle($row['name_movie']);
                    $movie->setOverview($row['overview']);
                    $movie->setBackground($row['background']);
                    $movie->setRelease_date($row['uploading_date']);
                    $movie->setImage($row['poster']);
                    $movie->setTrailer($row['id_api_movie']);
                    $array = $movieDao->getGenresById($row['id_movie']);
                    $movie->setGenre_ids($array);

                    $showtime->setRoom($room);
                    $showtime->setMovie($movie);
                endforeach;
            }
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
        return $showtime;
    }

    public function retrieveNumberOfRowsByDate($date) {
        $value = 0;

        try
        {
            $parameters['date'] = $date;

            $query = "SELECT COUNT(*) FROM showtimes WHERE date>=:date";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query, $parameters);

            $value = $resultSet[0]["COUNT(*)"];
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
        return $value;
    }

    public function retrieveByPageAndDate($offset, $no_of_records_per_page, $date, $tickets) {
        $showtimeList = array();

        try
        {
            $parameters['date'] = $date;

            if($tickets == 1)
                $query = "SELECT * FROM showtimes WHERE date>=:date and total_tickets > tickets_sold ORDER BY date,opening_time LIMIT " . $offset . " , " . $no_of_records_per_page;
            else if($tickets == 0)
                $query = "SELECT * FROM showtimes WHERE date>=:date ORDER BY date,opening_time LIMIT " . $offset . " , " . $no_of_records_per_page;
           
            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query, $parameters);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $showtime = $this->read($row);

                    $idRoom = $row["id_Room"];
                    $idMovie = $row["id_movie"];

                    $RoomDAO = new D_Rooms();
                    $Room = $RoomDAO->getOne($idRoom);

                    $movieDAO = new D_Movies();
                   // $movie = $movieDAO->retrieveOneNoCheckMovieDate($idMovie);

                    $showtime->setRoom($Room);
                    //$showtime->setMovie($movie);

                    array_push($showtimeList, $showtime);
                }
            }
        }
        catch (PDOException $e)
        {
             $e->getMessage();
        }

        return $showtimeList;
    }

    public function updateTicketsSold($id, $ticketsSold) {
        $parameters['id'] = $id;
        $parameters['ticketsSold'] = $ticketsSold;
        $query = "UPDATE showtimes SET tickets_sold=:ticketsSold WHERE id=:id";
        $value = 0;

        try
        {
            $this->connection = Connection::getInstance();
            $value = $this->connection->executeNonQuery($query, $parameters);
        }
        catch(PDOException $e)
        {
            $e->getMessage();
        }
        return $value;
    }
    public function remove($id)
	{
		$parameters['id'] = $id; 
		$sql = "DELETE from showtimes WHERE id =:id";
		$statement = 0;
		try {
		$this->connection = Connection::getInstance();
		$statement = $this->connection->executeNonQuery($sql,$parameters);		
		}catch (PDOException $ex) {
			throw $ex;
		}

		return $statement;
    }

    public function getDateAvailable()
	{
		$datelist = array();
        try
        {
            $query = "SELECT date_showtime AS 'fecha',COUNT(date_showtime) FROM showtimes sh 
            WHERE DATEDIFF(sh.date_showtime,(CURDATE()-1)) > 0 GROUP BY date_showtime";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
					$date = $row['fecha'];
                    array_push($datelist, $date);
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $datelist;
    	
    }

    public function retrieveDurationOneMovieFromApi($id) {
        $json = file_get_contents("https://api.themoviedb.org/3/movie/" . $id . "?api_key=" . API_KEY);
        $APIDataArray = json_decode($json, true);
        $runtime = $APIDataArray["runtime"];
        if($runtime == null) {
            $runtime = 90;
        }
        return $runtime;
    }
 
}