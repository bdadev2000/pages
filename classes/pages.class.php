<?php
class Pages extends Dbh{
    public function getPage(){
        $sql = "SELECT * FROM pages";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()){
            return $result;
        }
    }

    public function addPage($title,$body,$reference){
        $sql = "INSERT INTO pages(title,body,reference) values (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title,$body,$reference]);
    }

    public function editPage($id){
        $sql = "SELECT * FROM pages where id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function updatePage($title,$body,$reference,$id){
        $sql = "UPDATE pages SET title = ?,body = ?, reference = ? where id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$title,$body,$reference,$id]);
    }

    public function delPage($id){
        $sql = "DELETE FROM pages where id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}
