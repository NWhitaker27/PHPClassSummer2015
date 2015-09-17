<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
  
<form class="form-group" action="#" method="GET" name="searchCorps">
    <input type="text" name="corpName" value="Search for...">
        <br /><br />
        <label>in:</label>
    <select name="columnsSearch">
        <option>ID</option>
        <option>Corporation</option>
        <option>Date</option>
        <option>Email</option>
        <option>Zip Code</option>
        <option>Owner</option>
        <option>Phone</option>
    </select>
    <br /><br />
    <input class="btn btn-default" type="hidden" value="search" name="action" />
    <input class="btn btn-default" type="submit" value="Search" name="action" />
    <input class="btn btn-default" type="reset" value="Reset" name="reset" />
    <br /><br />
    
</form>

</body>
</html>