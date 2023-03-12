<?php
try{
    $conn=new PDO("mysql:host=localhost;dbname=registration",'root','');

    $query='INSERT INTO books(book_title,book_author,book_release_year,book_genres,book_cover,book_file,book_description) VALUES (:book_title,:book_author,:book_release_year,:book_genres,:book_cover,:book_file,:book_description)';

    $upload=$conn->prepare($query);
    
    $upload->execute(['book_title'=>$_POST['book_title'],'book_author'=>$_POST['book_author'],'book_release_year'=>$_POST['book_release_year'],'book_genres'=>$_POST['book_genres'],'book_cover'=>$_POST['book_cover'],'book_file'=>$_POST['book_file'],'book_description'=>$_POST['book_description']]);


    header("Location: http://www.localhost/kursach/Library.php");
}

catch  (PDOException $e)
{
    echo "error".$e->getMessage();
}
