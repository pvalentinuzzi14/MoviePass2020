<?php
    namespace DAO;

    use Models\Genre as Genre;
    use PDOException;

    class Genres{
       private $connection;

        /*----------------------------- DB -----------------------------*/
        public function add(Genre $item)
        {
            $value=0;
                try {
                    $query = "INSERT INTO genres (id_api_genre,name_genre) VALUES (:id_api_genre,:name_genre)";
                    $parameters["id_api_genre"] = $item->getId();
                    $parameters["name_genre"] = $item->getName();
                    $this->connection = Connection::getInstance();
                    $value = $this->connection->ExecuteNonQuery($query,$parameters);
    
                } catch (PDOException $e) {
                    throw $e;
                }
                return $value;
        }
    
        public function RetrieveDB(){
            $moviesList = array();
    
            try {
                $sql = "SELECT  * FROM genres";
                $this->connection = Connection::getInstance();
                
                $statement = $this->connection->execute($sql);
    
                if(!empty($statement))
                {
                    foreach ($statement as $value) {
                        $movieAux = $this->create($value);
                        array_push($moviesList,$movieAux);
                    }
                }
            } catch (PDOException $e) {
                throw $e;
            }
    
            return $moviesList;
        }
    
    
        //crea model genre 
        private function create($statementRes)
        {
            $genre = new Genre();
            $genre->setId($statementRes['id_api_genre']);
            $genre->setName($statementRes['name_genre']);
            $genre->setIdBd($statementRes['id_genre']);
            return $genre;
        }
    
        public function getOne($id)
        {
            $genre = null;
    
            try {
                $parameters['id_genre'] = $id; 
    
                $sql = "SELECT * FROM genres WHERE id_genre=:id";
                
                $this->connection = Connection::getInstance();
                
                $statement = $this->connection->execute($sql);
    
                if(!empty($statement))
                {
                    $movie = $this->create($statement[0]);
                }
            } catch (PDOException $e) {
                throw $e;
            }
    
            return $movie;
        }
      

    /*----------------------------- API -----------------------------*/
    public function createFromApi($valuesArray)
    {
        $genre = new Genre();
        $genre->setId($valuesArray["id"]); 
        $genre->setName($valuesArray["name"]);
        return $genre;
    }

    public function RetrieveDataFromApi() 
	{
		$jsonContent = file_get_contents("https://api.themoviedb.org/3/genre/movie/list?api_key=2f0f4f905a5085a4cb6411b8c639165b&language=es-ES");
		$arrayToDecode =($jsonContent) ? json_decode($jsonContent,true) : array();
		$arrayOfGenres = array();
        
		foreach($arrayToDecode['genres'] as $value):
			$genre =$this->createFromApi($value);
			array_push($arrayOfGenres,$genre);
		endforeach;	

		return $arrayOfGenres;
	}
}
?>