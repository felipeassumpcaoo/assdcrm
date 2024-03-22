<?php
interface ProspectionDAO {
    public function add( Prospection $p);
    public function findALL();
    public function findById($id);
    public function update(Prospection $p);
    public function delete($id);
}   