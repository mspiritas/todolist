<?php

    // Getting items from database
    function get_items_by_category($category_id){
        global $db;
        if ($category_id) {
            $query = 'SELECT I.Title, I.ItemNum, I.Description, C.categoryName
                      FROM todoitems I
                      LEFT JOIN categories C
                      ON I.categoryID = C.categoryID
                      WHERE I.categoryID = :category_id
                      ORDER BY I.ItemNum';
        } else {
            $query = 'SELECT I.Title, I.ItemNum, I.Description, C.categoryName
                      FROM todoitems I
                      LEFT JOIN categories C
                      ON I.categoryID = C.categoryID
                      ORDER BY C.categoryID';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    // Deleting items from database
    function delete_item($item_num) {
        global $db;
        $query = 'DELETE FROM todoitems
                  WHERE ItemNum = :item_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':item_num', $item_num);
        $statement->execute();
        $statement->closeCursor();
    }

    // Adding items to database
    function add_item($category_id, $title, $description) {
        global $db;
        $query = 'INSERT INTO todoitems (categoryID, Title, Description)
                  VALUES(:category_id, :title, :descr)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':descr', $description);
        $statement->execute();
        $statement->closeCursor();
    }