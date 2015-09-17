<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
  
<form class="form-group" action="view.php" method="GET" name="selectOrder">
    <label>Order by:</label>            
    <select name="columnsOrder">
        <option value="id">ID</option>
        <option value="corp">Corporation</option>
        <option value="incorp_dt">Date</option>
        <option value="email">Email</option>
        <option value="zipcode">Zip Code</option>
        <option value="owner">Owner</option>
        <option value="phone">Phone</option>
    </select>
        <br /><br />
    
        Ascending:
    <input class="radio-inline" type="radio" name="orderBy" value="ASC"/><br />
        Descending:
    <input class="radio-inline" type="radio" name="orderBy" value="DESC"/>
    
    <br /><br />
    <input class="btn btn-default" type="hidden" value="submit1" name="action" />
    <input class="btn btn-default" type="submit" value="View All" onClick="href = 'view.php'" />
    <input class="btn btn-default" type="reset" value="Reset" name="reset" />
    
</form>

</body>
</html>