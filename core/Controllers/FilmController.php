<?php

namespace Controllers;

use App\File;
use Attributes\DefaultEntity;
use Attributes\UsesEntity;
use Entity\Film;

#[DefaultEntity(entityName: Film::class)]
class FilmController extends AbstractController
{


    public function index(){

        $films = $this->repository->findAll("title");

        return $this->render("films/index", [
            "pageTitle"=>"les films",
            "films"=>$films
        ]);
    }

    public function show(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET["id"])){
            $id = $_GET['id'];
        }

        if(!$id){ return $this->redirect(); }

        $film = $this->repository->findById($id);

        if(!$film){return $this->redirect(); }

        return $this->render("films/show", [
            "pageTitle"=> $film->getTitle(),
            "film"=>$film
        ]);
    }

    public function create(){

        $title = null;
        $synopsis = null;

        if (!empty($_POST['title'])){
            $title = htmlspecialchars($_POST['title']);
        }
        if (!empty($_POST['synopsis'])){
            $synopsis = htmlspecialchars($_POST['synopsis']);
        }

        if ($title && $synopsis){
            $image = new File("imageFilm");
            if ($image->isImage()){


                $image->upload();
            }
            $film = new Film();
            $film->setTitle($title);
            $film->setSynopsis($synopsis);
            $film->setImage($image->getName());

            $idFilm = $this->repository->insert($film);

            return $this->redirect([
               "type"=>"film",
               "action"=>"show",
               "id"=>$idFilm
            ]);
        }

        return $this->render("films/create", [
            "pageTitle"=>"Ajouter un film"
        ]);

    }

    public function remove(){
        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET["id"])){
            $id = $_GET['id'];
        }

        if(!$id){ return $this->redirect(); }

        $film = $this->repository->findById($id);

        if(!$film){return $this->redirect(); }

        $this->repository->delete($film);

        return $this->redirect();
    }


}