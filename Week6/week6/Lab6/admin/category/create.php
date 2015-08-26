<?php
if (isPostRequest()){
    
    $category = filter_input(INPUT_POST, 'category');
    
    createCategory($category);
}


?>
        <h1>Add Category</h1>
        <form method="post" action="#">
            Category Name : <input type="text" name="category" value="" />
            <input type="submit" value="Submit" />
        </form>

