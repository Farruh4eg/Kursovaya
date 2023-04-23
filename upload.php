<?php
try{
    $conn=new PDO("mysql:host=localhost;dbname=registration",'root','');

    $query='INSERT INTO books(book_title, book_cover, book_file, book_description)
    VALUES (:book_title, :book_cover, :book_file, :book_description);
    
    INSERT INTO author_table(author_name)
    SELECT :book_author
    WHERE NOT EXISTS (SELECT author_name FROM author_table WHERE author_name = :book_author);
    
    INSERT INTO book_author_relations(book_id, book_author)
    VALUES (LAST_INSERT_ID(), (SELECT id FROM author_table WHERE author_name = :book_author));
    
    INSERT INTO releaseyear_table(releaseyear)
    SELECT :book_release_year
    WHERE NOT EXISTS (SELECT releaseyear FROM releaseyear_table WHERE releaseyear = :book_release_year);
    
    INSERT INTO book_releaseyear_relations(book_id, book_releaseyear)
    VALUES (LAST_INSERT_ID(), (SELECT id FROM releaseyear_table WHERE releaseyear = :book_release_year));
    ';

    $upload=$conn->prepare($query);
    
    $upload->execute(['book_title'=>$_POST['book_title'],'book_cover'=>$_POST['book_cover'],'book_file'=>$_POST['book_file'],'book_description'=>$_POST['book_description']]);

    header("Location: ./Library.php");
}

catch  (PDOException $e)
{
    echo "error".$e->getMessage();
}
